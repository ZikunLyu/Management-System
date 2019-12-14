<?php
    
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseTable.php';
    include __DIR__ . '/../classes/controller/ExecController.php';
    
    $execsTable = new DatabaseTable($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC');

    try {
        //if firstname is set, it means the user has record
        if (isset($_POST['exec'])) {
            $exec = $_POST['exec'];
            $exec['activedate_CSSA_EXEC'] = new DateTime();
            
            $execsTable->save($exec);
                 
            header('location: exec.php');
            
        } else {
            
            if (isset($_GET['id'])) {
                //$exec = getExec($pdo, $_GET['id']);
                $exec = $execsTable->findById($_GET['id']);
            }
            
            $title = 'Edit Exec';
            
            ob_start();
            
            include __DIR__ . '/../templates/editexec.html.php';
            
            $output = ob_get_clean();
        }
    }
        catch (PDOException $e) {
            $title = 'An error has occurred';
            $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
        }
    
    include __DIR__ . '/../templates/layout.html.php';
    
    
    
