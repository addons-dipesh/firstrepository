<?php

class Rest_Otp_Model_Otp extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('otp/otp');
    }
}