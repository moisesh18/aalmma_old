<h2>Editar Consultorio</h2>


<?php 	echo $this->Form->Create('Consultorio'); ?>
<?php 	echo $this->Form->input('consultorio_nombre');?>
<?php 	echo $this->Form->end('Editar Consultorio'); ?>

<?php 
	echo $this->Html->link('Volver a la lista de consultorios',array('controller'=>'Consultorios', 'action' =>'index'));
	 ?>