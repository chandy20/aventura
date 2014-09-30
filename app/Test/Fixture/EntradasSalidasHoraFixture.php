<?php
/**
 * EntradasSalidasHoraFixture
 *
 */
class EntradasSalidasHoraFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'torniquete_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'hora' => array('type' => 'time', 'null' => true, 'default' => null),
		'entradas' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
		'salidas' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'torniquete_id' => '',
			'fecha' => '2014-09-30',
			'hora' => '20:39:31',
			'entradas' => '',
			'salidas' => ''
		),
	);

}
