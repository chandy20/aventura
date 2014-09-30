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
		'app.torniquete',
		'app.type',
		'app.location',
		'app.group',
		'app.entradas_salidas_ano',
		'app.entradas_salidas_dia',
		'app.entradas_salidas_mese',
		'app.entradas_salidas_minuto'
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
