<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load classes
require 'vendor/autoload.php';

/* Include Initials as part of the code */
require 'includes/init.php';

/* Get connection to database to access 
   data with list of orders to be dispatched  */
$conn = require 'includes/db.php';


// retreive batches from database
$batches = Batch::getAll($conn);

// Find unique refrence for each courier company

$patternRyl = "/ryl/i"; // Royal Mail

$patternUps = "/ups/i"; // UPS

foreach($batches as $batch)
{
   

   if (preg_match($patternRyl, $batch['consignment_id']))
   {
     
     $royalDispatch = new RoyalMail($batch['consignment_id']);
     $royalMail = $royalDispatch->sendParcel();
     echo $royalMail . " Order Dispatched via Royal Mail" .'</br>';
   }
 elseif (preg_match($patternUps, $batch['consignment_id']))
   {
     
     $upsDispatch = new UpsDispatch($batch['consignment_id']);
     $upsMail = $upsDispatch->sendParcel();
     echo $upsMail . " Order Dispatched via UPS" .'</br>';
   }
    
  }