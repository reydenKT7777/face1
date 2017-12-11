<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentaPedido extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("model_pedido_cli");
    $this->load->model("model_nota_venta");
    $this->load->model("model_detalle_pedido_cli");
    $this->load->model("model_producto");
    $this->load->model("model_caja");
    $this->load->model('model_historial_caja_ingreso');
  }

  public function agregarVentaDirecta()
  {
    $id_cliente = $this->input->post("cliente");
    $total = $this->input->post("total");
    $id_producto = $this->input->post("id_producto");
    $cantidadP = $this->input->post("cantidadproducto");
    $totalPrecio = $this->input->post("totalprecio");
    $tipoVenta = $this->input->post("tipoVenta");
    $pedidoCli = array('id_sucursal' => $this->session->id_sucursal,
                      'id_cliente' => $id_cliente,

                      'fecha_pedido' => date("Y-m-d"),
                      'monto' => $total,
                      'estado' => 1
                    );
    $id_pedido = $this->model_pedido_cli->agregar_datos($pedidoCli);
    for ($i=0; $i < count($id_producto) ; $i++) {
      $detalle = array('nro_pedido' => $id_pedido,
                        'id_producto' => $id_producto[$i],
                        'cantidad' => $cantidadP[$i],
                        'total' => $totalPrecio[$i],
                        'estado' => 1
                      );

      $this->model_detalle_pedido_cli->agregar_datos($detalle);
      $this->model_producto->decrementar($id_producto[$i],$cantidadP[$i]);
      $this->model_producto->historialSal($id_producto[$i],$cantidadP[$i]);
    }
    if ($tipoVenta == "Al contado") {
      $notaVenta = array('nro_pedido' => $id_pedido,
                        'id_personal' => $this->session->ci,
                        'fecha_venta' => date("Y-m-d"),
                        'monto_total' => $total,
                        'tipo_venta' => $tipoVenta,
                        'fecha_limite' => '0000-00-00',
                        'montoPendiente' => $total
                      );
    }
    else {
      $limite = $this->input->post("limiteDias");
      $fecha = date('Y-m-j');
      $nuevafecha = strtotime ( '+'.$limite.' day' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
      $notaVenta = array('nro_pedido' => $id_pedido,
                        'id_personal' => $this->session->ci,
                        'fecha_venta' => date("Y-m-d"),
                        'monto_total' => $total,
                        'tipo_venta' => $tipoVenta,
                        'fecha_limite' => $nuevafecha,
                        'montoPendiente' => $total
                      );
    }
    $this->model_nota_venta->agregar_datos($notaVenta);

    echo "<br><br><br><br><br>
          <center>
            <a href='".base_url()."index.php/admin/vendedor' class='btn btn-success'>
              La venta fue realizada con exito <i class='fa fa-check'></i>
            </a><br><br>
            <a href='".base_url()."index.php/ventaPedido/reportePDF?id=".$id_pedido."' target='_blank' class='btn btn-info'>
              Imprimir reporte <i class='fa fa-file-pdf-o'></i>
            </a>
          </center>
          <br><br><br><br><br>";
  }
  public function agregarVentaPedido()
  {
    $this->load->model('model_pedido_cli');
    $id_pedido = $this->input->post("pedidos");
    // Cambia de estado el peedido
    $data  = array('estado' => 1 );
    $this->model_pedido_cli->modificar_pedido_cli($id_pedido,$data);
    // verifica el tipo de venta
    $limiteDias = $this->input->post("limiteDias");
    $total = $this->input->post("totalesPed");
    if ($limiteDias == "") {
      $tipoVenta = "Al contado";
    }
    else {
      $tipoVenta = "";
    }
    // version de tipo de venta Al contado
    if ($tipoVenta == "Al contado") {
      $notaVenta = array('nro_pedido' => $id_pedido,
                        'id_personal' => $this->session->ci,
                        'fecha_venta' => date("Y-m-d"),
                        'monto_total' => $total,
                        'tipo_venta' => $tipoVenta,
                        'fecha_limite' => '0000-00-00',
                        'montoPendiente' => $total
                      );
    }
    // version de tipo de venta A credito
    else {
      $limite = $this->input->post("limiteDias");
      $fecha = date('Y-m-j');
      $nuevafecha = strtotime ( '+'.$limite.' day' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
      $notaVenta = array('nro_pedido' => $id_pedido,
                        'id_personal' => $this->session->ci,
                        'fecha_venta' => date("Y-m-d"),
                        'monto_total' => $total,
                        'tipo_venta' => $tipoVenta,
                        'fecha_limite' => $nuevafecha,
                        'montoPendiente' => $total
                      );
    }
    $this->model_nota_venta->agregar_datos($notaVenta);
    // Modificar la lista de pedidos y descontar del stock de productos
    $id_detalle = $this->input->post("id_detalle");
    $id_producoPet = $this->input->post("id_producoPet");
    $cantidadPed = $this->input->post("cantidadPed");
    $totalPed = $this->input->post("totalPed");
    for ($i=0; $i <count($id_detalle) ; $i++) {
      $detalle = array('cantidad' => $cantidadPed[$i],
                        'total' => $totalPed[$i]
                      );
      $this->model_detalle_pedido_cli->modificar_detalle_pedido_cli($id_detalle[$i],$detalle);
      $this->model_producto->decrementar($id_producoPet[$i],$cantidadPed[$i]);
      $this->model_producto->historialSal($id_producoPet[$i],$cantidadPed[$i]);
    }
    echo "<br><br><br><br><br>
          <center>
            <a href='".base_url()."index.php/admin/vendedor' class='btn btn-success'>
              La venta fue realizada con exito <i class='fa fa-check'></i>
            </a><br><br>
            <a href='".base_url()."index.php/ventaPedido/reportePDF?id=".$id_pedido."' target='_blank' class='btn btn-info'>
              Imprimir reporte <i class='fa fa-file-pdf-o'></i>
            </a>
          </center>
          <br><br><br><br><br>";
  }
  public function buscarNotaVenta()
  {
    //$cad = $this->input->post("cad");
    $cad = "";
    $r = $this->model_nota_venta->Buscar_notas_ventas($cad);
    echo json_encode($r);
  }

  public function verCuentas()
  {
    $id = $this->input->post("id");
    $nota = $this->model_nota_venta->Buscar_notaVenta($id);
    $pagos = $this->model_nota_venta->Buscar_PagosVenta($id);
    $data = array('nota' => $nota, 'pagos' => $pagos);
    echo json_encode($data);
  }
  public function pagar()
  {
    $id = $this->input->post('idNota');
    $cantidad = $this->input->post('cantidad');
    $pagar = $this->model_nota_venta->pagar($id,$cantidad);
    // Incremento de caja y registr de historial
    $fondos = $cantidad;
    $caja = $this->model_caja->buscar_cajaSucursal($this->session->id_sucursal);
    foreach ($caja as $row) {
        $idCaja = $row->id;
    }
		$datosCaja = $this->model_caja->verFondos($idCaja);
		foreach ($datosCaja as $row) {
			$monto = $row->monto;
		}
		$monto = $monto + $fondos;
		$data = array('monto' =>  $monto);
		$this->model_caja->modificar_caja($idCaja,$data);
		$caja = array('id_caja' => $idCaja,
									'id_personal'=> $this->session->ci,
									'monto' => $fondos,
									'fecha' => date("Y-m-d"),
									'hora' => date("G:i:s"),
									'detalle' => 'Ingreso a caja por Venta'
								 );
		$this->model_historial_caja_ingreso->agregar_datos($caja);
    // ================================
    $data = array('resp' => $pagar );
    echo json_encode($data);
  }
  public function reportesVenta()
  {
    $this->verificar();
    $data["vista"] = 'administrador/reportesVentas';
		$this->load->view('frontend/main_admin',$data);
  }
  public function verificar()
	{
		if (!($this->session->ci)) {
			redirect(base_url()."index.php/admin/login",'refresh');
		}
	}

  public function reportePDF()
  {
		$id = $this->input->get("id");
		//echo $id;
		//$this->very_sesion_cargo();
		// Se carga la libreria fpdf
    $this->load->library('pdf');

    // Se obtienen los alumnos de la base de datos
    $r1 = $this->model_nota_venta->reporteVentas($id);

		foreach ($r1 as $row) {
			$nro_pedido = $row->nro_pedido;
			$fecha_venta = $row->fecha_venta;
			$monto_total = $row->monto_total;
			$tipo_venta = $row->tipo_venta;
      $nombre_cliente =$row->nombre_cliente;
      $nit = $row->nit;
      $nombres = $row->nombres;
      $apellidos = $row->apellidos;
      $tipo_cliente = $row->tipo_cliente;
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
		$this->pdf->Cell(120,10,'REPORTE DE NOTA VENTA',0,0,'C');
		$this->pdf->SetFont('Arial','B',10);
		$this->pdf->Ln(20);
		//$this->pdf->Cell(30);
    $this->pdf->Cell(120,10,'NRO OPERACION: '.$nro_pedido,0,0,'L');
		$this->pdf->Cell(120,10,'FECHA VENTA: '.$fecha_venta,0,0,'L');
		$this->pdf->Ln(7);
		$this->pdf->Cell(120,10,'CLIENTE: '.utf8_decode($nombre_cliente),0,0,'L');
		$this->pdf->Cell(120,10,'NIT: '.$nit,0,0,'L');
    $this->pdf->Ln(7);
    $this->pdf->Cell(120,10,'TIPO CLIENTE: '.utf8_decode($tipo_cliente),0,0,'L');
    $this->pdf->Cell(120,10,'VENDEDOR: '.utf8_decode($nombres)." ".utf8_decode($apellidos),0,0,'L');
		$this->pdf->Ln(7);

		$this->pdf->Cell(120,10,'TOTAL BS.: '.$monto_total,0,0,'L');

		//$this->pdf->Ln(7);
		//$this->pdf->Cell(120,10,'D. PENDIENTE BS: Bs. '.$pendiente,0,0,'L');
		//$this->pdf->Cell(120,10,'D. PENDIENTE U$D: $'.number_format($pendienteUsd,2,'.',','),0,0,'L');
		$this->pdf->Ln(12);
		// Se define el formato de fuente: Arial, negritas, tamaño 9
		$this->pdf->SetFont('Arial', '', 8);
		/*
		 * TITULOS DE COLUMNAS
		 *
		 * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
		 */
		$this->pdf->Cell(5,7,'#','TBL',0,'C','1');
	  $this->pdf->Cell(130,7,utf8_decode('DESCRIPCIÓN'),'TB',0,'L','1');
	  //$this->pdf->Cell(25,7,'CODIGO','TB',0,'L','1');
	  $this->pdf->Cell(20,7,'CANTIDAD','TB',0,'L','1');
		$this->pdf->Cell(20,7,'TOTAL','TBR',0,'l','1');
	  $this->pdf->Ln(7);
	  // La variable $x se utiliza para mostrar un número consecutivo
	  $x = 1;
		foreach ($r1 as $row) {
			//echo $row->peso_item."<br>";
			//echo $row->nombre_color."<br>";
			// se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(5,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(130,5,utf8_decode($row->nombre_pro).utf8_decode($row->marca),'B',0,'L',0);
      //$this->pdf->Cell(25,5,$row->cod_item,'B',0,'L',0);
      $this->pdf->Cell(20,5,$row->cantidad,'B',0,'L',0);
      //$this->pdf->Cell(20,5,$row->peso_item." ".$row->tipo_unitario,'B',0,'L',0);
      //$this->pdf->Cell(20,5,"Bs ".number_format($row->precio_x_kl,2,'.',','),'B',0,'L',0);
      //$this->pdf->Cell(20,5,"Bs ".number_format($row->monto_total,2,'.',','),'B',0,'L',0);
			//$this->pdf->Cell(20,5,"$ ".number_format($row->precio_usd,2,'.',','),'B',0,'L',0);
			$this->pdf->Cell(20,5,"Bs. ".number_format(($row->total),2,'.',','),'BR',0,'L',0);
      //Se agrega un salto de linea
      $this->pdf->Ln(5);

		}
		$this->pdf->Cell(5,7,'','TBL',0,'C','0');
	  $this->pdf->Cell(130,7,'','TB',0,'L','0');
	  $this->pdf->Cell(20,7,'','TB',0,'L','0');
	  //$this->pdf->Cell(20,7,'','TB',0,'L','0');
		//$this->pdf->Cell(20,7,'TOTAL','TB',	0,'C','0');
	  //$this->pdf->Cell(20,7,"Bs ".number_format($total,2,'.',','),'TB',0,'L','0');
	  //$this->pdf->Cell(20,7,'','TB',0,'C','0');
		$this->pdf->Cell(20,7,"Bs. ".number_format($monto_total,2,'.',','),'TBR',0,'L','0');
	  $this->pdf->Ln(7);
		$this->pdf->Output("REPORTE NOTA VENTA .pdf", 'I');
	}
  public function buscarClientes()
  {
    $idCliente = $this->input->post('idCliente');
    $r = $this->model_nota_venta->buscarCliente($idCliente);
    echo json_encode($r);
  }
  public function verReporteTotal()
  {
    $idCliente = $this->input->get('idCliente');
    $this->load->library('pdf');

    // Se obtienen los alumnos de la base de datos
    $r1 = $this->model_nota_venta->buscarCliente($idCliente);

    foreach ($r1 as $row) {
      $cliente = $row->nombre_cliente;
      $nit = $row->nit;
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
    $this->pdf->Cell(120,10,'REPORTE DE NOTA VENTA CLIENTE',0,0,'C');
    $this->pdf->SetFont('Arial','B',10);
    $this->pdf->Ln(20);
    //$this->pdf->Cell(30);
    $this->pdf->Cell(120,10,'CLIENTE: '.$cliente,0,0,'L');
    $this->pdf->Cell(120,10,'NIT: '.$nit,0,0,'L');
    $this->pdf->Ln(7);

    //$this->pdf->Ln(7);
    //$this->pdf->Cell(120,10,'D. PENDIENTE BS: Bs. '.$pendiente,0,0,'L');
    //$this->pdf->Cell(120,10,'D. PENDIENTE U$D: $'.number_format($pendienteUsd,2,'.',','),0,0,'L');
    $this->pdf->Ln(12);
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', '', 8);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
    $this->pdf->Cell(5,7,'#','TBL',0,'C','1');
    $this->pdf->Cell(60,7,utf8_decode('CLIENTE'),'TB',0,'L','1');
    $this->pdf->Cell(25,7,'NIT','TB',0,'L','1');
    $this->pdf->Cell(20,7,'NOTA','TB',0,'L','1');
    $this->pdf->Cell(20,7,'FECHA','TB',0,'L','1');
    $this->pdf->Cell(20,7,'TOTAL','TB',0,'l','1');
    $this->pdf->Cell(20,7,'DEUDAS','TBR',0,'l','1');
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    $x = 1;
    $total = 0;
    $pendiente = 0;
    foreach ($r1 as $row) {
      //echo $row->peso_item."<br>";
      //echo $row->nombre_color."<br>";
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      $this->pdf->Cell(5,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(60,5,utf8_decode($row->nombre_cliente),'B',0,'L',0);
      //$this->pdf->Cell(25,5,$row->cod_item,'B',0,'L',0);
      $this->pdf->Cell(25,5,$row->nit,'B',0,'L',0);
      $this->pdf->Cell(20,5,$row->nro_pedido,'B',0,'L',0);
      $this->pdf->Cell(20,5,$row->fecha_venta,'B',0,'L',0);
      $this->pdf->Cell(20,5,"Bs. ".number_format(($row->monto_total),2,'.',','),'B',0,'L',0);
      $this->pdf->Cell(20,5,"Bs. ".number_format(($row->montoPendiente),2,'.',','),'BR',0,'L',0);
      $total = $total + $row->monto_total;
      $pendiente = $pendiente + $row->montoPendiente;
      //Se agrega un salto de linea
      $this->pdf->Ln(5);

    }
    $this->pdf->Cell(5,7,'','TBL',0,'C','0');
    $this->pdf->Cell(60,7,'','TB',0,'L','0');
    $this->pdf->Cell(25,7,'','TB',0,'L','0');
    $this->pdf->Cell(20,7,'','TB',0,'L','0');
    $this->pdf->Cell(20,7,'','TB',0,'L','0');
    $this->pdf->Cell(20,7,"Bs. ".number_format($total,2,'.',','),'TB',0,'L','0');
    $this->pdf->Cell(20,7,"Bs. ".number_format($pendiente,2,'.',','),'TBR',0,'L','0');
    $this->pdf->Ln(7);
    $this->pdf->Output("REPORTE NOTA VENTA .pdf", 'I');


  }
}
