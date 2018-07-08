<?php
require_once '../model/model.php';
   error_reporting(0); // Needed put in for LocalHost

$divisionID = stripslashes($_POST['divisionID']);


$allRiderScores = getAllRiderScores($divisionID);
print_r(json_encode($allRiderScores));
