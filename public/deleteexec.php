<?php
    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        //pass the fake var ':id' at first
        $sql = 'DELETE FROM `CSSA_EXEC` WHERE `id_CSSA_EXEC` = :id';
        
        $stmt = $pdo->prepare($sql);
        //so, the var 'id' we passed from the form is stored in $_POST by default
        //pass the real value in POST
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        
        //redirect to the location we defined below
        header('location: exec.php');
    } catch (PDOException $e) {
      $title = 'An error has occurred';
      $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' .
      $e->getFile() . ':' . $e->getLine();
    }
    include  __DIR__ . '/../templates/layout.html.php';
    
    
