<?php
  require_once APP_PATH . '/libs/model/User.class.php';
  require_once APP_PATH . '/libs/model/DatabaseHandler.class.php';

  class Employee extends user {
    private $DatabaseHandler;

    public function __construct() {
      $this->DatabaseHandler = new DatabaseHandler();
    }

    /**
     * Register a new employee by saving there login password and NAW data
     * @param  array  $employee containing the data we need from the login form
     * @return int    $result   The last inserted id from the db
     */
    public function registerEmployee(array $employee) {
      $sql = "INSERT INTO `employee` (`firstname`, `lastname`, `phonenumber`, `loginCode`, `passwordCode`, `job`, `status`) VALUES (
        :firstname,
        :lastname,
        :phonenumber,
        :loginCode,
        :passwordCode,
        :job,
        1
      )";
      $input = array(
        "firstname" => $employee['firstname'],
        "lastname" => $employee['lastname'],
        "phonenumber" => $employee['phonenumber'],
        'loginCode' => $employee['code'],
        'passwordCode' => $this->hashPassword($employee['password']),
        "job" => $employee['job']
      );

      $result = $this->DatabaseHandler->execute_query($sql, $input);
      return($result);
    }

    /**
     * Checks if a employeecode extists
     * @param  [int] $employeeCode [The login code the employee wants]
     * @return [boolean]               [If the code exists we return true]
     */
    public function checkIfEmployeeCodeExists($employeeCode) {
      $sql = "SELECT employeeID FROM employee WHERE employee.loginCode = :employeeloginCode";
      $input = array(
        "employeeloginCode" => $employeeCode,
      );

      $result = $this->DatabaseHandler->read_query($sql, $input);
      if (count($result) == 0) {
        return(false);
      }
      return(true);
    }
  }


?>
