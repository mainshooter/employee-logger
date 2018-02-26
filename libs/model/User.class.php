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

   public function checkLoginCredentials($username, $password) {
     $sql = "SELECT loginCode, passwordCode FROM employee WHERE loginCode=:loginCode LIMIT 1";
     $input = array(
       "loginCode" => $username,
     );

     $result = $this->DatabaseHandler->read_query($sql, $input);
     if (!empty($result)) {
       $loginCodeDatabase = $result[0]['loginCode'];
       $passwordCodeDatabase = $result[0]['passwordCode'];

       if ($this->compairPasswords($passwordCodeDatabase, $password) === true) {
         return(true);
       }
     }
     return(false);
   }

   /**
    * Compairs the password from the db to the password that the client filled in
    * @param  string $hashedPassword    The password from the db
    * @param  string $userInputPassword The password that the client filled in
    * @return boolean                   If they are equal we return true
    */
   private function compairPasswords($hashedPassword, $userInputPassword) {
     if (password_verify($userInputPassword, $hashedPassword) === true) {
       return(true);
     }
     return(false);
   }

   public function loginClient($clientSession, $employeeLogincode) {
     $clientSession['credentials']['logincode'] = $employeeLogincode;
   }

   public function checkIfClientIsLoggedIn() {

   }

 }

// $user = new User();
// $user->registerNewUser("admin@multiversum.nl", '1234');



?>
