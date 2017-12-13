<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_personal");
		$this->load->model("model_sucursal");
		$this->load->model("model_cliente");
		$this->load->model("model_pedido_cli");
	}
	public function index()
	{
		if ($this->session->nombres) {
			$this->inicio();
		}
		else {
			$data["vista"] = 'cliente/inicio';
			$data["v1"] = "active";
			$data["v2"] = "";
			$this->load->view('frontend/mainCliente',$data);
		}
	}
	public function productos()
	{
		$data["vista"] = 'cliente/productos';
		$data["v1"] = "";
		$data["v2"] = "active";
		$data["v3"] = "";
		$data["sucursales"] = $this->model_sucursal->listar_sucursal();
		$this->load->view('frontend/mainCliente',$data);
	}
	public function registrarse()
	{
		$data["vista"] = 'cliente/registro';
		$data["v1"] = "";
		$data["v2"] = "";
		$data["v3"] = "";
		$this->load->view('frontend/mainCliente',$data);
	}
	public function registrar()
	{
		$nombre_cliente = $this->input->post("nombre_cliente");
		$nit = $this->input->post("nit");
		//$direccion = $this->input->post("direccion");
		$telefono = $this->input->post("telefono");
		$correo = $this->input->post("correo");
		$pass = $this->input->post("pass");
		$data = array('nombre_cliente' => $nombre_cliente,
									'nit' => $nit,
									//'direccion' => $direccion,
									'tipo_cliente' => 'minorista',
									'telefono' => $telefono,
									'correo' => $correo,
									'pass' => md5($pass),
									'publico' => 1
								);
		$this->model_cliente->agregar_datos($data);
		//////////////////////////////////////////////////////7
		//cargamos la libreria email de ci
			$this->load->library("email");

			//configuracion para gmail
			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'echgutierrez@gmail.com',
				'smtp_pass' => 'ga-alizee',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);

			//cargamos la configuración para enviar con gmail
			$this->email->initialize($configGmail);

			$this->email->from('Server');
			$this->email->to($this->input->post("correo"));
			$this->email->subject('Bienvenido/a nuestra red de librerias');
			$this->email->message('<h2>Bienvenido a nuestra red de librerias</h2><hr><br> Usuario: '.$correo." <br>
				Contraseña: ".$pass." <br> Ahora puedes acceder a nuestros servicios!!");
			//Enviar correo
			$this->email->send();
		//Mostrar los resultados
		$data["vista"] = 'cliente/registroCorrecto';
		$data["v1"] = "";
		$data["v2"] = "";
		$data["v3"] = "";
		$data["us"] = $correo;
		$data["ps"] = $pass;
		$this->load->view('frontend/mainCliente',$data);
	}
	public function login()
	{
		$this->load->view('frontend/login');
	}
	public function log()
	{
		$usr = $this->input->post("usr");
		$pas = $this->input->post("pas");
		$r = $this->model_personal->log($usr,$pas);
		if ($r != false) {
			foreach ($r as $row) {
				$this->session->set_userdata("ci",$row->ci);
				$this->session->set_userdata("nombres",$row->nombres);
				$this->session->set_userdata("apellidos",$row->apellidos);
				$this->session->set_userdata("cargo",$row->cargo);
				$this->session->set_userdata("id_sucursal",$row->id);
				$this->session->set_userdata("sucursal",$row->nombre);
				$cargo = $row->cargo;
			}
			if ($cargo == "Super administrador") {
				redirect(base_url()."index.php/admin/administrador",'refresh');
			}
			if ($cargo == "Administrador") {
				redirect(base_url()."index.php/admin/administrador",'refresh');
			}
			if ($cargo == "Almacenero") {
				redirect(base_url()."index.php/admin/almacenero",'refresh');
			}
			if ($cargo == "Vendedor") {
				/*$data["vista"] = 'sistema/vendedor';
				$this->load->view('frontend/main',$data);*/
				redirect(base_url()."index.php/admin/vendedor",'refresh');
			}
			if ($cargo == "Cajero") {
				redirect(base_url()."index.php/admin/cajero",'refresh');
			}
		}
		if ($r == false) {
			$r2 = $this->model_cliente->log($usr,$pas);
			if ($r2 != false) {
				foreach ($r2 as $row) {
					$this->session->set_userdata("nombres",$row->nombre_cliente);
					$this->session->set_userdata("nit",$row->nit);
					$this->session->set_userdata("correo",$row->correo);
					$this->session->set_userdata("id_cliente",$row->id);
					redirect(base_url()."index.php/admin/inicio",'refresh');
				}
			}
			else {
				$data["error"]="El usuario o contraseña son incorrectos!!";
				$this->load->view('frontend/login',$data);
			}
		}

	}
	public function inicio()
	{
		$data["vista"] = 'cliente/inicioCliente';
		$data["v1"] = "active";
		$data["v2"] = "";
		$data["v3"] = "";
		$this->load->view('frontend/mainCliente',$data);
	}
	public function misPedidos()
	{
		$data["vista"] = 'cliente/misPedidos';
		$data["v1"] = "";
		$data["v2"] = "";
		$data["v3"] = "active";
		$data["misPedidos"] = $this->model_pedido_cli->buscarPedidosCliente();
		$this->load->view('frontend/mainCliente',$data);
	}
	public function vendedor()
	{
		$this->verificar();
		$data["vista"] = 'sistema/vendedor';
		$this->load->view('frontend/main',$data);
	}
	public function almacenero()
	{
		$this->verificar();
		$data["vista"] = 'sistema/almacenero';
		$this->load->view('frontend/main',$data);
	}
	public function administrador()
	{
		$this->verificar();
		$data["vista"] = 'administrador/admin';
		$this->load->view('frontend/main_admin',$data);
	}
	public function cajero()
	{
		$this->verificar();
		$data["vista"] = 'sistema/cajero';
		$this->load->view('frontend/main',$data);
	}
	public function verificar()
	{
		if (!($this->session->ci)) {
			redirect(base_url()."index.php/admin/login",'refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}

}
