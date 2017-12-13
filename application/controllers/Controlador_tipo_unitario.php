<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_tipo_unitario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tipo_unitario');
	}
	public function index()
	{
		$this->load->view('tipo_unitario_view');
	}
	public function listar_tipo_unitario()
	{
		$r = $this->model_tipo_unitario->listar_tipo_unitario();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		//$id = $this->input->post('id');
		$nombre_tipo_u = $this->input->post('nombre_tipo_u');
		//$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre_tipo_u' => $nombre_tipo_u,
			'estadoTU' => 1,
		);
		$this->model_tipo_unitario->agregar_datos($data);
	}
	public function modificar_tipo_unitario()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre_tipo_u = $this->input->post('nombre_tipo_u');
		//$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre_tipo_u' => $nombre_tipo_u,
			//'estado' => $estado,
		);
		$this->model_tipo_unitario->modificar_tipo_unitario($id,$data);
	}
	public function buscar_tipo_unitario()
	{
		$id = $this->input->post('id');
		$r = $this->model_tipo_unitario->buscar_tipo_unitario($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoTU' => 0 );
		$this->model_tipo_unitario->modificar_tipo_unitario($id,$data);
		//$r = $this->model_tipo_unitario->eliminar_datos($id);
	}
	public function activar()
	{
		$id = $this->input->post('id');
		$data = array('estadoTU' => 1 );
		$this->model_tipo_unitario->modificar_tipo_unitario($id,$data);
	}
}
