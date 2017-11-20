<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controlador_producto extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_producto');
		$this->load->model('model_tipo_producto');
		$this->load->model('model_tipo_unitario');
		$this->load->model('model_almacen');
	}
	public function index()
	{
		//$this->load->view('producto_view');
		$data["vista"] = 'administrador/producto_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function listar_producto()
	{
		$id = $this->input->post("id");
		$r = $this->model_producto->listar_producto($id);
		echo json_encode($r);
	}
	public function addDatos()
	{
		$tipoP = $this->model_tipo_producto->listar_tipo_producto();
		$tipoU = $this->model_tipo_unitario->listar_tipo_unitario();
		$almacen = $this->model_almacen->listar_almacen();
		$data = array('Tproducto' => $tipoP, 'Tunitario' => $tipoU, 'almacen' =>$almacen);
		echo json_encode($data);
	}
	public function agregar_datos()
	{
		$id = $this->input->post('id');
		$nombre_pro = $this->input->post('nombre_pro');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');
		$marca = $this->input->post('marca');
		//$stock = $this->input->post('stock');
		$id_tipo_producto = $this->input->post('id_tipo_producto');
		$id_tipo_unitario = $this->input->post('id_tipo_unitario');
		$id_almacen = $this->input->post('id_almacen');
		$data = array(
			'id' => $id,
			'nombre_pro' => $nombre_pro,
			'descripcion' => $descripcion,
			'precio' => $precio,
			'marca' => $marca,
			'stock' => 0,
			'id_tipo_producto' => $id_tipo_producto,
			'id_tipo_unitario' => $id_tipo_unitario,
			'id_almacen' => $id_almacen,
			'estadoPro' => 1
		);
		$this->model_producto->agregar_datos($data);
	}
	public function modificar_producto()
	{
		$id = $this->input->post('id');
		$id = $this->input->post('id');
		$nombre_pro = $this->input->post('nombre_pro');
		$descripcion = $this->input->post('descripcion');
		$precio = $this->input->post('precio');
		$marca = $this->input->post('marca');
		//$stock = $this->input->post('stock');
		$id_tipo_producto = $this->input->post('id_tipo_producto');
		$id_tipo_unitario = $this->input->post('id_tipo_unitario');
		$id_almacen = $this->input->post('id_almacen');
		$data = array(
			'id' => $id,
			'nombre_pro' => $nombre_pro,
			'descripcion' => $descripcion,
			'precio' => $precio,
			'marca' => $marca,
			//'stock' => $stock,
			'id_tipo_producto' => $id_tipo_producto,
			'id_tipo_unitario' => $id_tipo_unitario,
			'id_almacen' => $id_almacen,
		);
		$this->model_producto->modificar_producto($id,$data);
	}
	public function buscar_producto()
	{
		$id = $this->input->post('id');
		$r = $this->model_producto->buscar_producto($id);
		$tipoP = $this->model_tipo_producto->listar_tipo_producto();
		$tipoU = $this->model_tipo_unitario->listar_tipo_unitario();
		$almacen = $this->model_almacen->listar_almacen();
		$data = array('Tproducto' => $tipoP, 'Tunitario' => $tipoU, 'almacen' =>$almacen, 'producto' => $r);
		echo json_encode($data);
	}
	public function eliminar_datos()
	{
		$id = $this->input->post('id');
		$data = array('estadoPro' => 0 );
		$this->model_producto->modificar_producto($id,$data);
		//$r = $this->model_producto->eliminar_datos($id);
	}
	public function activar()
	{
		$id = $this->input->post('id');
		$data = array('estadoPro' => 1 );
		$this->model_producto->modificar_producto($id,$data);
	}
	public function buscarProductoNombre()
	{
		$n = $this->input->get("q");
		//$this->load->model("sql");
		$lista = $this->model_producto->listaProducto($n);
		//$r= $this->sql->lista();
		$res = array('total_count' => "10",
	 							 'incomplete_results' => false,
							 	 'items' => $lista);
		echo json_encode($res);
	}
}
