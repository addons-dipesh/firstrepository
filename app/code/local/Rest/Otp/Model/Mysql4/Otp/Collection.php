<?php

class Rest_Otp_Model_Mysql4_Otp_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('otp/otp');
    }
}