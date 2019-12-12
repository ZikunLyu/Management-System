<?php
    $pdo = new PDO('mysql:host=localhost;dbname=McGill_CSSA;charset=utf8', 'McGillCSSA', 'ILOVECSSA');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
