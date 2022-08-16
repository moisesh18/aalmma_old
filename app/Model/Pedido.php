<?php
class Pedido extends AppModel {
	
	public $belongsTo = array(
		'Farmaco' => array(
			'className' => 'Farmaco',
			'foreignKey' => 'farmaco_id'
			)
		);

}
