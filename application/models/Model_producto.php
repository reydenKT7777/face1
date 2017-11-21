<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_producto extends CI_Model {
	public function listar_producto($id)
	{
		$query = $this->db->query('select s.nombre as ns,p.*,tp.nombre_tipo_p, tu.nombre_tipo_u, a.nombre_almacen
														from
														producto p, tipo_producto tp, tipo_unitario tu, almacen a, sucursal s
														where
														p.id_tipo_producto = tp.id and
														p.id_tipo_unitario = tu.id and
														p.id_almacen = a.id_almacen and
														a.id_sucursal = '.$id.' and
														s.id = a.id_sucursal'
													);
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('producto');
	}
	public function modificar_producto($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('producto', $data);
	}
	public function buscar_producto($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('producto');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('producto', array('id' => $id));
	}
	public function listaProducto($l)
	{
		$r = $this->db->query("
													select p.* from producto p, almacen a
													where (p.nombre_pro like '".$l."%'or p.nombre_pro like '%".$l."%' or p.nombre_pro like '%".$l."')
													and a.id_sucursal = ".$this->session->id_sucursal."
													and p.id_almacen = a.id_almacen"
													);
		return $r->result();
	}
	public function incrementar($id,$cantidad)
	{
		$r = $this->buscar_producto($id);
		foreach ($r as $row) {
			$stock = $row->stock;
		}
		$stock = $stock + $cantidad;
		$data = array('stock' => $stock );
		$this->modificar_producto($id,$data);
	}
	public function decrementar($id,$cantidad)
	{
		$verificar = false;
		$r = $this->buscar_producto($id);
		foreach ($r as $row) {
			$stock = $row->stock;
		}
		if ($stock >= $cantidad) {
			$stock = $stock - $cantidad;
			$data = array('stock' => $stock );
			$this->modificar_producto($id,$data);
			$verificar = true;
		}
		return $verificar;
	}
	public function historialIn($id,$cantidad)
	{
		$data  = array('id_producto' => $id,
									'cantidad' => $cantidad,
									'fecha_ingreso'=> date("Y-m-d"),
									'hora_ingreso' => date("G:i:s"),
									'id_personal' => $this->session->ci
	 									);
		$this->db->insert('historial_ingreso_producto', $data);
	}
	public function historialSal($id,$cantidad)
	{
		$data  = array('id_producto' => $id,
									'cantidad' => $cantidad,
									'fecha_egreso'=> date("Y-m-d"),
									'hora_egreso' => date("G:i:s"),
									'id_personal' => $this->session->ci
	 									);
		$this->db->insert('historial_egreso_producto', $data);
	}
}
