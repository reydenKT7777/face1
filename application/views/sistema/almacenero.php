<div class="container-fluid features" id="section2">
	<div class="row">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center features-text" style="color:#fff">Almacen</h2>
				<div class="col-md-12 col-sm-8 col-xs-8">
					<div class="col-xs-12 col-sm-12 placeholder">
							<!--Nota de ingreso a almacenes-->
							<div class="col-md-12 col-sm-12 col-xs-12 work-space notaVenta" id="" style="">
								<div class="col-xs-12 col-sm-12 placeholder">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<center><h1 class="panel-title">Nota de Almacen</h1></center>
										</div>
										<div class="panel-body">
												<div class="">
													<div class="col-xs-12 col-md-12" style="background-color:#16246d">
																<br> <center><h3 style="color:#fff">Productos disponibles</h3></center>
																<div class="form-group col-xs-12 col-md-12">
																		<select class="form-control" id="productos">
																			<option value="0">[.::::::::::::Buscar Producto::::::::::::.]</option>
																		</select>
																</div>
																<div class="col-xs-12 col-sm-6 stock" style="">

																</div>
																<input type="hidden" id="idPrecioTipoU">
																<input type="hidden" id="cantidadTU">
																<input type="hidden" id="precioU">
																<input type="hidden" id="ptunitario">
																<input type="hidden" id="nombre_tipo_u">
																<div class="col-xs-2 col-md-2">
																	<br><br>
																	<div class="form-group">
																	  <button type="button" class="btn btn-info btnv2" title="Agregar a la lista de productos" onclick="agergarALista()">Agergar <i class="fa fa-plus-circle"></i></button>
																	</div>
																</div>
													</div>

												</div>
										</div>

											<br>
										<div class="">
											<form  enctype="multipart/form-data" id="listaProductos" method="#">

														<div class="form-group">
															<div class="col-xs-12 col-sm-4 ">
																<div class="input-group">
																  <span class="input-group-addon">Proveedor</span>
																	<select class="form-control" id="proveedor" name="id_proveedor" size="150" title="Buscar proveedor">
																		<option value="0">[.::::::::::::Buscar proveedor::::::::::::.]</option>
																	</select>
																</div>
															</div>
															<button class="btn btn-success" type="button" onclick="imprimir_agregar_proveedor()">Agregar proveedor <i class="fa fa-plus"></i></button><br><br>
															<center>
																<button type="button" class="btn btn-primary" onclick="guardarNota()" name="button">Guardar Nota de almacen <i class="fa fa-save"></i></button>
																<?php
																	if ($this->session->cargo ==  "Super administrador") {
																		?>
																		<a href="<?=base_url()?>index.php/controlador_almacen/stock" class="btn btn-danger">Cancelar Nota</a>
																		<?php
																	}
																	else {
																		?>
																		<a href="<?=base_url()?>index.php/admin/almacenero" class="btn btn-danger">Cancelar Nota</a>
																		<?php
																	}
																 ?>

															</center>
														</div>
														<div class="table-responsive">
															<table class="table table-striped table-bordered">
																<thead style="background-color:#638cbc; color:#fff">
																	<tr>
																		<th>Producto</th>
																		<th>Marca</th>
																		<th>T/U</th>
																		<th>Cantidad</th>
																		<th>Precio/U</th>
																		<th>Total</th>
																	</tr>
																</thead>
																<tbody id="contenidoVenta">
																</tbody>
																<tfoot style="background-color:#638cbc; color:#fff">
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>Total</td>
																		<td><input type="text" name="total" id="total" placeholder="total BS" class="form-control" readonly=""></td>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_proveedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_proveedor">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_proveedor()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_proveedor()">Cancelar</button><center>
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
var base_url = '<?=base_url()?>';
var guardarNota = function () {
	if (confirm("esta seguro de incrementar almacen?")) {
		var fdata = new FormData($("#listaProductos")[0]);
		$.ajax({
	  	  url: base_url+'index.php/controlador_pedido_prov/agregar_datos',
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla proveedor
var imprimir_agregar_proveedor = function() {
	$('.modal_agregar_datos_proveedor').modal('show');
	var html = imprime_formulario_ingreso_proveedor();
	$('.formulario_crear_proveedor').empty();
	$('.formulario_crear_proveedor').html(html);
}
var agregar_proveedor = function () {
	var formdata = new FormData($("#formulario_i_proveedor")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_proveedor/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_proveedor').modal('hide');
	     $('.formulario_crear_proveedor').empty();
	     //imprime_lista_proveedor();
      }
  	});
}
var imprime_formulario_ingreso_proveedor = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_proveedor' enctype='multipart/form-data'>";
			html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_prov' class='form-control' id='nombre_prov'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Direccion proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion_prov' class='form-control' id='direccion_prov'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Telefono proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono_prov' class='form-control' id='telefono_prov'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre encargado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_encargado' class='form-control' id='nombre_encargado'></div>";
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
var cancelar_agregar_proveedor = function () {
	$('.modal_agregar_datos_proveedor').modal('hide');
	$('.formulario_crear_proveedor').empty();
}
///////////////////
$.fn.select2.amd.require([
	"select2/core",
	"select2/utils",
	"select2/compat/matcher"
], function (Select2, Utils, oldMatcher) {

	var $ajax = $("#proveedor");
	function formatRepo (repo) {
		if (repo.loading) return repo.text;
		var markup = "<div class='select2-result-repository clearfix'>" +
			"<div class='select2-result-repository__avatar'></div>" +
			"<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" + repo.nombre_prov + "</div>";



		markup += "<div class='select2-result-repository__statistics'>" +
			"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i>Direcci&oacute;n: " + repo.direccion_prov + "</div>" +
			"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i>Nit: " + repo.nit + " </div>" +
			"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i>Encargado: "+repo.nombre_encargado+"</div>" +
		"</div>" +
		"</div></div>";

		return markup;
	}
	function formatRepoSelection (repo) {
		return repo.nombre_prov || repo.text;
	}

	$ajax.select2({
		ajax: {
			url: base_url+"index.php/Controlador_proveedor/buscarProveedor",
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
		var markup = "<div class='select2-result-repository clearfix'>" ;
		if (repo.stock <= 10) {
			markup += "<div class='select2-result-repository__avatar'><img src='"+base_url+"assets/images/f2.jpg' /></div>";
		}
		else {
			markup += "<div class='select2-result-repository__avatar'><img src='"+base_url+"assets/images/f1.jpg' /></div>";
		}
markup += "<div class='select2-result-repository__meta'>" +
				"<div class='select2-result-repository__title'>" +
				"<span class='label label-success'>Producto</span>"+repo.nombre_pro +
				 //" <span class='label label-success'>Descripci&oacute;n</span>: " + repo.descripcion +
				 "<br><br>	 "+
				 "	 <span class='label label-warning'>Marca</span>: " + repo.marca +
				 "	 <span class='label label-danger'>Stock</span>: " + repo.stock +
				 "</div>";
		markup += "<div class='select2-result-repository__statistics'>" +
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
})

//Funcion que muestra el precio del producto al momento de seleccionar producto
var tipoUnitarioPR = new Array();
$('#productos').on('change', function() {
	var id = $('#productos').val();
	$.ajax({
		url: base_url+'index.php/controlador_producto/buscar_producto',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function (data) {
			tipoUnitarioPR = data.ptu;
			$('#pUnitario').val(data.producto[0]["precio"]);
			var html = "<h4 style='color:#fff'>Stock de "+data.producto[0]["nombre_pro"]+" "+data.producto[0]["marca"]+" : "+data.producto[0]["stock"]+" Unidades <input type='hidden' value='"+data.producto[0]["stock"]+"' id='stockLimite'></h4>";
			html += '<li>';
					for (var i = 0; i < data.ptu.length; i++) {
						html += '<ul style="color:#fff">'+
										'<div class="radio">'+
		                  '<label>'+
		                      '<input type="radio" name="tipoU" value="'+i+'" class="tunitario"> '+data.ptu[i]["nombre_tipo_u"]+
		                  '</label>'+
		              '</div></ul>';
					}
			html += '</li>';
			$('.stock').html(html);
			$('.tunitario').on('click', function() {
				var index = $(this).val();
				$('#idPrecioTipoU').val(tipoUnitarioPR[index]["idPrecioTipoU"]);
				$('#cantidadTU').val(tipoUnitarioPR[index]["cantidadTU"]);
				$('#precioU').val(tipoUnitarioPR[index]["precioU"]);
				$('#ptunitario').val(tipoUnitarioPR[index]["ptunitario"]);
				$('#nombre_tipo_u').val(tipoUnitarioPR[index]["nombre_tipo_u"]);
				//alert("Identificador:"+id+" => Precio:"+precioU);
			});
		}
	});
});

// Funcion que agregar el producto a la lista de nota de venta
var agergarALista = function () {
	var id = $('#productos').val();
		$.ajax({
			url: base_url+'index.php/controlador_producto/buscar_producto',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success:function (data) {
				//var cantidad = $('#cantidadP').val();
				//var total = (data.producto[0]["precio"]*1) * (cantidad*1);
				var html = "";
				var nombre_tipo_u = $('#nombre_tipo_u').val();
				var cTipoU = $('#cantidadTU').val();
				var idPTU = $('#idPrecioTipoU').val();
				html +="<tr>"+
									"<td>"+data.producto[0]["nombre_pro"]+"</td>"+
									"<td>"+data.producto[0]["marca"]+"</td>"+
									"<td><input type='hidden' id='idPTU"+idPTU+"' name='idPTU[]' value='"+idPTU+"'>"+nombre_tipo_u+"</td>";
					html += "<td><input type='hidden' id='cantidadReal"+idPTU+"' name='cantidadReal[]' value='"+cTipoU+"'>";
							html += "<input type='text' id='cantidadTU"+idPTU+"' name='cantidadTU[]' value='1' onkeyup='calcularLista("+idPTU+")' class='form-control'></td>"+
									'<td><input type="text" id="precioTU'+idPTU+'" name="precioTU[]" value="" onkeyup="calcularLista('+idPTU+')" class="form-control"></td>'+
									'<td><input type="text" id="totalTU'+idPTU+'" name="totalTU[]" value="" class="form-control" readonly=""></td>'+
									'<input type="hidden" id="ctipou'+idPTU+'" name="ctipou[]" value="'+cTipoU+'">'+
									'<input type="hidden" id="producto'+idPTU+'" name="producto[]" value="'+data.producto[0]["id"]+'">'+
								"</tr>";
				$('#contenidoVenta').append(html);
				$('#cantidadP').val("");
			}
		});
}
var calcularLista = function (id) {
	var cantidadTU = $('#cantidadTU'+id).val();
	var precioTU = $('#precioTU'+id).val();
	var ctipou = $('#ctipou'+id).val();
	var total = (cantidadTU * 1) * (precioTU);
	$('#totalTU'+id).val(total.toFixed(2));
	var real = (ctipou*1)*(cantidadTU*1);
	$('#cantidadReal'+id).val(real.toFixed(2));
	var t = 0;
	$('input[name="totalTU[]"]').each(function() {

		if ($(this).val() != "") {
			t = t + ($(this).val()*1);
		}
	});
	$("#total").val(t);
}
</script>
