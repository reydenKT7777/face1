<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_pago_contrato extends CI_Model {
	public function verCaja($idContrato,$monto)
	{
		$very = false;
		$r = $this->db->query("select cj.* from caja cj,sucursal s, personal p, contrato c
														where cj.id_sucursal = s.id and
														s.id = p.id_sucursal and
														p.ci = c.id_personal and
														c.id = $idContrato ");
		foreach ($r->result() as $row) {
			$montoCaja = $row->monto;
			$id_caja = $row->id;
		}
		if ($montoCaja >= $monto) {
			$very = array('id_caja' => $id_caja,
		 								'monto' => $montoCaja
									);
		}
		return $very;
	}
	public function listar_pago_contrato()
	{
		$query = $this->db->get('pago_contrato');
		return $query->result();
	}
	public function agregar_datos($data)
	{
		$this->db->set($data);
		$this->db->insert('pago_contrato');
	}
	public function modificar_pago_contrato($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('pago_contrato', $data);
	}
	public function buscar_pago_contrato($id)
	{
		$query = $this->db->select('*')
                ->where('id', $id)
                ->get('pago_contrato');
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('pago_contrato', array('id' => $id));
	}
}
