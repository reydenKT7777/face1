<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_sucursal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_sucursal');
		$this->load->model('model_caja');
	}
	public function index()
	{
		$data["vista"] = 'administrador/sucursal_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function listar_sucursal()
	{
		$r = $this->model_sucursal->listar_sucursal();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		//$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$nit = $this->input->post('nit');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$emai = $this->input->post('emai');
		//$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre' => $nombre,
			'nit' => $nit,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'emai' => $emai,
			'estado' => 1,
		);
		$idd = $this->model_sucursal->agregar_datos($data);
		$data2 = array(
			'id' => $id,
			'id_sucursal' => $idd,
			'monto' => 0,
		);
		$this->model_caja->agregar_datos($data2);
	}
	public function modificar_sucursal()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$nit = $this->input->post('nit');
		$telefono = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');
		$emai = $this->input->post('emai');
		//$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre' => $nombre,
			'nit' => $nit,
			'telefono' => $telefono,
			'direccion' => $direccion,
			'emai' => $emai,
			//'estado' => $estado,
		);
		$this->model_sucursal->modificar_sucursal($id,$data);
	}
	public function buscar_sucursal()
	{
		$id = $this->input->post('id');
		$r = $this->model_sucursal->buscar_sucursal($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estado' => 0 );
		$r = $this->model_sucursal->modificar_sucursal($id,$data);
	}
	public function activar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estado' => 1 );
		$r = $this->model_sucursal->modificar_sucursal($id,$data);
	}
}
