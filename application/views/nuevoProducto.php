<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos/Nuevo</h1>
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
                        Agregar Producto
                    </div>
                    <div class="card-body">
                    <form action="<?= base_url() ?>Administracion/guardarProducto" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="id" class="form-label">Codigo Del producto</label>
                                        <input type="text" id="id" name="id" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nombre" class="form-label">Nombre Del producto</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="tipo" class="form-label">Tipo De producto</label>
                                        <input type="text" id="tipo" name="tipo" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="cantidad" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="0" pattern="^[0-9]+" min="0">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="precio" class="form-label">Precio</label>
                                        <input type="number" class="form-control" id="precio" name="precio" value="0" pattern="^[0-9]+" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4">
                                    <input type="submit" class="btn btn-success" value="Guardar">
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