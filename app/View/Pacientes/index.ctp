<?php //debug($pacientes); ?>

<style type="text/css">
	.red{
    color:red;
    font-size: 1.2em;
}
</style>

<div class="col-md-12">
	<div class="page-header">
		<h2><?php echo __('Pacientes'); ?></h2>
		<p class="red">Para buscar a un paciente y duplicarlo, presiona CONTROL + F y escribe su nombre <br>
		Hacen un buen trabajo chicos ;)</p>
	</div>
	<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo __('Nombre'); ?></th>
			<th class="hidden-xs hidden-sm hidden-md"><?php echo __('Consultorio'); ?></th>
			<th><?php echo __('Motivo de consulta');?></th>
			<th  class="hidden-xs hidden-sm hidden-md"><?php echo __('APF');?></th>
			<th  class="hidden-xs hidden-sm hidden-md"><?php echo __('APP'); ?></th>
			<th  class="hidden-xs hidden-sm hidden-md"><?php echo __('Glucosa'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pacientes as $paciente): 

	 	if ($paciente['Paciente']['created'] >= '2018-03-27 23:20:21'):?>
		<tr>

			<td><?php echo h($paciente['Paciente']['Nombre']); ?>&nbsp;</td>
			<td class="hidden-xs hidden-sm hidden-md"><?php echo h($paciente['Consultorio']['consultorio_nombre']); ?>&nbsp;</td>
			<td><?php echo h($paciente['Paciente']['Motivo de Consulta']); ?>&nbsp;</td>
			<td  class="hidden-xs hidden-sm hidden-md"><?php echo h($paciente['Paciente']['APF']); ?>&nbsp;</td>
			<td  class="hidden-xs hidden-sm hidden-md"><?php echo h($paciente['Paciente']['APP']); ?>&nbsp;</td>
			<td  class="hidden-xs hidden-sm hidden-md"><?php echo h($paciente['Paciente']['Glucosa']); ?>&nbsp;
			<td class="actions">
				<?php echo $this->Html->link(__('Duplicar Paciente'), array('action' => 'duplicate', $paciente['Paciente']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Html->link(__('Ver Detalles'), array('action' => 'view', $paciente['Paciente']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller'=> 'pacientes', 'action' => 'edit', $paciente['Paciente']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $paciente['Paciente']['id']), array('class' => ' btn btn-sm btn-default'), __('¿Estás seguro de eliminar # %s?', $paciente['Paciente']['Nombre'])); ?>
			</td>
		</tr>
		
		<?php endif;
		 endforeach; ?>

	</tbody>
	</table>

<!--
	<nav>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('anterior'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('siguiente') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	</nav>
-->
</div>
