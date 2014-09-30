<?php
App::uses('AppModel', 'Model');
/**
 * Torniquete Model
 *
 * @property Type $Type
 * @property Location $Location
 * @property Group $Group
 * @property EntradasSalidasAno $EntradasSalidasAno
 * @property EntradasSalidasDia $EntradasSalidasDia
 * @property EntradasSalidasMese $EntradasSalidasMese
 * @property EntradasSalidasMinuto $EntradasSalidasMinuto
 */
class Torniquete extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EntradasSalidasAno' => array(
			'className' => 'EntradasSalidasAno',
			'foreignKey' => 'torniquete_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EntradasSalidasDia' => array(
			'className' => 'EntradasSalidasDia',
			'foreignKey' => 'torniquete_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EntradasSalidasMese' => array(
			'className' => 'EntradasSalidasMese',
			'foreignKey' => 'torniquete_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EntradasSalidasMinuto' => array(
			'className' => 'EntradasSalidasMinuto',
			'foreignKey' => 'torniquete_id',
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
