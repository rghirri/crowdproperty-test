<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load classes
require 'vendor/autoload.php';

/* Include header as part of the code */
require 'includes/init.php';

/* Get connection to database to access data */
$conn = require 'includes/db.php';

$royalMail = [];

$upsMail = [];

// retreive batches from database
$batches = Batch::getAll($conn);

// foreach($batches as $batch)
// {
//    $pattern = "/ryl/i";

//    if (preg_match($pattern, $batch->consignment_id))
//    {
     
//      $royalDispatch = new RoyalMail($batch->consignment_id);
//      $royalMail = $royalDispatch->sendParcel();
//    }
//    // }elseif ($courier_id == 'ups')
//    // {

//    //    $UPSDispatch = new UpsDispatch($batch->$consignment_id);
//    //    $upsMail = $UPSDispatch->sendParcel();

//    // }
// }



// $royalMailId = 'ryl54542342'; // unique consignmentId for Royal Mail

// $UPSId = 'ups5468783'; // unique consignmentId for UPS

// $royalMail = new RoyalMail($royalMailId);
// echo $royalMail->sendParcel();
// echo "<br>";

// $UPS = new UpsDispatch($UPSId);
// echo $UPS->sendParcel();
// echo "<br>";

//var_dump($batches);


// Add twig templating engine to add pages in view folder
$loader = new \Twig\Loader\FilesystemLoader('views');

$twig = new \Twig\Environment($loader);

echo $twig->render('index.html', array('batches' => $batches));








/**
 *  Create a list of Dispatch ids this could be coming from a Batch class
 *   Then a unique consignmentId will be created for each courier then passed
 *    on to Dispatch class to be send to customer
 * */ 



// $royalMailId = 'ryl54542342'; // unique consignmentId for Royal Mail

// $UPSId = 'ups5468783'; // unique consignmentId for UPS

// $royalMail = new RoyalMail($royalMailId);
// echo $royalMail->sendParcel();
// echo "<br>";

// $UPS = new UpsDispatch($UPSId);
// echo $UPS->sendParcel();
// echo "<br>";