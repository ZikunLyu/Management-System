<?php
    if (isset($_POST['submit'])) {
        try {
            include __DIR__ . '/../includes/DatabaseConnection.php';
            include __DIR__ . '/../includes/DatabaseFunction.php';
            
            insert($pdo, 'CSSA_EXEC' ,['firstname_CSSA_EXEC' => $_POST['firstname'],
                        'lastname_CSSA_EXEC' => $_POST['lastname'],
                        'studentid_CSSA_EXEC' => $_POST['studentid'],
                        'faculty_CSSA_EXEC' => $_POST['faculty'],
                        'major_CSSA_EXEC' => $_POST['major'],
                        'birthday_CSSA_EXEC' => $_POST['birthday'],
                        'departmentid_CSSA_EXEC' => $_POST['departmentid'],
                        'activeness_CSSA_EXEC' => $_POST['activeness'],
                        'jobtitle_CSSA_EXEC' => $_POST['jobtitle'],
                       'activedate_CSSA_EXEC' => new DateTime(),
                        'email_CSSA_EXEC' => $_POST['email'],
                        'mobile_CSSA_EXEC' => $_POST['mobile'],
                        'wechat_CSSA_EXEC' => $_POST['wechat']
                        ]);
            
            //insert($pdo, 'CSSA_EVENTS', ['name_CSSA_EVENTS' => 'Debug']);
            
            header('location: exec.php');
            
        } catch (PDOException $e) {
            $title = 'An error has occurred';
            
            $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }
    } else {
        
    $title = 'Add a new Exec';
    
    ob_start();
    
    include __DIR__ . '/../templates/addexec.html.php';
    
    $output = ob_get_clean();
        
    }
    
    include __DIR__ . '/../templates/layout.html.php';
    
    
    
