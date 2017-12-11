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
								//$query = $this->db->select('*')
		return $query->result();
	}
	public function eliminar_datos($id)
	{
		$this->db->delete('nota_venta', array('id' => $id));
	}
	public function Buscar_notas_ventas($l)
	{
		/*if ($l == "") {*/
			$r = $this->db->query("select n.*,c.nombre_cliente,c.nit
														from nota_venta n, pedido_cli p, cliente c
														where n.montoPendiente > 0 and
														n.nro_pedido = p.nro_pedido and
														c.id = p.id_cliente
														");
		/*}
		else {
			$r = $this->db->query("select n.*,c.nombre_cliente,c.nit
														from nota_venta n, pedido_cli p, cliente c
														where n.montoPendiente > 0 and
														n.nro_pedido = p.nro_pedido and
														c.id = p.id_cliente and
														(c.nit = '%$l' or c.nit = '%$l%' or nit = '$l%') or
														(c.nombre_cliente like '%$l' or c.nombre_cliente like '%$l%' or c.nombre_cliente like '$l%') or
														(n.fecha_venta = '%$l' or n.fecha_venta = '%$l%' or n.fecha_venta = '$l%')
														");
		}*/
	 return $r->result();
	}
	public function Buscar_notaVenta($id)
	{

			$r = $this->db->query("select n.*,c.nombre_cliente,c.nit
														from nota_venta n, pedido_cli p, cliente c
														where n.montoPendiente > 0 and
														n.nro_pedido = p.nro_pedido and
														c.id = p.id_cliente and
														n.id = $id
														");
	 return $r->result();
	}
	public function Buscar_PagosVenta($id)
	{
		$r = $this->db->query("select *
													from pago_nota_venta
													where
													id_nota_venta = $id
													");
 		return $r->result();
	}
	public function pagoNota($data)
	{
		$this->db->set($data);
		$this->db->insert('pago_nota_venta');
	}
	public function pagar($idNota,$cantidad)
	{
		$nota = $this->Buscar_notaVenta($idNota);
		$very = false;
		foreach ($nota as $row) {
			if ($row->montoPendiente >= $cantidad) {
				$pendiente = $row->montoPendiente;
				$total = $pendiente - $cantidad;
				$very = true;
				$pagoNota = array('id_nota_venta' => $idNota,
													'fecha_pago' => date("Y-m-d"),
													'id_personal' => $this->session->ci,
													'monto' => $cantidad,
													'monto_pendiente' => $total
			 										);
				$this->pagoNota($pagoNota);
			}
		}
		if ($very == true) {
			$data = array('montoPendiente' => $total);
			$this->modificar_nota_venta($idNota,$data);
		}
		return $very;
	}
	public function reporteVentas($id)
	{
		$r = $this->db->query("SELECT n.nro_pedido,n.fecha_venta, n.monto_total , n.tipo_venta,
													c.nombre_cliente,c.nit,c.tipo_cliente,
													pro.nombre_pro, pro.descripcion, pro.marca , d.cantidad, d.total,
													per.nombres,per.apellidos
													FROM nota_venta n
													INNER JOIN pedido_cli p ON n.nro_pedido = p.nro_pedido
													INNER JOIN detalle_pedido_cli d on d.nro_pedido = p.nro_pedido
													INNER JOIN cliente c ON c.id = p.id_cliente
													INNER JOIN producto pro on pro.id = d.id_producto
													INNER JOIN personal per on per.ci = n.id_personal
													where p.nro_pedido=$id");
		return $r->result();
	}
	public function buscarCliente($idCliente)
	{
		$r = $this->db->query("SELECT c.nombre_cliente,c.nit,n.monto_total,n.fecha_venta,n.nro_pedido,n.montoPendiente
											FROM nota_venta n
											INNER JOIN pedido_cli pc on pc.nro_pedido = n.nro_pedido
											INNER JOIN cliente c on c.id = pc.id_cliente
											WHERE c.id = $idCliente
											");
		return $r->result();
	}
}
