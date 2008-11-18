<?php
declare(ENCODING = 'utf-8');
namespace F3::Beer3::Core;

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */

/**
 * @package 
 * @subpackage 
 * @version $Id:$
 */

/**
 * Arguments list. Wraps an array, but only allows read-only methods on it.
 *
 * @package
 * @subpackage
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 */
class ViewHelperArguments implements ::ArrayAccess {
	/**
	 * Array storing the arguments themselves
	 */
	protected $arguments = array();
	
	/**
	 * Constructor.
	 * 
	 * @param array $arguments Array of arguments
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function __construct($arguments) {
		$this->arguments = $arguments;
	}
	
	/**
	 * Checks if a given key exists in the array
	 *
	 * @param string $key Key to check
	 * @return boolean true if exists
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	function offsetExists($key) { 
        return array_key_exists($key, $this->arguments); 
    } 
    
    /**
     * Returns the value to the given key.
     *
     * @param  $key
     * @return object associated value
     * @author Sebastian Kurfürst <sebastian@typo3.org>
     */
    function offsetGet($key) {
    	if (!array_key_exists($key, $this->arguments)) {
    		return NULL;
    	}
    	if (!array_key_exists($key, $this->arguments))
    		return NULL;
    		// TODO CHANGE THIS
    	return $this->arguments[$key];
    } 
    
    /**
     * Throw exception if you try to set a value.
     *
     * @param string $name
     * @param object $value
     * @author Sebastian Kurfürst <sebastian@typo3.org>
     */
    function offsetSet($name, $value) { 
    	throw new F3::Beer3::RuntimeException('Tried to set argument "' . $name . '", but setting arguments is forbidden.');
    } 
    
    /**
     * Throw exception if you try to unset a value.
     *
     * @param string $name
     * @author Sebastian Kurfürst <sebastian@typo3.org>
     */
    function offsetUnset($name) { 
        throw new F3::Beer3::RuntimeException('Tried to unset argument "' . $name . '", but setting arguments is forbidden.'); 
    } 
	
}

?>