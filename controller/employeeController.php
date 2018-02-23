<?php
  require_once APP_PATH . '/libs/model/FormHandler.class.php';
  require_once APP_PATH . '/libs/model/Employee.class.php';
  require_once APP_PATH . '/libs/model/User.class.php';

  class employeeController {
    private $FormHandler;
    private $Employee;
    private $User;

    public function __construct() {
      $this->FormHandler = new FormHandler();
      $this->Employee = new Employee();
      $this->User = new User();
    }

    /**
     * The default view redirect to the login view
     */
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
      $message = '';

      $this->FormHandler->setRequired('employeeFirstname');
      $this->FormHandler->setRequired('employeeLastname');
      $this->FormHandler->setRequired('employeePhonenumber');
      $this->FormHandler->setRequired('employeeCode');
      $this->FormHandler->setRequired('employeePassword');
      $this->FormHandler->setRequired('employeePasswordConfirm');
      $this->FormHandler->setRequired('employeeJob');

      if ($this->FormHandler->run() === true) {
        if ($this->FormHandler->getPostValue('employeePassword') === $this->FormHandler->getPostValue('employeePasswordConfirm')) {
          if ($this->Employee->checkIfEmployeeCodeExists($this->FormHandler->getPostValue('employeeCode')) === false) {
            $employee = array(
              "firstname" => $this->FormHandler->getPostValue('employeeFirstname'),
              "lastname" => $this->FormHandler->getPostValue('employeeLastname'),
              "phonenumber" => $this->FormHandler->getPostValue('employeePhonenumber'),
              "code" => $this->FormHandler->getPostValue('employeeCode'),
              "password" => $this->FormHandler->getPostValue('employeePassword'),
              "job" => $this->FormHandler->getPostValue('employeeJob'));

            $this->Employee->registerEmployee($employee);

            $message = 'Employee is created';
          }
          else {
            $message = 'Login code already exists';
          }
        }
        else {
          $message = 'No equal passwords';
        }
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
