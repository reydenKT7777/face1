<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_almacen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_almacen');
		$this->load->model('model_sucursal');
	}
	public function index()
	{
		//$this->load->view('almacen_view');
		$data["vista"] = 'administrador/almacen_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function listar_almacen()
	{
		$r = $this->model_almacen->listar_almacen();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$id_sucursal = $this->input->post('id_sucursal');
		$nombre_almacen = $this->input->post('nombre_almacen');
		$tipo_almacen = $this->input->post('tipo_almacen');
		$direccion = $this->input->post('direccion');
		$data = array(
			'id_sucursal' => $id_sucursal,
			'nombre_almacen' => $nombre_almacen,
			'tipo_almacen' => $tipo_almacen,
			'direccion' => $direccion,
			'estadoA' => 1
		);
		$this->model_almacen->agregar_datos($data);
	}
	public function modificar_almacen()
	{
		$id = $this->input->post('id_sucursal');
		$id_sucursal = $this->input->post('id_sucursal');
		$nombre_almacen = $this->input->post('nombre_almacen');
		$tipo_almacen = $this->input->post('tipo_almacen');
		$direccion = $this->input->post('direccion');
		$data = array(
			'id_sucursal' => $id_sucursal,
			'nombre_almacen' => $nombre_almacen,
			'tipo_almacen' => $tipo_almacen,
			'direccion' => $direccion,
		);
		$this->model_almacen->modificar_almacen($id,$data);
	}
	public function activa_almacen()
	{
		$id = $this->input->post('id');
		$data = array('estadoA' => 1 );
		$this->model_almacen->modificar_almacen($id,$data);
	}
	public function buscar_almacen()
	{
		$id = $this->input->post('id');
		$r = $this->model_almacen->buscar_almacen($id);
		$a = $this->model_sucursal->listar_sucursal();
		$data = array('almacen' => $r, 'suc' =>$a);
		echo json_encode($data);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoA' => 0 );
		$this->model_almacen->modificar_almacen($id,$data);
		//$r = $this->model_almacen->eliminar_datos($id);
	}
}
