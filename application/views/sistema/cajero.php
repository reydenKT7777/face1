<div class="container-fluid features" id="section2">
	<div class="">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center features-text">Cajero</h2>
				<div class="col-md-3">
					<ul class="list-group">
						<li class="list-group-item">
							<button type="button" class="btn btn-primary btn-block" onclick="ventanas(1)"><i class="fa fa-shopping-cart"></i> Ventas</button>
						</li>
						<li class="list-group-item">
							<button type="button" class="btn btn-info btn-block" onclick="ventanas(2)"><i class="fa fa-eye"></i> Estado de caja</button>
						</li>
						<li class="list-group-item">
							<button type="button" class="btn btn-success btn-block" onclick="ventanas(3)"><i class="fa fa-dollar"></i> Transacciones</button>
						</li>
					</ul>
				</div>
				<div class="col-md-9">
						<div class="col-xs-12 col-md-12 placeholder" id="ventas">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<center><h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Notas de venta</h3></center>
								</div>
								<div class="panel-body">
									<!--div class="input-group">
									  <span class="input-group-addon">Notas de venta</span>
									  <input type="text" id="cadena" onkeyup="listar_notaV()" class="form-control">
										<span class="input-group-addon"><i class="fa fa-search"></i></span>
									</div-->
									<div class="listaNotaVenta table-responsive">

									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 placeholder" id="caja" style="display:none">
							<div class="panel panel-info">
								<div class="panel-heading">
									<center><h3 class="panel-title"><i class="fa fa-eye"></i> Estado de Caja</h3></center>
								</div>
								<div class="panel-body">

								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 placeholder" id="trans" style="display:none">
							<div class="panel panel-success">
								<div class="panel-heading">
									<center><h3 class="panel-title"><i class="fa fa-dollar"></i> Realizar otras transacciones</h3></center>
								</div>
								<div class="panel-body">

								</div>
							</div>
						</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===================Modal=========================================-->
<div class="modal fade" id="cuentaPersonal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="">Cuentas pendientes nota de venta</h4>
      </div>
      <div class="modal-body">
        <div class="row">

					<div class="col-md-9" id="listaPagos">

					</div>
					<div class="col-md-3">
						<div class="input-group">
		          <span class="input-group-addon">Monto</span>
		          <input type="text" class="form-control" id="montoPago" placeholder="">
		          <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
		        </div><br>
						<button type="button" class="btn btn-success btn-block" onclick="pagar()">Registrar pago <i class="fa fa-save"></i></button>
	        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===================End Modal=========================================-->

<script>
var base_url = "<?=base_url()?>";
$(document).ready(function() {
	listar_notaV();
});
	var ventanas = function (id) {
		if (id == 1) {
			$('#ventas').show();
			$('#caja').hide();
			$('#trans').hide();
			listar_notaV();
		}
		else if (id == 2) {
			$('#ventas').hide();
			$('#caja').show();
			$('#trans').hide();
		}
		else if (id = 3) {
			$('#ventas').hide();
			$('#caja').hide();
			$('#trans').show();
		}
	}
	var listar_notaV = function () {
		//var cad = $('#cadena').val();
		$.ajax({
			url: base_url+'index.php/ventaPedido/buscarNotaVenta',
			//type: 'POST',
			dataType: 'json',
			//data: {cad: cad},
			success:function (data) {
				var html = "";
				html += '<table class="table" id="ventastabla">'+
									'<thead>'+
										'<tr>'+
											'<th>Nro Nota</th>'+
											'<th>Cliente</th>'+
											'<th>Fecha Venta</th>'+
											'<th>Fecha Limite</th>'+
											'<th>tipo venta</th>'+
											'<th>Total</th>'+
											'<th>Pendiente</th>'+
											'<th></th>'+
										'</tr>'+
									'</thead>'+
									'<tbody>';
									for (var i = 0; i < data.length; i++) {
										html += '<tr>'+
															'<td>'+data[i]["nro_pedido"]+'</td>'+
															'<td>'+data[i]["nombre_cliente"]+'</td>'+
															'<td>'+data[i]["fecha_venta"]+'</td>'+
															'<td>'+data[i]["fecha_limite"]+'</td>'+
															'<td>'+data[i]["tipo_venta"]+'</td>'+
															'<td class="success">'+data[i]["monto_total"]+'</td>'+
															'<td class="warning">'+data[i]["montoPendiente"]+'</td>';
															html += '<td>';
															html += '<button type="button" class="btn btn-success btn-xs" title="Ver Cuentas" onclick="verCuentas('+data[i]["id"]+')"><i class="fa fa-eye"></i></button>';
															html += '</td>';
														'</tr>';
									}
					html +='</tbody>'+
								'</table>';
					$('.listaNotaVenta').empty();
					$('.listaNotaVenta').html(html);
					$('#ventastabla').DataTable({
						"language": {"sProcessing":     "Procesando...",
												"sLengthMenu":     "Mostrar _MENU_ registros",
												"sZeroRecords":    "No se encontraron resultados",
												"sEmptyTable":     "Ningún dato disponible en esta tabla",
												"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
												"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
												"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
												"sInfoPostFix":    "",
												"sSearch":         "Buscar:",
												"sUrl":            "",
												"sInfoThousands":  ",",
												"sLoadingRecords": "Cargando...",
												"oPaginate": {
														"sFirst":    "Primero",
														"sLast":     "Último",
														"sNext":     "Siguiente",
														"sPrevious": "Anterior"
												},
												"oAria": {
														"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
														"sSortDescending": ": Activar para ordenar la columna de manera descendente"
												}
												}
					});
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	var imprimirTablaBusqueda = function (data) {
		if (data != 0) {

		}
	}
	var idd = 0;
	var verCuentas = function (id) {
		idd = id;
		$('#cuentaPersonal').modal("show");
		FajaxMostrarCuentas(id);
	}
	var FajaxMostrarCuentas = function (id) {
		$.ajax({
			url: base_url+'index.php/ventaPedido/verCuentas',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success:function (data) {
				var html = "";
				for (var i = 0; i < data.nota.length; i++) {

					html += '<div class="col-md-6"><h4>Nro nota: '+data.nota[i]["nro_pedido"]+'</h4>'+
					'<h4>Cliente: '+data.nota[i]["nombre_cliente"]+'</h4>'+
					'<h4>Fecha venta: '+data.nota[i]["fecha_venta"]+'</h4></div>'+
					'<div class="col-md-6"><h4 style="background-color:#6de84d">Monto total: '+
					data.nota[i]["monto_total"]+'</h4>';
					html += '<h4 style="background-color:#a0a7e3">Pendiente: '+data.nota[i]["montoPendiente"]+'</h4></div>';
				}
				html += '<table class="table table-striped">'+
						'<thead>'+
							'<tr>'+
								'<th>Fecha Pago</th>'+
								'<th>Monto pagado</th>'+
								'<th>Monto pendiente</th>'+
							'</tr>'+
						'</thead>'+
						'<tbody>';
							for (var i = 0; i < data.pagos.length; i++) {
								html += "<tr>";
								html += "<td>"+data.pagos[i]["fecha_pago"]+"</td>";
								html += "<td>"+data.pagos[i]["monto"]+"</td>";
								html += "<td>"+data.pagos[i]["monto_pendiente"]+"</td>";
								html += "</tr>";
							}
						html += '</tbody>'+
				'</table>';
				$('#listaPagos').empty();
				$('#listaPagos').html(html);
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	}
	var pagar = function () {
		var cantidad = $('#montoPago').val();
		$.ajax({
			url: base_url+'index.php/ventaPedido/pagar',
			type: 'POST',
			dataType: 'json',
			data: {idNota:idd,cantidad:cantidad},
			success:function (data) {
				if (data.resp == true) {
					FajaxMostrarCuentas(idd);
					listar_notaV();
				}
				else {
					alert("El monto es mayor a la deuda pendiente!!");
				}
				$('#montoPago').val("");
			}
		});

	}
</script>
