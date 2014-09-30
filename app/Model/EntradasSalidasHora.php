<?php
App::uses('AppModel', 'Model');
/**
 * EntradasSalidasHora Model
 *
 * @property Description $Description
 */
class EntradasSalidasHora extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Description' => array(
			'className' => 'Description',
			'foreignKey' => 'description_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
