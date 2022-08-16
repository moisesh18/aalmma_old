<?php echo $this->Html->script(array('addtocart.js','cart.js','search.js'), array('inline' => false)); ?>

<?php
//debug($Orden);
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-10">
            <?php echo $this->Form->create('Orden', array('role' => 'form', 'novalidate')); ?>
			<fieldset>
				<h2>Procesar Receta</h2>
                <?php
               		echo $this->Form->input('consultorio_id',
               			array(
               				'class' => 'form-control',
               				'label' => 'Nombre del Consultorio',
               				'options' => array($Orden['Consultorio']['id']=> $Orden['Consultorio']['consultorio_nombre']
               					)
               				)
           			);
               		echo $this->Form->input('paciente_id',
               			array(
               				'class' => 'form-control',
               				'label' => 'Nombre del paciente',
               				'options' => array($Orden['Paciente']['id']=> $Orden['Paciente']['Nombre'])
               				)
               			);
                	echo $this->Form->input('exploracion_fisica',array('class' => 'form-control',  'rows' =>'5', 'label' => 'Exploracion Fisica'));
                	echo $this->Form->input('padecimiento_actual',array('class' => 'form-control',  'rows' =>'5', 'label' => 'Padecimiento actual', 'default' => $Orden['Paciente']['id']));
                ?>
			</fieldset>

		<?php
			if(count($orden_item) > 0):
        	?>
			<h3>Pedidos: </h3>
			<table class="table table-striped">
			<thead>
			<tr>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Presentacion</th>
				<th>Comentarios</th>
			</tr>
			</thead>
			<tbody>
            <?php foreach($orden_item as $item): ?>
			<tr>
				<td><?php echo $item['Farmaco']['formula']; ?></td>
				<td><?php echo $item['Pedido']['cantidad']; ?></td>
				<td><?php echo $item['Farmaco']['presentacion']; ?></td>
				<td><?php echo $item['Farmaco']['comentarios']; ?></td>
			</tr>
            <?php endforeach; ?>
			</tbody>
			</table>
			<?php endif; ?>
				<br />
				<br />
                <br></br>
                <?php echo $this->Form->end(array('label' => 'Procesar Receta', 'class' => 'btn btn-success')); ?>
		</div>
	</div>
</div>
