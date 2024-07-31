<?php
require_once 'Controller.php';

class AuthController extends Controller
{
     public function login()
     {
          $valid_email = "enis.ieee.2024@gmail.com";
          $valid_password = "ieee.enis#2024";

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $email = $_POST['email'];
               $password = $_POST['password'];

               if ($email === $valid_email && $password === $valid_password) {
                    $this->start_session_once();
                    $_SESSION['admin'] = true;
                    header('Location: index.php?url=members');
               } else {
                    $notification = 'Error: Invalid email or password';
                    $this->render_view('home/login', ['notification' => $notification]);
               }
          }
     }

     public function logout()
     {
          $this->start_session_once();
          session_destroy();
          $this->render_view('home/index');
     }
}
