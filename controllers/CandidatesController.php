<?php
require_once 'Controller.php';

class CandidatesController extends Controller
{

     public function election()
     {
          $this->render_view('election/election');
     }

     public function candidates()
     {
          $this->render_view('election/candidates');
     }

     public function delete_election()
     {
          $this->render_view('election/delete');
     }

     public function login_election()
     {
          $this->render_view('election/login');
     }

     public function form_election()
     {
          $this->render_view('election/form');
     }
}
