<?php
App::uses('Torniquete', 'Model');

/**
 * Torniquete Test Case
 *
 */
class TorniqueteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Torniquete = ClassRegistry::init('Torniquete');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Torniquete);

		parent::tearDown();
	}

}
