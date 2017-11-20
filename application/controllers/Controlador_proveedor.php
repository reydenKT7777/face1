<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_proveedor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_proveedor');
	}
	public function index()
	{
		//$this->load->view('proveedor_view');
		$data["vista"] = 'administrador/proveedor_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function listar_proveedor()
	{
		$r = $this->model_proveedor->listar_proveedor();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$id = $this->input->post('id');
		$nombre_prov = $this->input->post('nombre_prov');
		$direccion_prov = $this->input->post('direccion_prov');
		$telefono_prov = $this->input->post('telefono_prov');
		$nit = $this->input->post('nit');
		$nombre_encargado = $this->input->post('nombre_encargado');
		$correo = $this->input->post('correo');
		//$estado = $this->input->post('estado');
		$data = array(
			'id' => $id,
			'nombre_prov' => $nombre_prov,
			'direccion_prov' => $direccion_prov,
			'telefono_prov' => $telefono_prov,
			'nit' => $nit,
			'nombre_encargado' => $nombre_encargado,
			'correo' => $correo,
			'estado' => 1,
		);
		$this->model_proveedor->agregar_datos($data);
	}
	public function modificar_proveedor()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre_prov = $this->input->post('nombre_prov');
		$direccion_prov = $this->input->post('direccion_prov');
		$telefono_prov = $this->input->post('telefono_prov');
		$nit = $this->input->post('nit');
		$nombre_encargado = $this->input->post('nombre_encargado');
		$correo = $this->input->post('correo');
		//$estado = $this->input->post('estado');
		$data = array(
			//'id' => $id,
			'nombre_prov' => $nombre_prov,
			'direccion_prov' => $direccion_prov,
			'telefono_prov' => $telefono_prov,
			'nit' => $nit,
			'nombre_encargado' => $nombre_encargado,
			'correo' => $correo,
			//'estado' => $estado,
		);
		$this->model_proveedor->modificar_proveedor($id,$data);
	}
	public function buscar_proveedor()
	{
		$id = $this->input->post('id');
		$r = $this->model_proveedor->buscar_proveedor($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estado' => 0 );
		$this->model_proveedor->modificar_proveedor($id,$data);
		//$r = $this->model_proveedor->eliminar_datos($id);
	}
	public function activar()
	{
		$id = $this->input->post('id');
		$data = array('estado' => 1 );
		$this->model_proveedor->modificar_proveedor($id,$data);
	}
}
