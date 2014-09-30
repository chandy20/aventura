<?php
App::uses('EntradasSalidasAno', 'Model');

/**
 * EntradasSalidasAno Test Case
 *
 */
class EntradasSalidasAnoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_salidas_ano',
		'app.torniquete',
		'app.type',
		'app.location',
		'app.group',
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
		$this->EntradasSalidasAno = ClassRegistry::init('EntradasSalidasAno');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasSalidasAno);

		parent::tearDown();
	}

}
