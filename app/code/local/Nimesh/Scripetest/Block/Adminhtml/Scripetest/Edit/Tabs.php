<?php

class Nimesh_Scripetest_Block_Adminhtml_Scripetest_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('scripetest_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('scripetest')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('scripetest')->__('Item Information'),
          'title'     => Mage::helper('scripetest')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('scripetest/adminhtml_scripetest_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}