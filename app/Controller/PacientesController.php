<?php
App::uses('AppController', 'Controller');
/**
 * Pacientes Controller
 *
 * @property Paciente $Paciente
 * @property PaginatorComponent $Paginator
 */
class PacientesController extends AppController {

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
		$this->Paciente->recursive = 0;
		$pacientes = $this->Paciente->find('all',array('order' => array('Paciente.created DESC')));
		$this->set(compact('pacientes'));
	}

/**
 * view method ,array('conditions'=> array('Paciente.created >= NOW()'))
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Paciente->recursive = 1;
		if (!$this->Paciente->exists($id)) {
			throw new NotFoundException(__('Invalid paciente'));
		}
		$options = array('conditions' => array('Paciente.' . $this->Paciente->primaryKey => $id));
		$paciente =  $this->Paciente->find('first', $options);
		$this->set('paciente',$paciente);
        $this->loadModel('OrdenItem', 'RequestHandler');				
		$orden_id = $paciente['Orden'][0]['id'];
		$options = array('conditions' => array('OrdenItem.id' => $orden_id));
		$orden_item =  $this->OrdenItem->find('all', $options);
		$this->set('orden_items',$orden_item);




	}

	public function duplicate($id = null) {
		if (!$id){
			throw new NotFoundException("Datos invalidos");
		}
		$paciente = $this->Paciente->findById($id);

		if(!$paciente){
			throw new NotFoundException("No existe ese paciente");
		}

		if ($this->request->is(array('post', 'put'))){
			$this->Paciente->id=$id;
			$this->Paciente->create();
			if($this->Paciente->save($this->request->data)){
				$this->Session->setFlash('El paciente ha sido modificado', $element = 'default', $params = array('class' =>'alert alert-success'));

				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('El paciente no pudo ser modificado');
		}
		if (!$this->request->data){
			$this->request->data=$paciente;
		}
		$consultorios = $this->Paciente->Consultorio->find('list');
		$this->set(compact('consultorios'));

	}




/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->request->is('post')){

			$this->Paciente->create();

		if($this->Paciente->save($this->request->data)){
				$this->Session->setFlash('El paciente ha sido agregado exitosamente.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash('No se pudo agregar el paciente..', 'default', array('class' => 'alert alert-danger'));
		}
		$consultorios = $this->Paciente->Consultorio->find('list');
		$this->set(compact('consultorios'));
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
		$paciente = $this->Paciente->findById($id);

		if(!$paciente){
			throw new NotFoundException("No existe ese paciente");
		}

		if ($this->request->is(array('post', 'put'))){
			$this->Paciente->id=$id;

			if($this->Paciente->save($this->request->data)){
				$this->Session->setFlash('El paciente ha sido editado exitosamente', 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action'=>'index'));
			}
				$this->Session->setFlash('El paciente no pudo ser editado, checa lo dstos', 'default', array('class' => 'alert alert-danger'));
		}
		if (!$this->request->data){
			$this->request->data=$paciente;
		}
		$consultorios = $this->Paciente->Consultorio->find('list');
		$this->set(compact('consultorios'));

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Paciente->id = $id;
		if (!$this->Paciente->exists()) {
			throw new NotFoundException(__('Invalid paciente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Paciente->delete()) {
			$this->Session->setFlash('El paciente ha sido eliminado exitosamente', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('El paciente no pudo ser eliminado, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
