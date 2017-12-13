<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_tipo_contrato extends CI_Model {
	public function listar_tipo_contrato()
	{
		$query = $this->db->get('tipo_contrato');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('tipo_contrato');
	}
	public function modificar_tipo_contrato($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('tipo_contrato', $data);
	}
	public function buscar_tipo_contrato($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('tipo_contrato');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('tipo_contrato', array('id' => $id));
	}
}
