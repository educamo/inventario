<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ventas/Nueva</h1>
    </div>

    <div class="row">

        <?Php
        if ($this->session->flashdata('status')) :
        ?>

            <div class="alert alert-success">
                <?= $this->session->flashdata('status'); ?>


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
                        Facturar
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>Administracion/guardarFactura" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="nFactura" class="form-label">Nº Factura</label>
                                        <input type="text" id="nFactura" name="nFactura" class="form-control" required readonly value="<?=$nf?>">
                                    </div>
                                    <div class="col-lg-4 offset-lg-4 text-end">
                                        <input type="submit" value="Guardar Factura" class="btn btn-success form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label for="idCliente" class="form-label">Cedula del Cliente</label>
                                        <input type="text" id="idCliente" name="idCliente" class="form-control" required pattern="[0-9]+" minlength="7" maxlength="8">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="cliente" class="form-label">Cliente</label>
                                        <input type="text" id="cliente" name="cliente" class="form-control" required pattern="[a-zA-Z\s]*" minlength="2" maxlength="20">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="fecha" class="form-label">Fecha</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" required value="<?php echo date("Y-m-d"); ?>" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="buscar" class="form-label">Agregar producto</label>
                                        <button type="button" class="btn-primary form-control-sm form-row" data-toggle="modal" data-target="#miModal" onclick="modal();"><i class="fa fa-search"></i> Buscar producto</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="row mt-4" id="detalle">
                            <h4>Detalle de Factura</h4>

                            <table class="table">
                                <thead class="text-center">
                                    <th>Codigo</th>
                                    <th>Cant.</th>
                                    <th>Descripcion</th>
                                    <th>Precio Unit.</th>
                                    <th>Precio Total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td class="text-center">0</td>
                                        <td></td>
                                        <td class="text-end">NETO</td>
                                        <td class="text-end">0,00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <th colspan="3"></th>
                                    <th>TOTAL</th>
                                    <td class="text-end">0,00</td>
                                </tfoot>
                            </table>


                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->


<!-- Modal -->
<div id="miModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <!-- Contenido del modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="col-lg-8text-center">Productos</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Agregar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?Php
                            foreach ($products as $producto) {
                            ?>
                                <tr>
                                    <td><?= $producto->id_producto ?></td>
                                    <td><?= $producto->nombre ?></td>
                                    <td><input type="number" name="cantidad" id="cantidad_<?= $producto->id_producto ?>" value="1" min="1"></td>
                                    <td><?= $producto->precio ?></td>
                                    <td class="text-center"><a href="#" onclick="agregar('<?= $producto->id_producto ?>', '<?= $producto->precio ?>')" class="text-primary"> <i class="fa fa-plus"></i></a></td>
                                </tr>
                            <?Php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function agregar(id, precio) {
        var cantidad=document.getElementById('cantidad_'+id).value;
        let datos = [id, cantidad, precio];

        $.ajax({
            type: "POST",
            url: "http://localhost/inventario/Administracion/detalle",
            data: "datos=" + datos,
            beforeSend: function(objeto) {
                $("#detalle").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#detalle").html(datos);
            }
        });
    }
</script>