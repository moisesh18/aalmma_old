<?php
App::uses('AppController', 'Controller');
/**
 * Farmacos Controller
 *
 * @property Farmaco $Farmaco
 * @property PaginatorComponent $Paginator
 */
class FarmacosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Farmaco->recursive = 0;
		$this->set('farmacos',$this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Farmaco->exists($id)) {
			throw new NotFoundException(__('Invalid farmaco'));
		}
		$options = array('conditions' => array('Farmaco.' . $this->Farmaco->primaryKey => $id));
		$farmaco = $this->Farmaco->find('first', $options);
		function utf8_converter($array){
		    array_walk_recursive($array, function(&$item, $key){
		        if(!mb_detect_encoding($item, 'utf-8', true)){
		            $item = utf8_encode($item);
		        }
		    });

		    return $array;
		}
		$farmaco = utf8_converter($farmaco);
		$this->set('farmaco', $farmaco);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Farmaco->create();
			if ($this->Farmaco->save($this->request->data)) {
				$this->Session->setFlash('El farmaco ha sido agregado exitosamente.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
			$this->Session->setFlash('No se pudo agregar el farmaco. Intentalo mas tarde.', 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$id){
			throw new NotFoundException("Datos invalidos");
		}
		$farmaco = $this->Farmaco->findById($id);

		if(!$farmaco){
			throw new NotFoundException("No existe ese farmaco");
		}

		if ($this->request->is(array('post', 'put'))){
			$this->Farmaco->id=$id;

			if($this->Farmaco->save($this->request->data)){
				$this->Session->setFlash('El farmaco ha sido editado exitosamente', 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action'=>'index'));
			}
				$this->Session->setFlash('El farmaco no pudo ser editado, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
		}
		if (!$this->request->data){
			$this->request->data=$farmaco;
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Farmaco->id = $id;
		if (!$this->Farmaco->exists()) {
			throw new NotFoundException(__('Invalid farmaco'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Farmaco->delete()) {
			$this->Session->setFlash('El farmaco ha sido eliminado exitosamente', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('El paciente no pudo ser eliminado, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function mijson($with_zeros = 0)
	{
	$server = "localhost";
	$user = "root";
	$password = "root";
	$bd = "aalmma_test";

	$conexion = mysqli_connect($server, $user, $password, $bd);
		if (!$conexion){
			die('Error de Conexión: ' . mysqli_connect_errno());
		}
	if($with_zeros==1){
		$query = "SELECT * FROM farmacos ORDER BY `Existencia` DESC;";
	}else{
		$query = "SELECT * FROM farmacos WHERE `Existencia` > 0 ORDER BY formula asc;";
	}
	$resultado = mysqli_query($conexion, $query);
	if (!$resultado){
		die("error!");
	}else{
		while ($data = mysqli_fetch_assoc($resultado)){
			$arreglo["data"][] = array_map("utf8_encode", $data);
		}
		echo json_encode($arreglo);
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);
	$this->autoRender = false;
	}
}

