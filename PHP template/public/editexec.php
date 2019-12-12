<?php
    
    include __DIR__ . '/../includes/DatabaseConnection.php';
    //include __DIR__ . '/../includes/DatabaseFunction.php';
    include __DIR__ . '/../includes/DatabaseTable.php';
    include __DIR__ . '/../classes/controller/ExecController.php';
    
    $execsTable = new DatabaseTable($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC');

    try {
        //if firstname is set, it means the user has record
        if (isset($_POST['exec'])) {
            //after login, there should be a unique user id
            
            $exec = $_POST['exec'];
            $exec['activedate_CSSA_EXEC'] = new DateTime();
            /*
            //unset($exec['submit']); //to remove 'submit' value in $_POST
            $exec['activedate_CSSA_EXEC'] = new DateTime();
            
            save($pdo, 'CSSA_EXEC', 'id_CSSA_EXEC', $exec);
             */
            
            $execsTable->save($exec);
            /*
            [
            'firstname_CSSA_EXEC' => $exec['firstname_CSSA_EXEC'],
            'lastname_CSSA_EXEC' => $exec['lastname_CSSA_EXEC'],
            'studentid_CSSA_EXEC' => $exec['studentid_CSSA_EXEC'],
             'faculty_CSSA_EXEC' => $exec['faculty_CSSA_EXEC'],
             'major_CSSA_EXEC' => $exec['major_CSSA_EXEC'],
             'birthday_CSSA_EXEC' => $exec['birthday_CSSA_EXEC'],
             'departmentid_CSSA_EXEC' => $exec['departmentid_CSSA_EXEC'],
             'activeness_CSSA_EXEC' => $exec['activeness_CSSA_EXEC'],
             'jobtitle_CSSA_EXEC' => $exec['jobtitle_CSSA_EXEC'],
            'activedate_CSSA_EXEC' => new DateTime(),
             'email_CSSA_EXEC' => $exec['email_CSSA_EXEC'],
             'mobile_CSSA_EXEC' => $exec['mobile_CSSA_EXEC'],
             'wechat_CSSA_EXEC' => $exec['wechat_CSSA_EXEC']
                   ]);
            */
                 
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
    
    
    
