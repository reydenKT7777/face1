<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pedido_cli extends CI_Model {
	public function listar_pedido_cli()
	{
		$query = $this->db->get('pedido_cli');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('pedido_cli');
		return $this->db->insert_id();
	}
	public function listaPedidos($l)
	{
		$r = $this->db->query("select p.nro_pedido as id,c.nombre_cliente,c.nit,c.direccion,c.tipo_cliente,p.fecha_pedido
													from cliente c, pedido_cli p
													where
													c.id = p.id_cliente and
													p.estado = 0 and
													p.id_sucursal = ".$this->session->id_sucursal." and
													(c.nombre_cliente like '".$l."%'or c.nombre_cliente like '%".$l."%' or c.nombre_cliente like '%".$l."') or
													(c.nit like '".$l."%'or c.nit like '%".$l."%' or c.nit like '%".$l."')");
		return $r->result();
	}
	public function modificar_pedido_cli($id,$data)
	{
		$this->db->where('nro_pedido', $id);
		$this->db->update('pedido_cli', $data);
	}
	public function buscar_pedido_cli($id)
	{
		$query = $this->db->select('*')
                ->where('nro_pedido', $id)
                ->get('pedido_cli');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('pedido_cli', array('nro_pedido' => $id));
	}
	public function buscarPedidosCliente()
	{
		$r = $this->db->query("select * from pedido_cli where id_cliente = ".$this->session->id_cliente);
		return $r->result();
	}
	public function verPedido($id)
	{
		$r = $this->db->query("select *, d.id as idDetalle
													from pedido_cli p, detalle_pedido_cli d, producto pro,sucursal s
													where d.nro_pedido = p.nro_pedido and
													s.id = p.id_sucursal and
													d.id_producto = pro.id and
													p.nro_pedido = $id");
		return $r->result();
	}
}
