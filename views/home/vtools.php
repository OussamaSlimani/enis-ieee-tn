<!DOCTYPE html>
<html>

<head>
     <title>Vtools Link Form</title>
     <!-- Bootstrap CSS -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <!-- jQuery and Bootstrap JS -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <style>
          /* box-sizing : (initialisation)  */
          * {
               p {
                    margin: 5px !important;
               }
          }
     </style>
</head>

<body class="container mt-5">
     <h2 class="mb-4">Enter Vtools Link</h2>
     <form method="post" action="" class="mb-4">
          <div class="form-group">
               <input type="text" class="form-control" id="vtools_link" name="vtools_link" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
     </form>
     <div id="results">
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $vtools_link = $_POST['vtools_link'];

               // Extract the ID from the link
               $pattern = "/m\/(\d+)/";
               preg_match($pattern, $vtools_link, $matches);

               if (!empty($matches[1])) {
                    $id = $matches[1];
                    $api_url = "https://events.vtools.ieee.org/RST/events/api/public/v4/events/list?id=" . $id;
                    $filtered_event = getData($api_url);

                    if (!empty($filtered_event)) {
                         foreach ($filtered_event as $event) {
                              $description = htmlspecialchars($event['description']);
                              // Check if the description is longer than 100 characters
                              if (strlen($description) > 100) {
                                   $description = generateSummary($description);
                              }
                              echo "<div class='card mb-3'><div class='card-body'>";
                              echo "<h5 class='card-title'>Title: " . htmlspecialchars($event['title']) . "</h5>";
                              echo "<p class='card-text'><strong>Category:</strong> " . htmlspecialchars($event['category']) . "</p>";
                              echo "<p class='card-text'><strong>Date:</strong> " . htmlspecialchars($event['date']) . "</p>";
                              echo "<p class='card-text'><strong>Location Type:</strong> " . htmlspecialchars($event['location_type']) . "</p>";
                              echo "<p class='card-text'><strong>IEEE Attending:</strong> " . htmlspecialchars($event['ieeeAttending']) . "</p>";
                              echo "<p class='card-text'><strong>Guests Attending:</strong> " . htmlspecialchars($event['guestsAttending']) . "</p>";
                              echo "<p class='card-text'><strong>Vtools link:</strong> " . $vtools_link . "</p>";
                              echo "<p class='card-text'><strong>Keywords:</strong> " . htmlspecialchars(is_array($event['keywords']) ? implode(', ', $event['keywords']) : $event['keywords']) . "</p>";
                              echo "<p class='card-text'><strong>Description:</strong> " . $description . "</p>";
                              echo '<button id="copyBtn" class="btn btn-secondary mt-3">Copy</button>';
                              echo "</div></div>";
                              echo "<div class='card mb-3'><div class='card-body'>";
                              // Display images if available
                              if (!empty($event['arrayImages'])) {
                                   foreach ($event['arrayImages'] as $image) {
                                        echo '<img src="' . htmlspecialchars($image) . '" alt="" class="img-fluid mb-2">';
                                   }
                              }
                              echo "</div></div>";
                         }
                    } else {
                         echo "<div class='alert alert-warning'>No event data found or invalid response from API.</div>";
                    }
               } else {
                    echo "<div class='alert alert-danger'>Invalid Vtools link format.</div>";
               }
          }

          function extract_clean_text($html)
          {
               $dom = new DOMDocument();
               @$dom->loadHTML($html);
               $xpath = new DOMXPath($dom);

               // Extract image links
               $imageLinks = [];
               $images = $xpath->query('//img');
               foreach ($images as $image) {
                    $imageLinks[] = $image->getAttribute('src');
                    // Remove image from the DOM
                    $image->parentNode->removeChild($image);
               }

               // Remove script and style tags
               $scripts = $xpath->query('//script');
               foreach ($scripts as $script) {
                    $script->parentNode->removeChild($script);
               }
               $styles = $xpath->query('//style');
               foreach ($styles as $style) {
                    $style->parentNode->removeChild($style);
               }

               // Extract text content
               $text = $dom->textContent;
               $text = preg_replace('/\s+/', ' ', $text);
               $text = trim($text);

               return [
                    'text' => $text,
                    'images' => $imageLinks
               ];
          }

          function getData($api_url)
          {
               $categories = array(
                    "1" => "Professional",
                    "2" => "Technical",
                    "3" => "Nontechnical",
                    "4" => "Administrative",
                    "5" => "Humanitarian",
                    "6" => "Pre-U STEM Program"
               );

               // Fetch data from the API
               $response = file_get_contents($api_url);
               if ($response !== false) {
                    $event = json_decode($response, true);
               } else {
                    $event = null;
               }

               $filtered_event = array();

               if ($event !== null && isset($event['data']) && !empty($event['data'])) {
                    foreach ($event['data'] as $e) {
                         $title = $e['attributes']['title'];
                         $description = extract_clean_text($e['attributes']['description'])['text'];
                         $arrayImages = extract_clean_text($e['attributes']['description'])['images'];
                         $date = substr($e['attributes']['start-time'], 0, 10);
                         $category = $categories[$e['relationships']['category']['data']['id']];

                         if ($e['attributes']['location-type'] === "virtual") {
                              $location_type = "Virtual " . extract_clean_text($e['attributes']['virtual-info'])['text'];
                         } else {
                              $location_type = "Physical " . $e['attributes']['address1'] . " " . $e['attributes']['address2'];
                         }

                         $ieeeAttending = $e['attributes']['ieee-attending'];
                         $guestsAttending = $e['attributes']['guests-attending'];
                         $keywords = $e['attributes']['keywords'];

                         $filtered_event[] = array(
                              "title" => $title,
                              "date" => $date,
                              "description" => $description,
                              "category" => $category,
                              "location_type" => $location_type,
                              "keywords" => $keywords,
                              "ieeeAttending" => $ieeeAttending,
                              "guestsAttending" => $guestsAttending,
                              "arrayImages" => $arrayImages,
                         );
                    }
               }
               return $filtered_event;
          }

          function generateSummary($text)
          {
               $api_url = "https://api-inference.huggingface.co/models/facebook/bart-large-cnn";
               $headers = [
                    "Authorization: Bearer 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",
                    "Content-Type: application/json"
               ];

               $data = [
                    "inputs" => $text,
                    "parameters" => ["max_length" => 100]
               ];

               $ch = curl_init($api_url);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
               curl_setopt($ch, CURLOPT_POST, true);
               curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

               $response = curl_exec($ch);
               curl_close($ch);

               $output = json_decode($response, true);

               // Check if the API response contains a summary
               if (isset($output[0]['summary_text'])) {
                    return htmlspecialchars($output[0]['summary_text']);
               } else {
                    return "Summary not available.";
               }
          }
          ?>
     </div>

     <script>
          document.addEventListener('DOMContentLoaded', function() {
               var copyButtons = document.querySelectorAll('#results .btn-secondary');

               copyButtons.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                         var resultsDiv = document.getElementById('results');
                         var range = document.createRange();
                         range.selectNode(resultsDiv);
                         window.getSelection().removeAllRanges();
                         window.getSelection().addRange(range);
                         try {
                              var successful = document.execCommand('copy');
                              if (successful) {
                                   btn.textContent = 'Copied';
                                   btn.classList.remove('btn-secondary');
                                   btn.classList.add('btn-success');
                                   setTimeout(function() {
                                        btn.textContent = 'Copy';
                                        btn.classList.remove('btn-success');
                                        btn.classList.add('btn-secondary');
                                   }, 3000);
                              }
                         } catch (err) {
                              alert('Oops, unable to copy');
                         }
                         window.getSelection().removeAllRanges();
                    });
               });
          });
     </script>
</body>

</html>