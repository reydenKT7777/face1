<div class="col-md-12 col-sm-12 col-xs-12">
     <a name="3"></a>
         <div class="x_panel tile fixed_height_600">
             <div class="x_title">
                 <h2><i class="fa fa-cubes"></i> Lista de almacenes</h2>
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
                   <center><h3>Administraci&oacute;n de Almacenes <i class="fa fa-cube"></i></h3></center>
									 <button class="btn btn-success" onclick="imprimir_agregar_almacen()">Agregar</button>
 									<div class="tabla_almacen table-responsive"></div>
             </div>
         </div>
   </div>

<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_almacen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_almacen">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_almacen()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_almacen()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_almacen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_almacen">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_almacen()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_almacen()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_almacen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_almacen">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_almacen()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_almacen()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla almacen
var imprime_lista_almacen = function() {
	$.ajax({
		url: base_url+'index.php/controlador_almacen/listar_almacen',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_almacen(data);
			$('.tabla_almacen').empty();
			$('.tabla_almacen').html(html);
			$('#almacentabla').DataTable({
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
var imprime_tabla_almacen = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="almacentabla">';
			html += '<thead>';
				html += '<tr>';
					html += '<th>Sucursal</th>';
					html += '<th>Nombre almacen</th>';
					html += '<th>Tipo almacen</th>';
					html += '<th>Direccion</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    html += '<td>'+data[i]['nombre']+'</td>';
			    html += '<td>'+data[i]['nombre_almacen']+'</td>';
			    html += '<td>'+data[i]['tipo_almacen']+'</td>';
			    html += '<td>'+data[i]['direccion']+'</td>';
			    html += '<td>';

          if (data[i]['estadoA'] == '0') {
            html += '<button class="btn btn-warning btn-xs" onclick ="activar_almacen('+data[i]['id_almacen']+')">Activar</button>';
          }
          else {
            html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_almacen('+data[i]['id_almacen']+')">Modificar</button>';
            html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_almacen('+data[i]['id_almacen']+')">Eliminar</button>';
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla almacen
var activar_almacen = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_almacen/activa_almacen',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id: id},
    success:function () {
      imprime_lista_almacen();
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
var imprimir_agregar_almacen = function() {
	$.ajax({
		url: base_url+'index.php/controlador_sucursal/listar_sucursal',
		dataType: 'json',
		success:function(data) {
			$('.modal_agregar_datos_almacen').modal('show');
			var html = imprime_formulario_ingreso_almacen(data);
			$('.formulario_crear_almacen').empty();
			$('.formulario_crear_almacen').html(html);
		}
	});

}
var agregar_almacen = function () {
	var formdata = new FormData($("#formulario_i_almacen")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_almacen/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_almacen').modal('hide');
	     $('.formulario_crear_almacen').empty();
	     imprime_lista_almacen();
      }
  	});
}
var imprime_formulario_ingreso_almacen = function(data) {
	var html ='';
	//var data = 0;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_almacen' enctype='multipart/form-data'>";
		html+= "<div class='form-group'>";
				html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Sucursal</label>";
				html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_sucursal' class='form-control' id='id_sucursal'>";
						for (var i = 0; i < data.length; i++) {
							html+= "<option value='"+data[i]["id"]+"'>"+data[i]["nombre"]+"</option>";
						}
					html += "</select></div>";
			html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_almacen' class='form-control' id='nombre_almacen'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_almacen' class='form-control' id='tipo_almacen'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_almacen = function () {
	$('.modal_agregar_datos_almacen').modal('hide');
	$('.formulario_crear_almacen').empty();
}
//funcones para modificar datos de almacen
var mostrar_modificar_almacen = function (id) {
	$('.modal_modificar_datos_almacen').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_almacen/buscar_almacen',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_almacen(data);
		$('.formulario_modificar_almacen').empty();
		$('.formulario_modificar_almacen').html(html);
		}
	});
}
var imprime_formulario_modificar_almacen = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_almacen' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='id_sucursal' class='form-control' id='id_sucursal' value= '"+data.suc[i]['id_sucursal']+"'>";
					for (var j = 0; j < data.suc.length; j++) {
						if (data.suc[j]['id'] == data.almacen[i]["id_sucursal"]) {
							html += "<option value='"+data.suc[j]['id']+"' selected>"+data.suc[j]['nombre']+"</option>";
						}
						else {
							html += "<option value='"+data.suc[j]['id']+"'>"+data.suc[j]['nombre']+"</option>";
						}
					}
					html += "</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_almacen' class='form-control' id='nombre_almacen' value= '"+data.almacen[i]['nombre_almacen']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_almacen' class='form-control' id='tipo_almacen' value= '"+data.almacen[i]['tipo_almacen']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data.almacen[i]['direccion']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_almacen = function() {
	var formdata = new FormData($("#formulario_m_almacen")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_almacen/modificar_almacen',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_almacen').modal('hide');
	       $('.formulario_modificar_almacen').empty();
	       imprime_lista_almacen();
      }
  	});
}
var cancelar_modificar_almacen = function () {
	$('.modal_modificar_datos_almacen').modal('hide');
	$('.formulario_modificar_almacen').empty();
}
//funciones para eliminar datos almacen
var id_auxalmacen = 0
var mostrar_eliminar_almacen = function (id) {
 id_auxalmacen = id
	$('.modal_eliminar_datos_almacen').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_almacen/buscar_almacen',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_almacen(data);
		$('.formulario_eliminar_almacen').empty();
		$('.formulario_eliminar_almacen').html(html);
		}
	});
}
var imprime_formulario_eliminar_almacen = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_almacen' enctype='multipart/form-data'>";
		html+= "<div class='form-group'>";
			html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Sucursal</label>";
			html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='id_sucursal' class='form-control' id='id_sucursal' value= '"+data.suc[i]['id_sucursal']+"'>";
			for (var j = 0; j < data.suc.length; j++) {
				if (data.suc[j]['id'] == data.almacen[i]["id_sucursal"]) {
					html += "<option value='"+data.suc[j]['id']+"' selected>"+data.suc[j]['nombre']+"</option>";
				}
				else {
					html += "<option value='"+data.suc[j]['id']+"'>"+data.suc[j]['nombre']+"</option>";
				}
			}
			html += "</select></div>";
		html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_almacen' class='form-control' id='nombre_almacen' value= '"+data.almacen[i]['nombre_almacen']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_almacen' class='form-control' id='tipo_almacen' value= '"+data.almacen[i]['tipo_almacen']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data.almacen[i]['direccion']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_almacen = function() {
	//var formdata = new FormData($('#formulario_e_almacen')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_almacen/eliminar_datos',
      type: 'POST',
      data: {id:id_auxalmacen},
      success:function(){
	       $('.modal_eliminar_datos_almacen').modal('hide');
	       $('.formulario_eliminar_almacen').empty();
	       imprime_lista_almacen();
      }
  	});
}
var cancelar_eliminar_almacen = function () {
	$('.modal_eliminar_datos_almacen').modal('hide');
	$('.formulario_eliminar_almacen').empty();
}
$(function() {
	imprime_lista_almacen();
});
</script>
