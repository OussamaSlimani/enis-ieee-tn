<?php
require_once 'Controller.php';

class HomeController extends Controller
{

     public function index()
     {
          $this->render_view('home/home');
     }

     public function about()
     {
          $this->render_view('home/about');
     }

     public function subunits()
     {
          $this->render_view('home/subunits');
     }

     public function awards()
     {
          $this->render_view('home/awards');
     }

     public function events()
     {
          $this->render_view('home/events');
     }
     public function committees()
     {
          $this->render_view('home/committees');
     }

     public function vtools()
     {
          $this->render_view('home/vtools');
     }

     public function contact()
     {
          $this->render_view('home/contact');
     }

     public function game()
     {
          $this->render_view('games/tecweek');
     }

     public function newsletter()
     {
          $this->render_view('home/newsletter.pdf');
     }
}
