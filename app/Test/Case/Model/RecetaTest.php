<?php
App::uses('Receta', 'Model');

/**
 * Receta Test Case
 *
 */
class RecetaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.receta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Receta = ClassRegistry::init('Receta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Receta);

		parent::tearDown();
	}

}
