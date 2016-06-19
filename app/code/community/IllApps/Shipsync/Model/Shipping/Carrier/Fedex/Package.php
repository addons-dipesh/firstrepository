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
 * IllApps_Shipsync_Model_Shipping_Carrier_Fedex_Package
 */
class IllApps_Shipsync_Model_Shipping_Carrier_Fedex_Package
{
       
    protected $_fedexPackages;
    
    
    /**
     * __construct
     */
    public function __construct()
    {
		// Set FedEx Packages
		$this->_fedexPackages = array
		(
			'FEDEX_ENVELOPE' => array
			(
				'label'         => Mage::helper('usa')->__('FedEx Envelope'),
				'length'        => 13.2,
				'width'         => 9.25,
				'height'        => 0.1,
				'baseline'      => 0.1125,
				'max_weight'    => 1.1
			),
			'FEDEX_PAK' => array
			(
				'label'         => Mage::helper('usa')->__('FedEx Pak'),		
				'length'        => 15.5,
				'width'         => 12.0,
				'height'        => 0.1,
				'baseline'      => 0.0625,
				'max_weight'    => 5.5
			),
			'FEDEX_TUBE' => array
			(
				'label'         => Mage::helper('usa')->__('FedEx Tube'),		
				'length'        => 38,
				'width'         => 3.95,
				'height'        => 3.95,
				'baseline'      => 0.0,
				'max_weight'    => 20.0
			),
			'FEDEX_10KG_BOX' => array
			(
				'label'         => Mage::helper('usa')->__('FedEx 10kg Box'),		
				'length'        => 15.81,
				'width'         => 12.94,
				'height'        => 10.19,
				'baseline'      => 0.0,
				'max_weight'    => 22.0
			),
			'FEDEX_25KG_BOX' => array
			(
				'label'         => Mage::helper('usa')->__('FedEx 25kg Box'),		
				'length'        => 21.56,
				'width'         => 16.56,
				'height'        => 13.19,
				'baseline'      => 0.0,
				'max_weight'    => 55.0
			),
			'YOUR_PACKAGING' => array
			(
				'label'         => Mage::helper('usa')->__('Your Packaging'),		
				'length'        => null,
				'width'         => null,
				'height'        => null,                
				'baseline'      => null,
				'max_weight'    => Mage::getStoreConfig('usa/shipping_carriers_fedex/max_package_weight')
			)
		);
		

        if ($this->getDimensionUnits() == 'CM')
        {
            foreach($this->_fedexPackages as &$package)
            {
                $this->toCM($package['length']);
                $this->toCM($package['width']);
                $this->toCM($package['height']);
            }
		}

	    // Convert to kilograms
	    if ($this->getWeightUnits() == 'KG')
	    {
			foreach($this->_fedexPackages as &$package)
			{
		    	$this->toKG($package['max_weight']);
		    	$this->toKG($package['baseline']);
			}
	    }

	    // Convert to grams
	    if ($this->getWeightUnits() == 'G')
	    {
			foreach($this->_fedexPackages as &$package)
			{
		    	$this->toG($package['max_weight']);
		    	$this->toG($package['baseline']);
			}
	    }
        		
		// Set volume
        $this->setVolume();
    }

        
    /**
     * getFedexPackages
     *
     * @return array
     */
    public function getFedexPackages()
    {
        return $this->_fedexPackages;
    }
	
	
	/**
     * getPackages
     *
     * @return array
     */
    public function getPackages()
    {
        $packages = array();
        
        if ($_fedexPackages = explode(',', Mage::getStoreConfig('carriers/fedex/packaging'))) {
            foreach ($this->getFedexPackages() as $key => $value) {
                foreach ($_fedexPackages as $_fedexPackage) {
                    if ($_fedexPackage == $key) {
                        $packages[$key] = $value;
                    }
                }
            }
        }
        
        if (is_array($packages)) {
            return $packages;
        }
        
        return false;
    }
           
    
    /**
     * getDimensionUnits
     *
     * @return string
     */
    public function getDimensionUnits()
    {
        return Mage::getSingleton('usa/shipping_carrier_fedex')->getDimensionUnits();
    }
    
    
    
    /**
     * getWeightUnits
     *
     * @return string
     */
    public function getWeightUnits()
    {
        return Mage::getSingleton('usa/shipping_carrier_fedex')->getWeightUnits();
    }
    
    
    
    /**
     * setVolume
     */
    public function setVolume()
    {
        foreach ($this->_fedexPackages as $key => &$package) {
            $this->_fedexPackages[$key]['max_volume'] = round($package['width'] * $package['height'] * $package['length'], 2);
        }
    }
    
    
    
    /**
     * toCM
     *
     * @param int $val
     */
    public function toCM(&$val)
    {
        $val = round($val * 2.54, 1);
    }
    
    
    
    /**
     * toG
     *
     * @param int $val
     */
    public function toG(&$val)
    {
        $val = round($val * 453.59237, 1);
    }
    
    
    
    /**
     * toKG
     *
     * @param int $val
     */
    public function toKG(&$val)
    {
        $val = round($val * 0.45359237, 1);
    }
    
    
    
    /**
     * getPackageMaxWeight
     *
     * @param string $value
     * @return string
     */
    public function getPackageMaxWeight($value)
    {
        return $this->_fedexPackages[$value]['max_weight'];
    }
    
    
    
    /**
     * getPackageLength
     *
     * @param string $value
     * @return string
     */
    public function getPackageLength($value)
    {
        return $this->_fedexPackages[$value]['length'];
    }
    
    
    
    /**
     * getPackageWidth
     *
     * @param string $packageValue
     * @return string
     */
    public function getPackageWidth($alue)
    {
        return $this->_fedexPackages[$value]['width'];
    }
    
    
    
    /**
     * getPackageHeight
     *
     * @param string $packageValue
     * @return string
     */
    public function getPackageHeight($value)
    {
        return $this->_fedexPackages[$value]['height'];
    }
    
    
    
    /**
     * getPackageBaseline
     *
     * @param string $packageValue
     * @return string
     */
    public function getPackageBaseline($value)
    {
        return $this->_fedexPackages[$value]['baseline'];
    }
    
    /**
     * getPackageLabel
     *
     * @param string $packageValue
     * @return string
     */
    public function getPackageLabel($value)
    {
        return $this->_fedexPackages[$value]['label'];
    }
    
    /**
     * asArray
     *
     * @param mixed $test
     * @return array
     */
    public function asArray($test = null)
    {
        if (!isset($test)) {
            return $this->_fedexPackages;
        }
        
        else {
            $test = explode(',', $test);
            
            foreach ($this->_fedexPackages as $package) {
                if (in_array($package['label'], $test)) {
                    $packages[] = $package;
                }
            }
            
            return (isset($packages) ? $packages : false);
        }
    }
    
    
    
    /**
     * isFedexPackage
     *
     * @param string $packageCode
     * @return bool
     */
    public function isFedexPackage($packageCode)
    {
        foreach ($this->_fedexPackages as $key => $value) {
            if ($packageCode == $key) {
                return true;
            }
        }
        return false;
    }
    
    
    
    /**
     * getPackageCodes
     *
     * @return string
     */
    public function getPackageCodes()
    {
        foreach ($this->_fedexPackages as $key => $value) {
            $var[] = $key;
        }
        
        return $var;
    }
    
    
    
    /**
     * getPackageName
     *
     * @param string $packageValue
     * @return string
     */
    public function getPackageName($value)
    {
        foreach ($this->_fedexPackages as $key => $value) {
            if ($value == $key) {
                return $value['label'];
            }
        }
    }
       
}
