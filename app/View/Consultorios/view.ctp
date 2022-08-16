
<style type="text/css">
	.red{
		color:red;
		font-size: 1.5em;
	}
</style>



<div class="col-md-12">
	<div class="page-header">
		<h2><?php echo __($consultorio['Consultorio']['consultorio_nombre']); ?></h2>
	</div>
	<?php if (!empty($consultorio['Paciente'])): ?>
		<h3><?php echo __('Lista de espera'); ?></h3>
		<div class="related">
			<table class="table table-striped">
			<thead>
				<tr>
				<th><?php echo __('Nombre'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo __('Hora de Llegada'); ?></th>
				<th><?php echo __('Motivo De Consulta'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo __('APF'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo __('APP'); ?></th>
				<th><?php echo __('Glucosa'); ?></th>
				<!-- <th class="hidden-xs hidden-sm hidden-md"><?php echo __('Diagnostico'); ?></th> -->
				<th class="actions"><?php echo __('Acciones'); ?></th>
			</tr>
			<?php endif ?>
			</thead>
			<tbody>
			<?php foreach ($consultorio['Paciente'] as $paciente):
			//debug($paciente);
	 				if ($paciente['modified'] >= '2018-03-29 23:20:21'): 
						if ($paciente['Orden']==null):?>
							<tr>
								<td><?php echo $paciente['Nombre'];?></td>
								<td class="hidden-xs hidden-sm hidden-md"><?php echo __($this->Time->format('h:i A d-m', h($paciente['created']))); ?></td>
								<td><?php echo $paciente['Motivo de Consulta']; ?></td>
								<td class="hidden-xs hidden-sm hidden-md"><?php echo $paciente['APF']; ?></td>
								<td class="hidden-xs hidden-sm hidden-md"><?php echo $paciente['APP']; ?></td>
								<td><?php echo $paciente['Glucosa']; ?></td>
								<!-- <td class="hidden-xs hidden-sm hidden-md"><?php echo $paciente['diagnostico']; ?></td> -->
								<td class="actions">
									<?php echo $this->Html->link(__('Recetar'), array('controller'=> 'ordens', 'action' => 'add', $paciente['id']), array('class' => 'btn btn-sm btn-default')); ?>
								</td>
							</tr>
			<?php
					endif;
				endif;
					endforeach; ?>
			</tbody>
			</table>

	<?php if (!empty($consultorio['Paciente'])): ?>
		<h3><?php echo __('Pacientes atendidos'); ?></h3>
		<div class="related">
			<table class="table table-striped">
			<thead>
				<tr>
				<th><?php echo __('Nombre'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo __('Hora de Llegada'); ?></th>
				<th><?php echo __('Motivo De Consulta'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo __('APF'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo __('APP'); ?></th>
				<th><?php echo __('Glucosa'); ?></th>
				<!-- <th class="hidden-xs hidden-sm hidden-md"><?php echo __('Diagnostico'); ?></th> -->
				<th class="actions"><?php echo __('Acciones'); ?></th>
			</tr>
	<?php endif; ?>

			</thead>
			<tbody>
			<?php foreach ($consultorio['Paciente'] as $paciente):
	 				if ($paciente['created'] >= '2018-01-13 23:20:21'): 
						if ($paciente['Orden']!=null):?>
							<tr>
								<td><?php echo $paciente['Nombre'];?></td>
								<td class="hidden-xs hidden-sm hidden-md"><?php echo __($this->Time->format('h:i A d-m', h($paciente['created']))); ?></td>
								<td><?php echo $paciente['Motivo de Consulta']; ?></td>
								<td class="hidden-xs hidden-sm hidden-md"><?php echo $paciente['APF']; ?></td>
								<td class="hidden-xs hidden-sm hidden-md"><?php echo $paciente['APP']; ?></td>
								<td><?php echo $paciente['Glucosa']; ?></td>
								<!-- <td class="hidden-xs hidden-sm hidden-md"><?php echo $paciente['diagnostico']; ?></td> -->
								<td class="actions">
									<?php echo $this->Html->link(__('Ver'), array('controller'=> 'pacientes', 'action' => 'view', $paciente['id']), array('class' => 'btn btn-sm btn-default')); ?>
									<?php echo $this->Html->link(__('Editar'), array('controller'=> 'ordens', 'action' => 'edit', $paciente['Orden'][0]['id']), array('class' => 'btn btn-sm btn-default')); ?>
								</td>
							</tr>
			<?php
					endif;
				endif;
					endforeach; ?>
			</tbody>
			</table>


		</div>
