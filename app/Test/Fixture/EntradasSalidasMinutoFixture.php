<?php
/**
 * EntradasSalidasMinutoFixture
 *
 */
class EntradasSalidasMinutoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'hour' => array('type' => 'time', 'null' => true, 'default' => null),
		'entradas' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'salidas' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'torniquete_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'fecha' => '2014-09-30',
			'hour' => '19:59:18',
			'entradas' => 1,
			'salidas' => 1,
			'torniquete_id' => ''
		),
	);

}
