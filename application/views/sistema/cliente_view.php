<!DOCTYPE html>
<!--DOCUMENTO ELABORADO POR MEDIO DE REYDEN TOOLS-->
<!--DESARROLLADO POR: REYNALDO KANTUTA TARIFA-->
<!--PARA MAS INFORMACION LLAMAR: 76209764-->
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>cliente</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
</head>
<body>
	<button class="btn btn-success" onclick="imprimir_agregar_cliente()">Agregar</button>
	<div class="tabla_cliente"></div>
<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tabla</h4> </div>
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
         <div class="modal fade modal_modificar_datos_cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_cliente">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_cliente()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_cliente()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_cliente">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_cliente()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_cliente()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>
<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla cliente
var imprime_lista_cliente = function() {
	$.ajax({
		url: base_url+'index.php/controlador_cliente/listar_cliente',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_cliente(data);
			$('.tabla_cliente').empty();
			$('.tabla_cliente').html(html);
		}
	});
}
var imprime_tabla_cliente = function(data) {
	var html = '';
	if (data != 0) 
	{
		html += '<table class="table table-striped">';
			html += '<thead>';
				html += '<tr>';
					html += '<th>id</th>';
					html += '<th>nombre_cliente</th>';
					html += '<th>nit</th>';
					html += '<th>direccion</th>';
					html += '<th>tipo_cliente</th>';
					html += '<th>telefono</th>';
					html += '<th>correo</th>';
					html += '<th>pass</th>';
					html += '<th>publico</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++) 
			{
				html += '<tr>';
			    html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre_cliente']+'</td>';
			    html += '<td>'+data[i]['nit']+'</td>';
			    html += '<td>'+data[i]['direccion']+'</td>';
			    html += '<td>'+data[i]['tipo_cliente']+'</td>';
			    html += '<td>'+data[i]['telefono']+'</td>';
			    html += '<td>'+data[i]['correo']+'</td>';
			    html += '<td>'+data[i]['pass']+'</td>';
			    html += '<td>'+data[i]['publico']+'</td>';
			    html += '<td><button class="btn btn-info btn-xs" onclick ="mostrar_modificar_cliente('+data[i]['id']+')">Modificar</button><button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_cliente('+data[i]['id']+')">Eliminar</button></td>';
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
	     imprime_lista_cliente();
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
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre_cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_cliente' class='form-control' id='nombre_cliente'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>tipo_cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_cliente' class='form-control' id='tipo_cliente'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>correo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='correo' class='form-control' id='correo'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>pass</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='pass' class='form-control' id='pass'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>publico</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='publico' class='form-control' id='publico'></div>";
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
//funcones para modificar datos de cliente
var mostrar_modificar_cliente = function (id) {
	$('.modal_modificar_datos_cliente').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_cliente/buscar_cliente',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_cliente(data);
		$('.formulario_modificar_cliente').empty();
		$('.formulario_modificar_cliente').html(html);
		}
	});
}
var imprime_formulario_modificar_cliente = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0) 
	{
		html += "<form class='form form-horizontal' id='formulario_m_cliente' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre_cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_cliente' class='form-control' id='nombre_cliente' value= '"+data[i]['nombre_cliente']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit' value= '"+data[i]['nit']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data[i]['direccion']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>tipo_cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_cliente' class='form-control' id='tipo_cliente' value= '"+data[i]['tipo_cliente']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono' value= '"+data[i]['telefono']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>correo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='correo' class='form-control' id='correo' value= '"+data[i]['correo']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>pass</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='pass' class='form-control' id='pass' value= '"+data[i]['pass']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>publico</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='publico' class='form-control' id='publico' value= '"+data[i]['publico']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_cliente = function() {
	var formdata = new FormData($("#formulario_m_cliente")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_cliente/modificar_cliente',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_cliente').modal('hide');
	       $('.formulario_modificar_cliente').empty();
	       imprime_lista_cliente();
      }
  	});
}
var cancelar_modificar_cliente = function () {
	$('.modal_modificar_datos_cliente').modal('hide');
	$('.formulario_modificar_cliente').empty();
}
//funciones para eliminar datos cliente
var id_auxcliente = 0
var mostrar_eliminar_cliente = function (id) {
 id_auxcliente = id
	$('.modal_eliminar_datos_cliente').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_cliente/buscar_cliente',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_cliente(data);
		$('.formulario_eliminar_cliente').empty();
		$('.formulario_eliminar_cliente').html(html);
		}
	});
}
var imprime_formulario_eliminar_cliente = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0) 
	{
		html += "<form class='form form-horizontal' id='formulario_e_cliente' enctype='multipart/form-data'>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre_cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_cliente' class='form-control' id='nombre_cliente' value= '"+data[i]['nombre_cliente']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nit</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nit' class='form-control' id='nit' value= '"+data[i]['nit']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>direccion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='direccion' class='form-control' id='direccion' value= '"+data[i]['direccion']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>tipo_cliente</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='tipo_cliente' class='form-control' id='tipo_cliente' value= '"+data[i]['tipo_cliente']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>telefono</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='telefono' class='form-control' id='telefono' value= '"+data[i]['telefono']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>correo</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='correo' class='form-control' id='correo' value= '"+data[i]['correo']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>pass</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='pass' class='form-control' id='pass' value= '"+data[i]['pass']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>publico</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='publico' class='form-control' id='publico' value= '"+data[i]['publico']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_cliente = function() {
	//var formdata = new FormData($('#formulario_e_cliente')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_cliente/eliminar_datos',
      type: 'POST',
      data: {id:id_auxcliente},
      success:function(){
	       $('.modal_eliminar_datos_cliente').modal('hide');
	       $('.formulario_eliminar_cliente').empty();
	       imprime_lista_cliente();
      }
  	});
}
var cancelar_eliminar_cliente = function () {
	$('.modal_eliminar_datos_cliente').modal('hide');
	$('.formulario_eliminar_cliente').empty();
}
$(function() {
	imprime_lista_cliente();
});
</script>
