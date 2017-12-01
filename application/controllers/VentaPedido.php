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
            <a href='".base_url()."index.php/ventaPedido/reportePDF?id=".base64_encode($id_pedido)."' class='btn btn-info'>
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
            <a href='".base_url()."index.php/ventaPedido/reportePDF?id=".base64_encode($id_pedido)."' class='btn btn-info'>
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
    $data = array('resp' => $pagar );
    echo json_encode($data);
  }
  public function reportesVenta()
  {
    $data["vista"] = 'administrador/reportesVentas';
		$this->load->view('frontend/main_admin',$data);
  }
}
