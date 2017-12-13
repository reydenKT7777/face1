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
		$this->load->model(array('model_precioTipoU'));
	}
	public function index()
	{
		$this->verificar();
		//$this->load->view('producto_view');
		$data["vista"] = 'administrador/producto_view';
		$this->load->view('frontend/main_admin',$data);
	}
	public function verificar()
	{
		if (!($this->session->ci)) {
			redirect(base_url()."index.php/admin/login",'refresh');
		}
	}
	public function listar_producto()
	{
		$id = $this->input->post("id");
		$r = $this->model_producto->listar_producto($id);
		echo json_encode($r);
	}
	public function getProducto()
	{
		$r = $this->model_producto->getProducto();
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
		//$id = $this->input->post('id');
		$nombre_pro = $this->input->post('nombre_pro');
		//$descripcion = $this->input->post('descripcion');

		$marca = $this->input->post('marca');
		//$stock = $this->input->post('stock');
		$id_tipo_producto = $this->input->post('id_tipo_producto');
		//$id_tipo_unitario = $this->input->post('id_tipo_unitario');
		$id_almacen = $this->input->post('id_almacen');
		$data = array(
			//'id' => $id,
			'nombre_pro' => $nombre_pro,
			//'descripcion' => $descripcion,
			//'precio' => $precio,
			'marca' => $marca,
			'stock' => 0,
			'id_tipo_producto' => $id_tipo_producto,
			//'id_tipo_unitario' => $id_tipo_unitario,
			'id_almacen' => $id_almacen,
			'estadoPro' => 1
		);
		$id_producto = $this->model_producto->agregar_datos($data);
		//		----------Precios segun su tipo de unidad --------------------
		$id_tipo_unitario = $this->input->post('id_tipo_unitario');
		$cantidad = $this->input->post('cantidad');
		$PUnitario = $this->input->post('PUnitario');
		$PTUnitario = $this->input->post('PTUnitario');
		for ($i=0; $i <count($cantidad) ; $i++) {
			$PtipoU = array('cantidadTU' => $cantidad[$i],
											'precioU' => $PUnitario[$i],
											'ptunitario' => $PTUnitario[$i],
											'id_producto' => $id_producto,
											'id_tipo_unitario' => $id_tipo_unitario[$i],
											'estadoPTU' => 1
											);
			$this->model_precioTipoU->agregar_datos($PtipoU);
		}


	}
	public function modificar_producto()
	{
		$id = $this->input->post('id');
		$nombre_pro = $this->input->post('nombre_pro');
		//$descripcion = $this->input->post('descripcion');
		//$precio = $this->input->post('precio');
		$marca = $this->input->post('marca');
		//$stock = $this->input->post('stock');
		$id_tipo_producto = $this->input->post('id_tipo_producto');
		//$id_tipo_unitario = $this->input->post('id_tipo_unitario');
		$id_almacen = $this->input->post('id_almacen');
		$data = array(
			'nombre_pro' => $nombre_pro,
			'marca' => $marca,
			'id_tipo_producto' => $id_tipo_producto,
			'id_almacen' => $id_almacen,
		);
		$this->model_producto->modificar_producto($id,$data);
		// ------------------Guardar nuevos Precio Tipo unidad-------------
		if (isset($_POST["cantidadN"]))
		{
			$id_tipo_unitario = $this->input->post('id_tipo_unitarioN');
			$cantidad = $this->input->post('cantidadN');
			$PUnitario = $this->input->post('PUnitarioN');
			$PTUnitario = $this->input->post('PTUnitarioN');
			for ($i=0; $i <count($cantidad) ; $i++) {
				$PtipoU = array('cantidadTU' => $cantidad[$i],
												'precioU' => $PUnitario[$i],
												'ptunitario' => $PTUnitario[$i],
												'id_producto' => $id,
												'id_tipo_unitario' => $id_tipo_unitario[$i],
												'estadoPTU' => 1
												);
				$this->model_precioTipoU->agregar_datos($PtipoU);
			}
		}
		// ------------------Modificar Precio Tipo unidad-------------
		if (isset($_POST["idPrecioTipoU"]))
		{
			$idPrecioTipoU = $this->input->post('idPrecioTipoU');
			$cantidad = $this->input->post('cantidad');
			$PUnitario = $this->input->post('PUnitario');
			$PTUnitario = $this->input->post('PTUnitario');
			for ($i=0; $i <count($cantidad) ; $i++) {
				$PtipoU = array('cantidadTU' => $cantidad[$i],
												'precioU' => $PUnitario[$i],
												'ptunitario' => $PTUnitario[$i],
												);
				$this->model_precioTipoU->modificar_precioTipoU($idPrecioTipoU[$i],$PtipoU);
			}
		}
	}
	public function buscar_producto()
	{
		$id = $this->input->post('id');
		$r = $this->model_producto->buscar_producto($id);
		$r2 = $this->model_producto->buscar_ptu($id);
		$tipoP = $this->model_tipo_producto->listar_tipo_producto();
		$tipoU = $this->model_tipo_unitario->listar_tipo_unitario();
		$almacen = $this->model_almacen->listar_almacen();
		$data = array('Tproducto' => $tipoP, 'Tunitario' => $tipoU, 'almacen' =>$almacen, 'producto' => $r,'ptu'=>$r2);
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
	public function darBajaTU()
	{
		$id = $this->input->post('idTU');
		$data = array('estadoPTU' => 0 );
		$this->model_precioTipoU->modificar_precioTipoU($id,$data);
	}
	public function darAltaTU()
	{
		$id = $this->input->post('idTU');
		$data = array('estadoPTU' => 1 );
		$this->model_precioTipoU->modificar_precioTipoU($id,$data);
	}
}
