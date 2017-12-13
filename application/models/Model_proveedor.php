<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_proveedor extends CI_Model {
	public function listar_proveedor()
	{
		$query = $this->db->get('proveedor');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('proveedor');
	}
	public function modificar_proveedor($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('proveedor', $data);
	}
	public function buscar_proveedor($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('proveedor');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('proveedor', array('id' => $id));
	}
	public function listaProveedor($l)
	{
		$r = $this->db->query("select * from proveedor
													where nombre_prov like '".$l."%'
													or nombre_prov like '%".$l."%'
													or nombre_prov like '%".$l."'
													or nit like '".$l."%'
													or nit like '%".$l."%'
													or nit like '%".$l."'
													and estado = 1");
		return $r->result();
	}
}
