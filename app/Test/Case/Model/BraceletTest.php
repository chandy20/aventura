<?php
App::uses('Bracelet', 'Model');

/**
 * Bracelet Test Case
 *
 */
class BraceletTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bracelet'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bracelet = ClassRegistry::init('Bracelet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bracelet);

		parent::tearDown();
	}

}
