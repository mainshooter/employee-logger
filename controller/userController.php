<?php
  require_once APP_PATH . '/libs/model/User.class.php';
  require_once APP_PATH . '/libs/model/FormHandler.class.php';

  class userController {
    private $User;
    private $FormHandler;

    public function __construct() {
      $this->User = new User();
      $this->FormHandler = new FormHandler();
    }

    /**
     * Presents the default view, wich is login
     * @return [type] [description]
     */
    public function index() {
      $this->login();
    }

    /**
     * Handels the login of a user
     */
    public function login() {
      $this->FormHandler->setRequired('employeeCode');
      $this->FormHandler->setRequired('employeePassword');


      if ($this->FormHandler->run() === true) {
        $employeeCode = $this->FormHandler->getPostValue('employeeCode');
        $employePassword = $this->FormHandler->getPostValue('employeePassword');
        if ($this->User->checkLoginCredentials($employeeCode, $employePassword) === true) {
          // Log them in and redirect
          $this->User->loginClient($_SESSION, $employeeCode);
          redirect('employee/dashboard');
        }
      }
      else if ($this->User->checkIfClientIsLoggedIn($_SESSION) === true) {
        redirect('employee/dashboard');
      }

      loadHeader();
        include APP_PATH . '/view/user/login.php';
      loadFooter();
    }

    /**
     * Handels the logout of a user
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
