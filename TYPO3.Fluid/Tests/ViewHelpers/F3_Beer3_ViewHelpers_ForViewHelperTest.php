<?php
declare(ENCODING = 'utf-8');
namespace F3::Beer3::ViewHelpers;

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
 * @package Beer3
 * @subpackage Tests
 * @version $Id:$
 */
/**
 * Testcase for DefaultViewHelper
 *
 * @package Beer3
 * @subpackage Tests
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */

include_once(__DIR__ . '/Fixtures/F3_Beer3_ViewHelpers_Fixtures_ConstraintSyntaxTreeNode.php');
class ForViewHelperTest extends F3::Testing::BaseTestCase {

	/**
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function setUp() {
	}
	
	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function forExecutesTheLoopCorrectly() {
		$this->viewHelper = new F3::Beer3::ViewHelpers::ForViewHelper();
		
		$arguments = new F3::Beer3::Core::ViewHelperArguments(array(
			'each' => array(0,1,2,3),
			'as'   => 'innerVariable'
		));
		
		$variableContainer = new F3::Beer3::Core::VariableContainer(array());
		
		$viewHelperNode = new F3::Beer3::ViewHelpers::Fixtures::ConstraintSyntaxTreeNode($variableContainer);		
		$this->viewHelper->arguments = $arguments;
		$this->viewHelper->variableContainer = $variableContainer;
		$this->viewHelper->setViewHelperNode($viewHelperNode);
		$this->viewHelper->render();
		
		$expectedCallProtocol = array(
			array('innerVariable' => 0),
			array('innerVariable' => 1),
			array('innerVariable' => 2),
			array('innerVariable' => 3)
		);
		$this->assertEquals($expectedCallProtocol, $viewHelperNode->callProtocol, 'The call protocol differs -> The for loop does not work as it should!');	
	}
<<<<<<< .mine

=======
>>>>>>> .r1518
}



?>