    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hide-offline" href="<?php echo Router::url('/'); ?>">Brigadas Médicas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Recepción <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo$this->Html->link('Lista Pacientes',array('controller'=>'pacientes', 'action'=>'index'),array('class'=>'hide-offline')); ?></li>
                <li><?php echo$this->Html->link('Nuevo Paciente',array('controller'=>'pacientes', 'action'=>'add'),array('class'=>'hide-offline')); ?></li>
              </ul>
            </li>
                <li><?php echo$this->Html->link(' Consultorios',array('controller'=>'consultorios', 'action'=>'index'),array('class'=>'hide-offline')); ?></li>
            <li><?php echo$this->Html->link('Farmacia',array('controller'=>'ordens', 'action'=>'index'),array('class'=>'hide-offline')); ?></li>
            <li><a href="http://192.168.0.2/phpfreechat-1.7/demo/demo28_blune_theme.php" target="_blank" class="hide-offline">CHAT</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Lista de Farmacos <span class="caret"></span></a>
              <ul class="dropdown-menu ">
            <li><?php echo$this->Html->link('Farmacos',array('controller'=>'farmacos', 'action'=>'index'),array('class'=>'hide-offline')); ?></li>
            <li><?php echo$this->Html->link('Nuevo farmaco',array('controller'=>'farmacos', 'action'=>'add'),array('class'=>'hide-offline')); ?></li>
              </ul>
            </li>
<!--
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
-->
            </li>
          </ul>
        </div>
      </div>
    </nav>
