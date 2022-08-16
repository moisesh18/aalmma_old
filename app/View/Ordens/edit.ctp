<?php echo $this->Html->script(array('addtocart.js','cart.js','search.js'), array('inline' => false)); ?>

<?php // echo $this->element('view'); ?>

<style media="screen">
	.oculto2{
		display:none;
	}

  iframe{
    width:100%;
    height:680px;
  }

  .parr{
    margin:10px 0;
    font-size: 1.5em;
  }
</style>


<?php //debug($paciente) ?>

<div class="container">
	<div class="row">
		<div class="col-md-10">
            <?php echo $this->Form->create('Orden', array('role'=> 'form')); ?>
			<fieldset>

                <?php
               		echo $this->Form->input('consultorio_id',
               			array(
               				'class' => 'form-control',
               				'label' => 'Nombre del Consultorio',
               				'options' => array($consultorios['Consultorio']['id']=> $consultorios['Consultorio']['consultorio_nombre']
               					)
               				)
           			);
               		echo $this->Form->input('paciente_id',
               			array(
               				'class' => 'form-control',
               				'label' => 'Nombre del paciente',
               				'options' => array($paciente['id']=> $paciente['Nombre'])
               				)
               			);
                	
                  echo $this->Form->input('padecimiento_actual', array('class' => 'form-control', 'label' => 'Padecimiento Actual', 'rows' =>'5'));
                  echo $this->Form->input('exploracion_fisica', array('class' => 'form-control', 'label' => 'Exploracion Fisica', 'rows' =>'5'));
                  ?>

                
			</fieldset>
                <?php echo $this->Form->end(array('label' => 'Editar', 'class' => 'noquiere btn btn-success hide-offline'));?>
			</p>
		</div>
	</div>
</div>
