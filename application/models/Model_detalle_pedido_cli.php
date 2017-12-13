<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_detalle_pedido_cli extends CI_Model {
	public function listar_detalle_pedido_cli()
	{
		$query = $this->db->get('detalle_pedido_cli');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('detalle_pedido_cli');
	}
	public function modificar_detalle_pedido_cli($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('detalle_pedido_cli', $data);
	}
	public function buscar_detalle_pedido_cli($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('detalle_pedido_cli');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('detalle_pedido_cli', array('id' => $id));
	}
}
