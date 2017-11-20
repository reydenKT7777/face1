<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_nota_venta extends CI_Model {
	public function listar_nota_venta()
	{
		$query = $this->db->get('nota_venta');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('nota_venta');
	}
	public function modificar_nota_venta($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('nota_venta', $data);
	}
	public function buscar_nota_venta($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('nota_venta');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('nota_venta', array('id' => $id));
	}
}
