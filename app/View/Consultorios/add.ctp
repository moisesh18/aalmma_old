<div class="container">
    <div class="row">
        <div class="col-md-8">
        <?php echo $this->Form->create('Consultorio', array('role' => 'form')); ?>
                <fieldset>
                    <legend><?php echo __('Añadir Consultorio'); ?></legend>
                	<?php
					echo $this->Form->input('consultorio_nombre', array('class' => 'form-control', 'label' => 'El nombre del consultorio'));
					?>          
                </fieldset>
                <p>
                <?php echo $this->Form->end(array('label' => 'Crear Consultorio', 'class' =>'btn btn-success')); ?>
                </p>
            </div>
        </div>
    </div>
</div>