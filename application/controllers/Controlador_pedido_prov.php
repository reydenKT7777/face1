<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_pedido_prov extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_pedido_prov');
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
    $prov = $this->input->post("proveedor");
    $monto = $this->input->post("monto");
    $dataNotaPedido = array('id_proveedor' => $prov,
                            'fecha_pedido' =>  date("Y-m-d"),
                            'nro_pedido' => "24",
                            'monto_total' => $monto,
                            'estado' => 0
                            );
    //$id = $this->almacenModel->agregar_datos($dataNotaPedido);
		$this->model_pedido_prov->agregar_datos($dataNotaPedido);
    $p = $this->input->post("producto");
    $c = $this->input->post("cantidad");
    $pc = $this->input->post("precio");

    for ($i=0; $i < count($p) ; $i++) {
      $productoLista = array('id_pedido' => $id,
                              'id_producto' =>$p[$i],
                              'cantidad' => $c[$i],
                              'total' => $pc[$i],
                              'estado' => 0
                            );
      $this->model_pedido_prov->agregarProductos($productoLista);
    }

		echo "<br><br><br><br><br>
          <center>
            <a href='".base_url()."index.php/admin/vendedor' class='btn btn-success'>
              La venta fue realizada con exito <i class='fa fa-check'></i>
            </a><br><br>
            <a href='".base_url()."index.php/controlador_pedido_prov/reportePDF?id=".base64_encode($id_pedido)."' class='btn btn-info'>
              Imprimir reporte <i class='fa fa-file-pdf-o'></i>
            </a>
          </center>
          <br><br><br><br><br>";
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
}