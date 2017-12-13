<div class="col-md-12 col-sm-12 col-xs-12">
     <a name="3"></a>
         <div class="x_panel tile fixed_height_600">
             <div class="x_title">
                 <h2><i class="fa fa-dollar"></i> Lista de cajas sucursales</h2>
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
                   <center><h3>Administraci&oacute;n de Cajas <i class="fa fa-dollar"></i></h3></center>
								 	<div class="tabla_caja table-responsive"></div>
             </div>
         </div>
   </div>
	<!--button class="btn btn-success" onclick="imprimir_agregar_caja()">Agregar</button-->
	<!--====================================================================-->
	         <div class="modal fade modal_ver_historial" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	           <div class="modal-dialog modal-lg" role="document">
	             <div class="modal-content">
	                 <div class="modal-header">
	                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                 <span aria-hidden="true">×</span></button>
	                 <h4 class="modal-title" id="myLargeModalLabel">Historial de Caja</h4> </div>
	                 <div class="modal-body">
	                  <center><button type="button" name="button" onclick="buscarIn()" class="btn btn-warning">Mostrar historial de Ingresos</button>
										<button type="button" name="button" onclick="buscarEg()" class="btn btn-success">Mostrar historial de Egresos</button></center><br>
										<form class="form-horizontal" action="index.html" method="post">
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
												  <label for=""></label>
												  <input type="text" title="Fecha de inicio" placeholder="Fecha de inicio" class="form-control datepicker" id="f1" placeholder="">
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
												  <label for=""></label>
												  <input type="text" title="fecha final" placeholder="Fecha final" class="form-control datepicker" id="f2" placeholder="">
												</div>
											</div>

										</form>
										<div class="historial">

										</div>
	               </div>
	             </div>
	           </div>
	       </div>
	<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_agregar_fondos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-xs" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso a Caja</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_agregarFondosCaja"></div>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
       <div class="modal fade modal_agregar_datos_caja" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_caja"></div>
										<center><button class="btn btn-success" onclick="agregar_caja()">Guardar</button>
										<button class="btn btn-danger" onclick="cancelar_agregar_caja()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
      <div class="modal fade modal_modificar_datos_caja" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_caja">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_caja()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_caja()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
      <div class="modal fade modal_eliminar_datos_caja" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_caja">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_caja()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_caja()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

</html>

<script>
var base_url = '<?=base_url()?>';
// Añadir fondos a caja
var idCaja = 0;
var mostrar_modalAdd = function (id) {
  idCaja = id;
  $('.modal_agregar_fondos').modal("show");
  $.ajax({
    url: base_url+'index.php/controlador_caja/verFondos',
    type: 'POST',
    dataType: 'json',
    data: {id:id},
    success:function (data) {
      var html = "";
      html += '<center><h1>'+data[0]["nombre"]+' '+data[0]["direccion"]+'</h1></center>'+
      '<ul class="list-group">'+
        '<li class="list-group-item">'+
          '<h2>Fondos: '+data[0]["monto"]+' Bs.</h2>'+
        '</li>'+
        '<li class="list-group-item">'+
          '<div class="input-group">'+
            '<span class="input-group-addon"><i class="fa fa-dollar"></i></span>'+
            '<input type="text" class="form-control" id="fondos" placeholder="">'+
          '</div>'+
        '</li>'+
        '<li class="list-group-item">'+
          '<div class="input-group">'+
            '<button type="button" class="btn btn-success" placeholder="" onclick="agregarFondos()">Guardar <i class="fa fa-save"></i></button>'+
          '</div>'+
        '</li>'+
      '</ul>';
      $('.formulario_agregarFondosCaja').html(html);
    }
  });

}
var agregarFondos = function () {
  var fondos = $('#fondos').val();
  $.ajax({
    url: base_url+'index.php/controlador_caja/agregarFondos',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {fondos:fondos,idCaja:idCaja},
    success:function () {
      $('.modal_agregar_fondos').modal("hide");
      imprime_lista_caja();
      $('.formulario_agregarFondosCaja').empty();
    }
  });

}
// Funcion que imprime la lista de registos de l atabla caja
var imprime_lista_caja = function() {
	$.ajax({
		url: base_url+'index.php/controlador_caja/listar_caja',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_caja(data);
			$('.tabla_caja').empty();
			$('.tabla_caja').html(html);
      $('#cajatabla').DataTable({
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
var imprime_tabla_caja = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="cajatabla">';
			html += '<thead>';
				html += '<tr>';
					//html += '<th>id</th>';
					html += '<th>Sucursal</th>';
					html += '<th>monto</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    //html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre']+'</td>';
			    html += '<td>'+data[i]['monto']+'</td>';
					html += '<td>';
          html += '<button class="btn btn-primary" title="Boton que muestra el historial de la caja" onclick ="mostrar_historial_cajaIn('+data[i]['id']+')">Ver historial</button>';
          html += '<button class="btn btn-success" title="Boton que muestra el historial de la caja" onclick ="mostrar_modalAdd('+data[i]['id']+')">Añadir fondos <i class="fa fa-dollar"></i></button>';
          html += '</td>';
			    //html += '<td><button class="btn btn-info btn-xs" onclick ="mostrar_modificar_caja('+data[i]['id']+')">Modificar</button><button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_caja('+data[i]['id']+')">Eliminar</button></td>';
				html += '</tr>';
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
$(document).ready(function() {
	$('.datepicker').datepicker({
		dateFormat:'yy-mm-dd'
	});
});

var mostrar_historial_cajaIn = function (id) {
	$(".modal_ver_historial").modal("show");
  $('#f1').val("");
  $('#f2').val("");
  $(".historial").empty();
	idCaja = id;
}
var buscarIn =function () {
	var f1 = $("#f1").val();
	var f2 = $("#f2").val();
	$.ajax({
		url: base_url+'index.php/controlador_caja/mostrarHistorialIngresos',
		type: 'POST',
		dataType: 'json',
		data: {id:idCaja,f1: f1,f2:f2},
		success:function (data) {
			var html = "";
      html += "<table class='table table-striped'>";
      html += "<th>Fecha</td><td>Hora</td><td>Usuario</td><td>Monto"
			for (var i = 0; i < data.length; i++) {
        html += "<tr>";
				html += "<td>"+data[i]["fecha"]+"</td><td>"+data[i]["hora"]+"</td><td>"+data[i]["nombres"]+" "+ data[i]["apellidos"]+"</td><td>"+data[i]["monto"]+"</td><br>";
        html += "<tr>";
			}
      html += "</table>";
			$(".historial").empty();
			$(".historial").html(html);
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
var buscarEg =function () {
	var f1 = $("#f1").val();
	var f2 = $("#f2").val();
	$.ajax({
		url: base_url+'index.php/controlador_caja/mostrarHistorialEgresos',
		type: 'POST',
		dataType: 'json',
		data: {id:idCaja,f1: f1,f2:f2},
		success:function (data) {
			var html = "";
      html += "<table class='table table-striped'>";
      html += "<th>Fecha</td><td>Hora</td><td>Usuario</td><td>Monto"
			for (var i = 0; i < data.length; i++) {
        html += "<tr>";
				html += "<td>"+data[i]["fecha"]+"</td><td>"+data[i]["hora"]+"</td><td>"+data[i]["nombres"]+" "+ data[i]["apellidos"]+"</td><td>"+data[i]["monto"]+"</td><br>";
        html += "<tr>";
			}
      html += "</table>";
			$(".historial").empty();
			$(".historial").html(html);
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla caja
var imprimir_agregar_caja = function() {
	$('.modal_agregar_datos_caja').modal('show');
	var html = imprime_formulario_ingreso_caja();
	$('.formulario_crear_caja').empty();
	$('.formulario_crear_caja').html(html);
}
var agregar_caja = function () {
	var formdata = new FormData($("#formulario_i_caja")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_caja/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_caja').modal('hide');
	     $('.formulario_crear_caja').empty();
	     imprime_lista_caja();
      }
  	});
}
var imprime_formulario_ingreso_caja = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_caja' enctype='multipart/form-data'>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id_sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id_sucursal' class='form-control' id='id_sucursal'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>monto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='monto' class='form-control' id='monto'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_caja = function () {
	$('.modal_agregar_datos_caja').modal('hide');
	$('.formulario_crear_caja').empty();
}
//funcones para modificar datos de caja
var mostrar_modificar_caja = function (id) {
	$('.modal_modificar_datos_caja').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_caja/buscar_caja',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_caja(data);
		$('.formulario_modificar_caja').empty();
		$('.formulario_modificar_caja').html(html);
		}
	});
}
var imprime_formulario_modificar_caja = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_caja' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id_sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id_sucursal' class='form-control' id='id_sucursal' value= '"+data[i]['id_sucursal']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>monto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='monto' class='form-control' id='monto' value= '"+data[i]['monto']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_caja = function() {
	var formdata = new FormData($("#formulario_m_caja")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_caja/modificar_caja',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_caja').modal('hide');
	       $('.formulario_modificar_caja').empty();
	       imprime_lista_caja();
      }
  	});
}
var cancelar_modificar_caja = function () {
	$('.modal_modificar_datos_caja').modal('hide');
	$('.formulario_modificar_caja').empty();
}
//funciones para eliminar datos caja
var id_aux = 0
var mostrar_eliminar_caja = function (id) {
 id_aux = id
	$('.modal_eliminar_datos_caja').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_caja/buscar_caja',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_caja(data);
		$('.formulario_eliminar_caja').empty();
		$('.formulario_eliminar_caja').html(html);
		}
	});
}
var imprime_formulario_eliminar_caja = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_caja' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id_sucursal</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id_sucursal' class='form-control' id='id_sucursal' value= '"+data[i]['id_sucursal']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>monto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='monto' class='form-control' id='monto' value= '"+data[i]['monto']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_caja = function() {
	//var formdata = new FormData($('#formulario_e_caja')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_caja/eliminar_datos',
      type: 'POST',
      data: {id:id_aux},
      success:function(){
	       $('.modal_eliminar_datos_caja').modal('hide');
	       $('.formulario_eliminar_caja').empty();
	       imprime_lista_caja();
      }
  	});
}
var cancelar_eliminar_caja = function () {
	$('.modal_eliminar_datos_caja').modal('hide');
	$('.formulario_eliminar_caja').empty();
}
$(function() {
	imprime_lista_caja();
});
</script>
