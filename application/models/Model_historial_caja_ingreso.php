<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_historial_caja_ingreso extends CI_Model {
	public function listar_historial_caja_ingreso()
	{
		$query = $this->db->get('historial_caja_ingreso');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('historial_caja_ingreso');
	}
	public function modificar_historial_caja_ingreso($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('historial_caja_ingreso', $data);
	}
	public function buscar_historial_caja_ingreso($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('historial_caja_ingreso');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('historial_caja_ingreso', array('id' => $id));
	}
}
