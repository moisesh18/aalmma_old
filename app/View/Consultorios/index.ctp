<div class="col-md-12">
	<div class="page-header">
		<h2><?php echo __('Consultorios'); ?></h2>
	</div>
	<table class="table table-striped">
	<thead>
	<tr>
			<th class="hidden hidden-xs hidden-sm hidden-md"><?php echo ('id'); ?></th>
			<th><?php echo $this->Paginator->sort('consultorio_nombre'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($consultorios as $consultorio): ?>
	<tr>
		<td class="hidden hidden-xs hidden-sm hidden-md"><?php echo h($consultorio['Consultorio']['id']); ?>&nbsp;</td>
		<td><?php echo h($consultorio['Consultorio']['consultorio_nombre']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver pacientes en espera'), array('action' => 'view', $consultorio['Consultorio']['id']), array('class' => 'btn btn-sm btn-default')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $consultorio['Consultorio']['id']), array('class' => 'hidden btn btn-sm btn-default')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $consultorio['Consultorio']['id']), array('class' => 'hidden btn btn-sm btn-default'), __('¿Estás seguro de eliminar # %s?', $consultorio['Consultorio']['consultorio_nombre'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
