<?php
App::uses('EntradasSalidasMese', 'Model');

/**
 * EntradasSalidasMese Test Case
 *
 */
class EntradasSalidasMeseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entradas_salidas_mese',
		'app.torniquete'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntradasSalidasMese = ClassRegistry::init('EntradasSalidasMese');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntradasSalidasMese);

		parent::tearDown();
	}

}
