<div class="container-fluid work" id="work">
	<div class="container">
		<div class="row" id="starts">
			<div class="col-md-12 col-sm-12 col-xs-12 work-list">
				<center><h1 class="">Menu principal Ventas</h1></center>
				<br>
		<center>
				<div class="row">
					<div class="col-xs-6 col-sm-6">
						<button class="btn btn-warning btn-block active" id="nv" type="button">Nota venta</button>
					</div>
					<div class="col-xs-6 col-sm-6">
						<button class="btn btn-info btn-block" id="npp" type="button">Pedidos</button>
					</div>
	    </div>
		</center>
		<div class="col-md-12 col-sm-12 col-xs-12 work-space notaVenta" id="" style="">
			<div class="col-xs-12 col-sm-12 placeholder">
				<div class="panel panel-success">
					<div class="panel-heading">
						<center><h1 class="panel-title">Nota venta</h1></center>
					</div>
					<div class="panel-body">
							<div class="">
								<div class="col-xs-12 col-md-12 bloque">
											<br> <center><h3 style="color:#14b03f">Productos disponibles</h3></center>
											<div class="form-group col-xs-12 col-md-4">
													<select class="form-control" id="productos">
														<option value="0">[.::::::::::::Buscar Producto::::::::::::.]</option>
													</select>
											</div>
											<div class="col-xs-12 col-md-4">
												<div class="form-group">
												  <input type="text" class="form-control" id="cantidadP" placeholder="Cantidad" title="Cantidad del producto">
												</div>
											</div>
											<div class="col-xs-2 col-md-4">
												<div class="form-group">
												  <button type="button" class="btn btn-info btnv2" title="Agregar a la lista de productos" onclick="agergarALista()">Agergar <i class="fa fa-plus-circle"></i></button>
												</div>
											</div>
								</div>
								<div class="col-xs-12 col-sm-12">
									<div class="col-xs-12 col-sm-8 stock" style="background-color:#5c6c94; color:#fff;">

									</div>
								</div>
							</div>
					</div>

						<br>
					<div class="">
						<form  enctype="multipart/form-data" id="listaProductos" method="#">
							<div class="col-xs-12 col-sm-12">
								<div class="col-xs-12 col-sm-2">
									<div class="radio">
											<label>
													<input checked value="Al contado" id="tipoVenta1" name="tipoVenta" type="radio"> Al contado
											</label>
									</div>
								</div>
								<div class="col-xs-12 col-sm-2">
									<div class="radio">
											<label>
													<input value="A credito" id="tipoVenta2" name="tipoVenta" type="radio"> A credito
											</label>
									</div>
								</div><br><br>
								<div class="input-group col-xs-12 col-md-3" style="display:none" id="dp">
								  <span class="input-group-addon">Dias plaso</span>
								  <input type="text" class="form-control" placeholder="" name="limiteDias">
								</div><br>
							</div>
									<div class="form-group">
										<div class="col-xs-12 col-sm-4 ">

											<div class="input-group">
											  <span class="input-group-addon">Cliente</span>
												<select class="form-control" id="cliente" name="cliente" size="150" title="Buscar cliente">
													<option value="0">[.::::::::::::Buscar Cliente::::::::::::.]</option>
												</select>

											</div>
										</div>
										<button class="btn btn-success" type="button" onclick="imprimir_agregar_cliente()">Agregar cliente <i class="fa fa-plus"></i></button><br><br>
										<center>
											<button type="button" class="btn btn-primary" onclick="guardarVenta()" name="button">Guardar Venta <i class="fa fa-save"></i></button>
											<a href="<?=base_url()?>index.php/admin/vendedor" class="btn btn-danger">Cancelar Nota</a>
										</center>
									</div>
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead style="background-color:#638cbc; color:#fff">
												<tr>
													<th>Producto</th>
													<th>Detalle</th>
													<th>Cantidad</th>
													<th>Precio</th>
													<th>total</th>

												</tr>
											</thead>
											<tbody id="contenidoVenta">
											</tbody>
											<tfoot style="background-color:#638cbc; color:#fff">
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td>Total</td>
													<td><input type="text" name="total" id="total" placeholder="total BS" class="form-control "> </td>
												</tr>
											</tfoot>
										</table>
									</div>
						</form>
					</div>

				</div>

				</div>
			</div>
		</div>
				<div class="col-md-12 col-sm-12 col-xs-12 work-space notaProforma" id="" style="display:none">
					<div class="col-xs-12 col-sm-12 placeholder">
						<div class="panel panel-info">
							<div class="panel-heading">
								<center><h1 class="panel-title">Nota proforma</h1></center>
							</div>
							<div class="panel-body">

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 work-space notaPedido" id="" style="display:none">
					<div class="col-xs-12 col-sm-12 placeholder">
						<div class="panel panel-info">
							<div class="panel-heading">
								<center><h1 class="panel-title">Pedidos</h1></center>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3 col-xs-12">
										<div class="input-group">
										  <span class="input-group-addon">Pedidos</span>
											<select class="" id="pedidos" >
												<option value="0">[.::::::::Seleccione un pedido::::::::.]</option>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<!--button type="button" class="btn btn-success">Ver pedido</button-->
									</div>
								</div>
								<br>
								<div class="row" id="infoCliente">

									<div class="col-md-12" id="pedidoCliente">


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso Clientes</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_cliente">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_cliente()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_cliente()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade notificacionRespuesta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
							 <div class="respuesta">

							 </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<script>
$('#tipoVenta1').on('click',function() {
	$('#dp').hide();
});
$('#tipoVenta2').on('click',function() {
	$('#dp').show();
});
$('#nv').on('click', function() {
	$('.notaVenta').show();
	//$('.notaProforma').hide();
	$('.notaPedido').hide();
	$('#nv').addClass('active');
	//$('#np').removeClass('active');
	$('#npp').removeClass('active');
});
/*$('#np').on('click', function() {
	$('.notaVenta').hide();
	$('.notaProforma').show();
	$('.notaPedido').hide();
	$('#nv').removeClass('active');
	$('#np').addClass('active');
	$('#npp').removeClass('active');
});*/
$('#npp').on('click', function() {
	$('.notaVenta').hide();
//	$('.notaProforma').hide();
	$('.notaPedido').show();
	$('#nv').removeClass('active');
//	$('#np').removeClass('active');
	$('#npp').addClass('active');
});
var base_url = '<?=base_url()?>';
///////////////////
$.fn.select2.amd.require([
  "select2/core",
  "select2/utils",
  "select2/compat/matcher"
], function (Select2, Utils, oldMatcher) {

  var $ajax = $("#cliente");
  function formatRepo (repo) {
    if (repo.loading) return repo.text;
    var markup = "<div class='select2-result-repository clearfix'>" +
      "<div class='select2-result-repository__avatar'></div>" +
      "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title '>" + repo.nombre_cliente + "</div>";
    if (repo.descripcion) {
      markup += "<div class='select2-result-repository__description'>" + repo.descripcion + "</div>";
    }

    markup += "<div class='select2-result-repository__statistics'>" +
      "<div class='select2-result-repository__forks colorLetra'><i class='fa fa-flash'></i>Direcci&oacute;n: " + repo.direccion + "</div>" +
      "<div class='select2-result-repository__stargazers colorLetra'><i class='fa fa-star'></i>Cliente " + repo.tipo_cliente + " </div>" +
      "<div class='select2-result-repository__watchers colorLetra'><i class='fa fa-eye'></i>Nit:  " + repo.nit + " </div>" +
    "</div>" +
    "</div></div>";

    return markup;
  }
  function formatRepoSelection (repo) {
    return repo.nombre_cliente+" "+repo.correo|| repo.text;
  }

  $ajax.select2({
    ajax: {
      url: base_url+"index.php/controlador_cliente/buscarCliente",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // parse the results into the format expected by Select2
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data, except to indicate that infinite
        // scrolling can be used
        params.page = params.page || 1;

        return {
          results: data.items,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      },
      cache: true
    },
    escapeMarkup: function (markup) { return markup; },
    minimumInputLength: 1,
    templateResult: formatRepo,
    templateSelection: formatRepoSelection
  });
  /////////////////////
	var $producto = $("#productos");
	function formatRepoProducto (repo) {
		if (repo.loading) return repo.text;
		var markup = "<div class='select2-result-repository clearfix'>" +
			"<div class='select2-result-repository__avatar'></div>" +
			"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.nombre_pro + "</div>";

		markup += "<div class='select2-result-repository__statistics'>" +
			"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i>Descripci&oacute;n: " + repo.descripcion + "</div>" +
			"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i>Precio " + repo.precio + " </div><br>" +
			"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i>Marca: " + repo.marca + "</div><br>" +
			"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i>Stock: " + repo.stock + "</div>" +
		"</div>" +
		"</div></div>";

		return markup;
	}
	function formatRepoSelectionProducto (repo) {
		return repo.nombre_pro || repo.text;
	}

	$producto.select2({
		ajax: {
			url: base_url+"index.php/controlador_producto/buscarProductoNombre",
			dataType: 'json',
			delay: 250,
			data: function (params) {
				return {
					q: params.term, // search term
					page: params.page
				};
			},
			processResults: function (data, params) {
				// parse the results into the format expected by Select2
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data, except to indicate that infinite
				// scrolling can be used
				params.page = params.page || 1;

				return {
					results: data.items,
					pagination: {
						more: (params.page * 30) < data.total_count
					}
				};
			},
			cache: true
		},
		escapeMarkup: function (markup) { return markup; },
		minimumInputLength: 1,
		templateResult: formatRepoProducto,
		templateSelection: formatRepoSelectionProducto
	});
	/////////////////////
	/////////////////////
	var $pedido = $("#pedidos");
	function formatRepoPedido (repo) {
		if (repo.loading) return repo.text;
		var markup = "<div class='select2-result-repository clearfix'>" +
			"<div class='select2-result-repository__avatar'></div>" +
			"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.nombre_cliente + "</div>";

		markup += "<div class='select2-result-repository__statistics'>" +
		"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i>Fecha de pedido " + repo.fecha_pedido + " </div><br>" +
			"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i>Nro pedido: " + repo.id + "</div>" +
			"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i>Nit: " + repo.nit + "</div><br>" +
			"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i>Tipo cliente: " + repo.tipo_cliente + "</div>" +
		"</div>" +
		"</div></div>";

		return markup;
	}
	function formatRepoSelectionPedido (repo) {
		return repo.nombre_cliente  || repo.text;
	}

	$pedido.select2({
		ajax: {
			url: base_url+"index.php/Controlador_pedido_cli/buscarPedidos",
			dataType: 'json',
			delay: 250,
			data: function (params) {
				return {
					q: params.term, // search term
					page: params.page
				};
			},
			processResults: function (data, params) {
				// parse the results into the format expected by Select2
				// since we are using custom formatting functions we do not need to
				// alter the remote JSON data, except to indicate that infinite
				// scrolling can be used
				params.page = params.page || 1;

				return {
					results: data.items,
					pagination: {
						more: (params.page * 30) < data.total_count
					}
				};
			},
			cache: true
		},
		escapeMarkup: function (markup) { return markup; },
		minimumInputLength: 1,
		templateResult: formatRepoPedido,
		templateSelection: formatRepoSelectionPedido
	});
	/////////////////////
})
//Funcion que muestra el precio del producto al momento de seleccionar producto
$('#productos').on('change', function() {
	var id = $('#productos').val();
	$.ajax({
		url: base_url+'index.php/controlador_producto/buscar_producto',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function (data) {
			$('#pUnitario').val(data.producto[0]["precio"]);
			var html = "<h3>Stock de "+data.producto[0]["nombre_pro"]+" "+data.producto[0]["marca"]+" : "+data.producto[0]["stock"]+" Unidades <input type='hidden' value='"+data.producto[0]["stock"]+"' id='stockLimite'></h3>";
			$('.stock').html(html);
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

});
// Funcion que agregar el producto a la lista de nota de venta
var agergarALista = function () {
	var c = $('#cantidadP').val();
	var stock = $('#stockLimite').val();
	var id = $('#productos').val();
	if (c != "" && c != 0 && (stock*1) >= (c*1) && id != 0) {

		$.ajax({
			url: base_url+'index.php/controlador_producto/buscar_producto',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success:function (data) {
				var cantidad = $('#cantidadP').val();
				var total = (data.producto[0]["precio"]*1) * (cantidad*1);
				var html = "";
				html +="<tr>"+
									"<td>"+data.producto[0]["nombre_pro"]+"</td>"+
									"<td>"+data.producto[0]["descripcion"]+" "+data.producto[0]["marca"]+"</td>";
									for (var i = 0; i < data.Tunitario.length; i++) {
										if (data.Tunitario[i]["id"] ==  data.producto[0]["id_tipo_unitario"]) {
											var tunit = data.Tunitario[i]["nombre_tipo_u"];
										}
									}
					html += "<td>"+cantidad+" "+tunit+"s</td>"+
									"<td>"+data.producto[0]["precio"]+"</td>"+
									"<td>"+total+"</td>"+
									'<input type="hidden" name="id_producto[]" value="'+data.producto[0]["id"]+'">'+
									'<input type="hidden" name="cantidadproducto[]" value="'+cantidad+'">'+
									'<input type="hidden" name="totalprecio[]" value="'+total+'">'+
								"</tr>";
				$('#total').val(($('#total').val()*1) + (total*1));
				$('#contenidoVenta').append(html);
				$('#cantidadP').val("");
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
	else {
		if (c == "" || c == 0 && id != 0) {
			alert("El campo de cantidad esta vacio!!");
		}
		if (!((stock*1) >= (c*1)) && id != 0) {
			alert("La no existe esa cantidad en almacen ["+ c+"] => "+stock);
		}
		if (id == 0) {
			alert("Es necesario que seleccione un producto");
		}
	}

}
// funciones que imprimen formularios de ingreso de nuevos registro de tabla cliente
var imprimir_agregar_cliente = function() {
	$('.modal_agregar_datos_cliente').modal('show');
	var html = imprime_formulario_ingreso_cliente();
	$('.formulario_crear_cliente').empty();
	$('.formulario_crear_cliente').html(html);
}
var agregar_cliente = function () {
	var formdata = new FormData($("#formulario_i_cliente")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_cliente/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_cliente').modal('hide');
	     $('.formulario_crear_cliente').empty();
      }
  	});
}
var imprime_formulario_ingreso_cliente = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_cliente' enctype='multipart/form-data'>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_cliente' class='form-control' id='nombre_cliente'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo de cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_cliente' class='form-control' id='tipo_cliente'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Correo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='correo' class='form-control' id='correo'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_cliente = function () {
	$('.modal_agregar_datos_cliente').modal('hide');
	$('.formulario_crear_cliente').empty();
}
var agregarPoducto = function () {
	var id_produco = $('#productos').val();
}
var guardarVenta = function () {
	if (confirm("esta seguro de guardar venta?")) {
		var fdata = new FormData($("#listaProductos")[0]);
		$.ajax({
	  	  url: base_url+'index.php/ventaPedido/agregarVentaDirecta',
	      type: 'POST',
	      data: fdata,
	      contentType: false,
	      processData: false,
	      success: function(data){
					$('.notificacionRespuesta').modal("show");
					$('.respuesta').html(data);
	      }
	  	});
	}
}
// Funciones de ver y guardar pedidos
$('#pedidos').on('change', function() {
	//limpiarPedido();
	var id = $('#pedidos').val();
	verPedido(id);
});
var limpiarPedido = function () {
	$('#infoCliente').empty();
	$('#pedidoCliente').empty();
}
var verPedido = function (id) {
	$.ajax({
		url: base_url+'index.php/controlador_pedido_cli/verPedido',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function (data) {
			//$('.modal_verPedido').modal("show");
			var html = "";
			html += "<h1>"+data[0]["nombre"]+"</h1>";
			html += "<h3>Fecha: "+data[0]["fecha_pedido"]+"</h3>";
			//html += '<form class="listaProductos">';
			html += '<input value="'+data[0]["monto"]+'" id="" name="" type="hidden" class="monto">';
			html += '<div class="col-xs-12 col-sm-12">'+
				'<div class="col-xs-12 col-sm-2">'+
					'<div class="radio">'+
							'<label>'+
									'<input checked value="Al contado" id="" name="tv1" type="radio" class="tipoVenta1"> Al contado'+
							'</label>'+
					'</div>'+
				'</div>'+
				'<div class="col-xs-12 col-sm-2">'+
					'<div class="radio">'+
							'<label>'+
									'<input value="A credito" id="" name="tv1" type="radio" class="tipoVenta2"> A credito'+
							'</label>'+
					'</div>'+
				'</div><br><br>'+
				'<div class="input-group col-xs-12 col-md-3 dp" style="display:none" id="dp">'+
					'<span class="input-group-addon">Dias plaso</span>'+
					'<input type="text" class="form-control limiteDias" placeholder="" name="">'+
				'</div><br>'+
			'</div>';
			html += '<table class="table">'+
				'<thead>'+
					'<tr>'+
						'<th>#</th>'+
						'<th>Producto</th>'+
						'<th>Descripcion</th>'+
						'<th>P/U</th>'+
						'<th>Cantidad</th>'+
						'<th>Total</th>'+
					'</tr>'+
				'</thead>'+
				'<tbody>';
					for (var i = 0; i < data.length; i++) {
						html += '<tr>'+
							'<td>'+(i+1)+'</td>'+
							'<td>'+data[i]["nombre_pro"]+" "+data[i]["marca"]+'</td>'+
							'<td>'+data[i]["descripcion"]+'</td>'+
							'<td>'+data[i]["precio"]+'</td>'+
							'<td>'+data[i]["cantidad"]+'</td>'+
							'<td>'+data[i]["total"]+'</td>'+
						'</tr>';
					}
				html += '</tbody>'+
				'<tfoot>'+
					'<tr>'+
						'<th></th>'+
						'<th></th>'+
						'<th></th>'+
						'<th></th>'+
						'<th></th>'+
						'<th>'+data[0]["monto"]+'</th>'+
					'</tr>'+
				'</tfoot>'+
			'</table>';
			html += '<center><button type="button" class="btn btn-primary" onclick="guardarPedidoVenta()">Realizar venta <i class="fa fa-save"></i></button> </center>';
			$('#pedidoCliente').empty();
			$('#pedidoCliente').html(html);
			$('.tipoVenta1').on('click',function() {
				$('.dp').hide();
			});
			$('.tipoVenta2').on('click',function() {
				$('.dp').show();
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
var guardarPedidoVenta = function () {
	if (confirm("esta seguro de guardar como venta?")) {
		var idPedido = $('#pedidos').val();
		var limiteDias = $('.limiteDias').val();
		var monto = $('.monto').val();
		$.ajax({
	  	  url: base_url+'index.php/ventaPedido/agregarVentaPedido',
	      type: 'POST',
	      data: {idPedido:idPedido,limiteDias:limiteDias,monto:monto},
	      success: function(data){
					$('.notificacionRespuesta').modal("show");
					$('.respuesta').html(data);
	      }
	  	});
	}
}
</script>
