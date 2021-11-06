<?php
//-----------------------------------------------------
// PHP debug code which I used to test page for errors
// This code must be remove when the site is ready for 
// live production.
//-----------------------------------------------------
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Batch Class
 */
class Batch
{
    /**
     * Unique identifier
     * @var integer
     */
    public $id;

    /**
     * Unique identifier
     * @var string
     */
    public $consignment_id;

    /**
     * The Order Reference
     * @var string
     */
    public $order_ref;

    /**
     * The Dispatch Status
     * @var boolean
     */
    public $dispatch_status;

    /**
     * Get all the batches
     *
     * @param object $conn Connection to the database
     *
     * @return array An associative array of all the batch records
     */
    public static function getAll($conn)
    {
        $sql = "SELECT * 
                FROM batch
                JOIN courier
                on batch.courier_id = courier.id;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
    
   }

   