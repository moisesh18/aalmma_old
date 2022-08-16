<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-ordens',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));

   //debug($ordens);
?>


<?php if(empty($ordens)): ?>

<h2>No existen ordenes disponibles</h2>

<?php else: ?>

<div id="contenedor-ordens">

<div class="page-header">

	<h2><?php echo __('Órdenes'); ?></h2>

</div>

	<div class="col-md-12">

	<div class="progress oculto" id="procesando">
	  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	    <span class="sr-only">100% Complete</span>
	  </div>
	</div>


		<table class="table table-striped">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('Paciente'); ?></th>
				<th><?php echo $this->Paginator->sort('Consultorio'); ?></th>
				<th class="hidden-xs hidden-sm hidden-md"><?php echo $this->Paginator->sort('Creado'); ?></th>
				<th><?php echo $this->Paginator->sort('Despachado'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>

        <?php foreach($ordens as $orden): 
        		if ($orden['OrdenItem']!=null):?>	
		<tr>
			<td><?php echo h($orden['Paciente']['Nombre']); ?></td>
			<td ><?php echo h($orden['Consultorio']['consultorio_nombre']); ?></td>
			<td class="hidden-xs hidden-sm hidden-md"><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['created'])); ?></td>
			
			<?php if($orden['Orden']['despachado']!=0) : ?>
					<td> Despachado </td>
			<?php else: ?>
					<td> No despachado </td>
			<?php endif; ?>

			<td class="actions">
				<?php 
				    echo $this->Html->link('Ver pedidos', array('controller' => 'orden_items', 'action' => 'ver', $orden['Orden']['id']), array('class' => 'btn btn-sm btn-info'));
				?>
			</td>
		</tr>
        <?php 
        			endif;
        		endforeach; ?>
		
		</tbody>
		</table>
	</div>

		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-ordens -->

<?php endif; ?>