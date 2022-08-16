<?php echo $this->Html->script(array('cart.js','dataTables.bootstrap.js','dataTables.buttons.min.js','jquery.dataTables.min.js'), array('inline' => false));

  echo $this->Html->css(array('dataTables.bootstrap.min','jquery.dynatable','csstables'));
?>



<?php
//debug($orden);
?>
<div class="col-md-12">
	<div class="page-header">
		<h2>Agregar farmacos a la receta del paciente: <?php echo $orden['Paciente']['Nombre'] ?> para <?php echo $orden['Consultorio']['consultorio_nombre'] ?></h2>
	</div>
	<div class="form-group">
	<div class="col-sm-10">
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
     <span class="glyphicon glyphicon-plus"></span>Añadir Farmacos</button>
	</div>
	</div>

<?php
	echo $this->element('table', array("recetas" => $pedidos));
?>
<h3 class="consultorioid hidden"><?php echo $orden['Consultorio']['id'] ?></h3>
	<div class="row">
		<div class="col col-sm-11">
			<div class="pull-right tr">

			<?php echo $this->Html->link('Quitar todos los farmacos', array('controller' => 'pedidos', 'action' => 'quitar'), array('class' => 'btn btn-danger', 'confirm' => 'Está seguro de quitar todos los pedidos?')); ?>

			<?php echo $this->Html->link(__('Terminar receta'), array('controller'=> 'ordens', 'action' => 'agregandofarmacos',$orden['Orden']['id']), array('class' => 'btn btn-primary', 'escape' =>false)); ?>
			<?php echo $this->Form->end(); ?>

			</div>
		</div>
	</div>
</div>

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Buscar Farmacos</h4>
          </div>
          <div class="modal-body">


          <div class="row">
            <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
              <div class="col-sm-offset-2 col-sm-8">
                <h3 class="text-center"> <small class="mensaje"></small></h3>
              </div>
              <div class="table-responsive col-sm-12">
                <table id="dt_cliente" class="table table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Familia</th>
                      <th>Nombre</th>
                      <th>Presentacion</th>
                      <th>Existencia</th>
                      <th>Cantidad</th>
                      <th></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    </div>





<script type="text/javascript">

  $(document).on("ready", function(){
    listar();
    obtenerData();
  });

  var listar = function(){
    var table = $("#dt_cliente").DataTable({
        "ajax":{
          "method": "POST",
          "url": "/aalmma-viejo/farmacos/mijson"
        },"responsive": true,
         "ordering": false,
        "columns":[
            {"data":"familia"},
            {"data":"formula"},
            {"data":"presentacion"},
            {"data":"Existencia"},
            {"data":"gramaje"},
            {"defaultContent": "<a href='#' class='editar'>Agregar</a>"}
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ farmacos",
            "zeroRecords": "No se ha encontrado ningún farmaco",
            "info": "Se muestra la página _PAGE_ de _PAGES_",
            "infoEmpty": "o se ha encontrado ningún farmaco",
            "infoFiltered": "(Filtrado de _MAX_ farmacos totales)",
            "search": "Buscar:",
            "paginate": {
              "first":      "Primera página",
              "last":       "Ultima página",
              "next":       "Siguiente",
              "previous":   "Anterior"
            }
        }
    });
    obtenerData("#dt_cliente tbody",table);
  }
  consultorio_id = $('h3.consultorioid').text();

    var obtenerData = function (tbody, table){
      $(tbody).on("click","a.editar",function(){
        var data = table.row($(this).parents("tr")).data();
        if (data["Existencia"]==0) {
          alert("El farmaco no tiene existencias...");
          die();
        }
         window.location.replace("<?php  echo Router::url('/', true);  ?>farmacos/view/" + data['id'] + "?consultorio="+consultorio_id);
      })
    }
</script>


