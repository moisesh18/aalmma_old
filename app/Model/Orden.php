<?php

class Orden extends AppModel {

	public $validate = array(
		'exploracion_fisica' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
					'message' => 'No puede estar vacío',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

		public $belongsTo = array(
		'Consultorio' => array(
			'className' => 'Consultorio',
			'foreignKey' => 'consultorio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Paciente' => array(
			'className' => 'Paciente',
			'foreignKey' => 'paciente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	); 


	public $hasMany = array(
	'OrdenItem' => array(
		'className' => 'OrdenItem',
		'foreignKey' => 'orden_id',
		'dependent' => true,
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

 ?>