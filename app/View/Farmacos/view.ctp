<?php echo $this->Html->script( array('addtocart.js'), array('inline' => false) ); ?>

<?php 
if (isset($_GET["consultorio"])) {
	echo $_GET["consultorio"];
}
?>

  <div class="form-group">
	<div class="col-sm-12">
		<?php if ($farmaco['Farmaco']['Existencia']<1): ?>
      		<h3>El farmaco <?php echo $farmaco['Farmaco']['formula'] ?> no cuenta con existencias y no es posible agregarlo a la receta. </h3>
		<?php else:?>
			<h3>¿Deseas agregar a la receta: <?php echo $farmaco['Farmaco']['formula'] ?> ?</h3>
				<div class="container">
				  <div class="row">
				    <div class="col-sm-4">
				      <div class="panel panel-default">
				        <div class="panel-heading">
				          <h3 class="panel-title"><?php echo __('Datos del Farmaco'); ?></h3>
				        </div>
				        <div class="panel-body">
                  <p> Familia :<?php echo  $farmaco['Farmaco']['familia']?> </p>
                  <p> Presentacion: <?php echo  $farmaco['Farmaco']['presentacion']?> </p>
                  <p> Cantidad: <?php echo  $farmaco['Farmaco']['cantidad']?> </p>
				        </div>
				      </div>
				    </div>
				    <div class="col-sm-4">
				      <div class="panel panel-default">
				        <div class="panel-heading">
				          <h3 class="panel-title"><?php echo __('Datos en el sistema'); ?></h3>
				        </div>
				        <div class="panel-body">
                  <p> Existencia en el sistema: <?php echo  $farmaco['Farmaco']['Existencia']?> </p>
				        </div>
				      </div>
				    </div>
				    <div class="col-sm-4">
				      <div class="panel panel-default">
				        <div class="panel-heading">
				          <h3 class="panel-title"><?php echo __('Dosis Recomendadas'); ?></h3>
				        </div>
				        <div class="panel-body">
                  <p> <strong>Pediatrica:</strong> <?php echo  $farmaco['Farmaco']['pediatrico']?> </p>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>
			<?php if ($farmaco['Farmaco']['comentarios']!=null): ?>
					<h5>Comentarios adicionales del farmaco: <?php echo $farmaco['Farmaco']['comentarios'] ?></h5>
			<?php endif ?>
			<?php 
			if (isset($_GET["consultorio"])) {

			echo $this->Form->button('Si, agregar', array('class' => 'btn btn-success addtocart', 'id' => $farmaco['Farmaco']['id'],'data-consultorio' => $_GET["consultorio"]), array('controller' => 'pedidos', 'action' => 'view') );
			}else{

			echo $this->Form->button('Si, agregar', array('class' => 'btn btn-success addtocart', 'id' => $farmaco['Farmaco']['id']), array('controller' => 'pedidos', 'action' => 'view') );
			}
			?>

		<?php endif; ?>
		<?php echo $this->Html->link('Regresar',"javascript:history.back()", array('class' => 'btn btn-primary'));  ?>
	</div>
  </div>
