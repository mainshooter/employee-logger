<?php
  $config;

  $config['project-name'] = 'Employee logger';
  $config['project-author'] = 'Peter Romijn';
  $config['project-company'] = 'SameBestDevelopment';

  $config['base_url'] = 'http://localhost/employee-logger/';
  // Location of our site;
  // You need to change this when it is in a diffrent folder our
  // If it is in the root folder than it must be empty!

  $config['db-server_ip'] = 'localhost';
  $config['db-server_port'] = 3306;
  $config['db-username'] = 'root';
  $config['db-password'] = '';
  $config['db-database_name'] = 'employee';
  // DB config


  $config['mail-host'] = '';
  $config['mail-userName'] = '';
  $config['mail-password'] = '';
  $config['mail-SMTPSecure'] = '';
  $config['mail-port'] = '';
  $config['mail-sendFormAdress'] = '';
  $config['mail-senderName'] = '';
  // Mail config

  $GLOBALS['config'] = $config;

?>
