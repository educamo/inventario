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
<h1 class="h3 mb-2 text-gray-800">Productos/Ver</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Lista de Productos</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Accion</th>
          </tr>
        </thead>
    
        <tbody>
            <?Php
                foreach ($products as $producto) {
            ?> 
          <tr>
            <td><?=$producto->id_producto?></td>
            <td><?=$producto->nombre?></td>
            <td><?=$producto->tipo?></td>
            <td><?=$producto->cantidad?></td>
            <td><?=$producto->precio?></td>
            <td class="text-center"><a href="<?= base_url() ?>Administracion/actualizarProducto/<?=$producto->id_producto?>" class="btn btn-warning text-dark"> <i class="fa fa-edit"></i></a></td>
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