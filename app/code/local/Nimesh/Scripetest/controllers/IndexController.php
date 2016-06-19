<?php
class Nimesh_Scripetest_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/scripetest?id=15 
    	 *  or
    	 * http://site.com/scripetest/id/15 	
    	 */
    	/* 
		$scripetest_id = $this->getRequest()->getParam('id');

  		if($scripetest_id != null && $scripetest_id != '')	{
			$scripetest = Mage::getModel('scripetest/scripetest')->load($scripetest_id)->getData();
		} else {
			$scripetest = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($scripetest == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$scripetestTable = $resource->getTableName('scripetest');
			
			$select = $read->select()
			   ->from($scripetestTable,array('scripetest_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$scripetest = $read->fetchRow($select);
		}
		Mage::register('scripetest', $scripetest);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}