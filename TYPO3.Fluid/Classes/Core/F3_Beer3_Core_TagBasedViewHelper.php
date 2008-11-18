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
 * Tag based view helper.
 * Sould be used as the base class for all view helpers which output simple tags, as it provides some
 * convenience methods to register default attributes, ...
 *
 * @package
 * @subpackage
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
abstract class TagBasedViewHelper extends F3::Beer3::Core::AbstractViewHelper {
	
	/**
	 * Names of all registered tag attributes
	 */
	protected $tagAttributes = array();
	
	/**
	 * Register a new tag attribute. Tag attributes are all arguments which will be directly appended to a tag, like CSS classes, ...
	 * 
	 * The tag attributes registered here are rendered with the $this->renderTagAttributes() method.
	 * 
	 * @param string $name Name of tag attribute
	 * @param string $description Description of tag attribute
	 * @param boolean $required set to TRUE if tag attribute is required. Defaults to FALSE.
	 * @return void
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	protected function registerTagAttribute($name, $description, $required=FALSE) {
		$this->registerArgument($name, 'string', $description, $required);
		$this->tagAttributes[] = $name;
		
	}
	
	/**
	 * Registers all standard HTML universal attributes.
	 * Should be used inside registerArguments();
	 * 
	 * The following attributes are registered:
	 * - class (CSS Class)
	 * - dir (Text direction)
	 * - id (Universal identifier)
	 * - lang (Language)
	 * - style (per-element style)
	 * - title (tooltip text)
	 *
	 * @return void
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	protected function registerUniversalTagAttributes() {
		$this->registerTagAttribute('class', 'CSS class(es) for this element');
		$this->registerTagAttribute('dir', 'Text direction for this HTML element. Allowed strings: "ltr" (left to right), "rtl" (right to left)');
		$this->registerTagAttribute('id', 'Unique (in this file) identifier for this HTML element.');
		$this->registerTagAttribute('lang', 'Language for this element. Use short names specified in RFC 1766');
		$this->registerTagAttribute('style', 'Individual CSS styles for this element');
		$this->registerTagAttribute('title', 'Tooltip text of element');
	}
	
	/**
	 * Render all tag attributes which were registered in $this->tagAttributes.
	 * You should call this method in your render() method.
	 * 
	 * @return string Concatenated list of attributes
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	protected function renderTagAttributes() {
		$attributes = array();
		foreach ($this->tagAttributes as $attributeName) {
			if ($this->arguments[$attributeName]) {
				$attributes[] = $attributeName . '="' . $this->arguments[$attributeName] . '"';
			}
		}
		return implode(' ', $attributes);
	}
}


?>