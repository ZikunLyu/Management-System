<?php
    
    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/includes/DatabaseFunction.php';
    
    try {
        //if firstname is set, it means the user has record
        if (isset($_POST['firstname'])) {
            //after login, there should be a unique user id
            updateExec($pdo, _POST['id'], $_POST['firstname'],
                                $_POST['lastname'],
                                $_POST['studentid'],
                                $_POST['faculty'],
                                $_POST['major'],
                                $_POST['birthday'],
                                $_POST['departmentid'],
                                $_POST['activeness'],
                                $_POST['jobtitle'],
                                $_POST['email'],
                                $_POST['mobile'],
                                $_POST['wechat']);
            
            header('location: exec.php');
        } else {
            //$_GET['id']
            $exec = getExec($pdo, $_GET['id']);
            
            $title = 'Edit Exec';
            
            ob_start();
            
            include __DIR__ . '/templates/editexec.html.php';
            
            $output = ob_get_clean();
        }
    }
        catch (PDOException $e) {
            $title = 'An error has occurred';
            $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
        }
    
    include __DIR__ . '/templates/layout.html.php';
    
    
    
