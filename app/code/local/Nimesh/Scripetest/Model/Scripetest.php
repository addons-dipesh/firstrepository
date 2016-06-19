<?php

class Nimesh_Scripetest_Model_Scripetest extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('scripetest/scripetest');
    }
}