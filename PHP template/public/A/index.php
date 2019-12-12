  <?php
    
    function loadTemplate($templateFileName, $variables = []) {
        extract($variables);
        
        ob_start();
            
        include __DIR__ . '/../templates/' . $templateFileName;
                       
        return ob_get_clean();
    }
    
    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseTable.php';
        include __DIR__ . '/../controller/ExecController.php';
        
        $execsTable = new DatabaseTable($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC');
        $eventsTable = new DatabaseTable($pdo, 'CSSA_EVENTS', 'id_CSSA_EVENTS');
        
        $ExecController = new execController($execsTable, $eventsTable);
        
        $action = $_GET['action'] ?? 'home';
        
        //it is for search engine, make the action to lowercase and send code 301 to browser to tell the browser that this redirect is permanent
        if ($action == strtolower($action)) {
            $page = $ExecController->$action();
        }
        else {
            http_response_code(301);
            header('location: index.php?action=' . strtolower($action));
        }
        
        //$page = $execController->$action();
        
        /*
        $variables = $page['variables'];
        */
        
        /*
        if (isset($_GET['edit'])) {
            $page = $execController->edit();
        } elseif (isset($_GET['delete'])) {
            $page = $execController->delete();
        } elseif (isset($_GET['list'])) {
            $page = $execController->list();
        } else {
            $page = $execController->home();
        }
        */
        
        $title = $page['title'];
        //$output = $page['output'];
        
        if (isset($page['variables'])) {
                $output = loadTemplate($page['template'], $page['variables']);
        } else {
            $output = loadTemplate($page['template']);
        }
        
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in ' .
        $e->getFile() . ':' . $e->getLine();
    }
    
    include  __DIR__ . '/../templates/layout.html.php';
