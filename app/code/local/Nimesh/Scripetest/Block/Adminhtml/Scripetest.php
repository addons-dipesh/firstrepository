<?php
class Nimesh_Scripetest_Block_Adminhtml_Scripetest extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_scripetest';
    $this->_blockGroup = 'scripetest';
    $this->_headerText = Mage::helper('scripetest')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('scripetest')->__('Add Item');
    parent::__construct();
  }
}