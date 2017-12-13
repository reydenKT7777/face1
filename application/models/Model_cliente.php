<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_cliente extends CI_Model {
	public function listar_cliente()
	{
		$query = $this->db->get('cliente');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('cliente');
	}
	public function modificar_cliente($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('cliente', $data);
	}
	public function buscar_cliente($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('cliente');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('cliente', array('id' => $id));
	}
	public function listaCliente($l)
	{
		$r = $this->db->query("select * from cliente
													where nombre_cliente like '".$l."%'or nombre_cliente like '%".$l."%' or nombre_cliente like '%".$l."'
													or nit like '".$l."%'or nit like '".$l."%'or nit like '".$l."%'");
		return $r->result();
	}
	public function log($usr,$pas)
	{
		$pass = md5($pas);
		$r = $this->db->query("select * from cliente
														where
														correo like ".$this->db->escape($usr)." and
														pass like ".$this->db->escape($pass)." and
														publico = 1");
		if ($r->num_rows()>0) {
			return $r->result();
		}
		else {
			return false;
		}
	}
}
