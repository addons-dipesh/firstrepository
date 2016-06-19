<?php
class Rest_Otp_Block_Otp extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getOtp()     
     { 
        if (!$this->hasData('otp')) {
            $this->setData('otp', Mage::registry('otp'));
        }
        return $this->getData('otp');
        
    }
}