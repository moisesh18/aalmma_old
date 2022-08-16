	<div class="col-md-12">
		<div class="page-header">
			<h2>Receta del paciente: <?php echo $ordenitems[0]['Orden']['Paciente']['Nombre']?> en el consultorio <?php echo $ordenitems[0]['Orden']['Consultorio']['consultorio_nombre']?></h2>
		</div>
		<?php //echo print_r($ordenitems[0]['Farmaco']); ?>

		<?php if(count($ordenitems) > 0): ?>
			<div class="col-md-12">
				<table class="table table-striped">
				<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('Formula'); ?></th>
						<th><?php echo $this->Paginator->sort('Familia'); ?></th>
						<th><?php echo $this->Paginator->sort('Presentacion'); ?></th>
						<th><?php echo $this->Paginator->sort('Gramaje'); ?></th>
						<th><?php echo $this->Paginator->sort('Pediatrico'); ?></th>
						<th><?php echo $this->Paginator->sort('Cantidad'); ?></th>
				</tr>
				</thead>
				<tbody>
		        <?php foreach($ordenitems as $ordenitem): ?>
				<tr>
					<td><?php echo utf8_encode($ordenitem['Farmaco']['formula']); ?></td>
					<td><?php echo utf8_encode($ordenitem['Farmaco']['familia']); ?></td>
					<td><?php echo utf8_encode($ordenitem['Farmaco']['presentacion']); ?></td>
					<td><?php echo utf8_encode($ordenitem['Farmaco']['gramaje']); ?></td>
					<td><?php echo utf8_encode($ordenitem['Farmaco']['pediatrico']); ?></td>
					<td><?php echo h($ordenitem['OrdenItem']['cantidad']); ?></td>
				</tr>
		        <?php endforeach; ?>
				</tbody>
				</table>
			</div>		
					<?php endif; ?>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php echo $this->Form->create('Orden', array('role' => 'form', 'novalidate')); ?>
							<fieldset>
			                <?php echo $this->Form->input('despachado', array('div' => false, 'label' => false, 'type' => 'checkbox', 'before' => '<label class="checkbox">', 'after' => 'Pedido Despachado','onChange'=>'this.form.submit()')); ?>
							</fieldset>
							<?php echo $this->Html->link('Regresar a la lista de ordenes sin despachar',"javascript:history.back()", array('class' => 'btn btn-primary'));  ?>

					</div>
				</div>
			</div>
	</div>

<?php
   //debug($ordenitems);
   //debug($ordenitems[0]['Orden'])
?>