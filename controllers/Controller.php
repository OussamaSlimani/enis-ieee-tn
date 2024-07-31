<?php

class Controller
{
     private $viewsPath = 'views/';

     public function __construct()
     {
     }

     public function render_view($viewName, $data = [])
     {
          $this->includeView($viewName, $data);
     }

     public function render_view_secured($viewName, $data = [])
     {
          $this->start_session_once();
          if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
               $this->includeView($viewName, $data);
          } else {
               $this->render_view("home/login");
          }
     }

     private function includeView($viewName, $data = [])
     {
          if (substr($viewName, -4) === '.pdf') {
               $viewFile = $this->viewsPath . $viewName;
               header('Content-Type: application/pdf');
               header('Content-Disposition: attachment; filename="' . basename($viewFile) . '"');
               header('Content-Length: ' . filesize($viewFile));
               readfile($viewFile);
               exit;
          } else {
               $viewFile = $this->viewsPath . $viewName . '.php';
          }


          if (file_exists($viewFile)) {
               extract($data);
               include($viewFile);
          } else {
               echo "View not found: " . htmlspecialchars($viewFile);
          }
     }

     protected function start_session_once()
     {
          if (session_status() == PHP_SESSION_NONE) {
               session_start();
          }
     }
}
