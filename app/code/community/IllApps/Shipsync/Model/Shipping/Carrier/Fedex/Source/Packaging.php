<?php

/**
 * ShipSync
 *
 * @category   IllApps
 * @package    IllApps_Shipsync
 * @copyright  Copyright (c) 2014 EcoMATICS, Inc. DBA IllApps (http://www.illapps.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * IllApps_Shipsync_Model_Shipping_Carrier_Fedex_Source_Package
 */
class IllApps_Shipsync_Model_Shipping_Carrier_Fedex_Source_Packaging
{
    
	/**
     * toOptionArray
     * 
     * @return array
     */
    public function toOptionArray()
	{
		$arr = array();

		$fedexPackages = Mage::getModel('usa/shipping_carrier_fedex_package')->getFedexPackages();

		foreach ($fedexPackages as $key => $value)
		{
				$arr[] = array('value' => $key, 'label' => $value['label']);
        }

        return $arr;
    }    
    
}
