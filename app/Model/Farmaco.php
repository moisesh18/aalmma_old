<?php
App::uses('AppModel', 'Model');
/**
 * Farmaco Model
 *
 */
class Farmaco extends AppModel {

/**
 * Display field
 *
 * @var string
 */

	public $hasMany = array(
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'farmaco_id',
			'dependent' => false
			),
		'OrdenItem' => array(
			'className' => 'OrdenItem',
			'foreignKey' => 'farmaco_id',
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
