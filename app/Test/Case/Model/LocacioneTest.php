<?php
App::uses('Locacione', 'Model');

/**
 * Locacione Test Case
 *
 */
class LocacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.locacione',
		'app.torniquete',
		'app.tipo',
		'app.locacion',
		'app.grupo',
		'app.entradas_salidas_ano',
		'app.entradas_salidas_dia',
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
		$this->Locacione = ClassRegistry::init('Locacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Locacione);

		parent::tearDown();
	}

}
