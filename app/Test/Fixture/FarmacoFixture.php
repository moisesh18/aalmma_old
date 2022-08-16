<?php
/**
 * FarmacoFixture
 *
 */
class FarmacoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'unsigned' => false, 'key' => 'primary'),
		'Descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Categoria' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Existencia' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Unidad' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Costo' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'Descripcion' => 'Lorem ipsum dolor sit amet',
			'Categoria' => 1,
			'Existencia' => 1,
			'Unidad' => 'Lorem ipsum dolor sit amet',
			'Costo' => 1
		),
	);

}
