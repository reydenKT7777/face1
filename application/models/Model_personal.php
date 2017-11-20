<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_personal extends CI_Model {
	public function listar_personal()
	{
		$query = $this->db->query('select * from personal p,sucursal s
															where s.id = p.id_sucursal');
		return $query->result();
	}
	public function log($usr,$pas)
	{
		$pass = sha1($pas);
		$r = $this->db->query("select p.*,s.nombre,s.id from personal p, sucursal s
														where
														p.usuario like ".$this->db->escape($usr)." and
														p.password like ".$this->db->escape($pass)." and
														p.id_sucursal = s.id");
		if ($r->num_rows()>0) {
			return $r->result();
		}
		else {
			return false;
		}
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('personal');
	}
	public function modificar_personal($id,$data)
	{
		$this->db->where('ci', $id);
		$this->db->update('personal', $data);
	}
	public function buscar_personal($id)
	{
		$query = $this->db->select('*')
                ->where('ci', $id)
                ->get('personal');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('personal', array('ci' => $id));
	}
}
