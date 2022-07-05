<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		## carga de	modelos
		$this->load->model(array('Welcome_model'));

	}


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{		

		if (isset($_POST['mail']) && isset($_POST['clave'])) {
			$login = $this->Welcome_model->loginUser($_POST);
			
			if ($login) {
				$arrayUser = array(
					'idUser' 			=> $login[0]->idUser,
					'nombreUsuario' 	=> $login[0]->nombreUser,
					'apellidoUsuario'  => $login[0]->apellidoUser,
					'email'	 			=> $login[0]->email,
					'administrador' 	=> $login[0]->administrador,
				);
				$this->session->set_userdata($arrayUser);
				redirect('administracion');
			}else {
				redirect('Welcome');				
			}
			
		}

	}

	
}
