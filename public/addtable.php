<?php
try {
  include __DIR__ . '/../includes/DatabaseConnection.php';
  $output = 'Database connection established.';
  
    
  $sql = 'CREATE TABLE `CSSA_EXEC` (
    `id_CSSA_EXEC` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `firstname_CSSA_EXEC` VARCHAR(30) NOT NULL,
    `lastname_CSSA_EXEC` VARCHAR(30) NOT NULL,
    `studentid_CSSA_EXEC` INT NOT NULL,
    `faculty_CSSA_EXEC` VARCHAR(30) NOT NULL,
    `major_CSSA_EXEC` VARCHAR(30) NOT NULL,
    `birthday_CSSA_EXEC` DATE NOT NULL,
    `departmentid_CSSA_EXEC` INT NOT NULL,
    `activeness_CSSA_EXEC` INT NOT NULL,
    `jobtitle_CSSA_EXEC` INT NOT NULL,
    `activedate_CSSA_EXEC` DATETIME NOT NULL
    ) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';
   
    $pdo->exec($sql);
    
    $output = 'CSSA_EXEC table successfully created.';
    
    /*
    $sql = 'SELECT * FROM `CSSA_EXEC`';
    $result = $pdo->query($sql);
    
    while ($row = $result->fetch()) {
        $studentids[] = $row['studentid_CSSA_EXEC'];
    }
    */
}
catch (PDOException $e) {
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' .$e->getLine();
}
    
    include  __DIR__ . '/../templates/addtable_output.html.php';
    
    /*
     CREATE TABLE CSSA_TASK {
     id_CSSA_TASK INT NOT NULL AUTO_INCREMENT,
     name_CSSA_TASK VARCHAR(30),
     description_CSSA_TASK TEXT,
     startdate_CSSA_TASK DATETIME,
     enddate_CSSA_TASK DATETIME,
     execlistid_CSSA_TASK INT,
     eventlistid_CSSA_TASK INT,
     PRIMARY KEY(id_CSSA_TASK),
     FOREIGN KEY(execlistid_CSSA_TASK) REFERENCE CSSA_EXEC,
     FOREIGN KEY(eventlistid_CSSA_TASK) REFERENCE CSSA_EVENT,
     }
     
     
     */
