<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pedido_prov extends CI_Model {
	public function listar_pedido_prov()
	{
		$query = $this->db->get('pedido_prov');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('pedido_prov');
		return $this->db->insert_id();
	}
	public function modificar_pedido_prov($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('pedido_prov', $data);
	}
	public function buscar_pedido_prov($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('pedido_prov');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('pedido_prov', array('id' => $id));
	}
	public function agregarProductos($data)
  {
    $this->db->set($data);
		$this->db->insert('detalle_pedido');
  }
	public function nro($value='')
	{
		$r = $this->db->query("select max(`nro_pedido`) as max from pedido_prov");
		return $r->row();
	}
	public function reportePedido($id)
	{
		$r = $this->db->query("SELECT
											prov.nombre_prov,prov.nit,
											p.fecha_pedido,p.nro_pedido,p.monto_total,p.monto_pendiente,
											pro.nombre_pro,tu.nombre_tipo_u,d.cantidadTU,d.precioTU,d.total
											FROM pedido_prov p
											 INNER JOIN detalle_pedido d ON d.id_pedido = p.id
											 INNER JOIN proveedor prov ON prov.id = p.id_proveedor
											 INNER JOIN producto pro ON pro.id = d.id_producto
											 INNER JOIN precioTipoU ptu ON ptu.idPrecioTipoU = d.idPrecioTipoU
											 INNER JOIN tipo_unitario tu ON tu.id = ptu.id_tipo_unitario
											WHERE p.id = $id");
		return $r->result();
	}
}
