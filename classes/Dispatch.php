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