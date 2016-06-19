<?php
/**
 * @category   Netz98
 * @package    Netz98_ModuleCreator
 * @author	   Daniel Nitz <d.nitz@netz98.de>
 * @copyright  Copyright (c) 2008-2009 netz98 new media GmbH (http://www.netz98.de)
 * 			   Credits for blank files go to alistek, Barbanet (contributer), Somesid (contributer) from the community:
 * 			   http://www.magentocommerce.com/wiki/custom_module_with_custom_database_table
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * $Id$
 */


abstract class Netz98_Templates_Config_Abstract
{
	protected $_vars;
	
	protected $_name = 'Undefined';
	
	public function setVars(array $array)
	{
		$this->_vars = $array;
	}

	public function getName()
	{
		return $this->_name;
	}
	
	abstract public function getFromFiles();

	abstract public function getToFiles();
}