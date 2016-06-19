<?php
class Rest_Otp_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/otp?id=15 
    	 *  or
    	 * http://site.com/otp/id/15 	
    	 */
    	/* 
		$otp_id = $this->getRequest()->getParam('id');

  		if($otp_id != null && $otp_id != '')	{
			$otp = Mage::getModel('otp/otp')->load($otp_id)->getData();
		} else {
			$otp = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($otp == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$otpTable = $resource->getTableName('otp');
			
			$select = $read->select()
			   ->from($otpTable,array('otp_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$otp = $read->fetchRow($select);
		}
		Mage::register('otp', $otp);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}