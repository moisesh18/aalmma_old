<?php
/**
 * PacienteFixture
 *
 */
class PacienteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'Sexo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'Direccion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'Ciudad' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'APF' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'APP' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'Presion Arterial' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'IMC' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'Temperatura' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'Condicion Casual' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Frecuencia Cardiaca' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Frecuencia Respiratoria' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Cintura' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Glucosa' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'Altura' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'Peso' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'Fecha de Nacimiento' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'consultorio_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'receta' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'Condicion Ayunas' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'Motivo de Consulta' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'ojo siniestro' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ojo derecho' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'FUM' => array('type' => 'date', 'null' => false, 'default' => null),
		'menarca' => array('type' => 'date', 'null' => false, 'default' => null),
		'ciclo dia' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ciclo duracion' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dismenorrea' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'G' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'P' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'A' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'C' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Comentarios adicionales' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'Nombre' => 'Lorem ipsum dolor sit amet',
			'Sexo' => 'Lorem ipsum dolor sit ame',
			'Direccion' => 'Lorem ipsum dolor sit amet',
			'Ciudad' => 'Lorem ipsum dolor sit amet',
			'APF' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'APP' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'Presion Arterial' => 'Lorem ip',
			'IMC' => 1,
			'Temperatura' => 1,
			'Condicion Casual' => 1,
			'Frecuencia Cardiaca' => 'Lorem ipsum dolor ',
			'Frecuencia Respiratoria' => 'Lorem ipsum dolor ',
			'Cintura' => 'Lorem ipsum dolor ',
			'Glucosa' => 1,
			'Altura' => 1,
			'Peso' => 1,
			'Fecha de Nacimiento' => '2017-02-25',
			'created' => '2017-02-25 14:48:43',
			'modified' => '2017-02-25 14:48:43',
			'consultorio_id' => 1,
			'receta' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'Condicion Ayunas' => 1,
			'Motivo de Consulta' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ojo siniestro' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ojo derecho' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'FUM' => '2017-02-25',
			'menarca' => '2017-02-25',
			'ciclo dia' => 1,
			'ciclo duracion' => 1,
			'dismenorrea' => 1,
			'G' => 1,
			'P' => 1,
			'A' => 1,
			'C' => 1,
			'Comentarios adicionales' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
