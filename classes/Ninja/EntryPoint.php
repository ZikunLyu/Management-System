<?php
    namespace Ninja;
    
    class EntryPoint
    {
        private $route;
        private $method;
        private $routes;
        
        public function __construct(string $route, string $method, \Ijdb\IjdbRoutes $routes) {
            $this->route = $route;
            $this->routes = $routes;
            $this->method = $method;
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
                
            include __DIR__ . '/../../templates/' . $templateFileName;
                           
            return ob_get_clean();
        }
         
        public function run() {
            $routes = $this->routes->getRoutes();
            
            $controller = $routes[$this->route][$this->method]['controller'];
            
            $action = $routes[$this->route][$this->method]['action'];
            
            $page = $controller->$action();
            
            $title = $page['title'];
            
            if (isset($page['variables'])) {
                    $output = $this->loadTemplate($page['template'], $page['variables']);
            } else {
                $output = $this->loadTemplate($page['template']);
            }
            
            include  __DIR__ . '/../../templates/layout.html.php';
        }
            
    }
        
