<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_caja extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_caja');
	}
	public function index()
	{
		//$this->load->view('caja_view');
		$data["vista"] = 'administrador/caja_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function listar_caja()
	{
		$r = $this->model_caja->listar_caja();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$id = $this->input->post('id');
		$id_sucursal = $this->input->post('id_sucursal');
		$monto = $this->input->post('monto');
		$data = array(
			'id' => $id,
			'id_sucursal' => $id_sucursal,
			'monto' => $monto,
		);
		$this->model_caja->agregar_datos($data);
	}
	public function modificar_caja()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$id_sucursal = $this->input->post('id_sucursal');
		$monto = $this->input->post('monto');
		$data = array(
			'id' => $id,
			'id_sucursal' => $id_sucursal,
			'monto' => $monto,
		);
		$this->model_caja->modificar_caja($id,$data);
	}
	public function buscar_caja()
	{
		$id = $this->input->post('id');
		$r = $this->model_caja->buscar_caja($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$r = $this->model_caja->eliminar_datos($id);
	}
	public function mostrarHistorialIngresos()
	{
		$f1 = $this->input->post("f1");
		$f2 = $this->input->post("f2");
		$id = $this->input->post("id");
		$r = $this->model_caja->mostrarHistorialIngresos($id,$f1,$f2);
		echo json_encode($r);
	}
	public function mostrarHistorialEgresos()
	{
		$f1 = $this->input->post("f1");
		$f2 = $this->input->post("f2");
		$id = $this->input->post("id");
		$r = $this->model_caja->mostrarHistorialEgresos($id,$f1,$f2);
		echo json_encode($r);
	}
}
