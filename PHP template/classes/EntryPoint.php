<?php
    class EntryPoint
    {
        private $route;
        
        public function __construct($route) {
            $this->route = $route;
            $this->checkUrl();
        }
        
        //if there is a redirect check problem, look in the checkUrl method
        private function checkUrl() {
            if ($this->route !== strtolower($this->route)) {
                http_response_code(301);
                header('location: ' . strtolower($this->route));
            }
        }
        
        //if a template is not loading correctly, look in loadTemplate method
        private function loadTemplate($templateFileName, $variables = []) {
            extract($variables);
            
            ob_start();
                
            include __DIR__ . '/../templates/' . $templateFileName;
                           
            return ob_get_clean();
        }
        
        //if a URL is not displaying the page it should, look in the callAction method
        private function callAction() {
            include __DIR__ . '/../classes/DatabaseTable.php';
            include __DIR__ . '/../includes/DatabaseConnection.php';
            
            $execsTable = new DatabaseTable($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC');
            $eventsTable = new DatabaseTable($pdo, 'CSSA_EVENTS', 'id_CSSA_EVENTS');
            
                if ($this->route === 'exec/list') {
                    include __DIR__ . '/../classes/controller/ExecController.php';
                    $controller = new ExecController($execsTable, $eventsTable);
                    $page = $controller->list();
                } elseif ($this->route === '') {
                    include __DIR__ . '/../classes/controller/ExecController.php';
                    $controller = new ExecController($execsTable, $eventsTable);
                    $page = $controller->home();
                } elseif ($this->route === 'exec/edit') {
                    include __DIR__ . '/../classes/controller/ExecController.php';
                    $controller = new ExecController($execsTable, $eventsTable);
                    $page = $controller->edit();
                } elseif ($this->route === 'exec/delete') {
                    include __DIR__ . '/../classes/controller/ExecController.php';
                    $controller = new ExecController($execsTable, $eventsTable);
                    $page = $controller->delete();
                } elseif ($this->route === 'register') {
                    include __DIR__ . '/../classes/controller/RegisterController.php';
                    $controller = new RegisterController($execsTable);
                    $page = $controller->showForm();
                }
            
            return $page;
            }
        
        public function run() {
            $page = $this->callAction();
            
            $title = $page['title'];
            
            if (isset($page['variables'])) {
                    $output = loadTemplate($page['template'], $page['variables']);
            } else {
                $output = loadTemplate($page['template']);
            }
            
            include  __DIR__ . '/../templates/layout.html.php';
        }
            
    }
        
