<?php
require_once 'Model.php';

class PresencesModel extends Model
{
     protected $table = 'Presences';

     public function __construct()
     {
          $this->pdo = Model::getInstance()->getConnection();
     }
}
