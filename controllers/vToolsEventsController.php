<?php
require_once 'Controller.php';
require_once 'models/vToolsEventsModel.php';

class vToolsEventsController extends Controller
{
     private $vToolsEventsModel;

     public function __construct()
     {
          parent::__construct();
          $this->vToolsEventsModel = new vToolsEventsModel();
     }

     private function extract_clean_text($html)
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

     public function saveEvents()
     {
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
                    "sm_logo_path" => "assets/img/logo-sm/sb.png",
               ),
               "SBA03301" => array(
                    "name" => "WIE ENIS SAG",
                    "sm_logo_path" => "assets/img/logo-sm/wie.png",
               ),
               "SBC03301A" => array(
                    "name" => "AESS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/aess.png",
               ),
               "SBC03301B" => array(
                    "name" => "CS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/cs.png",
                    "border1" => "border-orange-radius-2",
               ),
               "SBC03301H" => array(
                    "name" => "IAS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/ias.png",
               ),
               "SBC03301L" => array(
                    "name" => "SSCS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/sscs.png",
               ),
               "SBC03301E" => array(
                    "name" => "RAS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/ras.png"
               ),
               "SBC03301G" => array(
                    "name" => "CIS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/cis.png",
               ),
               "SBC03301J" => array(
                    "name" => "PES ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/pes.png",
               ),
               "SBC03301D" => array(
                    "name" => "EMBS ENIS SBC",
                    "sm_logo_path" => "assets/img/logo-sm/embs.png",
               )
          );

          $currentDateTime = new DateTime();
          $threeMonthsAgo = clone $currentDateTime;
          $threeMonthsAgo->modify('-3 months');
          $threeMonthsAgoISO = $threeMonthsAgo->format('Y-m-d\TH:i:s\Z');
          $url = sprintf(
               'https://events.vtools.ieee.org/RST/events/api/public/v4/events/list?delta=%s&category_id=2,3&span=%s~now&sort=-created-on&limit=3000',
               $threeMonthsAgoISO,
               $threeMonthsAgoISO
          );

          $response = file_get_contents($url);
          $data = ($response !== false) ? json_decode($response, true) : null;

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
                         $description = $this->extract_clean_text($event['attributes']['description']);
                         $date = substr($event['attributes']['start-time'], 0, 10);
                         $category = $categories[$event['relationships']['category']['data']['id']];
                         $chapter_logo_path = $chapters[$event['attributes']['primary-host']['spoid']]['sm_logo_path'];
                         $current_date = date("Y-m-d");
                         $type = ($current_date > substr($event['attributes']['start-time'], 0, 10)) ? "event" : "upcoming";
                         $location_type = ($event['attributes']['location-type'] === "virtual") ? "Virtual" : "Physical";
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
          return $filtered_events;
     }

     public function update()
     {
          $events = $this->saveEvents();

          $this->vToolsEventsModel->deleteAll();
          foreach ($events as $event) {
               $this->vToolsEventsModel->create(array(
                    "vToolsEventID" => $event['event_id'],
                    "title" => $event['title'],
                    "type" => $event['type'],
                    "chapter" => $event['chapter'],
                    "chapter_logo_path" => $event['chapter_logo_path'],
                    "date" => $event['date'],
                    "description" => $event['description'],
                    "category" => $event['category'],
                    "location_type" => $event['location_type'],
                    "link" => $event['link'],
               ));
          }

          $this->render_view('home/activities');
     }

     public function activities()
     {

          $activities = $this->vToolsEventsModel->findBy(
               [
                    'type' => 'event',
               ]
          );

          $upcoming = $this->vToolsEventsModel->findBy(
               [
                    'type' => 'upcoming',
               ]
          );

          $notification_upcoming = empty($upcoming) ? "No upcoming events at this moment." : '';
          $notification_activities = empty($activities) ? "No activities at this moment." : '';


          $this->render_view('home/activities', [
               'activities' => $activities,
               'upcoming' => $upcoming,
               'notification_upcoming' => $notification_upcoming,
               'notification_activities' => $notification_activities
          ]);
     }
}
