<?Php

defined('BASEPATH') or exit('No direct script access allowed');

class Administracion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        ## carga de	modelos
        $this->load->model(array('Administracion_model'));
    }


    public function index()
    {

        if ($this->session->userdata('idUser')) {
            $datos['productos'] = $this->Administracion_model->dasboard();

            $this->plantilla();

            $this->load->view('administracion/main', $datos);

            $this->footer();
        } else {
            redirect('Welcome');
        }
    }

    private function plantilla()
    {
        $datos['usuario'] = $this->session->nombreUsuario . ' ' . $this->session->apellidoUsuario;
        $this->load->view('administracion/head');
        $this->load->view('administracion/sidebar');
        $this->load->view('administracion/topbar', $datos);
    }

    private function footer()
    {
        $this->load->view('administracion/footer');
        $this->load->view('administracion/end');
    }

    public function listaProductos()
    {
        $productos['products'] = $this->Administracion_model->verProductos();
        $this->plantilla();

        $this->load->view('listProductos', $productos);

        $this->footer();
    }

    public function nuevoProducto()
    {
        $this->plantilla();

        $this->load->view('nuevoProducto');

        $this->footer();
    }

    public function guardarProducto()
    {

        $codigo = $this->input->post('id');

        $existeCodigo = $this->Administracion_model->buscarProducto($codigo);

        if ($existeCodigo == true) {
            $this->Administracion_model->stock($_POST);
            $this->session->set_flashdata('status', 'El Producto Ya existe, asi que se Actualizó el stock con Exito');
        } else {
            $this->Administracion_model->guardarProducto($_POST);
            $this->session->set_flashdata('status', 'Exito Producto Guardado');
        }


        redirect('Administracion/nuevoProducto');
    }

    public function stock()
    {

        $datos['productos'] = $this->Administracion_model->mostrarProductos();
        $this->plantilla();

        $this->load->view('stock', $datos);

        $this->footer();
    }

    public function guardarStock()
    {
        $this->Administracion_model->stock($_POST);
        $this->session->set_flashdata('status', 'Se ha Actualizado el Stock');

        redirect('Administracion/stock');
    }

    public function eliminarProducto()
    {
        $datos['productos'] = $this->Administracion_model->mostrarProductos();
        $this->plantilla();

        $this->load->view('eliminarProducto', $datos);

        $this->footer();
    }

    public function borrarProducto()
    {
        $id = $this->input->post('id');

        if ($this->input->post('confirmacion') == 'si') {
            $resultado = $this->Administracion_model->eliminarProducto($id);
            if ($resultado == true) {
                $this->session->set_flashdata('status', 'El producto se Elimino con exito');
            } else {
                $this->session->set_flashdata('status', 'Ocurrio un Error al Eliminar el Producto');
            }
            redirect('Administracion/eliminarProducto');
        } else {
            $datos['id'] = $id;

            $this->plantilla();

            $this->load->view('confirmacionEliminarproducto', $datos);

            $this->footer();
        }
    }

    public function actualizarProducto($id = 0)
    {
        $this->plantilla();
        $datos['productos'] = $this->Administracion_model->mostrarProductos_all($id);
        $this->load->view('actualizarProducto', $datos);
        $this->footer();
    }

    public function updateProducto()
    {
        $resultado = $this->Administracion_model->actualizarProducto($_POST);
        if ($resultado == true) {
            $this->session->set_flashdata('status', 'El producto se Actualizo con exito');
        } else {
            $this->session->set_flashdata('status', 'Ocurrio un Error al Actualizar el Producto');
        }
        redirect("Administracion/listaProductos");
    }

    public function nuevoUsuario()
    {
        $this->plantilla();

        $this->load->view('nuevoUsuario');

        $this->footer();
    }

    public function guardarUsuario()
    {
        $this->Administracion_model->guardarUsuario($_POST);
        redirect('Administracion/nuevoUsuario');
    }

    public function listUsuario()
    {
        $usuarios['users'] = $this->Administracion_model->verUsuarios();
        $this->plantilla();

        $this->load->view('listUsuario', $usuarios);

        $this->footer();
    }

    public function actualizarUsuario($id = 0)
    {
        $this->plantilla();
        $datos['usuario'] = $this->Administracion_model->mostrarUsuario($id);
        $this->load->view('actualizarUsuario', $datos);
        $this->footer();
    }
    public function updateUsuario()
    {
        $resultado = $this->Administracion_model->actualizarUsuario($_POST);
        if ($resultado == true) {
            $this->session->set_flashdata('status', 'El Usuario se Actualizo con exito');
        } else {
            $this->session->set_flashdata('status', 'Ocurrio un Error al Actualizar el Usuario');
        }
        redirect("Administracion/listUsuario");
    }


    public function nuevaFactura()
    {
        $datos['products'] = $this->Administracion_model->verProductos();
        $nFact = $this->Administracion_model->numeroFactura();
        if (isset($nFact)) {
            $datos['nf'] = $nFact->idFactura + 1;
        } else {
            $nFact = 1;
            $datos['nf'] = $nFact;
        }
        $this->plantilla();

        $this->load->view('nuevaFactura', $datos);

        $this->footer();
    }

    public function detalle()
    {
        if (!isset($total)) {
            $total = 0;
        }
        $datos = $this->input->post('datos');
        $data = explode(",", $datos);
        $data[3] = $this->session->userdata('idUser');
        $this->Administracion_model->temp($data);

        $datos = $this->Administracion_model->getTemp($data[3]);
        $html2 = '
       
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
       
       
       ';
        echo $html2;
        foreach ($datos as $producto) {
            if ($producto['cantidadTmp'] > $producto['cantidad']) {
                $this->Administracion_model->sinStock($data[3], $producto['id_producto']);
                echo "<script>alert('No hay suficiente Stock del producto');</script>";
            } else {

                $precioTotal = $producto["precio"] * $producto["cantidadTmp"];
                $total = $total + $precioTotal;


                $html = '
               
                                    <tr>
                                        <td>' . $producto["id_producto"] . '</td>
                                        <td class="text-center">' . $producto["cantidadTmp"] . '</td>
                                        <td>' . $producto["nombre"] . '</td>
                                        <td class="text-end">' . $producto["precio"] . '</td>
                                        <td class="text-end">' . $precioTotal . '</td>
                                    </tr>
                               
               
               ';

                echo $html;
            }
        }

        $html3 = '

       </tbody>
       <tfoot>
           <th colspan="3"></th>
           <th>TOTAL</th>
           <td class="text-end">' . $total . '</td>
       </tfoot>
   </table>

       
       ';
        echo $html3;
    }

    
    public function guardarFactura()
    {
        $idFactura = $_POST['nFactura'];
        $cedula = $_POST['idCliente'];
        $cliente = $_POST['cliente'];
        $fecha = $_POST['fecha'];

        $datos = array(
            'idFactura'     => $idFactura,
            'cedulaCliente' => $cedula,
            'nombreCliente' => $cliente,
            'fecha'         => $fecha,
        );

        $resultado = $this->Administracion_model->guardarFactura($datos);

        if ($resultado == true) {
            $this->session->set_flashdata('status', 'Factura guardada con exito');
        } else {
            $this->session->set_flashdata('status', 'Ocurrio un Error al Guardar la Factura');
        }
        redirect("Administracion/nuevaFactura");
    }

    public function listFacturas()
    {
        $facturas['factu'] = $this->Administracion_model->verFacturas();
        $this->plantilla();

        $this->load->view('listFacturas', $facturas);

        $this->footer();
    }

    public function logout()
    {

        $this->session->sess_destroy();

        redirect('Welcome');
    }
}

/* End of file Administracion.php */
