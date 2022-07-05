 <!-- Begin Page Content -->
 <div class="container-fluid">

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

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Usuarios/Ver</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Num Factura</th>
            <th>Cedula del Cliente</th>
            <th>Nombre Cliente</th>
            <th>Fecha</th>
            <th>Accion</th>
          </tr>
        </thead>
    
        <tbody>
            <?Php
                foreach ($factu as $factura) {
                    
            ?> 
          <tr>
            <td><?=$factura->idFactura?></td>
            <td><?=$factura->cedulaCliente?></td>
            <td><?=$factura->nombreCliente?></td>
            <td><?=$factura->fecha?></td>
            <td class="text-center">
                <a href="<?= base_url() ?>Administracion/mostrarFactura/<?=$factura->idFactura?>" class="btn btn-warning text-ligth"> <i class="fa fa-search"></i></a>
            
            </td>
          </tr>
          <?Php
              }
          ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->