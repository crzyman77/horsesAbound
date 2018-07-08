<?php

require_once '../model/model.php';
error_reporting(0); // Needed put in for LocalHost

//$formSubmission = array();
//$classList = array();
//parse_str($_POST['formSubmit'],$formSubmission);
//$formSubmission  = json_decode(stripslashes($_POST['formSubmit']),true);
//$form;
//json.parse_str($_POST['formSubmit'], $form);
json.parse_str($_POST['formSubmit'], $formSubmission);

//json.parse_str($form,$formSubmission);

//$formSubmission = parse_str($form);

$fName = $formSubmission[fName];
$lName = $formSubmission[lName];
$age = $formSubmission[age];
$horse_name = $formSubmission[horseName];
$street = $formSubmission[street];
$city = $formSubmission[city];
$state = $formSubmission[state];
$zip = $formSubmission[zipCode];
$email = $formSubmission[email];
$phone = $formSubmission[phoneNumber];
$division = $formSubmission[division];
$amountDue = $formSubmission[amountDue];

$rider_ID = addRider($fName,$lName,$age,$phone,$email,$street,$city,$state,$zip);


$loopLimit = count($formSubmission);

$team_ID = addNewTeam($rider_ID, $horse_name, $amountDue);

//print_r("New Team Created: " . $team_ID); 
//$rider_ID = 11;
//echo $looplimit;
for ($loopCounter = 12; $loopCounter < $loopLimit; $loopCounter++){
  //  print_r("In the loop");
  $classSubmission = $formSubmission[$loopCounter];
 // print_r("Class to insert " .  $classSubmission . "     ");
 $register_combo =  submitClass($division,$classSubmission,$rider_ID);
  //echo  $classSubmission . " ";
          //nt_r(' ' . $classSubmission);
}



//$printOut = 'fName: ' . $fName . ' lName: ' . $lName . ' age: ' . $age . ' horse_name: ' . $horse_name . ' Address: ' . $street . ' ' . $city . ' ' . $state . ' ' . $zip . ' Phone: ' . $phone .  ' Email: ' . $email;
//print_r($rider_ID);
