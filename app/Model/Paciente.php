<?php
App::uses('AppModel', 'Model');
/**
 * Paciente Model
 *
 * @property Consultorio $Consultorio
 */
class Paciente extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Nombre';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'Creador' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'No puede estar vacio',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Nombre' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'No puede estar vacio',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Temperatura' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'Solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Condicion Casual' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Frecuencia Cardiaca' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Frecuencia Respiratoria' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Cintura' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'Solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Glucosa' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'Solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Altura' => array(
            'naturalNumber' => array(
                'rule' => 'naturalNumber',
                'message' => 'La altura debe ser escrita en centimetros',
                'required' => true
            ),
		),
		'Peso' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				'message' => 'Solo numeros',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Fecha de Nacimiento' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Selecciona una fecha',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'Condicion Ayunas' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Consultorio' => array(
			'className' => 'Consultorio',
			'foreignKey' => 'consultorio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	public $hasMany = array(
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'paciente_id',
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
