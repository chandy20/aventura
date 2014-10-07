<?php
App::uses('EntradasSalidasDiasParque', 'Model');

/**
 * EntradasSalidasDiasParque Test Case
 *
 */
class EntradasSalidasDiasParqueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_salidas_dias_parque'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntradasSalidasDiasParque = ClassRegistry::init('EntradasSalidasDiasParque');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasSalidasDiasParque);

		parent::tearDown();
	}

}
