<?php

class OrdenItemsController extends AppController {
    
    public $components = array('Session', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    
    public $paginate = array(
            'limit' => 10,
            'order' => array(
                'OrdenItem.id' => 'asc'
            )
        );

    public function ver($id = null) {
       $this->OrdenItem->recursive = 2;
               
        $this->paginate['OrdenItem']['limit'] = 10;
        $this->paginate['OrdenItem']['conditions'] = array('OrdenItem.orden_id' => $id);
        $this->paginate['OrdenItem']['order'] = array('OrdenItem.id' => 'asc');
        $this->set('ordenitems', $this->paginate());     
        
        if ($this->request->is(array('post', 'put'))){
            $this->loadModel('Orden', 'RequestHandler');
            $this->Orden->id=$id;
            
            if($this->Orden->save($this->request->data)){
                $this->Session->setFlash('La ha sido despachada exitosamente', 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('controller' => 'ordens', 'action'=>'index'));
            }
                $this->Session->setFlash('La orden no pudo ser despachada, intenta mas tarde.', 'default', array('class' => 'alert alert-danger'));
        }



    }



    
}

?>