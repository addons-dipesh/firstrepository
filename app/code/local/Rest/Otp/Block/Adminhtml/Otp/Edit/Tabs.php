<?php

class Rest_Otp_Block_Adminhtml_Otp_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('otp_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('otp')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('otp')->__('Item Information'),
          'title'     => Mage::helper('otp')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('otp/adminhtml_otp_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}