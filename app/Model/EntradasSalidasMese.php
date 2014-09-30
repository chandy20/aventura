<?php
App::uses('AppModel', 'Model');
/**
 * EntradasSalidasMese Model
 *
 * @property Torniquete $Torniquete
 */
class EntradasSalidasMese extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'entradas_salidas_meses';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Torniquete' => array(
			'className' => 'Torniquete',
			'foreignKey' => 'torniquete_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
