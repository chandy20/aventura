<?php
App::uses('EntradasSalidasMinuto', 'Model');

/**
 * EntradasSalidasMinuto Test Case
 *
 */
class EntradasSalidasMinutoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_salidas_minuto',
		'app.torniquete',
		'app.type',
		'app.location',
		'app.group',
		'app.entradas_salidas_ano',
		'app.entradas_salidas_dia',
		'app.entradas_salidas_mese'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntradasSalidasMinuto = ClassRegistry::init('EntradasSalidasMinuto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasSalidasMinuto);

		parent::tearDown();
	}

}
