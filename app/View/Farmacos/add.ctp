<div class="container">
    <div class="row">
        <div class="col-md-8">
        <?php echo $this->Form->create('Farmaco', array('role' => 'form')); ?>
                <fieldset>
                    <legend><?php echo __('Editar Farmaco'); ?></legend>
                    <?php
                    echo $this->Form->input('nombre_comercial', array('class' => 'form-control', 'label' => 'Nombre comercial'));
                    echo $this->Form->input('formula', array('class' => 'form-control', 'label' => 'principio activo         <span class="text-danger">(si es combinado, separalo por comas)</span>','required'=>'true'));
                    echo $this->Form->input('familia', array('class' => 'form-control', 'label' => 'Familia','required'=>'true'));
                    echo $this->Form->input('presentacion', array('label'=>'Presentacion         <span class="text-danger">(solo se permite una, si es otra presentación, crea otro farmaco)</span>','class' => 'form-control', 'required'=>'true'));
                    echo $this->Form->label('es combinado?');
                    echo $this->Form->checkbox('combinado', array('class' => 'form-control','label' => 'es combinado?'));
                    echo $this->Form->input('Existencia', array('class' => 'form-control','required'=>'true'));
                    echo $this->Form->input('gramaje', array('class' => 'form-control','label'=>'gramaje,         <span class="text-danger">(si es combinado, separalo por comas)</span>','required'=>'true'));
                    echo $this->Form->label('es pediatrico?');
                    echo $this->Form->checkbox('pediatrico', array('class' => 'form-control','label' => 'es pediatrico?'));
                    echo $this->Form->input('cantidad', array('class' => 'form-control','label'=>'cantidad de medicamento por presentacion         <span class="text-danger">(si es combinado, separalo por comas)</span>'));
                    echo $this->Form->input('caducidad', array(
                        'class' => 'form-control',
                        'placeholder' => 'Caducidad',
                        'div' => array('class' => 'form-inline'),
                        'between' => '  <div class="form-group" style="padding-left: 20px;">   ',
                        'separator' => '  </div><div class="form-group" style="padding-left: 20px;">  ',
                        'after' => '  </div>  ',
                        'type'=>'date',
                        'dateFormat' => 'DMY',
                        'empty' => true,
                        'minYear' => date('Y'),
                        'maxYear' =>date('Y')+5,
                        'label' => 'Caducidad         <span class="text-danger">(usa la mas proxima!)</span>'
                    ));
                    echo $this->Form->input('comentarios', array('class' => 'form-control','label' => 'Algo que quieras agregar...'));
                    ?> 
                </fieldset>

                <p>
                <?php echo $this->Form->end(array('label' => 'Crear Farmaco', 'class' =>'btn btn-success')); ?>
                </p>
            </div>
        </div>
    </div>
</div>
