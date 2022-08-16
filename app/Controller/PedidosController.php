<?php
class PedidosController extends AppController {
	public $components = array('Session','RequestHandler');
	public $helpers = array('Html','Form','Time', 'Js');

    public function adddrugs()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];
            $cantidad = $this->request->data['cantidad'];
            $consultorioorden = $this->request->data['consultorio'];

            $farmaco = $this->Pedido->Farmaco->find('all', array('fields' => array('Farmaco.Existencia'), 'conditions' => array('Farmaco.id' => $id)));

            //pedidos
            $costo =0;

            $subtotal = $cantidad * $costo;

            $pedido = array( 'farmaco_id' => $id,'consultorio_id'=> $consultorioorden,'cantidad' => $cantidad, 'subtotal' => $subtotal);

             $existe_pedido = $this->Pedido->find( 'all', array('fields' => array('Pedido.farmaco_id'), 'conditions' => array('Pedido.farmaco_id' => $id)));

            if(count($existe_pedido) == 0)
            {

                $this->Pedido->save($pedido);

            }
        }

        $this->autoRender = false;
    }

    public function view($id = null)
    {
        $this->loadModel('Orden', 'RequestHandler');
        if ($this->Orden->exists($id)) {
            $options = array('conditions' => array('Orden.' . $this->Orden->primaryKey => $id));
            $ordenvew = $this->Orden->find('first', $options);
            $this->set('orden', $ordenvew);
        }
        $pedidos = $this->Pedido->find('all', array('order' => 'Pedido.id ASC','conditions' => array('Pedido.consultorio_id' => $ordenvew["Consultorio"]["id"] )));
        function utf8_converter($array){
            array_walk_recursive($array, function(&$item, $key){
                if(!mb_detect_encoding($item, 'utf-8', true)){
                    $item = utf8_encode($item);
                }
            });

            return $array;
        }
        $pedidos = utf8_converter($pedidos);
      $this->set('pedidos', $pedidos);

    }


    public function remove()
    {
        if($this->request->is('ajax'))

        {
            $id = $this->request->data['id'];
            $this->Pedido->delete($id);
            $farmaco = $this->Pedido->Farmaco->find('all', array('fields' => array('Farmaco.Existencia'), 'conditions' => array('Farmaco.id' => $id)));
       }
        $pedidos = $this->Pedido->find('all');
        echo json_encode(compact('pedidos'));
        return $this->redirect($this->request->here);
    }

    public function itemupdate()
    {
        if($this->request->is('ajax'))
        {
            $id = $this->request->data['id'];

            $cantidad = isset($this->request->data['cantidad']) ? $this->request->data['cantidad'] : null;

            if($cantidad == 0)
            {
                $cantidad = 1;
            }
            $item = $this->Pedido->find('all', array('fields' => array('Pedido.id', 'Farmaco.Costo'), 'conditions' => array('Pedido.id' => $id)));
            $precio_item = $item[0]['Farmaco']['Costo'];
            $subtotal_item = $cantidad * $precio_item;

            $item_update = array('id' => $id, 'cantidad' => $cantidad, 'subtotal' => $subtotal_item);
            $this->Pedido->saveAll($item_update);
        }
        $this->autoRender = false;
    }



    public function quitar()
    {
        if($this->Pedido->deleteAll(1, false))
        {
            $this->Session->setFlash('Todos los farmacos han sido eliminados', 'default', array('class' => 'alert alert-success'));
        }
        else
        {
            $this->Session->setFlash('No se pudieron quitar los farmacos.', 'default', array('class' => 'alert alert-danger'));
        }

        return $this->redirect($this->referer());
    }


    public function recalcular()
    {
    if($this->request->data['procesar'] == 'procesar')
        {
             return $this->redirect(array('controller' => 'ordens', 'action' => 'add'));
        }
    }

}

 ?>
