<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_pedido_cli extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pedido_cli');
    $this->load->model("model_nota_venta");
    $this->load->model("model_detalle_pedido_cli");
	}
	public function index()
	{
		$this->load->view('pedido_cli_view');
	}
	public function buscarPedidos()
	{
		$n = $this->input->get("q");
		//$this->load->model("sql");
		$lista = $this->model_pedido_cli->listaPedidos($n);
		//$r= $this->sql->lista();
		$res = array('total_count' => "10",
	 							 'incomplete_results' => false,
							 	 'items' => $lista);
		echo json_encode($res);
	}
	public function listar_pedido_cli()
	{
		$r = $this->model_pedido_cli->listar_pedido_cli();
		echo json_encode($r);
	}
	public function agregar_datos()
	{
		$nro_pedido = $this->input->post('nro_pedido');
		$id_sucursal = $this->input->post('id_sucursal');
		$id_cliente = $this->input->post('id_cliente');
		$id_personal = $this->input->post('id_personal');
		$fecha_pedido = $this->input->post('fecha_pedido');
		$monto = $this->input->post('monto');
		$estado = $this->input->post('estado');
		$data = array(
			'nro_pedido' => $nro_pedido,
			'id_sucursal' => $id_sucursal,
			'id_cliente' => $id_cliente,
			'id_personal' => $id_personal,
			'fecha_pedido' => $fecha_pedido,
			'monto' => $monto,
			'estado' => $estado,
		);
		$this->model_pedido_cli->agregar_datos($data);
	}
	public function modificar_pedido_cli()
	{
		$id = $this->input->post('nro_pedido');
		$nro_pedido = $this->input->post('nro_pedido');
		$id_sucursal = $this->input->post('id_sucursal');
		$id_cliente = $this->input->post('id_cliente');
		$id_personal = $this->input->post('id_personal');
		$fecha_pedido = $this->input->post('fecha_pedido');
		$monto = $this->input->post('monto');
		$estado = $this->input->post('estado');
		$data = array(
			'nro_pedido' => $nro_pedido,
			'id_sucursal' => $id_sucursal,
			'id_cliente' => $id_cliente,
			'id_personal' => $id_personal,
			'fecha_pedido' => $fecha_pedido,
			'monto' => $monto,
			'estado' => $estado,
		);
		$this->model_pedido_cli->modificar_pedido_cli($id,$data);
	}
	public function buscar_pedido_cli()
	{
		$id = $this->input->post('id');
		$r = $this->model_pedido_cli->buscar_pedido_cli($id);
		echo json_encode($r);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$r = $this->model_pedido_cli->eliminar_datos($id);
	}
	public function guardarPedido()
	{
		$id_producto = $this->input->post("idProducto");
		$cantidadP = $this->input->post("cantidadP");
		$id_cliente = $this->session->id_cliente;
    $total = $this->input->post("totalT");
    $id_producto = $this->input->post("idProducto");
    $totalPrecio = $this->input->post("totalP");
		$id_sucursal = $this->input->post("id_sucursal");
    $pedidoCli = array('id_sucursal' => $id_sucursal,
                      'id_cliente' => $id_cliente,
                      'fecha_pedido' => date("Y-m-d"),
                      'monto' => $total,
                      'estado' => 0
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
    }
		$data = array('respuesta' => "correcto" );
		echo json_encode($data);

	}
	public function verPedido()
	{
		$id = $this->input->post("id");
		$r = $this->model_pedido_cli->verPedido($id);
		echo json_encode($r);
	}
}
