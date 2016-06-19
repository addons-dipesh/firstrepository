<?php

class Nimesh_Scripetest_Block_Adminhtml_Scripetest_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('scripetest_form', array('legend'=>Mage::helper('scripetest')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('scripetest')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('filename', 'file', array(
          'label'     => Mage::helper('scripetest')->__('File'),
          'required'  => false,
          'name'      => 'filename',
	  ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('scripetest')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('scripetest')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('scripetest')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('scripetest')->__('Content'),
          'title'     => Mage::helper('scripetest')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getScripetestData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getScripetestData());
          Mage::getSingleton('adminhtml/session')->setScripetestData(null);
      } elseif ( Mage::registry('scripetest_data') ) {
          $form->setValues(Mage::registry('scripetest_data')->getData());
      }
      return parent::_prepareForm();
  }
}