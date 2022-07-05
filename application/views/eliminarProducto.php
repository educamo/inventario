<!-- Begin Page Content -->
<div class="container-fluid">

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
                        Eliminar
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>Administracion/borrarProducto" method="post">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-8 text-center">
                                        <label for="id" class="form-label">Producto</label>
                                        <select class="form-select" id="id" name="id" required>
                                        <option value="">Selecciona un producto</option>
                                            <?Php
                                            foreach ($productos as $producto) {                                                
                                            ?>
                                                <option value="<?=$producto->id_producto?>"><?=$producto->nombre?></option>
                                            <?Php
                                            }
                                            ?>

                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mt-4">
                                    <input type="submit" class="btn btn-success" value="Eliminar">
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