<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_tipo_unitario extends CI_Model {
	public function listar_tipo_unitario()
	{
		$query = $this->db->get('tipo_unitario');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('tipo_unitario');
	}
	public function modificar_tipo_unitario($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('tipo_unitario', $data);
	}
	public function buscar_tipo_unitario($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('tipo_unitario');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('tipo_unitario', array('id' => $id));
	}
}
