<?php
    /** ----------------------------------------------------------------------------------------------
     General part
     -------------------------------------------------------------------------------------------------*/
        
    function query($pdo, $sql, $parameters = []) {
        $query = $pdo->prepare($sql);
        //when execute with parameter, it behave the same way as the foreach below
        //and you don't need to bind manually
        $query->execute($parameters);
        
        /*
        foreach ($parameters as $name => $value ) {
            $query->bindValue($name,$value);
        }
        */
        //$query->execute();
        
        return $query;
    }
    
        //TODO...
    function processDates($fields) {
           foreach ($fields as $key => $value) {
               if ($value instanceof DateTime) {
                   $fields[$key] = $value -> format('Y-m-d');
               }
           }
           return $fields;
       }
    
    function findAll($pdo, $table) {
        $result = query($pdo, 'SELECT * FROM `' . $table . '`');
        
        return $result ->fetchAll();
    }
    
    function delete($pdo, $table, $primaryKey, $id) {
        $parameters = [':id' => $id];
        
        query($pdo, 'DELETE FROM `' . $table . '` WHERE `' . $primaryKey . '` = :id', $parameters);
    }
    
    function insert($pdo, $table, $fields) {
        $query = 'INSERT INTO `' . $table . '` (';
        
        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '`,';
        }
        
        $query = rtrim($query, ',');
        
        $query .= ') VALUES (';
        
        foreach ($fields as $key => $value) {
            $query .= ':' . $key . ',';
        }
        
        $query = rtrim($query, ',');
        
        $query .= ')';
        
        $fields = processDates($fields);
        
        query($pdo, $query, $fields);
    }
    
    function update($pdo, $table, $primaryKey, $fields) {
        $query = 'UPDATE `' . $table . '` SET ';
        
        foreach ($fields as $key => $value) {
            $query .= '`' . $key . '` = :' . $key . ',';
        }
        
        $query = rtrim($query, ',');
        
        $query .= ' WHERE `' . $primaryKey . '` = :primaryKey';
        
        //set the :primiay variable
        $fields['primaryKey'] = $fields['id_CSSA_EXEC'];
        
        $fields = processDates($fields);
        
        query($pdo, $query, $fields);
        
    }
    
    function findById($pdo, $table, $primaryKey, $value) {
        $query = 'SELECT * FROM `' . $table . '` WHERE `' . $primaryKey . '` = :value';
        
        $parameters = ['value' => $value];
        
        $query = query($pdo, $query, $parameters);
        
        return $query ->fetch();
    }
    
    function total($pdo, $table) {
        $query = query($pdo, 'SELECT COUNT(*) FROM `' . $table . '`');
        
        $row = $query->fetch();
        
        return $row[0];
    }
    
    function save($pdo, $table, $primaryKey, $record) {
        try {
            if ($record[$primaryKey] == '') {
                $record[$primaryKey] = null;
            }
            insert($pdo, $table, $record);
        }
        catch (PDOException $e) {
            update($pdo, $table, $primaryKey, $record);
        }
    }
    

    /** ----------------------------------------------------------------------------------------------
      CSSA_EXEC part
     -------------------------------------------------------------------------------------------------*/
    
    /*
    function totalExecs($pdo) {
        $query = query($pdo, 'SELECT COUNT(*) FROM `CSSA_EXEC`');
        $row = $query->fetch();
        return $row[0];
    }
    */
    /*
    function getExec($pdo, $id) {
        //create the array of $parameters for use in the query function
        //call the query function and provide the $parameters array
        $parameters = [':id'=> $id];
        $query = query($pdo, "SELECT  * FROM `CSSA_EXEC` WHERE `id_CSSA_EXEC` = :id", $parameters);
        //$query->bindValue(':id', $id);
        
        return $query->fetch();
    }
    */
    /*
    function insertExec($pdo, $fields) {
        $query = "INSERT INTO `CSSA_EXEC` (";
        
        foreach ($fields as $key => $value) {
            $query .= "`" . $key . "`,";
        }
        
        $query = rtrim($query, ",");
        
        $query .= ") VALUES (";
        
        foreach ($fields as $key => $value) {
            $query .= ":" . $key . ",";
        }
        
        $query = rtrim($query, ",");
        
        $query .= ")";
        
        $fields = processDates($fields);
        
        query($pdo, $query, $fields);
    }
    */
    
    /*
    function updateExec($pdo, $id, $firstname, $lastname, $studentid, $faculty, $major, $birthday, $departmentid, $activeness, $jobtitle, $email, $mobile, $wechat) {
        
        $parameters = [':firstname'=> $firstname, ':lastname' => $lastname, ':studentid' => $studentid, ':faculty' => $faculty, ':major' => $major, ':birthday' => $birthday, ':departmentid' => $departmentid, ':activeness' => $activeness, ':jobtitle' => $jobtitle, ':email' => $email, ':mobile' => $mobile, ':wechat' => $wechat, ':id' => $id];
        
        query($pdo, "UPDATE `CSSA_EXEC` SET `firstname_CSSA_EXEC` = :firstname, `lastname_CSSA_EXEC` = :lastname, `studentid_CSSA_EXEC` = :studentid, `faculty_CSSA_EXEC` = :faculty, `major_CSSA_EXEC` = :major, `birthday_CSSA_EXEC` = :birthday, `departmentid_CSSA_EXEC` = :departmentid,`activeness_CSSA_EXEC` = :activeness,`jobtitle_CSSA_EXEC` = :jobtitle, `email_CSSA_EXEC` =:email, `mobile_CSSA_EXEC` = :mobile, `wechat_CSSA_EXEC` = :wechat WHERE `id_CSSA_EXEC` = :id", $parameters);
    }
    */
    
    /*
    function updateExec($pdo, $fields) {
        $query = "UPDATE `CSSA_EXEC` SET";
        
        foreach ($array as $key => $value) {
            $query .= '`' . $key . '` = :' . $key . ',';
        }
        
        $query = rtrim($query, ',');
        
        $query .= " WHERE `id` = :primaryKey";
        
        //set the :primiay variable
        $fields['primaryKey'] = $fields['id'];
        
        $fields = processDates($fields);
        
        query($pdo, $query, $fields);
        
    }
     */
    
    /*
    function deleteExec($pdo, $id) {
        $parameters = [':id' => $id];
        
        query($pdo, "DELETE FROM `CSSA_EXEC` WHERE `id_CSSA_EXEC` = :id", $parameters);
    }
    */
     
    /*
    //fetchAll function returns an array of all records that were retrieved by the query
    function allExecs($pdo) {
        $execs = query($pdo, "SELECT * FROM `CSSA_EXEC`");
        
        return $execs ->fetchAll();
    }
    */
    
    /** ----------------------------------------------------------------------------------------------
         EVENTS part
        -------------------------------------------------------------------------------------------------*/
    
    /*
    function allEvents($pdo) {
        $events = query($pdo, 'SELECT * FROM `CSSA_EVENTS`');
        
        return $events -> fetchAll();
    }
    */
    
    /*
    function deleteEventsById($pdo,$eventid) {
        $parameters = [':eventid' => $eventid];
        
        query($pdo, "DELETE FROM `CSSA_EVENTS` WHERE `id_CSSA_EVENTS` = :eventid", $parameters);
    }
    */
    
    /*
    function insertEvents($pdo, $fields) {
        $query = "INSERT INTO `CSSA_EVENTS` (";
        
        foreach ($fields as $key => $value) {
            $query .= "`" . $key . "`,";
        }
        
        $query = rtrim($query, ",");
        
        $query .= ") VALUES (";
        
        foreach ($fields as $key => $value) {
            $query .= ":" . $key . ",";
        }
        
        $query = rtrim($query, ",");
        
        $query .= ")";
        
        $fields = processDates($fields);
        
        query($pdo, $query, $fields);
    }
     */
    
    
    /** ----------------------------------------------------------------------------------------------
         TASKS part
        -------------------------------------------------------------------------------------------------*/
    
    /*
    function allTasks($pdo) {
        $tasks = query($pdo, 'SELECT * FROM `CSSA_TASKS`');
        
        return $tasks -> fetchAll();
    }
    */
    
    /*
    function getAllTasksOfEvent($pdo, $eventid) {
        $parameters = [':eventid' => $eventid];
        
        $query = query($pdo, "SELECT  * FROM `CSSA_TASKS` WHERE `eventid_CSSA_TASKS` = :eventid", $parameters);
        
        return $query->fetchAll();
    }
    */
    /*
    function deleteTasksById($pdo, $taskid) {
        $parameters = [':taskid' => $taskid];
        
        query($pdo, "DELETE FROM `CSSA_TASKS` WHERE `id_CSSA_TASKS` = :taskid", $parameters);
    }
    */
    
    /*
    function insertTasks($pdo, $fields) {
        $query = "INSERT INTO `CSSA_TASKS` (";
        
        foreach ($fields as $key => $value) {
            $query .= "`" . $key . "`,";
        }
        
        $query = rtrim($query, ",");
        
        $query .= ") VALUES (";
        
        foreach ($fields as $key => $value) {
            $query .= ":" . $key . ",";
        }
        
        $query = rtrim($query, ",");
        
        $query .= ")";
        
        $fields = processDates($fields);
        
        query($pdo, $query, $fields);
    }
    */
        

    
    
    
