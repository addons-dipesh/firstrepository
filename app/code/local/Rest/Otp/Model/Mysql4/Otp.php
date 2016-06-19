<?php

class Rest_Otp_Model_Mysql4_Otp extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the otp_id refers to the key field in your database table.
        $this->_init('otp/otp', 'otp_id');
    }
}