<?php
App::uses('AppModel', 'Model');
/**
 * Torniquete Model
 *
 * @property Tipo $Tipo
 * @property Locacione $Locacione
 * @property Grupo $Grupo
 * @property EntradasSalidasAno $EntradasSalidasAno
 * @property EntradasSalidasDia $EntradasSalidasDia
 * @property EntradasSalidasHora $EntradasSalidasHora
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
		'Tipo' => array(
			'className' => 'Tipo',
			'foreignKey' => 'tipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Locacione' => array(
			'className' => 'Locacione',
			'foreignKey' => 'locacione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Grupo' => array(
			'className' => 'Grupo',
			'foreignKey' => 'grupo_id',
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
		'EntradasSalidasHora' => array(
			'className' => 'EntradasSalidasHora',
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
