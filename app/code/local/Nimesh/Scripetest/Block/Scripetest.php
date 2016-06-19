<?php
class Nimesh_Scripetest_Block_Scripetest extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getScripetest()     
     { 
        if (!$this->hasData('scripetest')) {
            $this->setData('scripetest', Mage::registry('scripetest'));
        }
        return $this->getData('scripetest');
        
    }
}