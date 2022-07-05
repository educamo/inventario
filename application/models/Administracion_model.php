<?Php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administracion_model extends CI_Model {

        public function dasboard()
        {
            $this->db->select('*');
            $this->db->from('productos');
            return $this->db->count_all_results();
        }
    
        public function verProductos()
        {
            $this->db->select('*');
            $this->db->from('productos');
            $query=$this->db->get();
            return $query->result();
        }

        public function guardarProducto($datos)
        {
            $datos = array (
                'id_producto' => $datos['id'],
                'nombre' => $datos['nombre'],
                'tipo' => $datos['tipo'],
                'cantidad' => $datos['cantidad'],
                'precio' => $datos['precio'],
            );
            
            $this->db->insert('productos', $datos);

            return true;
        }

        public function mostrarProductos(){
            $this->db->select('id_producto, nombre');
            $this->db->from('productos');
            $query= $this->db->get();
            return $query->result();
        }

        public function stock($datos)
        {

            $cantidad = $datos['cantidad'];
            $this->db->select('cantidad');
            $this->db->from('productos');
            $this->db->where('id_producto',$datos['id']);

            $query= $this->db->get();


            $stock = $query->row();
            
            
            $stock = $stock->cantidad + $cantidad;
            
            $this->db->set('cantidad', $stock);
            $this->db->where('id_producto', $datos['id']);
            $this->db->update('productos');
            return;


        }

        public function buscarProducto($id=0)
        {
            $this->db->select('id_producto');
            $this->db->from('productos');
            $this->db->where('id_producto', $id);
            $query= $this->db->get();
            $resultado = $query->row();

            if ($resultado) {
                return true;
            }else {
                return false;
            }
        }

        public function eliminarProducto($id=0)
        {
            $resultado = $this->db->delete('productos', array('id_producto' => $id));
            if ($resultado) {
                return true;
            }else {
                return false;
            }
        }

        public function mostrarProductos_all($id=0 )
        {
            $this->db->select('*');
            $this->db->from('productos');
            $this->db->where('id_producto', $id);
            $query= $this->db->get();
            return $query->row();
            
        }

        public function actualizarProducto($datos)
        {

            $data = array (
                'id_producto'   => $datos['id_producto'],
                'nombre'        => $datos['nombre'],
                'tipo'          => $datos['tipo'],
                'cantidad'      => $datos['cantidad'],
                'precio'        => $datos['precio'],
            );
           
            $this->db->where('id_producto', $datos['id']);
            
            return $this->db->update('productos', $data);
        }

        public function guardarUsuario($datos=0)
        {
            $datos = array (
                'idUser' => $datos['idUser'],
                'nombreUser' => $datos['nombreUser'],
                'apellidoUser' => $datos['apellidoUser'],
                'email' => $datos['email'],
                'clave' => $datos['clave'],
                'administrador' => $datos['administrador'],
            );
            
            $this->db->insert('usuarios', $datos);
        }

        public function verUsuarios()
        {
            $this->db->select('idUser, nombreUser, apellidoUser, email, administrador');
            $this->db->from('usuarios');
            $query = $this->db->get();
            return $query->result();
  
            
        }

        public function mostrarUsuario($id=0)
        {
            $this->db->select('idUser, nombreUser, apellidoUser, email, administrador');
            $this->db->from('usuarios');
            $this->db->where('idUser', $id);
            $query= $this->db->get();
            return $query->row();
        }
        
        public function actualizarUsuario($datos)
        {
            $data = array (
                'idUser'        => $datos['idUser'],
                'nombreUser'    => $datos['nombreUser'],
                'apellidoUser'  => $datos['apellidoUser'],
                'email'         => $datos['email'],
                'administrador' => $datos['administrador'],
            );
           
            $this->db->where('idUser', $datos['cedula']);
            
            return $this->db->update('usuarios', $data);
        }

        public function numeroFactura()
        {
            
            $this->db->select('idFactura');  
            $this->db->from('facturas');                      
            $this->db->order_by('idFactura',"desc");
            $this->db->limit(1);
            $query = $this->db->get();
            $last_record = $query->row();

            return $last_record;
            
        }

        public function temp($data)
        {
            $object = array(
                'id_producto'   => $data[0], 
                'cantidadTmp'   => $data[1], 
                'precio'        => $data[2], 
                'cedulaCliente' => $data[3], 
            );
            $this->db->insert('tempFactura', $object);
            
        }

        public function getTemp($cedula)
        {
            $this->db->select('tempFactura.id_producto, tempFactura.cantidadTmp, tempFactura.precio, productos.nombre, productos.cantidad');
            $this->db->from('tempFactura', 'tempFactura');
            $this->db->where('tempFactura.cedulaCliente', $cedula);
            $this->db->join('productos', 'tempFactura.id_producto = productos.id_producto');
            $query = $this->db->get();
            return $query->result_array();                            
        }

        public function sinStock($cedula, $id)
        {
            $this->db->delete('tempFactura', array('id_producto' => $id, 'cedulaCliente' =>$cedula));
            
            
        }

        public function guardarFactura($datos)
        {
            $id = $this->session->userdata('idUser');

            $this->db->select('tempFactura.id_producto, tempFactura.cantidadTmp, tempFactura.precio, productos.cantidad');
            $this->db->from('tempFactura');
            $this->db->where('tempFactura.cedulaCliente', $id);
            $this->db->join('productos', 'tempFactura.id_producto = productos.id_producto');
            $query = $this->db->get();
            $tmp = $query->result_array();  
           

            if ($tmp) {  

                foreach ($tmp as $dat) {
                                
                $data1 = array (
                    'id_producto'    => $dat['id_producto'],
                    'cantidad'       => $dat['cantidadTmp'],
                    'precio'         => $dat['precio'],  
                    'cantidadResta'  => $dat['cantidad'],
                );  

                $cantidadRestante = $data1['cantidadResta'] - $data1['cantidad'];

                $actualizar = array('cantidad' => $cantidadRestante, );


                $this->db->where('id_producto', $data1['id_producto']);
            
                $this->db->update('productos', $actualizar); 
            }

            unset($data1['cantidadResta']);
                     
            }else {
                return false;
                die();
            }  
            
            

            $data = array (
                'idFactura'      => $datos['idFactura'],
                'cedulaCliente'  => $datos['cedulaCliente'],
                'nombreCliente'  => $datos['nombreCliente'],
                'fecha'          => $datos['fecha'],
    
            );

            

            $data1['idFactura'] = $data['idFactura'];
            
            $this->db->insert('facturas', $data);

            $this->db->insert('detalleFactura', $data1);
            


            $this->db->delete('tempFactura', array('cedulaCliente' =>$id));

            return true;
            
        }

        public function verFacturas()
        {
            $this->db->select('idFactura, cedulaCliente, nombreCliente, fecha');
            $this->db->from('facturas');
            $query = $this->db->get();
            return $query->result();
        }

        

        public function __destruct(){
            $this->db->close();
        }

    
    }
    
    /* End of file Administracion_model.php */
    
?> 