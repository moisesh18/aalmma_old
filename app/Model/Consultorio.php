<?php
App::uses('AppModel', 'Model');
/**
 * Consultorio Model
 *
 * @property Paciente $Paciente
 */
class Consultorio extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'consultorio_nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'consultorio_nombre' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Paciente' => array(
			'className' => 'Paciente',
			'foreignKey' => 'consultorio_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'created DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'consultorio_id',
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
