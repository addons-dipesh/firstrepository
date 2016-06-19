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
 * IllApps_Shipsync_Model_Mysql4_Shipment_Package
 */
class IllApps_Shipsync_Model_Mysql4_Shipment_Package extends Mage_Core_Model_Mysql4_Abstract
{
    
    /**
     * Construct
     */
    protected function _construct()
    {
        $this->_init('shipping/shipment_package', 'package_id');
    }
    
}
