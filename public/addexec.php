<?php
    if (isset($_POST['firstname'])) {
        try {
            include __DIR__ . '/../includes/DatabaseConnection.php';
            
            $sql = 'INSERT INTO `CSSA_EXEC` SET
            `firstname_CSSA_EXEC` = :firstname,
            `lastname_CSSA_EXEC` = :lastname,
            `studentid_CSSA_EXEC` = :studentid,
            `faculty_CSSA_EXEC` = :faculty,
            `major_CSSA_EXEC` = :major,
            `birthday_CSSA_EXEC` = :birthday,
            `departmentid_CSSA_EXEC` = :departmentid,
            `activeness_CSSA_EXEC` = :activeness,
            `jobtitle_CSSA_EXEC` = :jobtitle,
            `email_CSSA_EXEC` = :email,
            `mobile_CSSA_EXEC` = :mobile,
            `wechat_CSSA_EXEC` = :wechat,
            `activedate_CSSA_EXEC` = CURDATE()';
            
            $stmt = $pdo->prepare($sql);
            $stmt-> bindValue(':firstname', $_POST['firstname']);
            $stmt-> bindValue(':lastname', $_POST['lastname']);
            $stmt-> bindValue(':studentid', $_POST['studentid']);
            $stmt-> bindValue(':faculty', $_POST['faculty']);
            $stmt-> bindValue(':major', $_POST['major']);
            $stmt-> bindValue(':birthday', $_POST['birthday']);
            $stmt-> bindValue(':departmentid', $_POST['departmentid']);
            $stmt-> bindValue(':activeness', $_POST['activeness']);
            $stmt-> bindValue(':jobtitle', $_POST['jobtitle']);
            $stmt-> bindValue(':email', $_POST['email']);
            $stmt-> bindValue(':mobile', $_POST['mobile']);
            $stmt-> bindValue(':wechat', $_POST['wechat']);
            
            $stmt->execute();
            
            header('location: firstname.php');
            
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
    
    
    
