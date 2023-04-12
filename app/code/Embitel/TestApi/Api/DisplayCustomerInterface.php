<?php 

namespace Embitel\TestApi\Api;

/**
*Interface for DisplayCustomer API
*@api
*/ 
 interface DisplayCustomerInterface
 {
    /**
     * Get name
     * 
     * @return array
     */
    public function getCustomerData();

    /**
     * Get name
     * 
     * @param string[] $data
     * @return array
     */
    public function createCustomerGroupData($data);
 }
 ?>
