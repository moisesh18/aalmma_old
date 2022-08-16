<?php echo $this->Html->script(array('addtocart.js', 'cart.js', 'jquery.animate-colors'), array('inline' => false)); ?>


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php echo $this->Form->create('Receta', array('role' => 'form', 'novalidate')); ?>
                <fieldset>
                    <legend><?php echo __('Crear Receta'); ?></legend>
                <?php
                    echo $this->Form->input('padecimiento_actual', array('class' => 'form-control', 'label' => 'Padecimiento actual'));
                ?>       
                </fieldset>

                <?php echo $this->Form->create('Farmaco', array('type' => 'GET', 'class' => 'navbar-form navbar-left', 'url' => array('controller' => 'farmacos', 'action' => 'search'))); ?>
                <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control s', 'autocomplete' => 'off', 'placeholder' => 'Agregar farmacos...')); ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                 <span class="glyphicon glyphicon-plus"></span> Ver lista de farmacos</button>
                <p>
                <?php echo $this->Form->end(array('label' => 'Crear Receta', 'class' =>'btn btn-success')); ?>
                </p>
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
            <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                </div>
                <button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
              </div>
            </form>
            <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
            <div class="outer_div" > 
            <?php echo $this->element('table', array("recetas" => $recetas));  ?>
            </div><!-- Datos ajax Final -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            
          </div>
        </div>
      </div>
    </div>