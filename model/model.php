<?php

/*
 * ME Testing the change log system of git, and did the repo change locations. So One folder fits all
 */
 //        function getDBConnection() {
	// 	$dataSetName = 'mysql:host=localhost; dbname=kelli_crusade';
	// 	$username = 'root';
	// 	$password = '';
	// 	try {
	// 		$dataBase = new PDO($dataSetName, $username, $password);
	// 	} catch (PDOException $e) {
	// 		$errorMessage = $e->getMessage();
 //                        echo $errorMessage;
	// 		include '../view/404.php';
	// 		die;
	// 	}
	// 	return $dataBase;
	// }
        
               function getDBConnection() {
		$dataSetName = 'mysql:host=mysql.kelliscrusade.org; dbname=kelli_crusade';
		$username = 'crusadeaccount';
		$password = 'Fignewton1';
		try {
			$dataBase = new PDO($dataSetName, $username, $password);
		} catch (PDOException $e) {
			$errorMessage = $e->getMessage();
                       echo $errorMessage;
			include '../view/404.php';
			die;
		}
		return $dataBase;
	}
       
        
        function getDivisionList(){
            try{
            $database = getDBConnection();
            $query = "SELECT division_id, division_name from kcrus_divison where division_id <> 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results; 
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                echo $errorMessage;
                include '../view/404.php';
                die;
            }
        }
	
        function getShowClasses($divisionId) {
        try {
            $database = getDBConnection();
            $query = "SELECT
                    CLASS.CLASS_NAME,
                    CLASS.CLASS_NUM,
                    CLASS.class_price,
                     DI.DIVISION_NAME
                    FROM
                        kcrus_class CLASS,
                       kcrus_class_division_mapping matrix,
                       kcrus_divison DI
                    WHERE
                   CLASS.class_id = matrix.class_id
                   AND DI.division_id = matrix.division_id
                   and DI.division_id = :divID
                   and CLASS.class_id IN (998,999)
                   UNION 
                   SELECT
                    CLASS.CLASS_NAME,
                    CLASS.CLASS_NUM,
                    CLASS.class_price,
                     DI.DIVISION_NAME
                    FROM
                        kcrus_class CLASS,
                       kcrus_class_division_mapping matrix,
                       kcrus_divison DI
                    WHERE
                   CLASS.class_id = matrix.class_id
                   AND DI.division_id = matrix.division_id
                   and DI.division_id = :divID";
            $statement = $database->prepare($query);
           $statement -> bindValue(':divID', $divisionId);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }
    }
    
    function getClassList(){
       try {
            $database = getDBConnection();
            $query = "SELECT CLASS.CLASS_NAME, CLASS.CLASS_NUM FROM kcrus_class CLASS";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }   
    }
    
     function getPlacingClassList(){
       try {
            $database = getDBConnection();
            $query = "SELECT class_name CLASS_NAME, class_num CLASS_NUM from kcrus_class where class_num not in (select distinct class_id from kcrus_placing) and class_num <> 999 and class_num <> 998";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }   
    }
        
    function getClassResults($classID){
       try {
            $database = getDBConnection();
            $query = "SELECT pl.class_id, c.class_name, pl.place, p.rider_fname, p.rider_lname, r.horse_name, r.rider_number "
                . "FROM kcrus_placing pl, kcrus_rider r, kcrus_person p, kcrus_class c WHERE pl.class_id = c.class_num and pl.rider_number = r.rider_number and r.rider_id = p.rider_id and pl.class_id = :classID order by pl.place";
            $statement = $database->prepare($query);
            $statement -> bindValue(':classID', $classID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }   
    }
    
    function getDivisionHighPoint($divID){
        try{
            $database = getDBConnection();
             $query = "SELECT p.rider_fname, p.rider_lname, r.horse_name, s.rider_number, s.score, s.firstPlace "
    . "  FROM kcrus_rider r, kcrus_person p, kcrus_scoring_matrix s WHERE s.rider_id = p.rider_id and s.rider_number = r.rider_number and s.rider_id = r.rider_id and s.division_id = :divID  order by score desc limit 10"; 
             $statement = $database->prepare($query);
            $statement -> bindValue(':divID', $divID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows

            
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }   
    }
    
    function getAllRiderScores($divisionID){
        try{
            $database = getDBConnection();
             $query = "SELECT p.rider_fname, p.rider_lname, r.horse_name, s.rider_number, s.score "
    . "  FROM kcrus_rider r, kcrus_person p, kcrus_scoring_matrix s WHERE s.rider_id = p.rider_id and s.rider_number = r.rider_number and s.rider_id = r.rider_id and s.division_id = :divID  order by score desc, rider_lname";  
             $statement = $database->prepare($query);
            $statement -> bindValue(':divID', $divisionID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }   
    }
    
    function getBestInShow(){
        try{
            $database = getDBConnection();
             $query = "SELECT rider_fname, rider_lname, horse_name, rider_number, score, firstPlace, division_name from kcrus_best_in_show_v order by score desc";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }    
    }
    
    function addRider($rider_fname,$rider_lname,$age,$phone,$email,$street,$city,$state,$zip){
            $db = getDBConnection();
            $query = "INSERT INTO `kcrus_person`"
            . "(`rider_fname`, `rider_lname`, `age`, `phone_number`, `email`,`street_address`, `city`,`state`,`zip`)"
            ."  VALUES (:fname, :lname, :age, :phone_number, :email, :street, :city,:state, :zip)";
            $statement = $db -> prepare ($query);
            $statement->bindValue (':fname',$rider_fname);
            $statement->bindValue (':lname',$rider_lname);
            $statement->bindValue(':age', $age);
            $statement->bindValue(':phone_number',$phone);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':street',$street);
            $statement->bindValue(':city',$city);
            $statement->bindValue(':state',$state);
            $statement->bindValue(':zip',$zip);
            $success = $statement->execute();
            $statement->closeCursor();
            if($success){
                return  $db->lastInsertId();
            }
            else{
               // $errorMessage = $statement ->errorInfo();
              //  print_r('We fucked up');
            logSQLError($statement->errorInfo());
           // echo $errorMessage;
          //  include '../view/404.php';
          // die;
        }
    } 
    
    function getRiderDetail($rider){
       try {
           //$rider = 11;
            $database = getDBConnection();
           $query = "Select Distinct p.rider_id,r.rider_number, p.rider_fname, p.rider_lname,p.street_address,p.city, p.state, p.zip, p.phone_number, p.email, p.age,"
                   . " r.horse_name, d.division_id, d.division_name, p.paid, p.check_num check_Num, r.total_price "
                   . "from kcrus_person p, kcrus_rider r, kcrus_divison d, kcrus_registration_combo rc "
                   . "where p.rider_id = r.rider_id and r.rider_id = rc.rider_id and p.rider_id = rc.rider_id and rc.division_id = d.division_id and p.rider_id = :riderID";
            $statement = $database->prepare($query);
            $statement->bindValue(':riderID',$rider);
            $statement->execute();
            $results = $statement->fetch();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }    
    } 
   
     function updateRider($riderID, $fName,$lName,$age,$phone,$email,$street,$city,$state,$zip,$paid,$checkNum){
            $db = getDBConnection();
            $query = "UPDATE `kcrus_person` SET `rider_fname`=:fname, `rider_lname`=:lname, `age`=:age, `phone_number`=:phone_number, `email`=:email,`street_address`=:street, "
                    . "`city`=:city,`state`=:state,`zip`=:zip,`CheckedIn`=:checkedIn,`Paid`=:paid,`check_Num`=:checkNum "
                    . " WHERE kcrus_person.rider_id = :riderID";
            $statement = $db -> prepare ($query);
            $statement->bindValue(':riderID',$riderID);
            $statement->bindValue (':fname',$fName);
            $statement->bindValue (':lname',$lName);
            $statement->bindValue(':age', $age);
            $statement->bindValue(':phone_number',$phone);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':street',$street);
            $statement->bindValue(':city',$city);
            $statement->bindValue(':state',$state);
            $statement->bindValue(':zip',$zip);
            $statement->bindValue(':paid',$paid);
            $statement->bindValue(':checkedIn','Y');
            $statement->bindValue(':checkNum',$checkNum);
            $success = $statement->execute();
            $statement->closeCursor();
            if($success){
                return  $riderID;
            }
            else{
               // $errorMessage = $statement ->errorInfo();
                print_r('We fucked up');
         logSQLError($statement->errorInfo());
//           echo $errorMessage;
//            include '../view/404.php';
//           die;
        }
    } 
  
    function updateTeam($riderID,$horse_name,$riderNum,$amountDue){
       $db = getDBConnection();
        $query = " UPDATE`kcrus_rider` "
                . "SET `horse_name`=:horse_name,`rider_number`=:rNum, `total_price` = :amountDue "
                . " WHERE rider_id = :rider_ID";
        $statement = $db -> prepare ($query);
        $statement->bindValue (':rider_ID',$riderID);
        $statement->bindValue (':horse_name',$horse_name);
        $statement->bindValue (':rNum', $riderNum);
        $statement->bindValue (':amountDue',$amountDue);
        $success = $statement->execute();
        $statement->closeCursor();
        if($success){
            return $riderID; 
        }
        else{
            logSQLError($statement->errorInfo());
        } 
    }
    
    function getRiderIDScoring($riderNum){
        try{
                $database = getDBConnection();
                $query = "SELECT DISTINCT r.rider_id , rc.division_id from kcrus_rider r, kcrus_registration_combo rc where r.rider_id = rc.rider_id and rider_number = :riderNum";
                $statement = $database->prepare($query);
                $statement->bindValue(':riderNum',$riderNum);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
                return $results;           // Assoc Array of Rows
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                echo $errorMessage;
                include '../view/404.php';
                die;
            }
    }
    
    function getRiderClasses($riderID, $divisionID){
            try{
                $database = getDBConnection();
                $query = "SELECT rc.class_id, c.class_name from kcrus_registration_combo rc, kcrus_class c where rc.class_id = c.class_id and rc.division_id = :divisionID and rc.rider_id = :riderID order by rc.class_id";
                $statement = $database->prepare($query);
                $statement->bindValue(':riderID',$riderID);
                $statement->bindValue(':divisionID',$divisionID);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
                return $results;           // Assoc Array of Rows
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                echo $errorMessage;
                include '../view/404.php';
                die;
            }
        }
     
    function getAllRiderNumbers(){
         try{
                $database = getDBConnection();
                $query = "SELECT rider_number from kcrus_rider ";
                $statement = $database->prepare($query);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
                return $results;           // Assoc Array of Rows
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                echo $errorMessage;
                include '../view/404.php';
                die;
            }
    }    
        
    function getRegisteredRiders(){
      try {
            $database = getDBConnection();
            $query = "SELECT DISTINCT\n"
                . "    p.rider_id,\n"
                . "    r.rider_number RNum,\n"
                . "    p.rider_fname,\n"
                . "    p.rider_lname,\n"
                . "    p.street_address,\n"
                . "    p.state,\n"
                . "    p.zip,\n"
                . "    r.horse_name,\n"
                . "    d.division_name Division,\n"
                . "    p.CheckedIn,\n"
                . "    p.Paid\n"
                . "FROM\n"
                . "    kcrus_person p,\n"
                . "    kcrus_rider r,\n"
                . "    kcrus_registration_combo rc,\n"
                . "    kcrus_divison d\n"
                . "WHERE\n"
                . "    p.rider_id = r.rider_id AND r.rider_id = rc.rider_id AND rc.division_id = d.division_id order by p.rider_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }  
    }
        
    function addNewTeam($rider_ID, $horseName, $amountDue){
        $db = getDBConnection();
        $query = " INSERT INTO `kcrus_rider` (`rider_id`,`horse_name`,`total_price`)"
                . " VALUES(:rider_ID, :horse_name, :amountDue)";
        $statement = $db -> prepare ($query);
        $statement->bindValue (':rider_ID',$rider_ID);
        $statement->bindValue (':horse_name',$horseName);
        $statement->bindValue (':amountDue',$amountDue);
        $success = $statement->execute();
        $statement->closeCursor();
        if($success){
            return $db ->lastInsertId(); 
        }
        else{
            logSQLError($statement->errorInfo());
        }
    }
    
    function  addClassPlace($Place, $Rider, $Div, $Class){
        $db = getDBConnection();
        $query = " INSERT INTO `kcrus_placing` (`class_id`,`rider_number`,`division_id`,`place`)"
                . " VALUES(:class_id, :rider_number, :division_id, :place)";
        $statement = $db -> prepare ($query);
        $statement->bindValue (':class_id',$Class);
        $statement->bindValue (':rider_number',$Rider);
        $statement->bindValue (':division_id',$Div);
        $statement->bindValue (':place',$Place);
        $success = $statement->execute();
        $statement->closeCursor();
        if($success){
            print_r($db ->lastInsertId());
            return $db ->lastInsertId(); 
        }
        else{
             print_r("I am fucked up ");
            logSQLError($statement->errorInfo());
        }
    }
    
    function submitClass($division,$classSubmission,$rider_ID){
        $db = getDBConnection();
        $query = "INSERT INTO `kcrus_registration_combo` (`division_id`,`class_id`,`rider_id`)"
                . "VALUES(:division_id,:class_id,:rider_id)";
        $statement = $db -> prepare ($query);
        $statement->bindValue (':division_id',$division);
        $statement->bindValue (':class_id',$classSubmission);
        $statement->bindValue (':rider_id',$rider_ID);
        $success = $statement->execute();
        $statement->closeCursor();
        if($success){
            print_r("I worked apparently");
            return $db ->lastInsertId();
        }
        else{
            print_r("I am fucked up ");
            logSQLError($statement->errorInfo());
        }
        
    }
    
    function submitScoring($Rider,$riderID,$Div,$points,$firstPlace){
        $db = getDBConnection();
        $query = "INSERT INTO `kcrus_scoring_matrix`(`rider_number`, `rider_id`, `division_id`, `score`, `firstPlace`) VALUES (:RiderNum, :RiderID, :Div, :Score, :firstPlace)
                    ON DUPLICATE KEY UPDATE `score`= `score` + :Score, `firstPlace` = `firstPlace` + :firstPlace";
        $statement = $db -> prepare ($query);
        $statement->bindValue (':RiderNum',$Rider);
        $statement->bindValue (':RiderID',$riderID);
        $statement->bindValue (':Div',$Div);
        $statement->bindValue (':Score',$points);
        $statement->bindValue (':firstPlace',$firstPlace);
        $success = $statement->execute();
        $statement->closeCursor();
        if($success){
            return;
        }
        else{
            logSQLError($statement->errorInfo());
        }
    }    
    
    function getClassRiders($classID){
        try {
            $database = getDBConnection();
            $query = "SELECT r.rider_number, p.rider_fname, p.rider_lname, r.horse_name FROM kcrus_rider r, kcrus_registration_combo rc, kcrus_person p WHERE rc.rider_id = r.rider_id and p.rider_id = rc.rider_id and p.rider_id = r.rider_id and p.CheckedIn = 'Y' and rc.class_id = :classID";
            $statement = $database->prepare($query);
            $statement -> bindValue(':classID', $classID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;           // Assoc Array of Rows
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo $errorMessage;
            include '../view/404.php';
            die;
        }  
    }
    
    //Delete all division,rider,class combos -- rider no longer in that division
    function deleteRiderCombo($riderID){
        $db = getDBConnection();
        $query = "DELETE FROM `kcrus_registration_combo` WHERE `rider_id` = :riderID";
        $statement = $db -> prepare ($query);
        $statement->bindValue (':riderID',$riderID);
        //$statement->bindValue (':division_ID',$divisionID);
        $success = $statement->execute();
        $statement->closeCursor();
        if($success){
            return;
        }
        else{
            logSQLError($statement->errorInfo());
        }
    }
        
	function logSQLError($errorInfo) {
//            $errorMessage1 = $errorInfo[1];
//		$errorMessage = $errorInfo[2];
//                $errorLog = 'Error Message: '+ $errorMessage;
//                print_r($errorLog);
//		die;
            $errorMessage = $errorInfo[1];
           // print_r($errorMessage);
                include '../view/404.php';
		die;
        }          
?>