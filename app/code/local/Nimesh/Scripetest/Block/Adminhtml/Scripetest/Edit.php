<?php

class Nimesh_Scripetest_Block_Adminhtml_Scripetest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'scripetest';
        $this->_controller = 'adminhtml_scripetest';
        
        $this->_updateButton('save', 'label', Mage::helper('scripetest')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('scripetest')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('scripetest_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'scripetest_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'scripetest_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('scripetest_data') && Mage::registry('scripetest_data')->getId() ) {
            return Mage::helper('scripetest')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('scripetest_data')->getTitle()));
        } else {
            return Mage::helper('scripetest')->__('Add Item');
        }
    }
}