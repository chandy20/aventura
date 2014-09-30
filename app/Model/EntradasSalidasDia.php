<?php
App::uses('AppModel', 'Model');
/**
 * EntradasSalidasDia Model
 *
 * @property Torniquete $Torniquete
 */
class EntradasSalidasDia extends AppModel {


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
