<?php
/**
 * EntradasSalidasAnoFixture
 *
 */
class EntradasSalidasAnoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'torniquete_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => true),
		'fecha' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'fecha' => '',
			'entradas' => '',
			'salidas' => ''
		),
	);

}
