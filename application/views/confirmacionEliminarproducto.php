<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos/Eliminar</h1>
    </div>
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


        <div class="row">

            <div class="col-lg-12">

                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-header">
                        Confirmacion para Eliminar
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>Administracion/borrarProducto" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 text-center">
                                        <label for="id" class="form-label" hidden>Producto</label>
                                        <input type="text" id="id" name="id" value="<?=$id?>" hidden>
                                        <input type="text" id="confirmacion" name="confirmacion" value="si" hidden>
                                    </div>
                                    <p class="col-lg-12 text-center text-danger">Esta Seguro de querer Eliminar el Producto?</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4">
                                    <input type="submit" class="btn btn-success" value="Aceptar">
                                    <a href="<?= base_url() ?>Administracion/eliminarProducto" class="btn btn-danger">Cancelar</a>
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