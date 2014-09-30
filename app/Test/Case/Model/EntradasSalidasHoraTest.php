<?php
App::uses('EntradasSalidasHora', 'Model');

/**
 * EntradasSalidasHora Test Case
 *
 */
class EntradasSalidasHoraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_salidas_hora',
		'app.description'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntradasSalidasHora = ClassRegistry::init('EntradasSalidasHora');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasSalidasHora);

		parent::tearDown();
	}

}
