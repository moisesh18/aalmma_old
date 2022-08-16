<?php
App::uses('Farmaco', 'Model');

/**
 * Farmaco Test Case
 *
 */
class FarmacoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.farmaco'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Farmaco = ClassRegistry::init('Farmaco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Farmaco);

		parent::tearDown();
	}

}
