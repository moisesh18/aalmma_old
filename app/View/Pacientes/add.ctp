<style type="text/css">
.oculto{
    display:none;
}

.red{
    color:red;
    font-size: 1.5em;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('#PacienteSexo').change(function() {
        var selectedValue = $(this).val();
        if(selectedValue  === 'Femenino') {
            $('.if_active').toggleClass('oculto');
        } else if (selectedValue === 'Masculino') {
            $('.if_active').toggleClass('oculto');
        }
    });
});
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->create('Paciente', array('role' => 'form', 'novalidate')); ?>
                <fieldset>
                    <legend><?php echo __('Añadir Paciente'); ?></legend>
                    <p class="red hide">Si el paciente va a dos consultorios, despues de crear este paciente, en la siguiente pagina, presiona CONTROL + F, busca tu paciente y haz clic en  "duplicar paciente" y cambia lo que necesites</p>
                <?php
                    echo $this->Form->input('Creador', array('class' => 'form-control', 'label' => 'Escribe aqui tu nombre'));
                    echo $this->Form->input('Nombre', array('class' => 'form-control', 'label' => 'Nombre del paciente'));
                ?>

                <div class="row">
                    <div class="col-md-6">
                    <?php
                        echo $this->Form->input('Sexo', array('class' => 'form-control', 'label' => 'Sexo', 'type' => 'select','options' => array('M'=>'Masculino','F'=>'Femenino')));
                     ?>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="padding-top: 20px;">
                            <?php echo $this->Form->input('Fecha de Nacimiento', array(
                                'class' => 'form-control',
                                'placeholder' => 'Fecha de Nacimiento',
                                'div' => array('class' => 'form-inline'),
                                'between' => '  <div class="form-group" style="padding-left: 20px;">   ',
                                'separator' => '  </div><div class="form-group" style="padding-left: 20px;">  ',
                                'after' => '  </div>  ',
                                'type'=>'date',
                                'dateFormat' => 'DMY',
                                'empty' => true,
                                'minYear' => date('Y')-100,
                                'maxYear' =>date('Y')-0,
                                'label' => 'Fecha de Nacimiento'
                            ));?>
                        </div>
                    </div>
                </div>

                <?php
                    echo $this->Form->input('Direccion', array('class' => 'form-control', 'label' => 'Colonia'));
                    echo $this->Form->input('Ciudad', array('class' => 'form-control', 'label' => 'Ciudad','default' => ''));
//'type' => 'select','options' => array('Ruiz, Nayarit'=>'Ruiz, Nayarit'
                    echo $this->Form->input('Motivo de Consulta', array('rows' =>'5', 'class' => 'form-control', 'label' => 'Motivo de Consulta'));
                    echo $this->Form->input('APF', array('class' => 'form-control', 'label' => 'Antecedentes Patologicos Familiares','rows' =>5));
                    echo $this->Form->input('APP', array('class' => 'form-control', 'label' => 'Antecedentes Patologicos Personales','rows' =>5));
                    ?>
                    <div class="if_active oculto">
                        <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group" style="padding-top: 20px;">
                                <?php echo $this->Form->input('FUM', array(
                                    'class' => 'form-control',
                                    'div' => array('class' => 'form-inline'),
                                    'between' => '  <div class="form-group" style="padding-left: 20px;">   ',
                                    'separator' => '  </div><div class="form-group" style="padding-left: 20px;">  ',
                                    'after' => '  </div>  ',
                                    'type'=>'date',
                                    'dateFormat' => 'DMY',
                                    'empty' => true,
                                    'minYear' => date('Y')-100,
                                    'maxYear' =>date('Y')-0,
                                    'label' => 'Fecha Ultima Menstruación'
                                ));?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="padding-top: 20px;">
                                <?php echo $this->Form->input('menarca', array(
                                    'class' => 'form-control',
                                    'placeholder' => 'menarca',
                                    'div' => array('class' => 'form-inline'),
                                    'between' => '  <div class="form-group" style="padding-left: 20px;">   ',
                                    'separator' => '  </div><div class="form-group" style="padding-left: 20px;">  ',
                                    'after' => '  </div>  ',
                                    'type'=>'date',
                                    'dateFormat' => 'DMY',
                                    'empty' => true,
                                    'minYear' => date('Y')-100,
                                    'maxYear' =>date('Y')-0,
                                    'label' => 'Menarca (primera menstruación)'
                                ));?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="display:inline-block">
                        <?php echo $this->Form->input('ciclo duracion', array('class' => 'form-control', 'label' => 'Ritmo')); ?>
                        </div>
                        <div clas="col-md-2" style="display:inline-block">
                        <?php echo $this->Form->input('G', array('class' => 'form-control', 'label' => 'Gestas')); ?>
                        </div>
                        <div clas="col-md-2" style="display:inline-block">
                        <?php echo $this->Form->input('P', array('class' => 'form-control', 'label' => 'Partos')); ?>
                        </div>
                        <div clas="col-md-2" style="display:inline-block">
                        <?php echo $this->Form->input('A', array('class' => 'form-control', 'label' => 'Abortos')); ?>
                        </div>
                        <div clas="col-md-3" style="display:inline-block">
                        <?php echo $this->Form->input('C', array('class' => 'form-control', 'label' => 'Cesareas')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="width:50%; padding-left: 20px;">
                            <?php
                                echo $this->Form->input('dismenorrea', array('div' => false, 'label' => false, 'type' => 'checkbox', 'before' => '<label class="checkbox">', 'after' => 'Disminorrea'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Altura', array('class' => 'form-control', 'label' => 'Altura (Centimetros)', 'default' => '1')); ?>
                    </div>
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Peso', array('label' => 'Peso (kgs)','class' => 'form-control', 'default' => '0')); ?>
                    </div>
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Temperatura', array('class' => 'form-control', 'label' => 'Temperatura', 'default' => '0')); ?>
                    </div>
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Cintura', array('class' => 'form-control', 'label' => 'Cintura', 'default' => '0')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Presion Arterial', array('class' => 'form-control', 'label' => 'Presion Arterial', 'default' => '0')); ?>
                    </div>
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Frecuencia Cardiaca', array('class' => 'form-control', 'label' => 'Frecuencia Cardiaca', 'default' => '0')); ?>
                    </div>
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Frecuencia Respiratoria', array('class' => 'form-control', 'label' => 'Frecuencia Respiratoria', 'default' => '0')); ?>
                    </div>
                    <div class="col-md-3">
                    <?php echo $this->Form->input('Glucosa', array('class' => 'form-control', 'label' => 'Glucosa', 'default' => '0')); ?>
                    </div>

                </div>
                    <div class="form-group">
                        <div style="width:50%; padding-left: 20px; display:inline-block;">
                            <?php echo $this->Form->input('Condicion Casual', array('div' => false, 'label' => false, 'type' => 'checkbox', 'before' => '<label class="checkbox">', 'after' => '<strong>NO</strong> se encuentra en reposo')); ?>
                        </div>
                        <div style="width:50%; padding-left: 20px;  display:inline-block;">
                            <?php echo $this->Form->input('Condicion Ayunas', array('div' => false, 'label' => false, 'type' => 'checkbox', 'before' => '<label class="checkbox">', 'after' => '<strong>NO</strong> se encuentra en ayunas')); ?>
                        </div>
                    </div>
                    <?php
                    //echo $this->Form->input('diagnostico', array('class' => 'form-control', 'rows' =>'5', 'label' => 'Diagnostico'));
                    echo $this->Form->input('consultorio_id', array('class' => 'form-control', 'label' => 'Envio a:'));
                ?>
                </fieldset>
                <p>
                <?php echo $this->Form->end(array('label' => 'Crear Paciente', 'class' =>'btn btn-success')); ?>
                </p>
            </div>
        </div>
    </div>
</div>
