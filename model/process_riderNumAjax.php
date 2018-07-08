<?php
require_once '../model/model.php';
   error_reporting(0); // Needed put in for LocalHost

$classID = stripslashes($_POST['classID']);
//$divisionID = 2;

$eligibleriderNumbers = getClassRiders($classID);
print_r(json_encode($eligibleriderNumbers));

