<?php
class Rest_Otp_Block_Adminhtml_Otp extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_otp';
    $this->_blockGroup = 'otp';
    $this->_headerText = Mage::helper('otp')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('otp')->__('Add Item');
    parent::__construct();
  }
}