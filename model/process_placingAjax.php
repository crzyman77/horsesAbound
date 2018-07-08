<?php
    require_once '../model/model.php';
    error_reporting(0); // Needed put in for LocalHost

    //$formSubmission = array();
    //$classList = array();
    //parse_str($_POST['formSubmit'],$formSubmission);
    //$formSubmission  = json_decode(stripslashes($_POST['formSubmit']),true);
    //$form;
    //json.parse_str($_POST['formSubmit'], $form);
   // json.parse_str($_POST['classPlacing'], $classPlacing);
    
    $classPlacing = json_decode(stripcslashes($_POST['classPlacing']),true);
    //Array Order = place, rNum, Division, Class
    //Grab 1st Place Results 
//   $firstPlace = $classPlacing[0];
//   $firstplaceRider = $classPlacing[1];
//   $firstplaceDiv = $classPlacing[2];
//   $firstplaceClass = $classPlacing[3]; 
$loopLimit = count($classPlacing);
//print_r($classPlacing);
for ($loopCounter = 0; $loopCounter < $loopLimit; $loopCounter = $loopCounter+3){
    $Place = $classPlacing[$loopCounter];
    $RiderNum = $classPlacing[$loopCounter + 1];
  //  $Div = $classPlacing[$loopCounter+ 2];
    $Class = $classPlacing[$loopCounter+ 2]; 
   // print_r($RiderNum);
    $rider_ID = getRiderIDScoring($RiderNum);
   // print_r($rider_ID);
    $riderID = $rider_ID[0]['rider_id'];
    $riderDiv = $rider_ID[0]['division_id'];
   addClassPlace($Place, $RiderNum, $riderDiv, $Class); 
   $firstPlaceCount = 0;
   

      $points = 0;
      //Mapping for Score to be added
      switch($Place){
         case '1':
              $points = 5;
              $firstPlaceCount = 1;
              break;
          case '2':
              $points = 4;
              $firstPlaceCount = 0;
              break;
          case '3':
              $points = 3;
              $firstPlaceCount = 0;
              break;
          case '4':
              $points = 2;
              $firstPlaceCount = 0;
              break;
          case '5':
              $points = 1;
              $firstPlaceCount = 0;
              break;
          default:
              $points = 0;
              $firstPlaceCount = 0;      
      }
      submitScoring($RiderNum,$riderID,$riderDiv,$points, $firstPlaceCount); 
     print_r($rider_ID[0]['rider_id']);

   
         //print_r($rider_ID);
}


//IF class is not generation gap
//Add to scoring Matrix
//rider_num, rider_id, div, value to add