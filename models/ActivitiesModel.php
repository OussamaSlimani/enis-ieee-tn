<?php
require_once 'Model.php';

class ActivitiesModel extends Model
{
     protected $table = 'Activities';

     public function __construct()
     {
          $this->pdo = Model::getInstance()->getConnection();
     }
}
