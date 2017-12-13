<div class="row">
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
	                   <center><h3>Administraci&oacute;n de tipos de contrato</h3></center>
										 <button class="btn btn-success" onclick="imprimir_agregar_tipo_contrato()">Agregar</button>
										 <div class="tabla_tipo_contrato table-responsive"></div>
	             </div>
	         </div>
	   </div>

</div>


<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_tipo_contrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso Tipo de contrato</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_tipo_contrato">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_tipo_contrato()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_tipo_contrato()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_tipo_contrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_tipo_contrato">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_tipo_contrato()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_tipo_contrato()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_tipo_contrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_tipo_contrato">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_tipo_contrato()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_tipo_contrato()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla tipo_contrato
var imprime_lista_tipo_contrato = function() {
	$.ajax({
		url: base_url+'index.php/controlador_tipo_contrato/listar_tipo_contrato',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_tipo_contrato(data);
			$('.tabla_tipo_contrato').empty();
			$('.tabla_tipo_contrato').html(html);
			$('#tcontradtotabla').DataTable({
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
var imprime_tabla_tipo_contrato = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="tcontradtotabla">';
			html += '<thead>';
				html += '<tr>';
					//html += '<th>id</th>';
					html += '<th>Tipo contrato</th>';
					html += '<th>Experiencia</th>';
					html += '<th>Turnos</th>';
					html += '<th>Dias trabajo</th>';
					html += '<th>Horarios</th>';
					html += '<th>Tipo sueldo</th>';
					html += '<th>Sueldo</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    //html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre_tipo_contrato']+'</td>';
			    html += '<td>'+data[i]['experiencia_trabajo']+'</td>';
			    html += '<td>'+data[i]['turno_trabajo']+'</td>';
			    html += '<td>';
					var dias = data[i]['dias_trabajo'];
					var arregloDeCadenas = dias.split(",");
					for (var j = 0; j < arregloDeCadenas.length; j++) {
						html += arregloDeCadenas[j]+"<br>";
					}
						//+data[i]['dias_trabajo']+
					html += '</td>';
			    html += '<td>'+data[i]['horario_trabajo']+'</td>';
			    html += '<td>'+data[i]['tipo_sueldo']+'</td>';
			    html += '<td>'+data[i]['sueldo']+'</td>';
			    html += '<td>';
					if (data[i]["estadoTipoC"] == 1) {
						html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_tipo_contrato('+data[i]['id']+')">Modificar</button>';
						html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_tipo_contrato('+data[i]['id']+')">Eliminar</button>';
					}
					else {
						html += '<button class="btn btn-warning btn-xs" onclick ="activar_tipo_contrato('+data[i]['id']+')">Activar</button>';
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
var activar_tipo_contrato = function (id) {
	$.ajax({
		url: base_url+'index.php/controlador_tipo_contrato/activar',
		type: 'POST',
		//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {id: id},
		success:function () {
			imprime_lista_tipo_contrato();
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla tipo_contrato
var imprimir_agregar_tipo_contrato = function() {
	$('.modal_agregar_datos_tipo_contrato').modal('show');
	var html = imprime_formulario_ingreso_tipo_contrato();
	$('.formulario_crear_tipo_contrato').empty();
	$('.formulario_crear_tipo_contrato').html(html);
	$('#turno_trabajo').on('change',function() {
		cambiaTurno();
	});
	$('#horario_trabajo').on('change',function() {
		cambiaHorario();
	});
}
var agregar_tipo_contrato = function () {
	var formdata = new FormData($("#formulario_i_tipo_contrato")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_tipo_contrato/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_tipo_contrato').modal('hide');
	     $('.formulario_crear_tipo_contrato').empty();
	     imprime_lista_tipo_contrato();
      }
  	});
}
var imprime_formulario_ingreso_tipo_contrato = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_tipo_contrato' enctype='multipart/form-data'>";
			html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre tipo contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_contrato' class='form-control' id='nombre_tipo_contrato'></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Experiencia trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='experiencia_trabajo' class='form-control' id='experiencia_trabajo'>";
						html+="<option value='Experto'>Experto</option>";
						html+="<option value='Medio'>Medio</option>";
						html+="<option value='Bajo'>Bajo</option>";
						html += "</select></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Turno trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='turno_trabajo' class='form-control' id='turno_trabajo'>";
						html+="<option value='Mañana'>Mañana</option>";
						html+="<option value='Tarde'>Tarde</option>";
						//html+="<option value='Noche'>Noche</option>";
						html+="<option value='Todo el dia'>Todo el dia</option>";
						html += "</select></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
			html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Dias trabajo</label>";
				html += '<div class="col-md-8 col-sm-8 col-xs-12">'+
	          '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Lunes" name="dias_trabajo[]" type="checkbox"> Lunes'+
	              '</label>'+
	          '</div>'+
	          '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Martes" name="dias_trabajo[]" type="checkbox"> Martes'+
	              '</label>'+
	          '</div>'+
						'<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Miercoles" name="dias_trabajo[]" type="checkbox"> Miercoles'+
	              '</label>'+
	          '</div>'+
						'<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Jueves" name="dias_trabajo[]" type="checkbox"> Jueves'+
	              '</label>'+
	          '</div>'+
						'<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Viernes" name="dias_trabajo[]" type="checkbox"> Viernes'+
	              '</label>'+
	          '</div>'+
						'<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Sabado" name="dias_trabajo[]" type="checkbox"> Sabado'+
	              '</label>'+
	          '</div>'+
						'<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Domingo" name="dias_trabajo[]" type="checkbox"> Domingo'+
	              '</label>'+
	          '</div>'+
	      '</div>';
			html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Horario trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='horario_trabajo' class='form-control' id='horario_trabajo'>";
						html+="<option value='7:00 a 14:00'>7:00 a 14:00</option>";
						html+="<option value='14:00 a 19:00'>14:00 a 19:00</option>";
						html+="<option value='7:00 a 19:00'>7:00 a 19:00</option>";
						html += "</select></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo sueldo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='tipo_sueldo' class='form-control' id='tipo_sueldo'>";
						html+="<option value='Por mes'>Por mes</option>";
						html+="<option value='Por d&iacute;as'>Por d&iacute;as</option>";
						html+="<option value='Por horas'>Por horas</option>";
						html += "</select></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>sueldo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='sueldo' class='form-control' id='sueldo'></div>";
		  html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_tipo_contrato = function () {
	$('.modal_agregar_datos_tipo_contrato').modal('hide');
	$('.formulario_crear_tipo_contrato').empty();
}
//funcones para modificar datos de tipo_contrato
var mostrar_modificar_tipo_contrato = function (id) {
	$('.modal_modificar_datos_tipo_contrato').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_tipo_contrato/buscar_tipo_contrato',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_tipo_contrato(data);
		$('.formulario_modificar_tipo_contrato').empty();
		$('.formulario_modificar_tipo_contrato').html(html);
		$('#turno_trabajo').on('change',function() {
			cambiaTurno();
		});
		$('#horario_trabajo').on('change',function() {
			cambiaHorario();
		});
		}
	});
}
var imprime_formulario_modificar_tipo_contrato = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_tipo_contrato' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre tipo contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_contrato' class='form-control' id='nombre_tipo_contrato' value= '"+data[i]['nombre_tipo_contrato']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
			    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Experiencia trabajo</label>";
			    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='experiencia_trabajo' class='form-control' id='experiencia_trabajo'>";
							if (data[i]['experiencia_trabajo'] == "Experto") {
									html+="<option value='Experto' selected>Experto</option>";
							}
							else {
									html+="<option value='Experto'>Experto</option>";
							}
							if (data[i]['experiencia_trabajo'] == "Medio") {
									html+="<option value='Medio' selected>Medio</option>";
							}
							else {
									html+="<option value='Medio'>Medio</option>";
							}
							if (data[i]['experiencia_trabajo'] == "Bajo") {
									html+="<option value='Bajo' selected>Bajo</option>";
							}
							else {
									html+="<option value='Bajo'>Bajo</option>";
							}

							html += "</select></div>";
			  html += "</div>";
				html+= "<div class='form-group'>";
			    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Turno trabajo</label>";
			    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='turno_trabajo' class='form-control' id='turno_trabajo'>";
							if (data[i]['turno_trabajo'] == "Mañana") {
								html+="<option value='Mañana' selected>Mañana</option>";
							}
							else {
								html+="<option value='Mañana'>Mañana</option>";
							}
							if (data[i]['turno_trabajo'] == "Tarde") {
								html+="<option value='Tarde' selected>Tarde</option>";
							}
							else {
								html+="<option value='Tarde'>Tarde</option>";
							}
							/*if (data[i]['turno_trabajo'] == "Noche") {
								html+="<option value='Noche' selected>Noche</option>";
							}
							else {
								html+="<option value='Noche'>Noche</option>";
							}*/
							if (data[i]['turno_trabajo'] == "Todo el dia") {
								html+="<option value='Todo el dia' selected>Todo el dia</option>";
							}
							else {
								html+="<option value='Todo el dia'>Todo el dia</option>";
							}

							html += "</select></div>";
			  html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>D&iacute;as trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'>";
					var dias = data[i]['dias_trabajo'];
				var arregloDeCadenas = dias.split(",");
				var lunes = false;
				var martes = false;
				var miercoles = false;
				var jueves = false;
				var viernes = false;
				var sabado = false;
				var domingo = false;
				for (var j = 0; j < arregloDeCadenas.length; j++) {
					if (arregloDeCadenas[j] == "Lunes") {//html += arregloDeCadenas[j]+"/";
						lunes = true;
					}
					if (arregloDeCadenas[j] == "Martes") {//html += arregloDeCadenas[j]+"/";
						martes = true;
					}
					if (arregloDeCadenas[j] == "Miercoles") {//html += arregloDeCadenas[j]+"/";
						miercoles = true;
					}
					if (arregloDeCadenas[j] == "Jueves") {//html += arregloDeCadenas[j]+"/";
						jueves = true;
					}
					if (arregloDeCadenas[j] == "Viernes") {//html += arregloDeCadenas[j]+"/";
						viernes = true;
					}
					if (arregloDeCadenas[j] == "Sabado") {//html += arregloDeCadenas[j]+"/";
						sabado = true;
					}
					if (arregloDeCadenas[j] == "Domingo") {//html += arregloDeCadenas[j]+"/";
						domingo = true;
					}
				}
					if (lunes == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Lunes" name="dias_trabajo[]" type="checkbox" checked> Lunes'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Lunes" name="dias_trabajo[]" type="checkbox" > Lunes'+
	              '</label>'+
	          '</div>';
					}
					if (martes == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Martes" name="dias_trabajo[]" type="checkbox" checked> Martes'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Martes" name="dias_trabajo[]" type="checkbox"> Martes'+
	              '</label>'+
	          '</div>';
					}
					if (miercoles == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Miercoles" name="dias_trabajo[]" type="checkbox" checked> Miercoles'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Miercoles" name="dias_trabajo[]" type="checkbox"> Miercoles'+
	              '</label>'+
	          '</div>';
					}
					if (jueves == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Jueves" name="dias_trabajo[]" type="checkbox" checked> Jueves'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Jueves" name="dias_trabajo[]" type="checkbox"> Jueves'+
	              '</label>'+
	          '</div>';
					}
					if (viernes == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Viernes" name="dias_trabajo[]" type="checkbox" checked> Viernes'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Viernes" name="dias_trabajo[]" type="checkbox" > Viernes'+
	              '</label>'+
	          '</div>';
					}
					if (sabado == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Sabado" name="dias_trabajo[]" type="checkbox" checked> Sabado'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Sabado" name="dias_trabajo[]" type="checkbox"> Sabado'+
	              '</label>'+
	          '</div>';
					}
					if (domingo == true) {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Domingo" name="dias_trabajo[]" type="checkbox" checked> Domingo'+
	              '</label>'+
	          '</div>';
					}
					else {
						html += '<div class="checkbox">'+
	              '<label>'+
	                  '<input value="Domingo" name="dias_trabajo[]" type="checkbox" > Domingo'+
	              '</label>'+
	          '</div>';
					}

					html += "</div>";
				html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Horario trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='horario_trabajo' class='form-control' id='horario_trabajo' value= '"+data[i]['horario_trabajo']+"'>";
						if (data[i]['horario_trabajo'] == "7:00 a 14:00") {
							html+="<option value='7:00 a 14:00' selected>7:00 a 14:00</option>";
						}
						else {
							html+="<option value='7:00 a 14:00'>7:00 a 14:00</option>";
						}
						if (data[i]['horario_trabajo'] == "14:00 a 19:00") {
							html+="<option value='14:00 a 19:00' selected>14:00 a 19:00</option>";
						}
						else {
							html+="<option value='14:00 a 19:00'>14:00 a 19:00</option>";
						}
						if (data[i]['horario_trabajo'] == "7:00 a 19:00") {
							html+="<option value='7:00 a 19:00' selected>7:00 a 19:00</option>";
						}
						else {
							html+="<option value='7:00 a 19:00'>7:00 a 19:00</option>";
						}

					html += "</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
			    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo sueldo</label>";
			    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='tipo_sueldo' class='form-control' id='tipo_sueldo'>";
							if (data[i]['tipo_sueldo'] == "Por mes") {
								html+="<option value='Por mes' selected>Por mes</option>";
							}
							else {
								html+="<option value='Por mes'>Por mes</option>";
							}
							if (data[i]['tipo_sueldo'] == "Por d&iacute;as") {
								html+="<option value='Por d&iacute;as' selected>Por d&iacute;as</option>";
							}
							else {
								html+="<option value='Por d&iacute;as'>Por d&iacute;as</option>";
							}
							if (data[i]['tipo_sueldo'] == "Por horas") {
								html+="<option value='Por horas' selected>Por horas</option>";
							}
							else {
								html+="<option value='Por horas'>Por horas</option>";
							}
							html += "</select></div>";
			  html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>sueldo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='sueldo' class='form-control' id='sueldo' value= '"+data[i]['sueldo']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}

var cambiaTurno = function () {
	var horario = $('#horario_trabajo').val();
	var turno = $('#turno_trabajo').val();
	if (turno == "Mañana") {
		$("#horario_trabajo option[value='7:00 a 14:00']").attr("selected",true);
	}
	if (turno == "Tarde" ) {
		$("#horario_trabajo option[value='14:00 a 19:00']").attr("selected",true);
	}
	if (turno == "Todo el dia" ) {
		$("#horario_trabajo option[value='7:00 a 19:00']").attr("selected",true);
	}
}
var cambiaHorario = function () {
	var horario = $('#horario_trabajo').val();
	var turno = $('#turno_trabajo').val();
	if (horario == "7:00 a 14:00" ) {
		$("#turno_trabajo option[value='Mañana']").attr("selected",true);
	}
	if (horario == "14:00 a 19:00") {
		$("#turno_trabajo option[value='Tarde']").attr("selected",true);
	}
	if (horario == "7:00 a 19:00") {
		$("#turno_trabajo option[value='Todo el dia']").attr("selected",true);
	}
}
var modificar_tipo_contrato = function() {
	var formdata = new FormData($("#formulario_m_tipo_contrato")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_tipo_contrato/modificar_tipo_contrato',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_tipo_contrato').modal('hide');
	       $('.formulario_modificar_tipo_contrato').empty();
	       imprime_lista_tipo_contrato();
      }
  	});
}
var cancelar_modificar_tipo_contrato = function () {
	$('.modal_modificar_datos_tipo_contrato').modal('hide');
	$('.formulario_modificar_tipo_contrato').empty();
}
//funciones para eliminar datos tipo_contrato
var id_aux = 0
var mostrar_eliminar_tipo_contrato = function (id) {
 id_aux = id
	$('.modal_eliminar_datos_tipo_contrato').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_tipo_contrato/buscar_tipo_contrato',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_tipo_contrato(data);
		$('.formulario_eliminar_tipo_contrato').empty();
		$('.formulario_eliminar_tipo_contrato').html(html);
		}
	});
}
var imprime_formulario_eliminar_tipo_contrato = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_tipo_contrato' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre_tipo_contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_contrato' class='form-control' id='nombre_tipo_contrato' value= '"+data[i]['nombre_tipo_contrato']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>experiencia_trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='experiencia_trabajo' class='form-control' id='experiencia_trabajo' value= '"+data[i]['experiencia_trabajo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>turno_trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='turno_trabajo' class='form-control' id='turno_trabajo' value= '"+data[i]['turno_trabajo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>dias_trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='dias_trabajo' class='form-control' id='dias_trabajo' value= '"+data[i]['dias_trabajo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>horario_trabajo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='horario_trabajo' class='form-control' id='horario_trabajo' value= '"+data[i]['horario_trabajo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>tipo_sueldo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_sueldo' class='form-control' id='tipo_sueldo' value= '"+data[i]['tipo_sueldo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>sueldo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='sueldo' class='form-control' id='sueldo' value= '"+data[i]['sueldo']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_tipo_contrato = function() {
	//var formdata = new FormData($('#formulario_e_tipo_contrato')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_tipo_contrato/eliminar_datos',
      type: 'POST',
      data: {id:id_aux},
      success:function(){
	       $('.modal_eliminar_datos_tipo_contrato').modal('hide');
	       $('.formulario_eliminar_tipo_contrato').empty();
	       imprime_lista_tipo_contrato();
      }
  	});
}
var cancelar_eliminar_tipo_contrato = function () {
	$('.modal_eliminar_datos_tipo_contrato').modal('hide');
	$('.formulario_eliminar_tipo_contrato').empty();
}
$(function() {
	imprime_lista_tipo_contrato();
});
</script>
