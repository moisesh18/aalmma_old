<?php
class ConsultoriosController extends AppController {

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
		$this->Consultorio->recursive = 0;
		$this->set('consultorios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
				$this->Consultorio->recursive = 2;
		if (!$this->Consultorio->exists($id)) {
			throw new NotFoundException(__('Invalid consultorio'));
		}
		$options = array('conditions' => array('Consultorio.' . $this->Consultorio->primaryKey => $id));
		$this->set('consultorio', $this->Consultorio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Consultorio->create();
			if ($this->Consultorio->save($this->request->data)) {
				$this->Session->setFlash('El consultorio ha sido agregado exitosamente.', 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
			$this->Session->setFlash('No se pudo agregar el consultorio. Intentalo mas tarde.', 'default', array('class' => 'alert alert-danger'));
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
		$consultorio = $this->Consultorio->findById($id);

		if(!$consultorio){
			throw new NotFoundException("No existe ese consultorio");	
		}

		if ($this->request->is(array('post', 'put'))){
			$this->Consultorio->id=$id;

			if($this->Consultorio->save($this->request->data)){
				$this->Session->setFlash('El consultorio ha sido editado exitosamente', 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action'=>'index'));
			}
				$this->Session->setFlash('El consultorio no pudo ser editado, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
		}
		if (!$this->request->data){
			$this->request->data=$consultorio;
		}
		$pacientes = $this->Consultorio->Paciente->find('list');
		$this->set(compact('pacientes'));

	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Consultorio->id = $id;
		if (!$this->Consultorio->exists()) {
			throw new NotFoundException(__('Invalid consultorio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Consultorio->delete()) {
			$this->Session->setFlash('El consultorio ha sido eliminado exitosamente', 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash('El consultorio no pudo ser eliminado, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

?>