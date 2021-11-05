<?php


// Parent class
abstract class Dispatch 
{ 
  public $consignmentId;
  public function __construct($consignmentId) {
    $this->consignmentId = $consignmentId;
  }

  abstract public function sendParcel() : string;
}

// Class definitions
class RoyalMail extends Dispatch 
{
  public function sendParcel() : string 
  { 
    // send email using $this->consignmentId

    return "email order with $this->consignmentId";
  }
}

class UpsDispatch extends Dispatch  {
   public function sendParcel() : string 
  { 
    // send FTP using $this->consignmentId
    return "FTP order with $this->consignmentId";
  }
}


//*********************************** */

/**
 *  Create a list of Dispatch ids this could be coming from a Batch class
 *   Then a unique consignmentId will be created for each courier then passed
 *    on to Dispatch class to be send to customer
 * */ 



$royalMailId = 'ryl54542342'; // unique consignmentId for Royal Mail

$UPSId = 'ups5468783'; // unique consignmentId for UPS

$royalMail = new royalMail($royalMailId);
echo $royalMail->sendParcel();
echo "<br>";

$UPS = new UpsDispatch($UPSId);
echo $UPS->sendParcel();
echo "<br>";