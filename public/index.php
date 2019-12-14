<?php
   try {
       include __DIR__ . '/../includes/autoload.php';
       //ltrim: removes the leading /, ex. if you visit http://192.168.10.10/exec/list, $_SERVER['REQUEST_URI'] will stores the string /exec/list.
       //$_SERVER['REQUEST_URI'] contains the complete URL
       $route = ltrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
       
       $entryPoint = new \Ninja\EntryPoint($route, $_SERVER['REQUEST_METHOD'], new \Ijdb\IjdbRoutes());
       
       $entryPoint->run();
       
   } catch (PDOException $e) {
       $title = 'An error has occurred';
       $output = 'Database error: ' . $e->getMessage() . ' in ' .
       $e->getFile() . ':' . $e->getLine();
   }
   
   //include  __DIR__ . '/../templates/layout.html.php';
