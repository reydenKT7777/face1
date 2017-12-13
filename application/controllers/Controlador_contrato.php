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
		$this->verificar();
		//$this->load->view('contrato_view');
		$data["vista"] = 'administrador/contrato_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function verificar()
	{
		if (!($this->session->ci)) {
			redirect(base_url()."index.php/admin/login",'refresh');
		}
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
		$id = $this->model_contrato->agregar_datos($data);
		echo "<a href='".base_url()."index.php/controlador_contrato/reportePDF?id=$id' target='_blanck' class='btn btn-success'>Reporte PDF</a>";
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
	public function reportePDF()
	{
		$id = $this->input->get("id");
		$this->load->library('pdf');

    // Se obtienen los alumnos de la base de datos
    $r1 = $this->model_contrato->reporteContrato($id);

		foreach ($r1 as $row) {
			$fecha_contrato = $row->fecha_contrato;
			$fecha_fin_contrato = $row->fecha_fin_contrato;
			$nombres = $row->nombres;
			$apellidos = $row->apellidos;
      $ci =$row->ci;
		}
		//$r2 = $this->materia_prima_model->reporte_ingreso_mpp_cam($id);
		$this->pdf = new Pdf();
		// Agregamos una página
		$this->pdf->AddPage();
		// Define el alias para el número de página que se imprimirá en el pie
		$this->pdf->AliasNbPages();

		/* Se define el titulo, márgenes izquierdo, derecho y
		 * el color de relleno predeterminado
		 */
		$this->pdf->SetTitle("Reporte");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(200,200,200);
		//-----------------------------------------------------
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'CONTRATO TRABAJO',0,0,'C');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Ln(20);
		//$this->pdf->Cell(30);
    $this->pdf->Cell(120,10,'FECHA CONTRATO: '.$fecha_contrato,0,0,'L');
		/*$this->pdf->Cell(120,10,'FECHA FIN: '.$fecha_fin_contrato,0,0,'L');*/
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,'Se contrata al '.utf8_decode("señor@:").' '.utf8_decode($nombres." ".$apellidos)." con CI ".$ci." en fecha ".$fecha_contrato." ",0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(50,10,'por Tempora da: ',0,0,'L');
		$this->pdf->Cell(20,10,utf8_decode($row->nombre_tipo_contrato),0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,"PRIMERO : El trabajador se compromete y obliga a prestar servicios a la Libreria Lider eficiencia",0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,"SEGUNDO: El trabajador, asimismo, acepta y autoriza al Empleador para que haga las deducciones",0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,"que establecen las leyes vigentes y, para que le descuente el tiempo no trabajado debido a atrasos,",0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,"inasistencias o permisos y, ademas, la rebaja del monto de las multas establecidas en el Reglamento",0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(90,10,'TERCERO: El  emplado  trabajara  durante  los  DIAS: ',0,0,'L' );
		$this->pdf->Cell(20,10,$row->dias_trabajo,0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(65,10,'y el ingreso a trabjajo es de HORAS: ',0,0,'L');
		$this->pdf->Cell(20,10,$row->horario_trabajo,0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(90,10,'CUARTO: El empleado percibira un SUELDO de: Bs. ',0,0,'L');
		$this->pdf->Cell(10,10,$row->sueldo,0,0,'L');
		$this->pdf->Ln(7);
    $this->pdf->Ln(100);
		/*foreach ($r1 as $row) {
			$this->pdf->Cell(45,10,'TIPO CONTRATO: ',0,0,'L');
			$this->pdf->Cell(20,10,utf8_decode($row->nombre_tipo_contrato),0,0,'L');
	    $this->pdf->Ln(7);
			$this->pdf->Cell(45,10,'EXPERIENCIA:',0,0,'L');
			$this->pdf->Cell(20,10,$row->experiencia_trabajo,0,0,'L');
	    $this->pdf->Ln(7);
			$this->pdf->Cell(45,10,'TURNO: ',0,0,'L');
			$this->pdf->Cell(20,10,$row->turno_trabajo,0,0,'L');
	    $this->pdf->Ln(7);
			$this->pdf->Cell(45,10,'DIAS: ',0,0,'L');
			$this->pdf->Cell(20,10,$row->dias_trabajo,0,0,'L');
	    $this->pdf->Ln(7);
			$this->pdf->Cell(45,10,'HORARIO: ',0,0,'L');
			$this->pdf->Cell(20,10,$row->horario_trabajo,0,0,'L');
	    $this->pdf->Ln(7);
			$this->pdf->Cell(45,10,'TIPO SUELDO: ',0,0,'L');
			$this->pdf->Cell(20,10,$row->tipo_sueldo,0,0,'L');
	    $this->pdf->Ln(7);
			$this->pdf->Cell(45,10,'SUELDO: ',0,0,'L');
			$this->pdf->Cell(20,10,$row->sueldo,0,0,'L');
	    $this->pdf->Ln(7);
		}*/
		//$this->pdf->Ln(7);
		//$this->pdf->Cell(120,10,'D. PENDIENTE BS: Bs. '.$pendiente,0,0,'L');
		//$this->pdf->Cell(120,10,'D. PENDIENTE U$D: $'.number_format($pendienteUsd,2,'.',','),0,0,'L');
		$this->pdf->Ln(12);
		$this->pdf->Cell(250,10,".............................................. ",0,0,'L');
		$this->pdf->Ln(5);
		$this->pdf->Cell(150,10,"FIRMA DEL TRABAJADOR.",0,0,'L');
		$this->pdf->Ln(5);
		$this->pdf->Cell(160,10,utf8_decode($nombres." ".$apellidos),0,0,'L');
		$this->pdf->Ln(5);
		$this->pdf->Cell(160,10,"CI: ".utf8_decode($ci),0,0,'L');
		// Se define el formato de fuente: Arial, negritas, tamaño 9
		$this->pdf->SetFont('Arial', '', 8);
		/*
		 * TITULOS DE COLUMNAS
		 *
		 * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
		 */

		$this->pdf->Output("REPORTE NOTA VENTA .pdf", 'I');
	}
}
