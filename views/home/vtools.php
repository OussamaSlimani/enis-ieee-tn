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
          /* box-sizing : (initialization) */
          * {
               box-sizing: border-box;
               font-family: Arial, Helvetica, sans-serif;
          }

          p {
               margin: 5px !important;
          }

          .fw-bold {
               font-weight: bold;
          }

          .fs-13 {
               font-size: 18px;
          }

          .text_justify {
               text-align: justify;
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
     <div>
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
                              echo "<div class='card mb-3' id='results'>
                              <div class='card-body'>";

                              echo "<h4 class='card-title fw-bold fs-13'>" . htmlspecialchars($event['title'], ENT_QUOTES, 'UTF-8') . " (" . htmlspecialchars($event['date'], ENT_QUOTES, 'UTF-8') . ") </h4>";

                              echo "<p class='card-text fw-bold'>IEEE Attending: " . htmlspecialchars($event['ieeeAttending'], ENT_QUOTES, 'UTF-8') .
                                   " || Guests Attending: " . htmlspecialchars($event['guestsAttending'], ENT_QUOTES, 'UTF-8') . "</br>";

                              echo "Location Type: " . htmlspecialchars($event['location_type']) . " </br>";

                              echo "Vtools link: <a href='" . htmlspecialchars($vtools_link, ENT_QUOTES, 'UTF-8') . "' style='color: blue; font-style: italic;'>" . htmlspecialchars($vtools_link, ENT_QUOTES, 'UTF-8') . "</a></p>";


                              echo "<p class='card-text text_justify'>" . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "</p>";

                              echo '<button id="copyBtn" class="btn btn-secondary mt-3">Copy</button>';

                              echo "</div></div>";

                              // Display images if available
                              if (!empty($event['arrayImages'])) {
                                   foreach ($event['arrayImages'] as $image) {
                                        echo '<img src="' . htmlspecialchars($image) . '" alt="" class="img-fluid mb-2">';
                                   }
                              }
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

                         // Initialize the cohost array
                         $cohost = [];

                         // Excluded cohost name
                         $excludedCohost = "National Engineering School of Sfax";

                         // Extract cohost names
                         if (isset($e['attributes']['cohosts']) && !empty($e['attributes']['cohosts'])) {
                              foreach ($e['attributes']['cohosts'] as $cohostItem) {
                                   // Check if the cohost name is not the excluded one
                                   if ($cohostItem['name'] !== $excludedCohost) {
                                        $cohost[] = $cohostItem['name'];
                                   }
                              }
                         }


                         if ($e['attributes']['location-type'] === "virtual") {
                              $location_type = "Virtual";
                         } else {
                              $location_type = "In-Person";
                         }

                         $ieeeAttending = $e['attributes']['ieee-attending'];
                         $guestsAttending = $e['attributes']['guests-attending'];
                         $keywords = $e['attributes']['keywords'];

                         $filtered_event[] = array(
                              "title" => $title,
                              "date" => $date,
                              "description" => $description,
                              "cohost" => $cohost,
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
                         // Select the parent card of the button
                         var cardBody = btn.closest('.card-body');

                         // Create a range and select the text within the card body
                         var range = document.createRange();
                         range.selectNodeContents(cardBody);

                         // Clear any previous selections
                         window.getSelection().removeAllRanges();
                         window.getSelection().addRange(range);

                         try {
                              // Execute the copy command
                              var successful = document.execCommand('copy');
                              if (successful) {
                                   btn.textContent = 'Copied';
                                   btn.classList.remove('btn-secondary');
                                   btn.classList.add('btn-success');

                                   // Reset the button text after 3 seconds
                                   setTimeout(function() {
                                        btn.textContent = 'Copy';
                                        btn.classList.remove('btn-success');
                                        btn.classList.add('btn-secondary');
                                   }, 3000);
                              }
                         } catch (err) {
                              alert('Oops, unable to copy');
                         }

                         // Clear the selection
                         window.getSelection().removeAllRanges();
                    });
               });
          });
     </script>

</body>

</html>