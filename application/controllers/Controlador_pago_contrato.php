<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_pago_contrato extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pago_contrato');
		$this->load->model('model_caja');
		$this->load->model('model_historial_caja_egreso');
	}
	public function index()
	{
		$this->load->view('pago_contrato_view');
	}
	public function pagar()
	{
		$id_contrato = $this->input->post("id_contrato");
		$monto = $this->input->post("monto");
		$verificarCaja = $this->model_pago_contrato->verCaja($id_contrato,$monto);
		if ($verificarCaja != false && $monto != 0 && $monto != "") {
			$id_caja = $verificarCaja["id_caja"];
			$montoCaja = $verificarCaja["monto"];
			$montoActual = $montoCaja - $monto ;
			$data = array('monto' => $montoActual);
			$pagoContrato = array(
				'id_contrato' => $id_contrato,
				'fecha_pago' => date("Y-m-d"),
				'pago' => $monto,
				'id_caja' => $id_caja
			);
			$this->model_pago_contrato->agregar_datos($pagoContrato);
			$this->model_caja->modificar_caja($id_caja,$data);
			$caja = array('id_caja' => $id_caja,
										'id_personal'=> $this->session->ci,
										'monto' => $monto,
										'fecha' => date("Y-m-d"),
										'hora' => date("G:i:s"),
										'detalle' => 'Pago contrato'
									 );
			$this->model_historial_caja_egreso->agregar_datos($caja);
			$data = array('mensaje' => "El pago de $monto que pertenece a $id_contrato fue realizado" );
		}
		else {
			$data = array('mensaje' => "No se pudo realizar el pago de $monto que pertenece a $id_contrato" );
		}

		echo json_encode($data);
	}
	public function listar_pago_contrato()
	{
		$r = $this->model_pago_contrato->listar_pago_contrato();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$id = $this->input->post('id');
		$id_contrato = $this->input->post('id_contrato');
		$fecha_pago = $this->input->post('fecha_pago');
		$pago = $this->input->post('pago');
		$id_caja = $this->input->post('id_caja');
		$data = array(
			'id' => $id,
			'id_contrato' => $id_contrato,
			'fecha_pago' => $fecha_pago,
			'pago' => $pago,
			'id_caja' => $id_caja,
		);
		$this->model_pago_contrato->agregar_datos($data);
	}
	public function modificar_pago_contrato()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$id_contrato = $this->input->post('id_contrato');
		$fecha_pago = $this->input->post('fecha_pago');
		$pago = $this->input->post('pago');
		$id_caja = $this->input->post('id_caja');
		$data = array(
			'id' => $id,
			'id_contrato' => $id_contrato,
			'fecha_pago' => $fecha_pago,
			'pago' => $pago,
			'id_caja' => $id_caja,
		);
		$this->model_pago_contrato->modificar_pago_contrato($id,$data);
	}
	public function buscar_pago_contrato()
	{
		$id = $this->input->post('id');
		$r = $this->model_pago_contrato->buscar_pago_contrato($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$r = $this->model_pago_contrato->eliminar_datos($id);
	}
}
