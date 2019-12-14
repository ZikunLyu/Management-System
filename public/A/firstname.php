<?php
    try {
       $pdo = new PDO('mysql:host=localhost;dbname=McGill_CSSA;charset=utf8', 'McGillCSSA', 'ILOVECSSA');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT `firstname_CSSA_EXEC` FROM `CSSA_EXEC`';
        $result = $pdo->query($sql);
        
        while ($row = $result->fetch()) {
            $firstnames[] = $row['firstname_CSSA_EXEC'];
        }
        
        $title = 'Student firstname list';
        
        ob_start();
        
        include __DIR__ . '/../templates/firstname.html.php';
        
        $output = ob_get_clean();
    
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    }
    
    include __DIR__ . '/../templates/layout.html.php';
