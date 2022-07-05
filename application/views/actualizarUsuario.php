<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios/Actualizar</h1>
    </div>

    <div class="row">

    <?Php
        if ($this->session->flashdata('status')) :
    ?> 

    <div class="alert alert-success">
        <?=$this->session->flashdata('status');?>

        
    </div>

    <?Php

        header('Refresh: 2');
        endif;
    ?> 


        <div class="row">

            <div class="col-lg-12">

                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-header">
                        Actualizar Datos del Usuario
                    </div>
                    <div class="card-body">
                    <form id="frmActualizar" action="<?= base_url() ?>Administracion/updateUsuario" method="post" onsubmit="funcionSubmit(event)">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="idUser" class="form-label">Cedula del Usuario</label>
                                        <input type="text" id="idUser" name="idUser" class="form-control" required pattern="[0-9]+" minlength="7" maxlength="8" value="<?=$usuario->idUser?>">
                                        <input type="hidden" id="cedula" name="cedula" class="form-control" required pattern="[0-9]+" minlength="7" maxlength="8" value="<?=$usuario->idUser?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nombreUser" class="form-label">Nombre del Usuario</label>
                                        <input type="text" id="nombreUser" name="nombreUser" class="form-control" required pattern="[a-zA-Z\s]*" minlength="2" maxlength="20" value="<?=$usuario->nombreUser?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="apellidoUser" class="form-label">Apellido del Usuario</label>
                                        <input type="text" id="apellidoUser" name="apellidoUser" class="form-control" required pattern="[a-zA-Z\s]*" minlength="2" maxlength="20" value="<?=$usuario->apellidoUser?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required value="<?=$usuario->email?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="administrador" class="form-label">Administrador</label>
                                        <select name="administrador" id="administrador" class="form-select">
                                            <option value="0" <?php if ($usuario->administrador == 0)  echo 'selected'?>>Usuario</option>
                                            <option value="1" <?php if ($usuario->administrador == 1)  echo 'selected'?>>Administrador</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4">
                                    <input type="submit" class="btn btn-success" value="Guardar">
                                    <a href="<?=base_url('Administracion/listUsuario')?>" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>



            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
    <!-- End of Main Content -->
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>