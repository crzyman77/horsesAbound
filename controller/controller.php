<?php
  session_start();

//DOES THIS WORK NOW?
//require_once '../model/locationModel.php';
require_once '../model/model.php';
require_once '../security/model.php';

require_once '../lib/basic_funcs.php';

unQuoteMe();
if (isset($_POST['action'])) {  // check get and post
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        include('../view/index.php');  // default action
        exit();
    }
    
    switch ($action){
        case 'Home':
            //include '../view/index.php';
            Registration();
            break;
        case 'Register':
            Registration();
            break;
        case 'CheckIn':
            CheckIn();
            break;
        case 'RiderInfo':
            riderInfo();
            break;
        case 'Placing':
            Placing();
            break;
        case 'Results':
            Results();
            break;
        case 'HighPoint':
            HighPoint();
            break;
        case 'GrandChamp':
            GrandChamp();
            break;
        case 'RiderScores':
            riderScores();
            break;
        case 'ClassRiders':
            classRiders();
            break;
        default:
            include '../view/index.php';
            break;
    } //END SWITCH
    
 function Registration(){
      //  include '../view/registration.php'; 
     //$divID = $_GET['divId'];
	$row = getDivisionList();
        if ($row == FALSE) {
            $errorMessage = error_reporting(E_ALL);
            include '../view/404.php';
        } else {
            include '../view/registration.php';
        }
    }        
 function CheckIn(){
   $row = getRegisteredRiders();
     if ($row == FALSE){
         $errorMessage = "No Row issue " .error_reporting(E_ALL);
         include '../view/404.php';
     }else {
        include '../view/finalizeCheckIn.php';
     } 
//     include '../view/finalizeCheckIn.php';
    }
 function Placing(){
     	$row = getPlacingClassList();
        if ($row == FALSE) {
            $errorMessage = error_reporting(E_ALL);
            include '../view/404.php';
        } else {
            include '../view/placing.php';
        }
 } 
 function Results(){
  $row = getClassList();
  if($row == FALSE){
      $errorMessage = error_reporting(E_ALL);
      include '../view/404.php';
  }
  else{
      include '../view/classResults.php';
  }
 }
 
 function classRiders(){
     $row = getClassList();
  if($row == FALSE){
      $errorMessage = error_reporting(E_ALL);
      include '../view/404.php';
  }
  else{
      include '../view/classParticipants.php';
  }
 }
 
 function HighPoint(){
     $WT15U = getDivisionHighPoint(1); //Walk Trot 15Un
     $WT16O = getDivisionHighPoint(2); //Walk Trot 16Ov
     $U15 = getDivisionHighPoint(3); //Under 15 
     $O16 = getDivisionHighPoint(4); //Over 16
     $LL = getDivisionHighPoint(5); //Lead Line
     include '../view/HighPoint.php';
 }
 
 function GrandChamp(){
     $Riders = getBestInShow();
     if($Riders == FALSE){
      $errorMessage = "No Riders are scored, please ensure you have scored at least one class number";
      include '../view/404.php';
  }
  else{
      include '../view/grandChamp.php';
  }
 }
 
 function riderInfo(){
     $riderID = $_GET['riderID'];
     //print_r($riderID);
     if (!isset($riderID)) {
            $errorMessage = 'You must provide a RiderId to display.';
            include '../view/404.php';
        } else {
           // print_r($riderID);
           // $rider = array();
            $rider = getRiderDetail($riderID);
            $row = getDivisionList();
            $riderNums = getAllRiderNumbers();
           // print_r($rider);
            //$class = getEligibleClasses($EventID);
            if ($rider == FALSE) {
                $errorMessage = error_reporting(E_ALL);
                include '../view/404.php';
            } else {
                $classList = getRiderClasses($rider['rider_id'],$rider['division_id']);
                include '../view/riderInfo.php';
            }
         }
 }
 
 function riderScores(){
     $row = getDivisionList();
        if ($row == FALSE) {
            $errorMessage = error_reporting(E_ALL);
            include '../view/404.php';
        } else {
     include '../view/generalScoring.php';
    }
 }
 
 function pageNotFound(){
     include '../view/404.php';
 }
 
