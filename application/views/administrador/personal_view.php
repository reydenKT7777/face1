<div class="col-md-12 col-sm-12 col-xs-12">
     <a name="3"></a>
         <div class="x_panel tile fixed_height_600">
             <div class="x_title">
                 <h2><i class="fa fa-users"></i> Lista de personal</h2>
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
                   <center><h3>Administraci&oacute;n de Personal</h3></center>
									 <button class="btn btn-success" onclick="imprimir_agregar_personal()">Agregar</button>
								 	<div class="tabla_personal table-responsive"></div>
             </div>
         </div>
   </div>

<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_personal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_personal">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_personal()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_personal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_personal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_personal">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_personal()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_personal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_personal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_personal">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_personal()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_personal()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla personal
var imprime_lista_personal = function() {
	$.ajax({
		url: base_url+'index.php/controlador_personal/listar_personal',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_personal(data);
			$('.tabla_personal').empty();
			$('.tabla_personal').html(html);
			$('#personaltabla').DataTable({
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
var imprime_tabla_personal = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="personaltabla">';
			html += '<thead>';
				html += '<tr>';
					html += '<th>ci</th>';
					html += '<th>nombres</th>';
					html += '<th>apellidos</th>';
					html += '<th>fecha_nacimiento</th>';
					html += '<th>celular</th>';
					html += '<th>direccion</th>';
					html += '<th>cargo</th>';
					//html += '<th>usuario</th>';
					//html += '<th>password</th>';
					html += '<th>Sucursal</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    html += '<td>'+data[i]['ci']+'</td>';
			    html += '<td>'+data[i]['nombres']+'</td>';
			    html += '<td>'+data[i]['apellidos']+'</td>';
			    html += '<td>'+data[i]['fecha_nacimiento']+'</td>';
			    html += '<td>'+data[i]['celular']+'</td>';
			    html += '<td>'+data[i]['direccion']+'</td>';
			    html += '<td>'+data[i]['cargo']+'</td>';
			    //html += '<td>'+data[i]['usuario']+'</td>';
			    //html += '<td>'+data[i]['password']+'</td>';
			    html += '<td>'+data[i]['nombre']+'</td>';
          html += '<td>';
          if (data[i]["estadoPer"] == 1) {
            html += '<button class="btn btn-primary" onclick ="mostrar_modificar_personal('+data[i]['ci']+')">Modificar</button>';
            html += '<button class="btn btn-danger" onclick ="mostrar_eliminar_personal('+data[i]['ci']+')">Eliminar</button>';
          }
          else {
            html += '<button class="btn btn-warning" onclick ="activar_personal('+data[i]['ci']+')">Activar</button>';
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla personal
$.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '< Ant',
  nextText: 'Sig >',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  weekHeader: 'Sm',
  dateFormat: 'dd/mm/yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
var imprimir_agregar_personal = function() {
	//$('.modal_modificar_datos_personal').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_sucursal/listar_sucursal',
		dataType: 'json',
		success:function(data) {
			$('.modal_agregar_datos_personal').modal('show');
			var html = imprime_formulario_ingreso_personal(data);
			$('.formulario_crear_personal').empty();
			$('.formulario_crear_personal').html(html);
			$('.datepicker').datepicker({
				dateFormat:'yy-mm-dd'
			});
		}
	});

}
var activar_personal = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_personal/activar',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id: id},
    success:function () {
      imprime_lista_personal();
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
var agregar_personal = function () {
	var formdata = new FormData($("#formulario_i_personal")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_personal/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_personal').modal('hide');
	     $('.formulario_crear_personal').empty();
	     imprime_lista_personal();
      }
  	});
}
var imprime_formulario_ingreso_personal = function(data) {
	var html ='';
	//var data = 0;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_personal' enctype='multipart/form-data'>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>ci</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='ci' onkeyup='llenarUsuario()' class='form-control' id='ci'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombres</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombres' class='form-control' id='nombres'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>apellidos</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='apellidos' class='form-control' id='apellidos'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha de nacimiento</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_nacimiento' class='form-control datepicker' id='fecha_nacimiento'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>celular</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='celular' class='form-control' id='celular'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>cargo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='cargo' class='form-control' id='cargo'>";
						html+="<option value='Super administrador'>Super administrador</option>";
						html+="<option value='Administrador'>Administrador</option>";
						html+="<option value='Almacenero'>Almacenero</option>";
						html+="<option value='Vendedor'>Vendedor</option>";
						html+="<option value='Cajero'>Cajero</option>";
						html += "</select></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>usuario</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='usuario' class='form-control' id='usuario'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>contraseña</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='password' name='password' class='form-control' id='password'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_sucursal' class='form-control' id='id_sucursal'>";
							for (var i = 0; i < data.length; i++) {
								html+= "<option value='"+data[i]["id"]+"'>"+data[i]["nombre"]+"</option>";
							}
						html += "</select></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var llenarUsuario = function () {
	var ci = $("#ci").val();
	$("#usuario").val(ci);
}
var cancelar_agregar_personal = function () {
	$('.modal_agregar_datos_personal').modal('hide');
	$('.formulario_crear_personal').empty();
}
//funcones para modificar datos de personal
var mostrar_modificar_personal = function (id) {
	$('.modal_modificar_datos_personal').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_personal/buscar_personal',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_personal(data);
		$('.formulario_modificar_personal').empty();
		$('.formulario_modificar_personal').html(html);
		$('.datepicker').datepicker({
			dateFormat:'yy-mm-dd'
		});
		}
	});
}
var imprime_formulario_modificar_personal = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_personal' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>ci</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='ci' class='form-control' id='ci' value= '"+data.user[i]['ci']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombres</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombres' class='form-control' id='nombres' value= '"+data.user[i]['nombres']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>apellidos</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='apellidos' class='form-control' id='apellidos' value= '"+data.user[i]['apellidos']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha nacimiento</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_nacimiento' class='form-control datepicker' id='fecha_nacimiento' value= '"+data.user[i]['fecha_nacimiento']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>celular</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='celular' class='form-control' id='celular' value= '"+data.user[i]['celular']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data.user[i]['direccion']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>cargo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='cargo' class='form-control' id='cargo' value= '"+data.user[i]['cargo']+"'>";
							if (data.user[i]['cargo'] == "Super administrador") {
									html += "<option value='Super administrador' selected>Super administrador</option>";
							}
							else {
								html += "<option value='Super administrador'>Super administrador</option>";
							}

							if (data.user[i]['cargo'] == "Administrador") {
									html += "<option value='Administrador' selected>Administrador</option>";
							}
							else {
								html += "<option value='Administrador'>Administrador</option>";
							}

							if (data.user[i]['cargo'] == "Almacenero") {
									html += "<option value='Almacenero' selected>Almacenero</option>";
							}
							else {
								html += "<option value='Almacenero'>Almacenero</option>";
							}

							if (data.user[i]['cargo'] == "Vendedor") {
									html += "<option value='Vendedor' selected>Vendedor</option>";
							}
							else {
								html += "<option value='Vendedor'>Vendedor</option>";
							}

							if (data.user[i]['cargo'] == "Cajero") {
									html += "<option value='Cajero' selected>Cajero</option>";
							}
							else {
								html += "<option value='Super administrador'>Super administrador</option>";
							}
						html +="</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>usuario</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='usuario' class='form-control' id='usuario' value= '"+data.user[i]['usuario']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>password</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='password' name='password' class='form-control' id='password' placeholder='Modificar el password [**********]'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='id_sucursal' class='form-control' id='id_sucursal' value= '"+data.suc[i]['id_sucursal']+"'>";
					for (var j = 0; j < data.suc.length; j++) {
						if (data.suc[j]['id'] == data.user[i]["id_sucursal"]) {
							html += "<option value='"+data.suc[j]['id']+"' selected>"+data.suc[j]['nombre']+"</option>";
						}
						else {
							html += "<option value='"+data.suc[j]['id']+"'>"+data.suc[j]['nombre']+"</option>";
						}
					}
					html += "</div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_personal = function() {
	var formdata = new FormData($("#formulario_m_personal")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_personal/modificar_personal',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_personal').modal('hide');
	       $('.formulario_modificar_personal').empty();
	       imprime_lista_personal();
      }
  	});
}
var cancelar_modificar_personal = function () {
	$('.modal_modificar_datos_personal').modal('hide');
	$('.formulario_modificar_personal').empty();
}
//funciones para eliminar datos personal
var id_aux = 0
var mostrar_eliminar_personal = function (id) {
 id_aux = id
	$('.modal_eliminar_datos_personal').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_personal/buscar_personal',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_personal(data);
		$('.formulario_eliminar_personal').empty();
		$('.formulario_eliminar_personal').html(html);
		}
	});
}
var imprime_formulario_eliminar_personal = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_personal' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>ci</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='ci' class='form-control' id='ci' value= '"+data.user[i]['ci']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombres</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombres' class='form-control' id='nombres' value= '"+data.user[i]['nombres']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>apellidos</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='apellidos' class='form-control' id='apellidos' value= '"+data.user[i]['apellidos']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha_nacimiento</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_nacimiento' class='form-control' id='fecha_nacimiento' value= '"+data.user[i]['fecha_nacimiento']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>celular</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='celular' class='form-control' id='celular' value= '"+data.user[i]['celular']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data.user[i]['direccion']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>cargo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='cargo' class='form-control' id='cargo' value= '"+data.user[i]['cargo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>usuario</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='usuario' class='form-control' id='usuario' value= '"+data.user[i]['usuario']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>password</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='password' class='form-control' id='password' value= '"+data.user[i]['password']+"' disabled></div>";
		  	html += "</div>";
        html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='id_sucursal' class='form-control' id='id_sucursal' value= '"+data.suc[i]['id_sucursal']+"' disabled>";
					for (var j = 0; j < data.suc.length; j++) {
						if (data.suc[j]['id'] == data.user[i]["id_sucursal"]) {
							html += "<option value='"+data.suc[j]['id']+"' selected>"+data.suc[j]['nombre']+"</option>";
						}
						else {
							html += "<option value='"+data.suc[j]['id']+"'>"+data.suc[j]['nombre']+"</option>";
						}
					}
					html += "</div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_personal = function() {
	//var formdata = new FormData($('#formulario_e_personal')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_personal/eliminar_datos',
      type: 'POST',
      data: {id:id_aux},
      success:function(){
	       $('.modal_eliminar_datos_personal').modal('hide');
	       $('.formulario_eliminar_personal').empty();
	       imprime_lista_personal();
      }
  	});
}
var cancelar_eliminar_personal = function () {
	$('.modal_eliminar_datos_personal').modal('hide');
	$('.formulario_eliminar_personal').empty();
}
$(function() {
	imprime_lista_personal();
});
</script>
