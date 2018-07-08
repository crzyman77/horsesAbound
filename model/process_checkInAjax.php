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
$riderID = $formSubmission[riderID];
$riderNum = $formSubmission[rNum];
$fName = $formSubmission[fName];
$lName = $formSubmission[lName];
$age = $formSubmission[age];
$horse_name = $formSubmission[horseName];
$paid = $formSubmission[paid];
$street = $formSubmission[street];
$city = $formSubmission[city];
$state = $formSubmission[state];
$zip = $formSubmission[zipCode];
$email = $formSubmission[email];
$phone = $formSubmission[phoneNumber];
$division = $formSubmission[division];
$amountDue = $formSubmission[amountDue];
$checkNum = $formSubmission[paymentMethod];

$loopLimit = count($formSubmission);

updateRider($riderID, $fName,$lName,$age,$phone,$email,$street,$city,$state,$zip,$paid,$checkNum);

updateTeam($riderID,$horse_name,$riderNum,$amountDue);

$infoCheck = getRiderDetail($riderID);

//print_r($riderID);

//if ($division != $infoCheck['division_id']){
//    //delete all rider combos
//    $divisionID = $infoCheck['division_id'];
//    deleteRiderCombo($riderID, $divisionID);
//    for ($loopCounter = 14; $loopCounter < $loopLimit; $loopCounter++){
//        $classSubmission = $formSubmission[$loopCounter];
//       $register_combo =  submitClass($division,$classSubmission,$rider_ID);
//      }
//}
// else {
//    
//}

// Else check classes
    // if classes have changed, udpate/ delete
// No Change
    //Skip the loop
//print_r($formSubmission);
//Quick and dirty to make sure we pick up any possible class changes
    deleteRiderCombo($riderID, $division);

     for ($loopCounter = 16; $loopCounter < $loopLimit; $loopCounter++){
       $classSubmission = $formSubmission[$loopCounter];
       print_r($classSubmission);
      $register_combo =  submitClass($division,$classSubmission,$riderID);
     }


