<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php echo $this->Form->create('Consultorio', array('role' => 'form', 'novalidate')); ?>
				<fieldset>
					<h2><?php echo __('Editar Consultorios'); ?></h2>
                <?php
                    echo $this->Form->input('consultorio_nombre', array('class' => 'form-control', 'label' => 'Nombre del consultorio'));
                ?>        
				</fieldset>
				<p>
					<?php echo $this->Form->end(array('label' => 'Editar Consultorio', 'class' =>'btn btn-success')); ?>
				</p>
		</div>
	</div>
</div>