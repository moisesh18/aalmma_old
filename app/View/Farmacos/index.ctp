<?php echo $this->Html->script(array('cart.js','dataTables.bootstrap.js','dataTables.buttons.min.js','jquery.dataTables.min.js'), array('inline' => false));

  echo $this->Html->css(array('dataTables.bootstrap.min','jquery.dynatable','csstables'));
?>



<div class="col-md-12">
	<div class="page-header">
		<h2><?php echo __('Lista de Farmacos'); ?></h2>
	</div>

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
          "url": "/aalmma/farmacos/mijson/1"
        },"responsive": true,
         "ordering": false,
        "columns":[
            {"data":"familia"},
            {"data":"formula"},
            {"data":"presentacion"},
            {"data":"Existencia"},
            {"data":"gramaje"},
            {"defaultContent": "<a href='#' class='editar'>editar</a>"}
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ farmacos",
            "zeroRecords": "No se ha encontrado ningún farmaco <a href='farmacos/add'>Añadelo!</a>",
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
         window.location.replace("<?php  echo Router::url('/', true);  ?>farmacos/edit/" + data['id']);      })
    }
</script>


