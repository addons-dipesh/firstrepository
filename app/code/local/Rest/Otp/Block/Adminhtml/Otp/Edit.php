<?php

class Rest_Otp_Block_Adminhtml_Otp_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'otp';
        $this->_controller = 'adminhtml_otp';
        
        $this->_updateButton('save', 'label', Mage::helper('otp')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('otp')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('otp_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'otp_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'otp_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('otp_data') && Mage::registry('otp_data')->getId() ) {
            return Mage::helper('otp')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('otp_data')->getTitle()));
        } else {
            return Mage::helper('otp')->__('Add Item');
        }
    }
}