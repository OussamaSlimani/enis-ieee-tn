<?php
class ModelHome
{
	private $db;

	public function __construct()
	{
		$this->db = Database::getInstance()->getConnection();
	}

	public function saveEvents()
	{
		// Get the current date and time
		$currentDateTime = new DateTime();

		// Subtract 3 months from the current date
		$threeMonthsAgo = clone $currentDateTime;
		$threeMonthsAgo->modify('-3 months');

		// Format the date and time in ISO 8601
		$threeMonthsAgoISO = $threeMonthsAgo->format('Y-m-d\TH:i:s\Z');

		// Generate the URL
		$url = sprintf(
			'https://events.vtools.ieee.org/RST/events/api/public/v4/events/list?delta=%s&category_id=2,3&span=%s~now&sort=-created-on&limit=3000',
			$threeMonthsAgoISO,
			$threeMonthsAgoISO
		);

		function extract_clean_text($html)
		{
			$dom = new DOMDocument();
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			$scripts = $xpath->query('//script');
			foreach ($scripts as $script) {
				$script->parentNode->removeChild($script);
			}
			$styles = $xpath->query('//style');
			foreach ($styles as $style) {
				$style->parentNode->removeChild($style);
			}
			$images = $xpath->query('//img');
			foreach ($images as $image) {
				$image->parentNode->removeChild($image);
			}
			$text = $dom->textContent;
			$text = preg_replace('/\s+/', ' ', $text);
			$text = trim($text);

			if (strlen($text) > 210) {
				$text = substr($text, 0, 200) . "...";
			}

			return $text;
		}

		$categories = array(
			"1" => "Professional",
			"2" => "Technical",
			"3" => "Nontechnical",
			"4" => "Administrative",
			"5" => "Humanitarian",
			"6" => "Pre-U STEM Program"
		);

		$chapters = array(
			"STB03301" => array(
				"name" => "ENIS SB",
				"sm_logo_path" => "app/views/assets/img/logo-sm/sb.png",
			),
			"SBA03301" => array(
				"name" => "WIE ENIS SAG",
				"sm_logo_path" => "app/views/assets/img/logo-sm/wie.png",
			),
			"SBC03301A" => array(
				"name" => "AESS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/aess.png",
			),
			"SBC03301B" => array(
				"name" => "CS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/cs.png",
				"border1" => "border-orange-radius-2",
			),
			"SBC03301H" => array(
				"name" => "IAS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/ias.png",
			),
			"SBC03301L" => array(
				"name" => "SSCS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/sscs.png",
			),
			"SBC03301E" => array(
				"name" => "RAS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/ras.png"
			),
			"SBC03301G" => array(
				"name" => "CIS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/cis.png",
			),
			"SBC03301J" => array(
				"name" => "PES ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/pes.png",
			),
			"SBC03301D" => array(
				"name" => "EMBS ENIS SBC",
				"sm_logo_path" => "app/views/assets/img/logo-sm/embs.png",
			)
		);

		// Fetch data from the API
		$response = file_get_contents($url);
		if ($response !== false) {
			$data = json_decode($response, true);
		} else {
			$data = null;
		}

		$filtered_events = array();

		if ($data !== null && isset($data['data'])) {
			foreach ($data['data'] as $event) {
				if (isset($event['attributes']['primary-host']['spoid']) && array_key_exists($event['attributes']['primary-host']['spoid'], $chapters)) {

					$event_id = $event['id'];
					$title = $event['attributes']['title'];
					if (strlen($title) > 40) {
						$title = substr($title, 0, 37) . '...';
					}
					$chapter = $chapters[$event['attributes']['primary-host']['spoid']]['name'];
					$description = extract_clean_text($event['attributes']['description']);
					$date = substr($event['attributes']['start-time'], 0, 10);
					$category = $categories[$event['relationships']['category']['data']['id']];
					$chapter_logo_path = $chapters[$event['attributes']['primary-host']['spoid']]['sm_logo_path'];
					// Check current date
					$current_date = date("Y-m-d");
					if ($current_date > substr($event['attributes']['start-time'], 0, 10)) {
						$type = "event";
					} else {
						$type = "upcoming";
					}
					if ($event['attributes']['location-type'] === "virtual") {
						$location_type = "Virtual";
					} else {
						$location_type = "Physical";
					}

					$link = $event['attributes']['link'];

					$filtered_events[] = array(
						"event_id" => $event_id,
						"title" => $title,
						"type" => $type,
						"chapter" => $chapter,
						"chapter_logo_path" => $chapter_logo_path,
						"date" => $date,
						"description" => $description,
						"category" => $category,
						"location_type" => $location_type,
						"link" => $link,
					);
				}
			}
		}

		$stmt = $this->db->prepare("
            INSERT INTO vToolsEvents (vToolsEventID, title, type, chapter, chapter_logo_path, date, description, category, location_type, link)
            VALUES (:event_id, :title, :type, :chapter, :chapter_logo_path, :date, :description, :category, :location_type, :link)
        ");

		foreach ($filtered_events as $event) {
			$stmt->execute([
				':event_id' => $event['event_id'],
				':title' => $event['title'],
				':type' => $event['type'],
				':chapter' => $event['chapter'],
				':chapter_logo_path' => $event['chapter_logo_path'],
				':date' => $event['date'],
				':description' => $event['description'],
				':category' => $event['category'],
				':location_type' => $event['location_type'],
				':link' => $event['link']
			]);
		}
	}

	public function getActivities()
	{
		try {
			$stmt = $this->db->prepare("SELECT * FROM vToolsEvents WHERE type = 'event'");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return null;
		}
	}
	public function getUpcoming()
	{
		try {
			$stmt = $this->db->prepare("SELECT * FROM vToolsEvents WHERE type = 'upcoming'");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return null;
		}
	}

	public function deleteAllEvents()
	{
		try {
			$stmt = $this->db->prepare("DELETE FROM vToolsEvents");
			$stmt->execute();
		} catch (PDOException $e) {
			// Handle error appropriately
			error_log("Error deleting events: " . $e->getMessage());
		}
	}

	// Join pages
	public function createNewAccount($email, $fullname, $password, $department)
	{
		$query = "SELECT COUNT(*) FROM Members WHERE Email = :email";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		if ($count > 0) {
			return array("success" => false, "message" => "Email already exists!");
		}
		$query = "INSERT INTO Members (Email, FullName, Department, Password, MembershipStatus)
			    VALUES (:email, :fullname, :department, :password, 'Not Active')";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
		$stmt->bindParam(':department', $department, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		if ($stmt->execute()) {
			return array("success" => true, "message" => "Account created successfully!");
		} else {
			return array("success" => false, "message" => "Failed to create account. Please try again.");
		}
	}


	public function verifyPayment($email, $password)
	{
		$query = "SELECT MembershipStatus, EndMembership FROM Members WHERE Email = :email AND Password = :password";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result) {
			if ($result['MembershipStatus'] == 'Not Active' || $result['EndMembership'] < date('Y-m-d')) {
				return array("success" => false, "message" => "The Payment is not processed yet!");
			} else {
				return array("success" => true, "message" => "The Payment is processed!");
			}
		} else {
			return array("success" => false, "message" => "Error, verifier your email or password!");
		}
	}

	public function updateIeeeEmailNumber($ieeeNumber, $ieeeEmail, $email, $password)
	{
		$query = "SELECT * FROM Members WHERE Email = :email AND Password = :password AND MembershipStatus = 'Active'";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result) {
			$updateQuery = "UPDATE Members SET Email = :ieeeEmail, IeeeNumber = :ieeeNumber WHERE Email = :email AND Password = :password";
			$updateStmt = $this->db->prepare($updateQuery);
			$updateStmt->bindParam(':ieeeEmail', $ieeeEmail);
			$updateStmt->bindParam(':ieeeNumber', $ieeeNumber);
			$updateStmt->bindParam(':email', $email);
			$updateStmt->bindParam(':password', $password);
			$updateStmt->execute();
			if ($updateStmt->rowCount() > 0) {
				return array("success" => true, "message" => "The update was successful!");
			} else {
				return array("success" => false, "message" => "The update failed. try again!");
			}
		} else {
			return array("success" => false, "message" => "You can't update : Member not found or the payment is not processed yet!");
		}
	}
}
