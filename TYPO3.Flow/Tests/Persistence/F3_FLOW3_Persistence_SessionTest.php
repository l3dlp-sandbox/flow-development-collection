<?php
declare(ENCODING = 'utf-8');

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
 * @package FLOW3
 * @subpackage Tests
 * @version $Id$
 */

/**
 * Testcase for the Persistence Session
 *
 * @package FLOW3
 * @subpackage Tests
 * @version $Id$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class F3_FLOW3_Persistence_SessionTest extends F3_Testing_BaseTestCase {

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function objectRegisteredWithRegisterNewObjectCanBeRetrievedWithGetNewObjects() {
		$someObject = new ArrayObject();
		$session = new F3_FLOW3_Persistence_Session();
		$session->registerNewObject($someObject);

		$this->assertSame($someObject, array_pop($session->getNewObjects()));
	}

	/**
	 * @test
	 * @author Robert Lemke <robert@typo3.org>
	 */
	public function isNewReturnsTrueForObjectsRegisteredAsNew() {
		$newObject = new ArrayObject();
		$notRegisteredObject = new ArrayObject();

		$session = new F3_FLOW3_Persistence_Session();
		$session->registerNewObject($newObject);

		$this->assertTrue($session->isNew($newObject));
		$this->assertFalse($session->isNew($notRegisteredObject));
	}
}
?>