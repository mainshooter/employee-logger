<?php
  require_once APP_PATH . '/libs/model/DatabaseHandler.class.php';

 class User {
   private $DatabaseHandler;

   private $loginToken;
   private $allowedRoles;

   function __construct() {
     $this->DatabaseHandler = new DatabaseHandler();
   }

   protected function hashPassword(string $password) {
     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
     return($hashedPassword);
   }

   public function checkIfClientIsLoggedIn() {

   }

 }

// $user = new User();
// $user->registerNewUser("admin@multiversum.nl", '1234');



?>
