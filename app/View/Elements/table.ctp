<style type="text/css">
	
.col-xs-4{
	word-break: break-all;
}

</style>

<div class="col-md-12">
	<div class="row">
		<div class="hidden-xs hidden-sm col-xs-4">Nombre</div>
		<div class="hidden-xs hidden-sm col-xs-4">Presentacion</div>
		<div class="hidden-xs hidden-sm col-xs-2">Cantidad</div>
		<div class="hidden-xs hidden-sm col-xs-2">Eliminar</div>
	</div>

	<?php $tabindex = 1; ?>

	<?php foreach($pedidos as $receta): ?>

		<div class="row" id="row-<?php echo $receta['Pedido']['id']; ?>">
		   

			<div class="col-xs-4">
				<strong>
					<?php echo $this->Html->link($receta['Farmaco']['formula'], array('controller' => 'farmacos', 'action' => 'view', $receta['Pedido']['farmaco_id'])); ?>
				</strong>
			</div>
			<div class="col-xs-4">
				<strong>
					<?php echo $receta['Farmaco']['presentacion']; ?>
				</strong>
			</div>
			<div class="col col-xs-2">
				<?php echo $this->Form->input($receta['Pedido']['id'], array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $receta['Pedido']['id'], 'value' => $receta['Pedido']['cantidad'])); ?>
			</div>
			<div class="col-xs-2">
				<?php
				echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', '#', array('escapeTitle' => false, 'title' => 'Eliminar farmaco', 'id' => $receta['Pedido']['id'], 'class' => 'remove'));
				?>
			</div>
		</div>
		<br>
	<?php endforeach; ?>
</div>