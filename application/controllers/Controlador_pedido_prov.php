<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_pedido_prov extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pedido_prov');
		$this->load->model('model_producto');
	}
	public function index()
	{
		$this->load->view('pedido_prov_view');
	}
	public function listar_pedido_prov()
	{
		$r = $this->model_pedido_prov->listar_pedido_prov();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$id_proveedor = $this->input->post('id_proveedor');
		$monto_total = $this->input->post('total');
		//$this->model_pedido_prov->agregar_datos($data);
		// Añadir pedido al proveedor
		// insertamos los datos de la nota o encabezado
		$nroPedidoMX = $this->model_pedido_prov->nro();
		$nroPedido = $nroPedidoMX->max;
		if ($nroPedido == null) {
			$nroPedido = 1;
		}
		else {
			$nroPedido = $nroPedido + 1;
		}
    //$prov = $this->input->post("id_proveedor");
    //$monto = $this->input->post("monto");
    $dataNotaPedido = array('id_proveedor' => $id_proveedor,
                            'fecha_pedido' =>  date("Y-m-d"),
                            'nro_pedido' => $nroPedido,
                            'monto_total' => $monto_total,
														'monto_pendiente' => $monto_total,
                            'estado' => 0
                            );
    //$id = $this->almacenModel->agregar_datos($dataNotaPedido);
		$id = $this->model_pedido_prov->agregar_datos($dataNotaPedido);
    $p = $this->input->post("producto");
		$idPTU = $this->input->post('idPTU');
		$cantidadReal = $this->input->post('cantidadReal');
		$cantidadTU = $this->input->post('cantidadTU');
		$precioTU = $this->input->post('precioTU');
		$totalTU = $this->input->post('totalTU');
    for ($i=0; $i < count($idPTU) ; $i++) {
      $productoLista = array('id_pedido' => $id,
                              'id_producto' =>$p[$i],
															'idPrecioTipoU' => $idPTU[$i],
                              'cantidad' => $cantidadReal[$i],
															'cantidadTU' => $cantidadTU[$i],
															'precioTU' => $precioTU[$i],
                              'total' => $totalTU[$i],
                              'estado' => 0
                            );
      $this->model_pedido_prov->agregarProductos($productoLista);
			$this->model_producto->incrementar($p[$i],$cantidadReal[$i]);
			$this->model_producto->historialIn($p[$i],$cantidadReal[$i]);
    }

		if ($this->session->cargo ==  "Super administrador") {
			echo "<br><br><br><br><br>
	          <center>
	            <a href='".base_url()."index.php/controlador_almacen/stock' class='btn btn-success'>
	              Los productos fueron registrados con exito a almacenes <i class='fa fa-check'></i>
	            </a><br><br>
	            <a href='".base_url()."index.php/controlador_pedido_prov/reportePDF?id=".$id."' target='_blank' class='btn btn-info'>
	              Imprimir reporte <i class='fa fa-file-pdf-o'></i>
	            </a>
	          </center>
	          <br><br><br><br><br>";
		}
		else {
			echo "<br><br><br><br><br>
	          <center>
	            <a href='".base_url()."index.php/admin/almacenero' class='btn btn-success'>
	              Los productos fueron registrados con exito a almacenes <i class='fa fa-check'></i>
	            </a><br><br>
	            <a href='".base_url()."index.php/controlador_pedido_prov/reportePDF?id=".$id."' target='_blank' class='btn btn-info'>
	              Imprimir reporte <i class='fa fa-file-pdf-o'></i>
	            </a>
	          </center>
	          <br><br><br><br><br>";
		}
	}
	public function modificar_pedido_prov()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$id_proveedor = $this->input->post('id_proveedor');
		$fecha_pedido = $this->input->post('fecha_pedido');
		$nro_pedido = $this->input->post('nro_pedido');
		$monto_total = $this->input->post('monto_total');
		$estado = $this->input->post('estado');
		$data = array(
			'id' => $id,
			'id_proveedor' => $id_proveedor,
			'fecha_pedido' => $fecha_pedido,
			'nro_pedido' => $nro_pedido,
			'monto_total' => $monto_total,
			'estado' => $estado,
		);
		$this->model_pedido_prov->modificar_pedido_prov($id,$data);
	}
	public function buscar_pedido_prov()
	{
		$id = $this->input->post('id');
		$r = $this->model_pedido_prov->buscar_pedido_prov($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$r = $this->model_pedido_prov->eliminar_datos($id);
	}
	public function reportePDF()
	{
		$id = $this->input->get("id");
		//echo $id;
		//$this->very_sesion_cargo();
		// Se carga la libreria fpdf
    $this->load->library('pdf');

    // Se obtienen los alumnos de la base de datos
    $r1 = $this->model_pedido_prov->reportePedido($id);

		foreach ($r1 as $row) {
			$fecha_pedido = $row->fecha_pedido;
			$nro_pedido = $row->nro_pedido;
			$nombre_prov = $row->nombre_prov;
			$nit = $row->nit;
      $monto_total =$row->monto_total;
      $monto_pendiente = $row->monto_pendiente;
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
		$this->pdf->Cell(120,10,'REPORTE DE PEDIDO AL PROVEEDOR',0,0,'C');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Ln(20);
		//$this->pdf->Cell(30);
    $this->pdf->Cell(120,10,'NRO OPERACION: '.$nro_pedido,0,0,'L');
		$this->pdf->Cell(120,10,'FECHA DE INGRESO: '.$fecha_pedido,0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,'PROVEEDOR: '.utf8_decode($nombre_prov),0,0,'L');
		$this->pdf->Cell(120,10,'NIT: '.$nit,0,0,'L');
    $this->pdf->Ln(7);
    $this->pdf->Cell(120,10,'MONTO TOTAL: '.number_format(($monto_total),2,'.',','),0,0,'L');
    $this->pdf->Cell(120,10,'DEUDA PENDIENTE: '.number_format(($monto_pendiente),2,'.',','),0,0,'L');
		$this->pdf->Ln(7);

		$this->pdf->Ln(12);
		// Se define el formato de fuente: Arial, negritas, tamaño 9
		$this->pdf->SetFont('Arial', '', 8);
		/*
		 * TITULOS DE COLUMNAS
		 *
		 * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
		 */
		$this->pdf->Cell(5,7,'#','TBL',0,'C','1');
	  $this->pdf->Cell(90,7,utf8_decode('PRODUCTO'),'TB',0,'L','1');
	  $this->pdf->Cell(20,7,'T/U','TB',0,'L','1');
		$this->pdf->Cell(20,7,'CANTIDAD','TB',0,'L','1');
		$this->pdf->Cell(20,7,'PRECIO/U','TB',0,'L','1');
		$this->pdf->Cell(20,7,'TOTAL','TBR',0,'l','1');
	  $this->pdf->Ln(7);
	  // La variable $x se utiliza para mostrar un número consecutivo
	  $x = 1;
		foreach ($r1 as $row) {
      $this->pdf->Cell(5,5,$x++,'BL',0,'C',0);
      $this->pdf->Cell(90,5,utf8_decode($row->nombre_pro),'B',0,'L',0);
      $this->pdf->Cell(20,5,utf8_decode($row->nombre_tipo_u),'B',0,'L',0);
			$this->pdf->Cell(20,5,$row->cantidadTU,'B',0,'L',0);
			$this->pdf->Cell(20,5,$row->precioTU,'B',0,'L',0);
			$this->pdf->Cell(20,5,"Bs. ".number_format(($row->total),2,'.',','),'BR',0,'L',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);

		}
		$this->pdf->Cell(5,7,'','TBL',0,'C','0');
	  $this->pdf->Cell(90,7,'','TB',0,'L','0');
	  $this->pdf->Cell(20,7,'','TB',0,'L','0');
		$this->pdf->Cell(20,7,'','TB',0,'L','0');
		$this->pdf->Cell(20,7,'','TB',0,'L','0');
		$this->pdf->Cell(20,7,"Bs. ".number_format($monto_total,2,'.',','),'TBR',0,'L','0');
	  $this->pdf->Ln(7);
		$this->pdf->Output("REPORTE NOTA PROVEEDOR .pdf", 'I');
	}
}
