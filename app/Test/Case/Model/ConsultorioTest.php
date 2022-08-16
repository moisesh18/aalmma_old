<?php
App::uses('Consultorio', 'Model');

/**
 * Consultorio Test Case
 *
 */
class ConsultorioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.consultorio',
		'app.paciente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Consultorio = ClassRegistry::init('Consultorio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Consultorio);

		parent::tearDown();
	}

}
