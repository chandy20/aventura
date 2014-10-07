<?php
/**
 * EntradasSalidasDiasParqueFixture
 *
 */
class EntradasSalidasDiasParqueFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'fecha' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
		'entradas' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
		'salidas' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fecha' => array('column' => 'fecha', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'fecha' => '2014-10-07 04:03:28',
			'entradas' => '',
			'salidas' => ''
		),
	);

}
