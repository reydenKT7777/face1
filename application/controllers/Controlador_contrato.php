<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_contrato extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_contrato');
		$this->load->model('model_tipo_contrato');
		$this->load->model('model_personal');
	}
	public function index()
	{
		//$this->load->view('contrato_view');
		$data["vista"] = 'administrador/contrato_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function listar_contrato()
	{
		$r = $this->model_contrato->listar_contrato();
		echo json_encode($r);
	}
	public function listar_contratoSucursal()
	{
		$id = $this->input->get("id");
		$r = $this->model_contrato->listar_contratoSucursal($id);
		echo json_encode($r);
	}
	public function mostrarDatos()
	{
		$personal = $this->model_personal->listar_personal();
		$t_contrato = $this->model_tipo_contrato->listar_tipo_contrato();
		$data = array('personal' => $personal, 'tipo_contrato' =>$t_contrato);
		echo json_encode($data);
	}
	public function agregar_datos()
	{
		$id = $this->input->post('id');
		$id_personal = $this->input->post('id_personal');
		$id_tipo_contrato = $this->input->post('id_tipo_contrato');
		$fecha_contrato = $this->input->post('fecha_contrato');
		//$estado = $this->input->post('estado');
		$fecha_fin_contrato = $this->input->post('fecha_fin_contrato');
		$data = array(
			'id' => $id,
			'id_personal' => $id_personal,
			'id_tipo_contrato' => $id_tipo_contrato,
			'fecha_contrato' => $fecha_contrato,
			'estado' => 1,
			'fecha_fin_contrato' => $fecha_fin_contrato,
			'estadoContrato' => 1
		);
		$this->model_contrato->agregar_datos($data);
	}
	public function modificar_contrato()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$id_personal = $this->input->post('id_personal');
		$id_tipo_contrato = $this->input->post('id_tipo_contrato');
		$fecha_contrato = $this->input->post('fecha_contrato');
		$estado = $this->input->post('estado');
		$fecha_fin_contrato = $this->input->post('fecha_fin_contrato');
		$data = array(
			//'id' => $id,
			'id_personal' => $id_personal,
			'id_tipo_contrato' => $id_tipo_contrato,
			'fecha_contrato' => $fecha_contrato,
			//'estado' => $estado,
			//'fecha_fin_contrato' => $fecha_fin_contrato,
		);
		$this->model_contrato->modificar_contrato($id,$data);
	}
	public function buscar_contrato()
	{
		$id = $this->input->post('id');
		$contrato = $this->model_contrato->buscar_contrato($id);
		$personal = $this->model_personal->listar_personal();
		$t_contrato = $this->model_tipo_contrato->listar_tipo_contrato();
		$data = array('personal' => $personal, 'tipo_contrato' =>$t_contrato, 'contrato' => $contrato);
		echo json_encode($data);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoContrato' => 0 );
		$this->model_contrato->modificar_contrato($id,$data);
		//$r = $this->model_contrato->eliminar_datos($id);
	}
	public function activar($value='')
	{
		$id = $this->input->post('id');
		$data = array('estadoContrato' => 1 );
		$this->model_contrato->modificar_contrato($id,$data);
	}
	public function verReportePagos()
	{
		$id = $this->input->post("id");
		if ($id != "" || $id != 0) {
			$contrato = $this->model_contrato->verContrato($id);
			$pagos = $this->model_contrato->verPagos($id);
			$data = array('contrato' => $contrato,'pagos' => $pagos );
		}
		else {
			$data = array('contrato' => 0,'pagos' => 0 );
		}
		echo json_encode($data);
	}
}
