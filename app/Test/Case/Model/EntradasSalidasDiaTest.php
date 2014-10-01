<?php
App::uses('EntradasSalidasDia', 'Model');

/**
 * EntradasSalidasDia Test Case
 *
 */
class EntradasSalidasDiaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_salidas_dia',
		'app.torniquete',
		'app.tipo',
		'app.locacion',
		'app.grupo',
		'app.entradas_salidas_ano',
		'app.entradas_salidas_hora',
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
		$this->EntradasSalidasDia = ClassRegistry::init('EntradasSalidasDia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasSalidasDia);

		parent::tearDown();
	}

}
