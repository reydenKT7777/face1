<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_tipo_contrato extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_tipo_contrato');
	}
	public function index()
	{
		$this->verificar();
		//$this->load->view('tipo_contrato_view');
		$data["vista"] = 'administrador/tipo_contrato_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function verificar()
	{
		if (!($this->session->ci)) {
			redirect(base_url()."index.php/admin/login",'refresh');
		}
	}
	public function listar_tipo_contrato()
	{
		$r = $this->model_tipo_contrato->listar_tipo_contrato();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$id = $this->input->post('id');
		$nombre_tipo_contrato = $this->input->post('nombre_tipo_contrato');
		$experiencia_trabajo = $this->input->post('experiencia_trabajo');
		$turno_trabajo = $this->input->post('turno_trabajo');
		$dias_trabajo = $this->input->post('dias_trabajo');
		$lunes = "";
		$martes = "";
		$miercoles = "";
		$jueves = "";
		$viernes = "";
		$sabado = "";
		$domingo = "";
		for ($i=0; $i <count($dias_trabajo) ; $i++) {
			if ($dias_trabajo[$i] == "Lunes") {
				$lunes = "Lunes";
			}
			if ($dias_trabajo[$i] == "Martes") {
				$martes = ",Martes";
			}
			if ($dias_trabajo[$i] == "Miercoles") {
				$miercoles = ",Miercoles";
			}
			if ($dias_trabajo[$i] == "Jueves") {
				$jueves = ",Jueves";
			}
			if ($dias_trabajo[$i] == "Viernes") {
				$viernes = ",Viernes";
			}
			if ($dias_trabajo[$i] == "Sabado") {
				$sabado = ",Sabado";
			}
			if ($dias_trabajo[$i] == "Domingo") {
				$domingo = ",Domingo";
			}
		}
		//echo "-".$lunes." ".$martes." ".$miercoles;
		$horario_trabajo = $this->input->post('horario_trabajo');
		$tipo_sueldo = $this->input->post('tipo_sueldo');
		$sueldo = $this->input->post('sueldo');
		$data = array(
			'id' => $id,
			'nombre_tipo_contrato' => $nombre_tipo_contrato,
			'experiencia_trabajo' => $experiencia_trabajo,
			'turno_trabajo' => $turno_trabajo,
			'dias_trabajo' => $lunes.$martes.$miercoles.$jueves.$viernes.$sabado.$domingo,
			'horario_trabajo' => $horario_trabajo,
			'tipo_sueldo' => $tipo_sueldo,
			'sueldo' => $sueldo,
			'estadoTipoC' => 1
		);
		$this->model_tipo_contrato->agregar_datos($data);
	}
	public function modificar_tipo_contrato()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre_tipo_contrato = $this->input->post('nombre_tipo_contrato');
		$experiencia_trabajo = $this->input->post('experiencia_trabajo');
		$turno_trabajo = $this->input->post('turno_trabajo');
		$dias_trabajo = $this->input->post('dias_trabajo');
		$lunes = "";
		$martes = "";
		$miercoles = "";
		$jueves = "";
		$viernes = "";
		$sabado = "";
		$domingo = "";
		for ($i=0; $i <count($dias_trabajo) ; $i++) {
			if ($dias_trabajo[$i] == "Lunes") {
				$lunes = "Lunes";
			}
			if ($dias_trabajo[$i] == "Martes") {
				$martes = ",Martes";
			}
			if ($dias_trabajo[$i] == "Miercoles") {
				$miercoles = ",Miercoles";
			}
			if ($dias_trabajo[$i] == "Jueves") {
				$jueves = ",Jueves";
			}
			if ($dias_trabajo[$i] == "Viernes") {
				$viernes = ",Viernes";
			}
			if ($dias_trabajo[$i] == "Sabado") {
				$sabado = ",Sabado";
			}
			if ($dias_trabajo[$i] == "Domingo") {
				$domingo = ",Domingo";
			}
		}
		$horario_trabajo = $this->input->post('horario_trabajo');
		$tipo_sueldo = $this->input->post('tipo_sueldo');
		$sueldo = $this->input->post('sueldo');
		$data = array(
			//'id' => $id,
			'nombre_tipo_contrato' => $nombre_tipo_contrato,
			'experiencia_trabajo' => $experiencia_trabajo,
			'turno_trabajo' => $turno_trabajo,
			'dias_trabajo' => $lunes.$martes.$miercoles.$jueves.$viernes.$sabado.$domingo,
			'horario_trabajo' => $horario_trabajo,
			'tipo_sueldo' => $tipo_sueldo,
			'sueldo' => $sueldo,
		);
		$this->model_tipo_contrato->modificar_tipo_contrato($id,$data);
	}
	public function buscar_tipo_contrato()
	{
		$id = $this->input->post('id');
		$r = $this->model_tipo_contrato->buscar_tipo_contrato($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoTipoC' => 0);
		$this->model_tipo_contrato->modificar_tipo_contrato($id,$data);
		//$r = $this->model_tipo_contrato->eliminar_datos($id);
	}
	public function activar()
	{
		$id = $this->input->post('id');
		$data = array('estadoTipoC' => 1);
		$this->model_tipo_contrato->modificar_tipo_contrato($id,$data);
	}
}
