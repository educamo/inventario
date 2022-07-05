<?Php

    class Welcome_model extends CI_model {
       
      
        public function loginUser($data) {

            $this->db->select('idUser, nombreUser, apellidoUser, email, administrador');
            $this->db->from('usuarios');
            $this->db->where('email', $data['mail']);
            $this->db->where('clave', $data['clave']);

            $query=$this->db->get();

            if ($query->num_rows()>0) {
                return $query->result();
            }else{
                return NULL;
            }

        }

     
        public function __destruct(){
            $this->db->close();
        }

    }
?> 