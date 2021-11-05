<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

/* Get connection to database to access data */
$conn = require 'include/db.php';


/**
 *  Create a list of Dispatch ids this could be coming from a Batch class
 *   Then a unique consignmentId will be created for each courier then passed
 *    on to Dispatch class to be send to customer
 * */ 



$royalMailId = 'ryl54542342'; // unique consignmentId for Royal Mail

$UPSId = 'ups5468783'; // unique consignmentId for UPS

$royalMail = new RoyalMail($royalMailId);
echo $royalMail->sendParcel();
echo "<br>";

$UPS = new UpsDispatch($UPSId);
echo $UPS->sendParcel();
echo "<br>";