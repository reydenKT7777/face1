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
}
