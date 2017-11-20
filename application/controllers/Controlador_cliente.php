<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_cliente extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_cliente');
	}
	public function index()
	{
		$this->load->view('cliente_view');
	}
	public function listar_cliente()
	{
		$r = $this->model_cliente->listar_cliente();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		//$id = $this->input->post('id');
		$nombre_cliente = $this->input->post('nombre_cliente');
		$nit = $this->input->post('nit');
		$direccion = $this->input->post('direccion');
		$tipo_cliente = $this->input->post('tipo_cliente');
		$telefono = $this->input->post('telefono');
		$correo = $this->input->post('correo');
		$pass = $this->input->post('pass');
		$publico = $this->input->post('publico');
		$data = array(
			//'id' => $id,
			'nombre_cliente' => $nombre_cliente,
			'nit' => $nit,
			'direccion' => $direccion,
			'tipo_cliente' => $tipo_cliente,
			'telefono' => $telefono,
			'correo' => $correo,
			'pass' => "",
			'publico' => 0,
		);
		$this->model_cliente->agregar_datos($data);
	}
	public function modificar_cliente()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre_cliente = $this->input->post('nombre_cliente');
		$nit = $this->input->post('nit');
		$direccion = $this->input->post('direccion');
		$tipo_cliente = $this->input->post('tipo_cliente');
		$telefono = $this->input->post('telefono');
		$correo = $this->input->post('correo');
		$pass = $this->input->post('pass');
		$publico = $this->input->post('publico');
		$data = array(
			'id' => $id,
			'nombre_cliente' => $nombre_cliente,
			'nit' => $nit,
			'direccion' => $direccion,
			'tipo_cliente' => $tipo_cliente,
			'telefono' => $telefono,
			'correo' => $correo,
			'pass' => $pass,
			'publico' => $publico,
		);
		$this->model_cliente->modificar_cliente($id,$data);
	}
	public function buscar_cliente()
	{
		$id = $this->input->post('id');
		$r = $this->model_cliente->buscar_cliente($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$r = $this->model_cliente->eliminar_datos($id);
	}
	public function buscarCliente()
	{
		$n = $this->input->get("q");
		//$this->load->model("sql");
		$lista = $this->model_cliente->listaCliente($n);
		//$r= $this->sql->lista();
		$res = array('total_count' => "10",
	 							 'incomplete_results' => false,
							 	 'items' => $lista);
		echo json_encode($res);
	}
}
