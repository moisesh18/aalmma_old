<?php

class OrdensController extends AppController{

    public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time', 'Js');

    public $paginate = array(
            'limit' => 10,
            'order' => array(
                'Orden.id' => 'desc'
            )
        );

    public function index()
    {
        $this->Orden->recursive = 2;

        $this->paginate['Orden']['limit'] = 10;
        $this->paginate['Orden']['order'] = array('Orden.despachado' => 'asc');
        $this->set('ordens', $this->paginate());
    }

    public function view($id = null) {
        $this->loadModel('OrdenItem', 'RequestHandler');
        $this->OrdenItem->recursive = 2;

        if(!$this->OrdenItem->exists($id))
        {
            throw new NotFoundException('pedido sdfv');
        }

        $this->paginate['OrdenItem']['limit'] = 2;
        $this->paginate['OrdenItem']['conditions'] = array('OrdenItem.orden_id' => $id);
        $this->paginate['OrdenItem']['order'] = array('OrdenItem.id' => 'asc');
        $this->set('ordenitems', $this->paginate());
    }



    public function add($id = null)
    {
        $this->loadModel('Paciente', 'RequestHandler');
        $this->loadModel('Consultorio', 'RequestHandler');

        //recuperando el paciente actual
        $paciente = $this->Paciente->findById($id);
        //Recuperando el consultorio al que pertenece el paciente actual
        $options = array('conditions' => array('Consultorio.' . $this->Consultorio->primaryKey => $paciente['Paciente']['consultorio_id'] ));
        $consultorios = $this->Consultorio->find('first', $options);

        //enviando las variables
        $this->set(compact('orden_item', 'mostrar_total_pedidos', 'consultorios', 'paciente'));

        if($this->request->is('post'))
        {
            $this->Orden->create();
            if($this->Orden->saveAll($this->request->data))
            {

               $ultimopedido = $this->Orden->getLastInsertID();
                $Orden = $this->Orden->findById($ultimopedido);
                $c_id = $Orden['Consultorio']['id'];
            return $this->redirect(array('controller' => 'pedidos', 'action'=>'view', $ultimopedido)); 
            }
            else
            {
            $this->Session->setFlash('Es necesario especificar la exploración fisica y el padecimiento actual', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function edit($id = null)
    {
        $this->loadModel('Paciente', 'RequestHandler');
        $this->loadModel('Consultorio', 'RequestHandler');

        $orden = $this->Orden->findById($id);


        if($this->request->is(array('post', 'put'))){
            $this->Orden->id=$id;

            if($this->Orden->save($this->request->data)){
                $this->Session->setFlash('La receta ha sido editada exitosamente', 'default', array('class' => 'alert alert-success'));

               $ultimopedido = $this->Orden->getLastInsertID();
                $Orden = $this->Orden->findById($id);
                $c_id = $Orden['Consultorio']['id'];
            return $this->redirect(array('controller' => 'consultorios', 'action'=>'view', $c_id));
            }
                $this->Session->setFlash('El paciente no pudo ser editado, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
        }
        if (!$this->request->data){
            $this->request->data=$orden;
                    //recuperando el paciente actual
        $paciente = $orden['Paciente'];
        //Recuperando el consultorio al que pertenece el paciente actual
        $options = array('conditions' => array('Consultorio.' . $this->Consultorio->primaryKey => $orden['Paciente']['consultorio_id'] ));
        $consultorios = $this->Consultorio->find('first', $options);

        //enviando las variables
        $this->set(compact('orden_item', 'mostrar_total_pedidos', 'consultorios', 'paciente','orden'));

        $this->set(compact('orden'));
        }
    }



    public function agregandofarmacos($id = null) {
        if (!$id){
            throw new NotFoundException("Datos invalidos");
        }
        $Orden = $this->Orden->findById($id);

        if(!$Orden){
            throw new NotFoundException("No existe esa orden");
        }

        $this->loadModel('Pedido', 'RequestHandler');
        $orden_item = $this->Pedido->find('all', array('order' => 'Pedido.id ASC','conditions' => array('Pedido.consultorio_id'=> $Orden["Consultorio"]["id"])));

        function utf8_converter($array){
            array_walk_recursive($array, function(&$item, $key){
                if(!mb_detect_encoding($item, 'utf-8', true)){
                    $item = utf8_encode($item);
                }
            });

            return $array;
        }

        if(count($orden_item) > 0)
        {
            $total_pedidos = $this->Pedido->find('all', array('fields' => array('SUM(Pedido.subtotal) as subtotal')));
            $mostrar_total_pedidos = $total_pedidos[0][0]['subtotal'];
            $orden_item = utf8_converter($orden_item);
            $Orden = utf8_converter($Orden);
            $this->set(compact('orden_item', 'mostrar_total_pedidos', 'Orden'));
        }else{
            $orden_item = utf8_converter($orden_item);
            $Orden = utf8_converter($Orden);
            $this->set(compact('orden_item', 'mostrar_total_pedidos', 'Orden'));
        }


        if ($this->request->is(array('post', 'put'))){
            $this->Orden->id=$id;
            if($this->Orden->save($this->request->data)){
                $this->Session->setFlash('La orden ha sido editado exitosamente', 'default', array('class' => 'alert alert-success'));

            $id_orden = $this->Orden->id;

            for($i = 0; $i < count($orden_item); $i++)
            {
                $farmaco_id = $orden_item[$i]['Pedido']['farmaco_id'];
                $cantidad = $orden_item[$i]['Pedido']['cantidad'];
                $subtotal = $orden_item[$i]['Pedido']['subtotal'];

                $orden_items = array('farmaco_id' => $farmaco_id, 'orden_id' => $id_orden, 'cantidad' => $cantidad, 'subtotal' => $subtotal);
                $this->Orden->OrdenItem->saveAll($orden_items);


            //descontando existencias de los farmacos
            $existencia =  $orden_item[$i]['Farmaco']['Existencia'];
            $nuevaexistencia = $existencia - $cantidad;
            $this->Pedido->Farmaco->read(null, $farmaco_id);
            $this->Pedido->Farmaco->set(array(
                  'Existencia' => $nuevaexistencia,
            ));
            $this->Pedido->Farmaco->save();

            }

            //Eliminando el contenido de la tabla pedidos
            $c_id = $Orden['Consultorio']['id'];
            $this->Pedido->deleteAll(array('Pedido.consultorio_id' => $c_id), false);
            $this->Session->setFlash('La orden fue procesada con éxito.', 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('controller' => 'consultorios', 'action'=>'view', $c_id));
            }
                $this->Session->setFlash('La orden no pudo ser editada, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
        }
        if (!$this->request->data){
            $this->request->data=$Orden;
        }

    }


}
?>
