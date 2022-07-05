<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>Administracion">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventario</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>Administracion">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-box"></i>
          <span>Productos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administracion</h6>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/listaProductos">Ver</a>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/nuevoProducto">Nuevo</a>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/stock">Stock</a>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/eliminarProducto">Eliminar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar:</h6>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/listUsuario">Registros</a>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/nuevoUsuario">nuevo</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepago" aria-expanded="true" aria-controls="collapsepago">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Ventas</span>
        </a>
        <div id="collapsepago" class="collapse" aria-labelledby="headingpago" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar:</h6>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/nuevaFactura">Facturar</a>
            <a class="collapse-item" href="<?= base_url() ?>Administracion/listFacturas">Lista de Facturas</a>
          </div>
        </div>
      </li>

   


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->