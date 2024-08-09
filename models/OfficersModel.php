<?php
require_once 'Model.php';

class OfficersModel extends Model
{
     protected $table = 'Officers';

     public function __construct()
     {
          $this->pdo = Model::getInstance()->getConnection();
     }
}
