<nav class="navbar navbar-expand-lg navbar-custom" style="background-color: #61aceb; color: #fff;">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Usuario/create_usuarios','Adicionar usuários', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> <?php echo anchor('CRUD_Usuario/retrieve_usuarios','Listar usuários', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Medico/create_medicos','Adicionar médicos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> <?php echo anchor('CRUD_Medico/retrieve_medicos','Listar médicos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Quarto/create_quartos','Adicionar quartos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Quarto/retrieve_quartos','Listar quartos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Medicamento/create_medicamentos','Adicionar medicamentos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Medicamento/retrieve_medicamentos','Listar medicamentos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Doenca/retrieve_doencas','Listar doenças', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Paciente/create_pacientes','Adicionar pacientes', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Paciente/retrieve_pacientes','Listar pacientes', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Registro/retrieve_registros','Listar registros', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Tratamento/create_tratamentos','Adicionar tratamentos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Tratamento/retrieve_tratamentos','Listar Tratamentos', array('class'=>'nav-link')); ?> 
            </li>
            <li class="nav-item"> 
                <?php echo anchor('CRUD_Usuario/logout', 'Logout', array('class'=>'nav-link')); ?> 
            </li>
        </ul>
    </div>
</nav>