
<div class="col-md-12 col-sm-12 col-xs-12">
     <a name="3"></a>
         <div class="x_panel tile fixed_height_600">
             <div class="x_title">
                 <h2><i class="fa fa-home"></i> Lista de sucursales</h2>
                 <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                         <i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Tema 1</a>
                             </li>
                             <li><a href="#">Tema 2</a>
                             </li>
                         </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                 </ul>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content" style="display: block;">
                   <center><h3>Administraci&oacute;n de sucursales</h3></center>
									 <button class="btn btn-success" onclick="imprimir_agregar_sucursal()">Agregar</button>
									 <div class="">

									 </div>
									 <div class="tabla_sucursal table-responsive"></div>
             </div>
         </div>
   </div>

<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_sucursal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_sucursal">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_sucursal()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_sucursal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_sucursal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_sucursal">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_sucursal()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_sucursal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_sucursal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_sucursal">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_sucursal()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_sucursal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_activar_datos_sucursal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea activar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_activar_sucursal">
                  </div>
				<center><button class="btn btn-success" onclick="activar_sucursal()">Activar</button>
				<button class="btn btn-danger" onclick="cancelar_activar_sucursal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->


<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla sucursal
var imprime_lista_sucursal = function() {
	$.ajax({
		url: base_url+'index.php/controlador_sucursal/listar_sucursal',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_sucursal(data);
			$('.tabla_sucursal').empty();
			$('.tabla_sucursal').html(html);
			$('#sucursaltabla').DataTable({
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
	});
}
var imprime_tabla_sucursal = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="sucursaltabla">';
			html += '<thead>';
				html += '<tr>';
					//html += '<th>id</th>';
					html += '<th>nombre</th>';
					html += '<th>nit</th>';
					html += '<th>telefono</th>';
					html += '<th>direccion</th>';
					html += '<th>emai</th>';
					html += '<th>estado</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    //html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre']+'</td>';
			    html += '<td>'+data[i]['nit']+'</td>';
			    html += '<td>'+data[i]['telefono']+'</td>';
			    html += '<td>'+data[i]['direccion']+'</td>';
			    html += '<td>'+data[i]['emai']+'</td>';
					if (data[i]['estado'] == 1) {
							html += '<td>Activo</td>';
					}
					else {
						html += '<td><button class="btn btn-warning" onclick ="ver_activar_sucursal('+data[i]['id']+')">Activar</button></td>';
					}

			    html += '<td>';
          if (data[i]['estado'] == 1) {
            html += '<button class="btn btn-info" onclick ="mostrar_modificar_sucursal('+data[i]['id']+')">Modificar</button>';
            html += '<button class="btn btn-danger" onclick ="mostrar_eliminar_sucursal('+data[i]['id']+')">Eliminar</button>';
          }
				html += '</td></tr>';
			}
			html += '</tbody>';
		html += '</table>';
	}
	else
	{
		html += '<h1>No se encontraron registros !!</h1>';
	}
	return html;
}
// funciones que imprimen formularios de ingreso de nuevos registro de tabla sucursal
var imprimir_agregar_sucursal = function() {
	$('.modal_agregar_datos_sucursal').modal('show');
	var html = imprime_formulario_ingreso_sucursal();
	$('.formulario_crear_sucursal').empty();
	$('.formulario_crear_sucursal').html(html);
}
var agregar_sucursal = function () {
	var formdata = new FormData($("#formulario_i_sucursal")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_sucursal/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_sucursal').modal('hide');
	     $('.formulario_crear_sucursal').empty();
	     imprime_lista_sucursal();
      }
  	});
}
var imprime_formulario_ingreso_sucursal = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_sucursal' enctype='multipart/form-data'>";
			html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre' class='form-control' id='nombre'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>emai</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='emai' class='form-control' id='emai'></div>";
		  	html += "</div>";

		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_sucursal = function () {
	$('.modal_agregar_datos_sucursal').modal('hide');
	$('.formulario_crear_sucursal').empty();
}
//funcones para modificar datos de sucursal
var mostrar_modificar_sucursal = function (id) {
	$('.modal_modificar_datos_sucursal').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_sucursal/buscar_sucursal',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_sucursal(data);
		$('.formulario_modificar_sucursal').empty();
		$('.formulario_modificar_sucursal').html(html);
		}
	});
}
var imprime_formulario_modificar_sucursal = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_sucursal' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre' class='form-control' id='nombre' value= '"+data[i]['nombre']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit' value= '"+data[i]['nit']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono' value= '"+data[i]['telefono']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data[i]['direccion']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>emai</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='emai' class='form-control' id='emai' value= '"+data[i]['emai']+"'></div>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>estado</label>";
					html += "</div>";
		    	//html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='estado' class='form-control' id='estado' value= '"+data[i]['estado']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_sucursal = function() {
	var formdata = new FormData($("#formulario_m_sucursal")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_sucursal/modificar_sucursal',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_sucursal').modal('hide');
	       $('.formulario_modificar_sucursal').empty();
	       imprime_lista_sucursal();
      }
  	});
}
var cancelar_modificar_sucursal = function () {
	$('.modal_modificar_datos_sucursal').modal('hide');
	$('.formulario_modificar_sucursal').empty();
}
//funciones para eliminar datos sucursal
var id_aux = 0
var mostrar_eliminar_sucursal = function (id) {
 id_aux = id
	$('.modal_eliminar_datos_sucursal').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_sucursal/buscar_sucursal',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_sucursal(data);
		$('.formulario_eliminar_sucursal').empty();
		$('.formulario_eliminar_sucursal').html(html);
		}
	});
}
var imprime_formulario_eliminar_sucursal = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_sucursal' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre' class='form-control' id='nombre' value= '"+data[i]['nombre']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit' value= '"+data[i]['nit']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono' value= '"+data[i]['telefono']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data[i]['direccion']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>emai</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='emai' class='form-control' id='emai' value= '"+data[i]['emai']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>estado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='estado' class='form-control' id='estado' value= '"+data[i]['estado']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_sucursal = function() {
	//var formdata = new FormData($('#formulario_e_sucursal')[0]);
	if (confirm("Esta seguro de eliminiar esta sucursal?")) {
		$.ajax({
				url: base_url+'index.php/controlador_sucursal/eliminar_datos',
				type: 'POST',
				data: {id:id_aux},
				success:function(){
					 $('.modal_eliminar_datos_sucursal').modal('hide');
					 $('.formulario_eliminar_sucursal').empty();
					 imprime_lista_sucursal();
				}
			});
	}
}
var ver_activar_sucursal = function (id) {
	;
	id_aux = id
	$('.modal_activar_datos_sucursal').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_sucursal/buscar_sucursal',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_sucursal(data);
		$('.formulario_activar_sucursal').empty();
		$('.formulario_activar_sucursal').html(html);
		}
	});
}
var cancelar_activar_sucursal = function () {
	$('.modal_activar_datos_sucursal').modal('hide');
	$('.formulario_activar_sucursal').empty();
}
var activar_sucursal = function () {
	if (confirm("Esta seguro de activar esta sucursal?")) {
		$.ajax({
				url: base_url+'index.php/controlador_sucursal/activar_datos',
				type: 'POST',
				data: {id:id_aux},
				success:function(){
					$('.modal_activar_datos_sucursal').modal('hide');
 	       	$('.formulario_activar_sucursal').empty();
					 imprime_lista_sucursal();
				}
			});
	}
}
var cancelar_eliminar_sucursal = function () {
	$('.modal_eliminar_datos_sucursal').modal('hide');
	$('.formulario_eliminar_sucursal').empty();
}
$(function() {
	imprime_lista_sucursal();
});
</script>
