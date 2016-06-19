<?php

class Nimesh_Scripetest_Model_Mysql4_Scripetest extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the scripetest_id refers to the key field in your database table.
        $this->_init('scripetest/scripetest', 'scripetest_id');
    }
}