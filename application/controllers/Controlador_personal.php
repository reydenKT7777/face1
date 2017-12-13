<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_personal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_personal');
		$this->load->model('model_sucursal');
	}
	public function index()
	{
		$this->verificar();
		$data["vista"] = 'administrador/personal_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function verificar()
	{
		if (!($this->session->ci)) {
			redirect(base_url()."index.php/admin/login",'refresh');
		}
	}
	public function listar_personal()
	{
		$r = $this->model_personal->listar_personal();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$ci = $this->input->post('ci');
		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$celular = $this->input->post('celular');
		$cargo = $this->input->post('cargo');
		$direccion = $this->input->post('direccion');
		$usuario = $this->input->post('usuario');
		$password = $this->input->post('password');
		$id_sucursal = $this->input->post('id_sucursal');
		$data = array(
			'ci' => $ci,
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'fecha_nacimiento' => $fecha_nacimiento,
			'celular' => $celular,
			'direccion' => $direccion,
			'cargo' => $cargo,
			'usuario' => $usuario,
			'password' => sha1($password),
			'id_sucursal' => $id_sucursal,
			'estadoPer' => 1
		);
		$this->model_personal->agregar_datos($data);
	}
	public function modificar_personal()
	{
		$id = $this->input->post('ci');
		$ci = $this->input->post('ci');
		$nombres = $this->input->post('nombres');
		$apellidos = $this->input->post('apellidos');
		$fecha_nacimiento = $this->input->post('fecha_nacimiento');
		$celular = $this->input->post('celular');
		$direccion = $this->input->post('direccion');
		$cargo = $this->input->post('cargo');
		$usuario = $this->input->post('usuario');
		$password = $this->input->post('password');
		$id_sucursal = $this->input->post('id_sucursal');
		if ($password == "") {
			$data = array(
				'ci' => $ci,
				'nombres' => $nombres,
				'apellidos' => $apellidos,
				'fecha_nacimiento' => $fecha_nacimiento,
				'celular' => $celular,
				'direccion' => $direccion,
				'cargo' => $cargo,
				'usuario' => $usuario,
				//'password' => $password,
				'id_sucursal' => $id_sucursal,
			);
		}
		else {
			$data = array(
				'ci' => $ci,
				'nombres' => $nombres,
				'apellidos' => $apellidos,
				'fecha_nacimiento' => $fecha_nacimiento,
				'celular' => $celular,
				'direccion' => $direccion,
				'cargo' => $cargo,
				'usuario' => $usuario,
				'password' => sha1($password),
				'id_sucursal' => $id_sucursal,
			);
		}

		$this->model_personal->modificar_personal($id,$data);
	}
	public function buscar_personal()
	{
		$id = $this->input->post('id');
		$r = $this->model_personal->buscar_personal($id);
		$s = $this->model_sucursal->listar_sucursal();
		$data = array('user' => $r, 'suc' =>$s);
		echo json_encode($data);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoPer' => 0 );
		$this->model_personal->modificar_personal($id,$data);
		//$r = $this->model_personal->eliminar_datos($id);
	}
	public function activar()
	{
		$id = $this->input->post('id');
		$data = array('estadoPer' => 1 );
		$this->model_personal->modificar_personal($id,$data);
	}
}
