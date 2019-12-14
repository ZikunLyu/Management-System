<?php
    /** ----------------------------------------------------------------------------------------------
     General part
     -------------------------------------------------------------------------------------------------*/
    
    class DatabaseTable {
        private $pdo;
        private $table;
        private $primaryKey;
        
        //define the var type to find wrong passin value at the first step
        public function __construct(PDO $pdo, string $table, string $primaryKey) {
            $this->pdo = $pdo;
            $this->table = $table;
            $this->primaryKey = $primaryKey;
        }
        
    
        private function query($sql, $parameters = []) {
            $query = $this->pdo->prepare($sql);
            //when execute with parameter, it behave the same way as the foreach below
            //and you don't need to bind manually
            $query->execute($parameters);
        
            /*
             foreach ($parameters as $name => $value ) {
                $query->bindValue($name,$value);
             }
             */
            return $query;
        }
    
        private function processDates($fields) {
           foreach ($fields as $key => $value) {
               if ($value instanceof DateTime) {
                   $fields[$key] = $value->format('Y-m-d');
               }
           }
           return $fields;
       }
    
        public function findAll() {
            $result = $this->query('SELECT * FROM `' . $this->table . '`');
        
            return $result ->fetchAll();
        }
    
        public function delete($id) {
            $parameters = [':id' => $id];
        
            $this->query('DELETE FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :id', $parameters);
        }
    
        private function insert($fields) {
            $query = 'INSERT INTO `' . $this->table . '` (';
        
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
        
            $fields = $this->processDates($fields);
        
            $this->query($query, $fields);
        }
    
        private function update($fields) {
            $query = 'UPDATE `' . $this->table . '` SET ';
        
            foreach ($fields as $key => $value) {
                $query .= '`' . $key . '` = :' . $key . ',';
            }
        
            $query = rtrim($query, ',');
        
            $query .= ' WHERE `' . $this->primaryKey . '` = :primaryKey';
        
            //set the :primiay variable
            $fields['primaryKey'] = $fields['id_CSSA_EXEC'];
        
            $fields = $this->processDates($fields);
        
            $this->query($query, $fields);
        
        }
    
        public function findById($value) {
            $query = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->primaryKey . '` = :value';
        
            $parameters = ['value' => $value];
        
            $query = $this->query($query, $parameters);
        
            return $query ->fetch();
        }
    
        public function total() {
            $query = $this->query('SELECT COUNT(*) FROM `' . $this->table . '`');
        
            $row = $query->fetch();
        
            return $row[0];
        }
    
        public function save($record) {
            try {
                if ($record[$this->primaryKey] == '') {
                    $record[$this->primaryKey] = null;
                }
                $this->insert($record);
            }
            catch (PDOException $e) {
                $this->update($record);
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
        
  }
    
    
    
