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
                     <center><h3>Administraci&oacute;n de contratos de personal</h3></center>
  									 <button class="btn btn-success" onclick="imprimir_agregar_contrato()">Agregar</button>
  									 <div class="tabla_contrato table-responsive"></div>
               </div>
           </div>
     </div>
</div>
<div class="row" id="sucursales">

</div>
<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12">
       <a name="3"></a>
           <div class="x_panel tile fixed_height_600">
               <div class="x_title">
                   <h2><i class="fa fa-users"></i> Contratos</h2>
                   <div class="clearfix"></div>
               </div>
               <div class="x_content" style="display: block;">
                     <center><h3 id="Nsucursal">Contratos Personal</h3></center>
                     <form class="form-horizontal" action="index.html" method="post">
                       <div class="form-group" id="personal">
                       </div>
                       <div class="Fpago">

                       </div>

                     </form>
               </div>
           </div>
  </div>
  <div class="col-md-8 col-sm-8 col-xs-12">
       <a name="3"></a>
           <div class="x_panel tile fixed_height_600">
               <div class="x_title">
                   <h2><i class="fa fa-dollar"></i> Pagos</h2>

                   <div class="clearfix"></div>
               </div>
               <div class="x_content" style="display: block;">
                     <div class="pagosContrato table-responsive">
                       <center><h3>Pagos de Contrato </h3></center>
                     </div>
               </div>
           </div>
  </div>
</div>


<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_contrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_contrato">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_contrato()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_contrato()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_contrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_contrato">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_contrato()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_contrato()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_contrato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_contrato">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_contrato()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_contrato()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla contrato

var imprime_lista_contrato = function() {
	$.ajax({
		url: base_url+'index.php/controlador_contrato/listar_contrato',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_contrato(data);
			$('.tabla_contrato').empty();
			$('.tabla_contrato').html(html);
			$('#contratotabla').DataTable({
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
var imprime_tabla_contrato = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped table-bordered bulk_action" id="contratotabla">';
			html += '<thead>';
				html += '<tr>';
					html += '<th>Sucursal</th>';
					html += '<th>Personal</th>';
					html += '<th>Tipo contrato</th>';
					html += '<th>Fecha contrato</th>';
					html += '<th>Estado</th>';
					html += '<th>Fecha fin</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    html += '<td>'+data[i]['nombre']+'</td>';
			    html += '<td>'+data[i]['nombres']+' '+data[i]['apellidos']+'</td>';
			    html += '<td>'+data[i]['nombre_tipo_contrato']+'</td>';
			    html += '<td>'+data[i]['fecha_contrato']+'</td>';
					if (data[i]["estado"] == 1) {
						html += '<td>Activo</td>';
					}
					else {
						html += '<td>Inactivo</td>';
					}
			    //html += '<td>'+data[i]['estado']+'</td>';
			    html += '<td>'+data[i]['fecha_fin_contrato']+'</td>';
			    html += '<td>';
          if (data[i]["estadoContrato"]==1) {
            html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_contrato('+data[i]['id_c']+')">Modificar</button>';
            html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_contrato('+data[i]['id_c']+')">Eliminar</button>';
          }
          else {
            html += '<button class="btn btn-warning btn-xs" onclick ="activar_contrato('+data[i]['id_c']+')">Activar</button>';
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla contrato
var activar_contrato = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_contrato/activar',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id: id},
    success:function () {
      imprime_lista_contrato();
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
var imprimir_agregar_contrato = function() {
	$.ajax({
		url: base_url+'index.php/controlador_contrato/mostrarDatos',
		dataType: 'json',
		success:function(data) {
			$('.modal_agregar_datos_contrato').modal('show');
			var html = imprime_formulario_ingreso_contrato(data);
			$('.formulario_crear_contrato').empty();
			$('.formulario_crear_contrato').html(html);
			$('.datepicker').datepicker({
				dateFormat:'yy-mm-dd'
			});
      $('#id_tipo_contrato').on('change',function() {
        mostrarTipoContrato();
      });
      var mostrarTipoContrato =  function () {
        var id = $("#id_tipo_contrato").val();
        $.ajax({
          url: base_url+'index.php/controlador_tipo_contrato/buscar_tipo_contrato',
          type: 'POST',
          dataType: 'json',
          data: {id: id},
          success:function (data) {
            var html = "";
            for (var i = 0; i < data.length; i++) {
              html += "<table class='table'>";
                html += "<tr><th>Tipo de contato</th>";
                html += "<td>"+data[0]["nombre_tipo_contrato"]+"</td></tr>";
                html += "<tr><th>Experiencia</th>";
                html += "<td>"+data[0]["experiencia_trabajo"]+"</td></tr>";
                html += "<tr><th>Turno</th>";
                html += "<td>"+data[0]["turno_trabajo"]+"</td></tr>";
                html += "<tr><th>Dias</th>";
                html += "<td>"+data[0]["dias_trabajo"]+"</td></tr>";
                html += "<tr><th>Horario</th>";
                html += "<td>"+data[0]["horario_trabajo"]+"</td></tr>";
                html += "<tr><th>Tipo sueldo</th>";
                html += "<td>"+data[0]["tipo_sueldo"]+"</td></tr>";
                html += "<tr><th>Sueldo</th>";
                html += "<td>"+data[0]["sueldo"]+"</td></tr>";
              html += "</table>";
            }
            $('.Vprevia').empty();
            $('.Vprevia').html(html);
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
      mostrarTipoContrato();
		}
	});
	//----------------------
}
var agregar_contrato = function () {
	var formdata = new FormData($("#formulario_i_contrato")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_contrato/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_contrato').modal('hide');
	     $('.formulario_crear_contrato').empty();
	     imprime_lista_contrato();
      }
  	});
}
var imprime_formulario_ingreso_contrato = function(data) {
	var html ='';
	//var data = 0;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_contrato' enctype='multipart/form-data'>";
			html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
			    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Personal</label>";
			    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_personal' class='form-control' id='id_personal'>";
								for (var i = 0; i < data.personal.length; i++) {
									html+= "<option value='"+data.personal[i]["ci"]+"'>Sucursal: "+data.personal[i]["nombre"]+"____ Personal: "+data.personal[i]["nombres"]+" "+data.personal[i]["apellidos"]+"</option>";
								}
							html += "</select></div>";
			html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_tipo_contrato' class='form-control' id='id_tipo_contrato'>";
							for (var i = 0; i < data.tipo_contrato.length; i++) {
								html+= "<option value='"+data.tipo_contrato[i]["id"]+"'>"+data.tipo_contrato[i]["nombre_tipo_contrato"]+"</option>";
							}
						html += "</select></div>";
		  html += "</div>";
      html += "<div class=''>";
        html += "<div class='col-md-4 col-sm-4 col-xs-12'>";
        html += "</div>";
        html += "<div class='col-md-8 col-sm-8 col-xs-12 Vprevia'>";
        html += "</div>";
      html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Fecha contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_contrato' class='form-control datepicker' id='fecha_contrato'></div>";
		  	html += "</div>";
			html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>estado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='estado' class='form-control' id='estado'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Fecha fin</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_fin_contrato' class='form-control' id='fecha_fin_contrato' readonly></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_contrato = function () {
	$('.modal_agregar_datos_contrato').modal('hide');
	$('.formulario_crear_contrato').empty();
}
//funcones para modificar datos de contrato
var mostrar_modificar_contrato = function (idd) {
	$('.modal_modificar_datos_contrato').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_contrato/buscar_contrato',
		type: 'POST',
		dataType: 'json',
		data: {id: idd},
		success:function(data) {
		var html = imprime_formulario_modificar_contrato(data);
		$('.formulario_modificar_contrato').empty();
		$('.formulario_modificar_contrato').html(html);
		$('.datepicker').datepicker({
			dateFormat:'yy-mm-dd'
		});
    $('#id_tipo_contrato').on('change',function() {
      mostrarTipoContrato();
    });
    var mostrarTipoContrato =  function () {
      var id = $("#id_tipo_contrato").val();
      $.ajax({
        url: base_url+'index.php/controlador_tipo_contrato/buscar_tipo_contrato',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
        success:function (data) {
          var html = "";
          for (var i = 0; i < data.length; i++) {
            html += "<table class='table'>";
              html += "<tr><th>Tipo de contato</th>";
              html += "<td>"+data[0]["nombre_tipo_contrato"]+"</td></tr>";
              html += "<tr><th>Experiencia</th>";
              html += "<td>"+data[0]["experiencia_trabajo"]+"</td></tr>";
              html += "<tr><th>Turno</th>";
              html += "<td>"+data[0]["turno_trabajo"]+"</td></tr>";
              html += "<tr><th>Dias</th>";
              html += "<td>"+data[0]["dias_trabajo"]+"</td></tr>";
              html += "<tr><th>Horario</th>";
              html += "<td>"+data[0]["horario_trabajo"]+"</td></tr>";
              html += "<tr><th>Tipo sueldo</th>";
              html += "<td>"+data[0]["tipo_sueldo"]+"</td></tr>";
              html += "<tr><th>Sueldo</th>";
              html += "<td>"+data[0]["sueldo"]+"</td></tr>";
            html += "</table>";
          }
          $('.Vprevia').empty();
          $('.Vprevia').html(html);
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
    mostrarTipoContrato();
		}
	});
}
var imprime_formulario_modificar_contrato = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_contrato' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data.contrato[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Personal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_personal' class='form-control' id='id_personal'>";
					for (var j = 0; j < data.personal.length; j++) {
						if (data.personal[j]['ci'] == data.contrato[i]["id_personal"]) {
							html += "<option value='"+data.personal[j]['ci']+"' selected>"+data.personal[j]['nombres']+" "+data.personal[j]['apellidos']+"</option>";
						}
						else {
							html += "<option value='"+data.personal[j]['ci']+"'>"+data.personal[j]['nombres']+" "+data.personal[j]['apellidos']+"</option>";
						}
					}
					html += "</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_tipo_contrato' class='form-control' id='id_tipo_contrato'>";
					for (var j = 0; j < data.tipo_contrato.length; j++) {
						if (data.tipo_contrato[j]['id'] == data.contrato[i]["id_tipo_contrato"]) {
							html += "<option value='"+data.tipo_contrato[j]['id']+"' selected>"+data.tipo_contrato[j]['nombre_tipo_contrato']+"</option>";
						}
						else {
							html += "<option value='"+data.tipo_contrato[j]['id']+"'>"+data.tipo_contrato[j]['nombre_tipo_contrato']+"</option>";
						}
					}
					html += "</select></div>";
        html += "<div class=''>";
          html += "<div class='col-md-4 col-sm-4 col-xs-12'>";
          html += "</div>";
          html += "<div class='col-md-8 col-sm-8 col-xs-12 Vprevia'>";
          html += "</div>";
        html += "</div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha_contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_contrato' class='form-control datepicker' id='fecha_contrato' value= '"+data.contrato[i]['fecha_contrato']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>estado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='estado' class='form-control' id='estado' value= '"+data.contrato[i]['estado']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha_fin_contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_fin_contrato' class='form-control' id='fecha_fin_contrato' value= '"+data.contrato[i]['fecha_fin_contrato']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_contrato = function() {
	var formdata = new FormData($("#formulario_m_contrato")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_contrato/modificar_contrato',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_contrato').modal('hide');
	       $('.formulario_modificar_contrato').empty();
	       imprime_lista_contrato();
      }
  	});
}
var cancelar_modificar_contrato = function () {
	$('.modal_modificar_datos_contrato').modal('hide');
	$('.formulario_modificar_contrato').empty();
}
//funciones para eliminar datos contrato
var id_aux = 0
var mostrar_eliminar_contrato = function (id) {
 id_aux = id
	$('.modal_eliminar_datos_contrato').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_contrato/buscar_contrato',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_contrato(data);
		$('.formulario_eliminar_contrato').empty();
		$('.formulario_eliminar_contrato').html(html);
		}
	});
}
var imprime_formulario_eliminar_contrato = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_contrato' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data.contrato[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Personal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_personal' class='form-control' id='id_personal' disabled>";
					for (var j = 0; j < data.personal.length; j++) {
						if (data.personal[j]['ci'] == data.contrato[i]["id_personal"]) {
							html += "<option value='"+data.personal[j]['ci']+"' selected>"+data.personal[j]['nombres']+" "+data.personal[j]['apellidos']+"</option>";
						}
						else {
							html += "<option value='"+data.personal[j]['ci']+"'>"+data.personal[j]['nombres']+" "+data.personal[j]['apellidos']+"</option>";
						}
					}
					html += "</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_tipo_contrato' class='form-control' id='id_tipo_contrato' disabled>";
					for (var j = 0; j < data.tipo_contrato.length; j++) {
						if (data.tipo_contrato[j]['id'] == data.contrato[i]["id_tipo_contrato"]) {
							html += "<option value='"+data.tipo_contrato[j]['id']+"' selected>"+data.tipo_contrato[j]['nombre_tipo_contrato']+"</option>";
						}
						else {
							html += "<option value='"+data.tipo_contrato[j]['id']+"'>"+data.tipo_contrato[j]['nombre_tipo_contrato']+"</option>";
						}
					}
					html += "</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha_contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_contrato' class='form-control' id='fecha_contrato' value= '"+data.contrato[i]['fecha_contrato']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>estado</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='estado' class='form-control' id='estado' value= '"+data.contrato[i]['estado']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>fecha_fin_contrato</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='fecha_fin_contrato' class='form-control' id='fecha_fin_contrato' value= '"+data.contrato[i]['fecha_fin_contrato']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_contrato = function() {
	//var formdata = new FormData($('#formulario_e_contrato')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_contrato/eliminar_datos',
      type: 'POST',
      data: {id:id_aux},
      success:function(){
	       $('.modal_eliminar_datos_contrato').modal('hide');
	       $('.formulario_eliminar_contrato').empty();
	       imprime_lista_contrato();
      }
  	});
}
var cancelar_eliminar_contrato = function () {
	$('.modal_eliminar_datos_contrato').modal('hide');
	$('.formulario_eliminar_contrato').empty();
}
var listarContratos = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_contrato/listar_contratoSucursal',
    dataType: 'json',
    data:{id:id},
    success:function (data) {
            if(data != 0)
            {
              var html = "";
                html += '<select class="form-control" id="lContratos">';
                  html += '<option value="">[.::SELECCIONE::.]</option>';
                  for (var i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i]["id_c"]+'">'+data[i]["nombre"]+': '+data[i]["nombres"]+' '+data[i]["apellidos"]+'</option>';
                }
              html += '</select>';
              $('#personal').empty();
              $('#personal').html(html);
              var html3 = data[0]["nombre"];
              $('#Nsucursal').empty();
              $('#Nsucursal').html(html3);
              $('#lContratos').on('change',function() {
                var id = $('#lContratos').val();
                mCampos(id);
              });
              var mCampos = function (id) {
                $.ajax({
                  url: base_url+'index.php/controlador_contrato/verReportePagos',
                  type: 'POST',
                  dataType: 'json',
                  data: {id: id},
                  success:function (data) {
                    var html = "";
                    //Listar contratos de la sucursal
                    if( data.contrato != 0)
                    {
                      for (var i = 0; i < data.contrato.length; i++) {
                        html += "<center><h3>"+data.contrato[i]["nombre_tipo_contrato"]+"</h3></center><br>";
                        html += "<table class='table'>";
                        html += "<tr>";
                        html += "<th>Nombres: </th><td>"+data.contrato[i]["nombres"]+"</td>";
                        html += "<th>Apellidos:</th><td>"+data.contrato[i]["apellidos"]+"</td>";
                        html += "<th>CI:</th><td>"+data.contrato[i]["ci"]+"</td>";
                        html += "</tr>";
                        html += "<tr>";
                        html += "<th>Fecha de contrato:</th><td>"+data.contrato[i]["fecha_contrato"]+"</td>";
                        html += "<th>Experiencia:</th><td>"+data.contrato[i]["experiencia_trabajo"]+"</td>";
                        html += "<th>Turno:</th><td>"+data.contrato[i]["turno_trabajo"]+"</td>";
                        html += "</tr>";
                        html += "<tr>";
                        html += "<th>Dias de trabajo:</th><td>"+data.contrato[i]["dias_trabajo"]+"</td>";
                        html += "<th>Horario:</th><td>"+data.contrato[i]["horario_trabajo"]+"</td>";
                        html += "<th>Sueldo:</th><td>"+data.contrato[i]["sueldo"]+"</td>";
                        html += "</tr>";
                        html += "</table>";
                      }
                      html += "<table class='table'>";
                      html += "<thead><th>#</th><th>Fecha</th><th>Monto</th><th></th></thead><tbody>";
                      for (var i = 0; i < data.pagos.length; i++) {
                        html += "<tr>";
                        html += "<td>"+((i*1)+1)+"</td>";
                        html += "<td>"+data.pagos[i]["fecha_pago"]+"</td>";
                        html += "<td>"+data.pagos[i]["pago"]+"</td>";
                        html += "<td><a href='#' class='btn btn-info btn-xs'><i class='fa fa-file-pdf-o'></i></a></td>";
                        html += "</tr>";
                      }
                      html += "</tbody></table>";
                    }
                    else {
                      html += "<h1>No hay registros!!</h1>";
                    }
                    $('.pagosContrato').empty();
                    $('.pagosContrato').html(html);
                    var html2 = "";
                    //Mostrar Formulario de pago al contrato
                    if (data.contrato != 0)
                    {
                      html2 += '<div class="form-group">'+
                        '<label for="control-label">Pago de contrato</label>'+
                        '<input type="text" class="form-control" id="montoPago" placeholder="Bs 000.000">'+
                        '<button type="button" name="button" class="btn btn-success btn-block" onclick="pagar()" >Realizar pago <i class="fa fa-dollar"></i></button>'+
                      '</div>';
                      $('.Fpago').empty();
                      $('.Fpago').html(html2);
                      $('#montoPago').numeric(".");
                    }
                    else {
                      $('.Fpago').empty();
                    }
                    //Funcion que realiza los pagos de contrato
                    pagar = function pagar() {
                      if (confirm("Esta seguro de Realizar este pago?")) {
                        var monto = $('#montoPago').val();
                        $.ajax({
                          url: base_url+'index.php/controlador_pago_contrato/pagar',
                          type: 'post',
                          dataType: 'json',
                          data: {id_contrato: id,monto:monto},
                          success:function (data) {
                            var id = $('#lContratos').val();
                            mCampos(id);
                            alert(data["mensaje"]);
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
                    }
                  }
                });
              }
            }
            else {
              $('.pagosContrato').empty();
              $('.Fpago').empty();
              $('#personal').empty();
            }
    }
  });


}
var ver = function (id) {
  listarContratos(id);
  $('.Fpago').empty();
  $('.pagosContrato').empty();
}
var mostrarSucursales = function () {
  $.ajax({
    url: base_url+"index.php/controlador_sucursal/listar_sucursal",
    dataType: 'json',
    success:function (data) {
      var html = "";
      for (var i = 0; i < data.length; i++) {
        html += '<a href="javascript:ver('+data[i]["id"]+')">'+
                  '<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">'+
                      '<div class="tile-stats">'+
                          '<div class="icon"><i class="fa fa-home"></i>'+
                          '</div>'+
                          '<div class="count">></div>'+
                          '<h3>'+data[i]["nombre"]+'</h3>'+
                          '<p>'+data[i]["direccion"]+'</p>'+
                      '</div>'+
                  '</div>'+
                '</a>';
      }
      $('#sucursales').empty();
      $('#sucursales').html(html);
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
$(function() {
  imprime_lista_contrato();
  mostrarSucursales();
});
</script>
