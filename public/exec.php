<?php
        try {
            include __DIR__ . '/../includes/DatabaseConnection.php';
            include __DIR__ . '/../includes/DatabaseFunction.php';
            
            //sql query
            $sql = 'SELECT `id_CSSA_EXEC`, `firstname_CSSA_EXEC` FROM `CSSA_EXEC`';
            //get the result after executing the query
            $students = $pdo->query($sql);
            
            //for each row element in result, we get the corresponding id and firstname, then we store this (id + firstname) array in an array called students
            /*
             foreach ($exec as $row) {
                $students[] = array('id'=> $row['id_CSSA_EXEC'], 'firstname' => $row['firstname_CSSA_EXEC']);
             }
        */
            $title = 'Exec List';
            
            $totalExec = totalExecs($pdo);
            
            //start the buffer so that the result of 'include' will be stored into var $outout instead of showing on the screen directly
            ob_start();
            //execute deleteexec.html.php
            include __DIR__ . '/../templates/deleteexec.html.php';
            
            $output = ob_get_clean();
            
        } catch (PDOException $e) {
            $title = 'An error has occurred';
            $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
        }
    

        include  __DIR__ . '/../templates/layout.html.php';
    
    
    
        
    
    
        
