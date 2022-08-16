<!--
['id']
$pacientereceta['Paciente']['dismenorrea'] -->

<?php //debug($paciente); debug($orden_items);?>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo __('Datos Personales'); ?></h3>
        </div>
        <div class="panel-body">
          <dt><?php echo __('id'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['id']); ?>
            &nbsp;
          </dd>
          <?php echo ("El paciente fue creado por: "); echo h($paciente['Paciente']['Creador']);; ?>
          <dt><?php echo __('Nombre'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Nombre']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Consultorio'); ?></dt>
          <dd>
            <?php echo h($paciente['Consultorio']['consultorio_nombre']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Sexo'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Sexo']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Fecha De Nacimiento'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Fecha de Nacimiento']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Edad'); ?></dt>
          <dd>
            <?php echo (2017-$paciente['Paciente']['Fecha de Nacimiento'])?> años
            &nbsp;
          </dd>
          <dt><?php echo __('Direccion'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Direccion']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Ciudad'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Ciudad']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('creado'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['created']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('modificad'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['modified']); ?>
            &nbsp;
          </dd>
          <!--
          <dt><?php echo __('Diagnostico'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['diagnostico']); ?>
            &nbsp;
          </dd>
          -->
        </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-4">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo __('Datos Clinicos'); ?></h3>
        </div>
        <div class="panel-body">
          <dt><?php echo __('Motivo De Consulta'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Motivo de Consulta']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('APF'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['APF']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('APP'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['APP']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Presion Arterial'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Presion Arterial']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Temperatura'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Temperatura']); ?>
            &nbsp;
          </dd>
          <dt> <?php echo __('Temperatura'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Temperatura']); ?>
            &nbsp;
          </dd>
          <?php if($paciente['Paciente']['Condicion Ayunas']==true): ?>
          &nbsp;
          <dd>El paciente <strong>NO </strong> se encontraba en ayunas</dd>
          <?php endif; ?>
          <?php if($paciente['Paciente']['Condicion Casual']==true): ?>
          <dd>El paciente <strong>NO </strong> se encontraba en reposo
          <dd>
            &nbsp;
            <?php endif; ?>
          <dt><?php echo __('Frecuencia Cardiaca'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Frecuencia Cardiaca']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Frecuencia Respiratoria'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Frecuencia Respiratoria']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Glucosa'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Glucosa']); ?>
            &nbsp;
          </dd>
          <?php if ($paciente['Orden']!=null): ?>
          <dt><?php echo __('Padecimiendo Actual'); ?></dt>
          <dd>
            <?php echo h($paciente['Orden'][0]['exploracion_fisica']); ?>
            &nbsp;
          </dd>
          <?php endif; ?>


        </div>
      </div>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo __('Datos Antropometricos'); ?></h3>
        </div>
        <div class="panel-body">
          <dt><?php echo __('Altura'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Altura']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Peso'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Peso']); ?>
            &nbsp;
          </dd>
          <dt><?php echo ("IMC"); ?></dt>
          <dd>
            <?php echo ($paciente['Paciente']['Peso'])/($paciente['Paciente']['Altura']*$paciente['Paciente']['Altura']) ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Cintura'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['Cintura']); ?>
            &nbsp;
          </dd>
        </div>
      </div>
      <?php if ($paciente['Paciente']['Sexo']=='F'): ?>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo __('Datos Ginecologicos'); ?></h3>
        </div>
        <div class="panel-body">
          <dt><?php echo __('FUM'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['FUM']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Menarca'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['menarca']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Ciclo Dia'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['ciclo dia']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Ciclo Duracion'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['ciclo duracion']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Dismenorrea'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['dismenorrea']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('G'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['G']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('P'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['P']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('A'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['A']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('C'); ?></dt>
          <dd>
            <?php echo h($paciente['Paciente']['C']); ?>
            &nbsp;
          </dd>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <!-- /.col-sm-4 -->
    <div class="col-sm-12">
      <?php if ($paciente['Orden']!=null): ?>
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo __('Receta'); ?></h3>
        </div>
        <div class="panel-body">
          <dt><?php echo __('Exploracion fisica:'); ?></dt>
          <dd>
            <?php echo h($paciente['Orden'][0]['exploracion_fisica']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Padecimiento actual:'); ?></dt>
          <dd>
            <?php echo h($paciente['Orden'][0]['padecimiento_actual']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Fecha de llegada:'); ?></dt>
          <dd>
            <?php echo h($paciente['Orden'][0]['created']); ?>
            &nbsp;
          </dd>
          <dt><?php echo __('Fecha de ultima modificacion:'); ?></dt>
          <dd>
            <?php echo h($paciente['Orden'][0]['modified']); ?>
            &nbsp;
          </dd>
          <?php
          if($paciente['Orden'][0]['despachado']==true){
            echo '<dt> Receta despachada <dt>';
          }

           ?>

    <?php if(count($orden_items) > 0): ?>
      <div class="col-md-12">
        <table class="table table-striped">
        <thead>
          <h2>Farmacos:</h2>
        <tr>
            <th><?php echo 'nombre'; ?></th>
            <th><?php echo 'Cantidad'; ?></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($orden_items as $ordenitem): ?>
        <tr>
          <td><?php echo utf8_encode($ordenitem['Farmaco']['formula']); ?></td>
          <td><?php echo h($ordenitem['OrdenItem']['cantidad']); ?></td>
        </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
      </div>
          <?php endif; ?>



        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
