<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_tipo_producto extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tipo_producto');
	}
	public function index()
	{
		$this->load->view('tipo_producto_view');
	}
	public function listar_tipo_producto()
	{
		$r = $this->model_tipo_producto->listar_tipo_producto();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		//$id = $this->input->post('id');
		$nombre_tipo_p = $this->input->post('nombre_tipo_p');
		//$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre_tipo_p' => $nombre_tipo_p,
			'estadoTP' => 1,
		);
		$this->model_tipo_producto->agregar_datos($data);
	}
	public function modificar_tipo_producto()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre_tipo_p = $this->input->post('nombre_tipo_p');
		$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre_tipo_p' => $nombre_tipo_p,
			//'estado' => $estado,
		);
		$this->model_tipo_producto->modificar_tipo_producto($id,$data);
	}
	public function buscar_tipo_producto()
	{
		$id = $this->input->post('id');
		$r = $this->model_tipo_producto->buscar_tipo_producto($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoTP' => 0 );
		$this->model_tipo_producto->modificar_tipo_producto($id,$data);
		//$r = $this->model_tipo_producto->eliminar_datos($id);
	}
	public function activar()
	{
		$id = $this->input->post('id');
		$data = array('estadoTP' => 1 );
		$this->model_tipo_producto->modificar_tipo_producto($id,$data);
	}
}
