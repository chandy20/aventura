<?php
App::uses('AppModel', 'Model');
/**
 * Locacione Model
 *
 * @property Torniquete $Torniquete
 */
class Locacione extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Torniquete' => array(
			'className' => 'Torniquete',
			'foreignKey' => 'locacione_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
