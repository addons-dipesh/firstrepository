<?php

class Nimesh_Scripetest_Model_Mysql4_Scripetest_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('scripetest/scripetest');
    }
}