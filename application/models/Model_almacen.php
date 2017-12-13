<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_almacen extends CI_Model {
	public function listar_almacen()
	{
		$query = $this->db->query('select * from almacen a,sucursal s
															where a.id_sucursal = s.id ');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('almacen');
	}
	public function modificar_almacen($id,$data)
	{
		$this->db->where('id_almacen', $id);
		$this->db->update('almacen', $data);
	}
	public function buscar_almacen($id)
	{
		$query = $this->db->select('*')
                ->where('id_almacen', $id)
                ->get('almacen');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('almacen', array('id_almacen' => $id));
	}
}
