<div class="container-fluid features" id="section2">
	<div class="row">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center features-text" style="color:#fff">Almacen</h2>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<a href="javascript::verIngresos()">
						<div class="col-md-12 col-sm-12 col-xs-12 icon-box">
							<div class="col-md-2 col-sm-2 col-xs-12">
								<div class="iconing">
									<i class="fa fa-cube"></i>
								</div>
							</div>
							<div class="col-md-9 col-md-offset-1 col-sm-10 col-xs-12 icon-text-box" >
		                    	<h4 style="color:#fff">Ingresos a almacen</h4>
		                    	<p style="color:#fff">Registra los ingresos y pedidos al proveedor</p>
							</div>
						</div>
					</a>
					<a href="#">
						<div class="col-md-12 col-sm-12 col-xs-12 icon-box">
							<div class="col-md-2 col-sm-2 col-xs-12">
								<div class="iconing">
									<i class="fa fa-cubes"></i>
								</div>
							</div>
							<div class="col-md-9 col-md-offset-1 col-sm-10 col-xs-12 icon-text-box">
		                    	<h4>Made With Love</h4>
		                    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-8">
					<div class="col-xs-12 col-sm-12 placeholder">
						<div class="panel panel-info">
							<div class="panel-heading">
								<center><h3 class="panel-title">Nota de venta</h3></center>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<div class="col-xs-5 col-sm-5">
										<select class="form-control" id="productos">
											<option value="0">[.::::::::::::Seleccione un Producto::::::::::::.]</option>
										</select>
									</div>
									<div class="col-xs-5 col-sm-5">
										<input type="text" name="" class="form-control" placeholder="Cantidad ">
									</div>
									<br><br>
									<div class="col-xs-12 col-sm-12">
										<table class="table">
											<thead style="background-color:#638cbc; color:#fff">
												<tr>
													<th>Nota venta</th>
													<th>Monto</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>12001</td>
													<td>10000</td>
												</tr>
												<tr>
													<td>100012</td>
													<td>500</td>
												</tr>
											</tbody>
											<tfoot style="background-color:#638cbc; color:#fff">
												<tr>
													<th>Total</th>
													<th>00000</th>
												</tr>
											</tfoot>
										</table>
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
<script>
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
				"<div class='select2-result-repository__title'>" + repo.nombre_cliente + "</div>";

		if (repo.descripcion) {
			markup += "<div class='select2-result-repository__description'>" + repo.descripcion + "</div>";
		}

		markup += "<div class='select2-result-repository__statistics'>" +
			"<div class='select2-result-repository__forks'><i class='fa fa-flash'></i>Direcci&oacute;n: " + repo.direccion + "</div>" +
			"<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i>Cliente " + repo.tipo_cliente + " </div>" +
			"<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i>#</div>" +
		"</div>" +
		"</div></div>";

		return markup;
	}
	function formatRepoSelection (repo) {
		return repo.nombre_cliente || repo.text;
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
})
</script>
