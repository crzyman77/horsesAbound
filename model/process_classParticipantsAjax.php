<?php
require_once '../model/model.php';

error_reporting(0); // Needed put in for LocalHost

$classID = stripslashes($_POST['classID']);

//print_r($classID);
//$classID = 11;
//print_r($classID );
//$divisionID = 2;
$classRiders = getClassRiders($classID);

print_r(json_encode($classRiders));

