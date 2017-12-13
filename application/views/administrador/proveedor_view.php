<div class="col-md-12 col-sm-12 col-xs-12">
     <a name="3"></a>
         <div class="x_panel tile fixed_height_600">
             <div class="x_title">
                 <h2><i class="fa fa-user"></i> Lista de proveedores</h2>
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
                   <center><h3>Administraci&oacute;n de proveedores <i class="fa fa-user"></i></h3></center>
									 <br><br>
									<button class="btn btn-success" onclick="imprimir_agregar_proveedor()">Agregar</button>
									<div class="tabla_proveedor table-responsive"></div>
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
         <div class="modal fade modal_modificar_datos_proveedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_proveedor">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_proveedor()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_proveedor()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_proveedor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_proveedor">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_proveedor()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_proveedor()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla proveedor
var imprime_lista_proveedor = function() {
	$.ajax({
		url: base_url+'index.php/controlador_proveedor/listar_proveedor',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_proveedor(data);
			$('.tabla_proveedor').empty();
			$('.tabla_proveedor').html(html);
			$('#protabla').DataTable({
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
var imprime_tabla_proveedor = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="protabla">';
			html += '<thead>';
				html += '<tr>';
					//html += '<th>id</th>';
					html += '<th>Nombre</th>';
					html += '<th>Direccion</th>';
					html += '<th>Telefono</th>';
					html += '<th>Nit</th>';
					html += '<th>Encargado</th>';
					html += '<th>Correo</th>';
					//html += '<th>estado</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    //html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre_prov']+'</td>';
			    html += '<td>'+data[i]['direccion_prov']+'</td>';
			    html += '<td>'+data[i]['telefono_prov']+'</td>';
			    html += '<td>'+data[i]['nit']+'</td>';
			    html += '<td>'+data[i]['nombre_encargado']+'</td>';
			    html += '<td>'+data[i]['correo']+'</td>';
			    //html += '<td>'+data[i]['estado']+'</td>';
			    html += '<td>';
          if (data[i]["estado"] == 1) {
            html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_proveedor('+data[i]['id']+')">Modificar</button>';
            html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_proveedor('+data[i]['id']+')">Eliminar</button>';
          }
          else {
            html += '<button class="btn btn-warning btn-xs" onclick ="activarProveedor('+data[i]['id']+')">Activar</button>';
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla proveedor
var imprimir_agregar_proveedor = function() {
	$('.modal_agregar_datos_proveedor').modal('show');
	var html = imprime_formulario_ingreso_proveedor();
	$('.formulario_crear_proveedor').empty();
	$('.formulario_crear_proveedor').html(html);
}
var activarProveedor = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_proveedor/activar',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id: id},
    success:function () {
      imprime_lista_proveedor();
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
	     imprime_lista_proveedor();
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
//funcones para modificar datos de proveedor
var mostrar_modificar_proveedor = function (id) {
	$('.modal_modificar_datos_proveedor').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_proveedor/buscar_proveedor',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_proveedor(data);
		$('.formulario_modificar_proveedor').empty();
		$('.formulario_modificar_proveedor').html(html);
		}
	});
}
var imprime_formulario_modificar_proveedor = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_proveedor' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_prov' class='form-control' id='nombre_prov' value= '"+data[i]['nombre_prov']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Direccion proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion_prov' class='form-control' id='direccion_prov' value= '"+data[i]['direccion_prov']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Telefono proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono_prov' class='form-control' id='telefono_prov' value= '"+data[i]['telefono_prov']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit' value= '"+data[i]['nit']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre encargado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_encargado' class='form-control' id='nombre_encargado' value= '"+data[i]['nombre_encargado']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Correo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='correo' class='form-control' id='correo' value= '"+data[i]['correo']+"'></div>";
		  	html += "</div>";

		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_proveedor = function() {
	var formdata = new FormData($("#formulario_m_proveedor")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_proveedor/modificar_proveedor',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_proveedor').modal('hide');
	       $('.formulario_modificar_proveedor').empty();
	       imprime_lista_proveedor();
      }
  	});
}
var cancelar_modificar_proveedor = function () {
	$('.modal_modificar_datos_proveedor').modal('hide');
	$('.formulario_modificar_proveedor').empty();
}
//funciones para eliminar datos proveedor
var id_auxproveedor = 0
var mostrar_eliminar_proveedor = function (id) {
 id_auxproveedor = id
	$('.modal_eliminar_datos_proveedor').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_proveedor/buscar_proveedor',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_proveedor(data);
		$('.formulario_eliminar_proveedor').empty();
		$('.formulario_eliminar_proveedor').html(html);
		}
	});
}
var imprime_formulario_eliminar_proveedor = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_proveedor' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_prov' class='form-control' id='nombre_prov' value= '"+data[i]['nombre_prov']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion_prov' class='form-control' id='direccion_prov' value= '"+data[i]['direccion_prov']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono proveedor</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono_prov' class='form-control' id='telefono_prov' value= '"+data[i]['telefono_prov']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit' value= '"+data[i]['nit']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre encargado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_encargado' class='form-control' id='nombre_encargado' value= '"+data[i]['nombre_encargado']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>correo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='correo' class='form-control' id='correo' value= '"+data[i]['correo']+"' disabled></div>";
		  	html += "</div>";

		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_proveedor = function() {
	//var formdata = new FormData($('#formulario_e_proveedor')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_proveedor/eliminar_datos',
      type: 'POST',
      data: {id:id_auxproveedor},
      success:function(){
	       $('.modal_eliminar_datos_proveedor').modal('hide');
	       $('.formulario_eliminar_proveedor').empty();
	       imprime_lista_proveedor();
      }
  	});
}
var cancelar_eliminar_proveedor = function () {
	$('.modal_eliminar_datos_proveedor').modal('hide');
	$('.formulario_eliminar_proveedor').empty();
}
$(function() {
	imprime_lista_proveedor();
});
</script>
