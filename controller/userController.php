<?php
  require_once APP_PATH 'file';

  class userController {
    private $FormHandler;
    private $User;

    public function index() {
      $this->login();
    }

    /**
     * Login view and controlls the login
     */
    public function login() {
      $this->FormHandler->setPostRequired('employeeCode');
      $this->FormHandler->setPostRequired('employeePassword');


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
      $this->FormHandler->setPostRequired('employeeFirstname');
      $this->FormHandler->setPostRequired('employeeSecondname');
      $this->FormHandler->setPostRequired('phonenumber');
      $this->FormHandler->setPostRequired('employeeCode');
      $this->FormHandler->setPostRequired('employeePassword');
      $this->FormHandler->setPostRequired('employeeJob');
    }

    public function logout() {

    }

  }

?>
