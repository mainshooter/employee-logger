<?php
  require_once APP_PATH . '/libs/model/FormHandler.class.php';
  require_once APP_PATH . '/libs/model/Employee.class.php';

  class userController {
    private $FormHandler;
    private $Employee;

    public function __construct() {
      $this->FormHandler = new FormHandler();
      $this->Employee = new Employee();
    }

    public function index() {
      $this->login();
    }

    /**
     * Login view and controlls the login
     */
    public function login() {
      $this->FormHandler->setRequired('employeeCode');
      $this->FormHandler->setRequired('employeePassword');


      if ($this->FormHandler->run() === true) {
        $employeeCode = $this->FormHandler->getPostValue('employeeCode');
        $employePassword = $this->FormHandler->getPostValue('employeePassword');
      }
      else if ($this->User->checkIfClientIsLoggedIn($_SESSION)) {
        redirect('employee/dashboard');
      }

      loadHeader();
        include APP_PATH . '/view/user/login.php';
      loadFooter();
    }

    /**
     * Register a new Employee
     */
    public function register() {
      $this->FormHandler->setRequired('employeeFirstname');
      $this->FormHandler->setRequired('employeeSecondname');
      $this->FormHandler->setRequired('phonenumber');
      $this->FormHandler->setRequired('employeeCode');
      $this->FormHandler->setRequired('employeePassword');
      $this->FormHandler->setRequired('employeePasswordConfirm');
      $this->FormHandler->setRequired('employeeJob');

      if ($this->FormHandler->run() === true) {

      }
      loadHeader();
        include APP_PATH . '/view/user/register.php';
      loadFooter();
    }

    /**
     * controls the logout
     */
    public function logout() {
      if ($this->User->checkIfClientIsLoggedIn($_SESSION)) {
        $this->User->logoutClient($_SESSION);
      }
      else {
        redirect();
      }
    }

  }

?>
