<nav class="navbar navbar-expand-lg navbar-custom" style="background-color: #61aceb; color: #fff;">
    <img width="40px" height="40px" src="../imagens/hospital.png">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Adicionar </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php echo anchor('CRUD_Medicamento/create_medicamentos','Medicamentos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Medico/create_medicos','Médicos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Paciente/create_pacientes','Pacientes', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Quarto/create_quartos','Quartos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Tratamento/create_tratamentos','Tratamentos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Usuario/create_usuarios','Usuários', array('class'=>'dropdown-item a_dropdown')); ?>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Listar </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php echo anchor('CRUD_Doenca/retrieve_doencas','Doenças', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Medicamento/retrieve_medicamentos','Medicamentos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Medico/retrieve_medicos','Médicos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Paciente/retrieve_pacientes','Pacientes', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Quarto/retrieve_quartos','Quartos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Tratamento/retrieve_tratamentos','Tratamentos', array('class'=>'dropdown-item a_dropdown')); ?> 
                    <?php echo anchor('CRUD_Usuario/retrieve_usuarios','Usuários', array('class'=>'dropdown-item a_dropdown')); ?> 
                </div>
            </li>
            <li class="nav-item">
                <?php echo anchor('CRUD_Usuario/logout', 'Logout', array('class'=>'nav-link')); ?> 
            </li>
        </ul>
    </div>
</nav>