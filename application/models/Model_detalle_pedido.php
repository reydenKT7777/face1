<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_detalle_pedido extends CI_Model {
	public function listar_detalle_pedido()
	{
		$query = $this->db->get('detalle_pedido');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('detalle_pedido');
	}
	public function modificar_detalle_pedido($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('detalle_pedido', $data);
	}
	public function buscar_detalle_pedido($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('detalle_pedido');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('detalle_pedido', array('id' => $id));
	}
}
