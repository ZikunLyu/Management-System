<?php
    function totalExecs($pdo) {
        $query = query($pdo, 'SELECT COUNT(*) FROM `CSSA_EXEC`');
        $row = $query->fetch();
        return $row[0];
    }
    
    function getExec($pdo, $id) {
        //create the array of $parameters for use in the query function
        //call the query function and provide the $parameters array
        $parameters = [':id'=> $id];
        $query = query($pdo, "SELECT  * FROM `CSSA_EXEC` WHERE `id_CSSA_EXEC` = :id", $parameters);
        //$query->bindValue(':id', $id);
        
        return $query->fetch();
    }
    
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
        $query->execute();
        return $query;
    }
    
    function insertExec($pdo, $firstname, $lastname, $studentid, $faculty, $major, $birthday, $departmentid, $activeness, $jobtitle, $activedate, $email, $mobile, $wechat) {
        $query = "INSERT INTO `CSSA_EXEC` (`firstname_CSSA_EXEC`, `lastname_CSSA_EXEC`, `studentid_CSSA_EXEC`, `faculty_CSSA_EXEC`, `major_CSSA_EXEC`, `birthday_CSSA_EXEC`, `departmentid_CSSA_EXEC`, `activeness_CSSA_EXEC`, `jobtitle_CSSA_EXEC`, `activedate_CSSA_EXEC`, `email_CSSA_EXEC`, `mobile_CSSA_EXEC`, `wechat_CSSA_EXEC`) VALUES (:firstname, :lastname, :studentid, :faculty, :major, :birthday, :departmentid, :activeness, :jobtitle, CURDATE(), :email, :mobile, :wechat)";
        
        $parameters = [':firstname'=> $firstname, ':lastname' => $lastname, ':studentid' => $studentid, ':faculty' => $faculty, ':major' => $major, ':birthday' => birthday, ':departmentid' => $departmentid, ':activeness' => $activeness, ':jobtitle' => $jobtitle, ':email' => $email, ':mobile' => $mobile, ':wechat' => $wechat];
        
        query($pdo, $query, $parameters);
    }
    
    function updateExec($pdo, $id, $firstname, $lastname, $studentid, $faculty, $major, $birthday, $departmentid, $activeness, $jobtitle, $email, $mobile, $wechat) {
        
        $parameters = [':firstname'=> $firstname, ':lastname' => $lastname, ':studentid' => $studentid, ':faculty' => $faculty, ':major' => $major, ':birthday' => $birthday, ':departmentid' => $departmentid, ':activeness' => $activeness, ':jobtitle' => $jobtitle, ':email' => $email, ':mobile' => $mobile, ':wechat' => $wechat, ':id' => $id];
        
        query($pdo, "UPDATE `CSSA_EXEC` SET `firstname_CSSA_EXEC` = :firstname, `lastname_CSSA_EXEC` = :lastname, `studentid_CSSA_EXEC` = :studentid, `faculty_CSSA_EXEC` = :faculty, `major_CSSA_EXEC` = :major, `birthday_CSSA_EXEC` = :birthday, `departmentid_CSSA_EXEC` = :departmentid,`activeness_CSSA_EXEC` = :activeness,`jobtitle_CSSA_EXEC` = :jobtitle, `email_CSSA_EXEC` =:email, `mobile_CSSA_EXEC` = :mobile, `wechat_CSSA_EXEC` = :wechat WHERE `id_CSSA_EXEC` = :id", $parameters);
    }
    
    
    
    function deleteExec($pdo, $id) {
        $parameters = [':id' => $id];
        
        query($pdo, "DELETE FROM `CSSA_EXEC` WHERE `id` = :id", $parameters);
    }
    
    //fetchAll function returns an array of all records that were retrieved by the query
    function allExecs($pdo) {
        $execs = query($pdo, "SELECT * FROM `CSSA_EXEC`");
        
        return $execs ->fetchAll();
    }
    
