<?php
require_once 'Model.php';

class JoinModel extends Model
{
     protected $table = 'Members';

     public function __construct()
     {
          $this->pdo = Model::getInstance()->getConnection();
     }
}
