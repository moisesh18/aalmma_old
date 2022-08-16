<?php

class OrdenItem extends AppModel {
    
	public $belongsTo = array(
		'Orden' => array(
			'className' => 'Orden',
			'foreignKey' => 'orden_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Farmaco' => array(
			'className' => 'Farmaco',
			'foreignKey' => 'farmaco_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);    
    
}

?>