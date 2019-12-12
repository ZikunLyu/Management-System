<?php
   
   function loadTemplate($templateFileName, $variables = []) {
       extract($variables);
       
       ob_start();
           
       include __DIR__ . '/../templates/' . $templateFileName;
                      
       return ob_get_clean();
   }
   
   try {
       //include __DIR__ . '/../includes/DatabaseConnection.php';
       //include __DIR__ . '/../includes/DatabaseTable.php';
       //include __DIR__ . '/../controller/registerController.php';
       
       include __DIR__ . '/../classes/EntryPoint.php';
       
       //$execsTable = new DatabaseTable($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC');
       //$eventsTable = new DatabaseTable($pdo, 'CSSA_EVENTS', 'id_CSSA_EVENTS');
       
       //$RegisterController = new registerController($execsTable);
       
       //$action = $_GET['action'] ?? 'home';
       
       //$route = $_GET['route'] ?? 'exec/home';
       
       $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
       
       $entryPoint = new EntryPoint($route);
       
       $entryPoint->run();
       
       /*
       if ($route == strtolower($route)) {
           if ($route === 'exec/list') {
               include __DIR__ . '/../classes/controller/ExecController.php';
               $controller = new ExecController($execsTable, $eventsTable);
               $page = $controller->list();
           } elseif ($route === '') {
               include __DIR__ . '/../classes/controller/ExecController.php';
               $controller = new ExecController($execsTable, $eventsTable);
               $page = $controller->home();
           } elseif ($route === 'exec/edit') {
               include __DIR__ . '/../classes/controller/ExecController.php';
               $controller = new ExecController($execsTable, $eventsTable);
               $page = $controller->edit();
           } elseif ($route === 'exec/delete') {
               include __DIR__ . '/../classes/controller/ExecController.php';
               $controller = new ExecController($execsTable, $eventsTable);
               $page = $controller->delete();
           } elseif ($route === 'register') {
               include __DIR__ . '/../classes/controller/RegisterController.php';
               $controller = new RegisterController($execsTable);
               $page = $controller->showForm();
           }
       } else {
           http_response_code(301);
           header('location: index.php?route=' . strtolower($route));
       }
       
       //default controller name is exec
       $controllerName = $_GET['controller'] ?? 'exec';
       
       $title = $page['title'];
       //$output = $page['output'];
       
       if (isset($page['variables'])) {
               $output = loadTemplate($page['template'], $page['variables']);
       } else {
           $output = loadTemplate($page['template']);
       }
       */
   } catch (PDOException $e) {
       $title = 'An error has occurred';
       $output = 'Database error: ' . $e->getMessage() . ' in ' .
       $e->getFile() . ':' . $e->getLine();
   }
   
   //include  __DIR__ . '/../templates/layout.html.php';
