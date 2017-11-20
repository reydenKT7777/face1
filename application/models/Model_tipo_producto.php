<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_tipo_producto extends CI_Model {
	public function listar_tipo_producto()
	{
		$query = $this->db->get('tipo_producto');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('tipo_producto');
	}
	public function modificar_tipo_producto($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('tipo_producto', $data);
	}
	public function buscar_tipo_producto($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('tipo_producto');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('tipo_producto', array('id' => $id));
	}
}
