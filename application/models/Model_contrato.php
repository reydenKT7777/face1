<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_contrato extends CI_Model {
	public function listar_contrato()
	{
		$query = $this->db->query('select c.id as id_c,c.*,p.*,t.*,s.*
																from contrato c,personal p, tipo_contrato t, sucursal s
																where c.id_personal = p.ci and c.id_tipo_contrato = t.id and
																s.id = p.id_sucursal
															');
		return $query->result();
	}
	public function listar_contratoSucursal($id)
	{
		$query = $this->db->query('select c.id as id_c,c.*,p.*,t.*,s.*
																from contrato c,personal p, tipo_contrato t, sucursal s
																where c.id_personal = p.ci and c.id_tipo_contrato = t.id and
																s.id = p.id_sucursal and
																s.id = '.$id.' and
																c.estadoContrato = 1
															');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('contrato');
	}
	public function modificar_contrato($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('contrato', $data);
	}
	public function buscar_contrato($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('contrato');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('contrato', array('id' => $id));
	}
	public function verContrato($id)
	{
		$r = $this->db->query("select c.id as id_c,c.*,t.*,p.nombres,p.apellidos,p.ci
														from personal p,contrato c, tipo_contrato t
														where p.ci = c.id_personal and
														c.id_tipo_contrato = t.id and
														c.id = $id"
													);
		return $r->result();
	}
	public function verPagos($id)
	{
		$r = $this->db->query("select * from pago_contrato
													where id_contrato = $id");
		return $r->result();
	}
}
