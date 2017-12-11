<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_precioTipoU extends CI_Model {
	public function listar_precioTipoU()
	{
		$query = $this->db->get('precioTipoU');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('precioTipoU');
	}
	public function modificar_precioTipoU($id,$data)
	{
		$this->db->where('idPrecioTipoU', $id);
		$this->db->update('precioTipoU', $data);
	}
	public function buscar_precioTipoU($id)
	{
		$query = $this->db->select('*')
                ->where('idPrecioTipoU', $id)
                ->get('precioTipoU');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('precioTipoU', array('idPrecioTipoU' => $id));
	}
}
