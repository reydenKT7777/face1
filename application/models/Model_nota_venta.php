<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_nota_venta extends CI_Model {
	public function listar_nota_venta()
	{
		$query = $this->db->get('nota_venta');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('nota_venta');
	}
	public function modificar_nota_venta($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('nota_venta', $data);
	}
	public function buscar_nota_venta($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('nota_venta');
								//$query = $this->db->select('*')
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('nota_venta', array('id' => $id));
	}
	public function Buscar_notas_ventas($l)
	{
		/*if ($l == "") {*/
			$r = $this->db->query("select n.*,c.nombre_cliente,c.nit
														from nota_venta n, pedido_cli p, cliente c
														where n.montoPendiente > 0 and
														n.nro_pedido = p.nro_pedido and
														c.id = p.id_cliente
														");
		/*}
		else {
			$r = $this->db->query("select n.*,c.nombre_cliente,c.nit
														from nota_venta n, pedido_cli p, cliente c
														where n.montoPendiente > 0 and
														n.nro_pedido = p.nro_pedido and
														c.id = p.id_cliente and
														(c.nit = '%$l' or c.nit = '%$l%' or nit = '$l%') or
														(c.nombre_cliente like '%$l' or c.nombre_cliente like '%$l%' or c.nombre_cliente like '$l%') or
														(n.fecha_venta = '%$l' or n.fecha_venta = '%$l%' or n.fecha_venta = '$l%')
														");
		}*/
	 return $r->result();
	}
}
