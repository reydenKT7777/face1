<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_sucursal extends CI_Model {
	public function listar_sucursal()
	{
		$query = $this->db->get('sucursal');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('sucursal');
		return $this->db->insert_id();
	}
	public function modificar_sucursal($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('sucursal', $data);
	}
	public function buscar_sucursal($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('sucursal');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('sucursal', array('id' => $id));
	}
}
