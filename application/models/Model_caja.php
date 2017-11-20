<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_caja extends CI_Model {
	public function listar_caja()
	{
		$query = $this->db->query('select * from caja c, sucursal s
															where c.id_sucursal = s.id');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('caja');
	}
	public function modificar_caja($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('caja', $data);
	}
	public function buscar_caja($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('caja');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('caja', array('id' => $id));
	}
	public function mostrarHistorialIngresos($id,$f1,$f2)
	{
		$r = $this->db->query("select * from caja c, historial_caja_ingreso h, personal p
														where h.id_caja = c.id AND
														h.id_personal = p.ci AND
														h.id_caja = $id AND
														h.fecha BETWEEN '$f1' and '$f2'");
		return  $r->result();
	}
	public function mostrarHistorialEgresos($id,$f1,$f2)
	{
		$r = $this->db->query("select * from caja c, historial_caja_egreso h, personal p
														where h.id_caja = c.id AND
														h.id_personal = p.ci AND
														h.id_caja = $id AND
														h.fecha BETWEEN '$f1' and '$f2'");
		return  $r->result();
	}
}
