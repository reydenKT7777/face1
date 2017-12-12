<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12" id="sucursales">

  </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel tile fixed_height_600">
               <div class="x_title">
                   <h4><i class="fa fa-cubes"></i> Lista de productos</h4>
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
  						 <div class="x_content">
                 <center><button class="btn btn-success" onclick="imprimir_agregar_producto()">Agregar <i class="fa fa-plus-circle"></i></button></center>
                 <center><h1>Lista de productos</h1> </center>
                 <br><br>

                  <div class="tabla_producto table-responsive"></div>
  						 </div>
           </div>
     </div>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel tile fixed_height_600">
               <div class="x_title">
                   <h4><i class="fa fa-cubes"></i> Elementos extra</h4>
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
  						 <div class="x_content">
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <center><h1>Tipo de producto</h1> </center>
                   <br><br>
                   <button class="btn btn-success" onclick="imprimir_agregar_tipo_producto()">Agregar</button>
                   <div class="tabla_tipo_producto table-responsive"></div>
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <center><h1>Tipo de unidades</h1> </center>
                   <br><br>
                   <button class="btn btn-success" onclick="imprimir_agregar_tipo_unitario()">Agregar</button>
                  <div class="tabla_tipo_unitario table-responsive"></div>
                 </div>
  						 </div>
           </div>
     </div>
</div>



<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso producto</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_producto">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_producto()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_producto()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_producto">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_producto()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_producto()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_producto">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_producto()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_producto()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_tipo_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tipo de producto</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_tipo_producto">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_tipo_producto()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_tipo_producto()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_tipo_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_tipo_producto">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_tipo_producto()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_tipo_producto()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_tipo_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_tipo_producto">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_tipo_producto()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_tipo_producto()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_agregar_datos_tipo_unitario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso tipo de unidades</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_crear_tipo_unitario">
                  </div>
				<center><button class="btn btn-success" onclick="agregar_tipo_unitario()">Guardar</button>
				<button class="btn btn-danger" onclick="cancelar_agregar_tipo_unitario()">Cancelar</button><center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_modificar_datos_tipo_unitario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Modificar datos</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_modificar_tipo_unitario">
                  </div>
				<center><button class="btn btn-success" onclick="modificar_tipo_unitario()">Modificar</button>
				<button class="btn btn-danger" onclick="cancelar_modificar_tipo_unitario()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_eliminar_datos_tipo_unitario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Desea eliminar los siguientes datos?</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_eliminar_tipo_unitario">
                  </div>
				<center><button class="btn btn-success" onclick="eliminar_tipo_unitario()">Eliminar</button>
				<button class="btn btn-danger" onclick="cancelar_eliminar_tipo_unitario()">Cancelar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

<script>
var base_url = '<?=base_url()?>';
$(document).ready(function() {
  mostrarSucursales();
  imprime_lista_producto(<?=$this->session->id_sucursal?>);
});

var ver = function (id) {
  imprime_lista_producto(id);
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
  });
}
// Funcion que imprime la lista de registos de l atabla producto
var iddPro = 0;
var iddProPro = 0;
var imprime_lista_producto = function(id) {
  iddPro = id;
	$.ajax({
		url: base_url+'index.php/controlador_producto/listar_producto',
    type: 'POST',
		dataType: 'json',
    data:{id:id},
		success:function(data) {
			var html = imprime_tabla_producto(data);
			$('.tabla_producto').empty();
			$('.tabla_producto').html(html);
			$('#productotabla').DataTable({
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
var imprime_tabla_producto = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="productotabla">';
			html += '<thead>';
				html += '<tr>';
					html += '<th>Sucursal</th>';
					html += '<th>Producto</th>';
					html += '<th>Marca</th>';
					html += '<th>stock/U</th>';
					html += '<th>Tipo producto</th>';
					html += '<th>Almacen</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    html += '<td><span class="label label-default">'+data[i]['ns']+'</span></td>';
			    html += '<td>'+data[i]['nombre_pro']+'</td>';
			    html += '<td>'+data[i]['marca']+'</td>';
          if (data[i]['stock'] <= 10) {
              html += '<td class="danger">'+data[i]['stock']+'</td>';
          }
			    else {
			      html += '<td class="success">'+data[i]['stock']+'</td>';
			    }
			    html += '<td>'+data[i]['nombre_tipo_p']+'</td>';
			    html += '<td>'+data[i]['nombre_almacen']+'</td>';
			    html += '<td>';
           if (data[i]['estadoPro'] == 1) {
             html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_producto('+data[i]['id']+')">Modificar</button>';
             html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_producto('+data[i]['id']+')">Eliminar</button>';
           }
           else {
             html += '<button class="btn btn-warning btn-xs" onclick ="activar_producto('+data[i]['id']+')">Activar</button>';
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
var activar_producto = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_producto/activar',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id: id},
    success:function () {
      imprime_lista_producto(iddPro);
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla producto
var imprimir_agregar_producto = function() {
	$.ajax({
		url: base_url+'index.php/controlador_producto/addDatos',
		dataType: 'json',
		success:function(data) {
			$('.modal_agregar_datos_producto').modal('show');
			var html = imprime_formulario_ingreso_producto(data);
			$('.formulario_crear_producto').empty();
			$('.formulario_crear_producto').html(html);
		}
	});

}
var agregar_producto = function () {
	if (confirm("Esta seguro que desea guardar en productos?")) {
    var formdata = new FormData($("#formulario_i_producto")[0]);
  	$.ajax({
    	  url: base_url+'/index.php/controlador_producto/agregar_datos',
        type: 'POST',
        data: formdata,
        contentType: false,
        processData: false,
        success: function(){
         $('.modal_agregar_datos_producto').modal('hide');
  	     $('.formulario_crear_producto').empty();
  	     imprime_lista_producto(iddPro);
         alert("producto añadido, verifique la existencia en la sucursal a la que añadio!!");
        }
    	});
	}
}
var tipoUnit = new Array();
var imprime_formulario_ingreso_producto = function(data) {
	var html ='';
	//var data = 0;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_producto' enctype='multipart/form-data'>";
			html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id'></div>";
		  	html += "</div>";
      html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_almacen' class='form-control' id='id_almacen'>";
							for (var i = 0; i < data.almacen.length; i++) {
								html+= "<option value='"+data.almacen[i]["id_almacen"]+"'>"+data.almacen[i]["nombre"]+": "+data.almacen[i]["nombre_almacen"]+"</option>";
							}
						html += "</select></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Nombre producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_pro' class='form-control' id='nombre_pro'></div>";
		  	html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Marca</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='marca' class='form-control' id='marca'></div>";
		  html += "</div>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo Producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select name='id_tipo_producto' class='form-control' id='id_tipo_producto'>";
							for (var i = 0; i < data.Tproducto.length; i++) {
								html+= "<option value='"+data.Tproducto[i]["id"]+"'>"+data.Tproducto[i]["nombre_tipo_p"]+"</option>";
							}
						html += "</select></div>";
		  html += "</div>";
      html+= "<div class='form-group'>";
		    	html +=	"<div class='col-md-4 col-sm-4 col-xs-12'>";
            html += "<select name='id_tipo_unitario' class='form-control' id='id_tipo_unitario'>";
              for (var i = 0; i < data.Tunitario.length; i++) {
                html+= "<option value='"+i+"'>"+data.Tunitario[i]["nombre_tipo_u"]+"</option>";
              }
            html += "</select>";
            html += '<input type="text" name="cantidad_tipo_unitario" id="cantidad_tipo_unitario" value="" placeholder="Cantidad." class="form-control" title="Cantidad">';
            html += '<input type="text" name="precio_unitario" id="precio_unitario" value="" placeholder="Precio U." class="form-control" onkeyup="calcularPTU()" title="Precio unitario">';
            html += '<input type="text" name="precio_tipo_unitario" id="precio_tipo_unitario" value="" placeholder="Precio/T/U" class="form-control" onkeyup="calcularPU()" title="Precio del Tipo Unitarios">';
            html += '<button type="button" onclick="addTipoU()" name="button" class="btn btn-primary btn-block">Agregar <i class="fa fa-plus-circle"></i></button>';
          html += "</div>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'>";
          html += '<table class="table table-striped">'+
            '<thead>'+
              '<tr>'+
                '<th>T/U</th>'+
                '<th>Cantidad</th>'+
                '<th>P/Unitario</th>'+
                '<th>Precio/T/U</th>'+
              '</tr>'+
            '</thead>'+
            '<tbody id="listaUnitarios">'  +
            '</tbody>'+
          '</table>';
          html += "</div>";
		  html += "</div>";
		html += "</form>";
    tipoUnit = data.Tunitario;
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var addTipoU = function () {
  var html = "";
  var id = $('#id_tipo_unitario').val();
  var precio_unitario = $('#precio_unitario').val();
  var cantidad_tipo_unitario = $('#cantidad_tipo_unitario').val();
  var precio_tipo_unitario = $('#precio_tipo_unitario').val();
  html += '<tr>';
    html += '<td><input type="hidden" name="id_tipo_unitario[]" value="'+tipoUnit[id]["id"]+'">'+tipoUnit[id]["nombre_tipo_u"]+'</td>';
    html += '<td><input type="hidden" name="cantidad[]" value="'+cantidad_tipo_unitario+'">'+cantidad_tipo_unitario+'</td>';
    html += '<td><input type="hidden" name="PUnitario[]" value="'+precio_unitario+'">'+precio_unitario+'</td>';
    html += '<td><input type="hidden" name="PTUnitario[]" value="'+precio_tipo_unitario+'">'+precio_tipo_unitario+'</td>';
  html += '</tr>';
  $('#listaUnitarios').append(html);
  $('#precio_unitario').val("");
  $('#cantidad_tipo_unitario').val("");
  $('#precio_tipo_unitario').val("");
}
var calcularPTU = function () {

  var precio_unitario = $('#precio_unitario').val();
  var cantidad_tipo_unitario = $('#cantidad_tipo_unitario').val();
  totalPTU = (precio_unitario * 1) * (cantidad_tipo_unitario * 1);
  $('#precio_tipo_unitario').val(totalPTU.toFixed(2));

}
var calcularPU = function () {
  var precio_tipo_unitario = $('#precio_tipo_unitario').val();
  var cantidad_tipo_unitario = $('#cantidad_tipo_unitario').val();
  totalPU = (precio_tipo_unitario * 1) / (cantidad_tipo_unitario * 1);
  $('#precio_unitario').val(totalPU.toFixed(2));
}
var cancelar_agregar_producto = function () {
	$('.modal_agregar_datos_producto').modal('hide');
	$('.formulario_crear_producto').empty();
}
//funcones para modificar datos de producto
var mostrar_modificar_producto = function (id) {
  iddProPro = id;
	$('.modal_modificar_datos_producto').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_producto/buscar_producto',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_producto(data);
		$('.formulario_modificar_producto').empty();
		$('.formulario_modificar_producto').html(html);
		}
	});
}
var imprime_formulario_modificar_producto = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_producto' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data.producto[i]['id']+"'></div>";
		  	html += "</div>";
        html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Almacen</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='id_almacen' class='form-control' id='id_almacen' value= ''>";
					for (var j = 0; j < data.almacen.length; j++) {
						if (data.almacen[j]['id_almacen'] == data.producto[i]["id_almacen"]) {
							html += "<option value='"+data.almacen[j]['id_almacen']+"' selected>"+data.almacen[j]["nombre"]+": "+data.almacen[j]['nombre_almacen']+"</option>";
						}
						else {
							html += "<option value='"+data.almacen[j]['id_almacen']+"'>"+data.almacen[j]["nombre"]+": "+data.almacen[j]['nombre_almacen']+"</option>";
						}
					}
					html += "</select></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>nombre_pro</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_pro' class='form-control' id='nombre_pro' value= '"+data.producto[i]['nombre_pro']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Marca</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='marca' class='form-control' id='marca' value= '"+data.producto[i]['marca']+"'></div>";
		  	html += "</div>";

				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><select type='text' name='id_tipo_producto' class='form-control' id='id_tipo_producto' value= ''>";
					for (var j = 0; j < data.Tproducto.length; j++) {
						if (data.Tproducto[j]['id'] == data.producto[i]["id_tipo_producto"]) {
							html += "<option value='"+data.Tproducto[j]['id']+"' selected>"+data.Tproducto[j]['nombre_tipo_p']+"</option>";
						}
						else {
							html += "<option value='"+data.Tproducto[j]['id']+"'>"+data.Tproducto[j]['nombre_tipo_p']+"</option>";
						}
					}
					html += "</select></div>";
		  	html += "</div>";
        html+= "<div class='form-group'>";
  		    	html +=	"<div class='col-md-3 col-sm-3 col-xs-12'>";
              html += "<select name='id_tipo_unitario' class='form-control' id='id_tipo_unitario'>";
                for (var i = 0; i < data.Tunitario.length; i++) {
                  html+= "<option value='"+i+"'>"+data.Tunitario[i]["nombre_tipo_u"]+"</option>";
                }
              html += "</select>";
              html += '<input type="text" name="cantidad_tipo_unitario" id="cantidad_tipo_unitario" value="" placeholder="Cantidad." class="form-control" title="Cantidad">';
              html += '<input type="text" name="precio_unitario" id="precio_unitario" value="" placeholder="Precio U." class="form-control" onkeyup="calcularPTU()" title="Precio unitario">';
              html += '<input type="text" name="precio_tipo_unitario" id="precio_tipo_unitario" value="" placeholder="Precio/T/U" class="form-control" onkeyup="calcularPU()" title="Precio del Tipo Unitarios">';
              html += '<button type="button" onclick="addTipoUN()" name="button" class="btn btn-primary btn-block">Agregar <i class="fa fa-plus-circle"></i></button>';
            html += "</div>";
  		    	html += "<div class='col-md-9 col-sm-9 col-xs-12'>";
            html += '<table class="table table-striped">'+
              '<thead>'+
                '<tr>'+
                  '<th>T/U</th>'+
                  '<th>Cantidad</th>'+
                  '<th>P/Unitario</th>'+
                  '<th>Precio/T/U</th>'+
                  '<th></th>'+
                '</tr>'+
              '</thead>'+
              '<tbody id="listaUnitarios">';
                  for (var i = 0; i < data.ptu.length; i++) {
                    html += '<tr>';
                      html += '<td><input type="hidden" name="idPrecioTipoU[]" value="'+data.ptu[i]["idPrecioTipoU"]+'">'+data.ptu[i]["nombre_tipo_u"]+'</td>';
                      html += '<td><input type="text" class="form-control" id="cantidad'+i+'" name="cantidad[]" value="'+data.ptu[i]["cantidadTU"]+'"></td>';
                      html += '<td><input type="text" class="form-control" id="PUnitario'+i+'" onkeyup="calcularPTUup('+i+')" name="PUnitario[]" value="'+data.ptu[i]["precioU"]+'"></td>';
                      html += '<td><input type="text" class="form-control" id="PTUnitario'+i+'" onkeyup="calcularPUup('+i+')" name="PTUnitario[]" value="'+data.ptu[i]["ptunitario"]+'"></td>';
                      if (data.ptu[i]["estadoPTU"] == '1') {
                          html += '<td><button type="button" name="button" class="btn btn-danger btn-xs" title="Dar baja" onclick="darBajaTU('+data.ptu[i]["idPrecioTipoU"]+')"><i class="fa fa-arrow-down"></i></button></td>';
                      }
                      else {
                        html += '<td><button type="button" name="button" class="btn btn-success btn-xs" title="Dar Alta" onclick="darAltaTU('+data.ptu[i]["idPrecioTipoU"]+')"><i class="fa fa-arrow-up"></i></button></td>';
                      }
                    html += '</tr>';
                  }
      html += '</tbody>'+
            '</table>';
            html += "</div>";
  		  html += "</div>";
		html += "</form>";
    tipoUnit = data.Tunitario;
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var darBajaTU = function (id) {
  if (confirm("Esta seguro de dar de baja a este tipo de unidad?")) {
    $.ajax({
      url: base_url+'index.php/controlador_producto/darBajaTU',
      type: 'POST',
      dataType: 'json',
      data: {idTU: id}
    });
    mostrar_modificar_producto(iddProPro);
  }
}
var darAltaTU = function (id) {
  if (confirm("Esta seguro de dar de Alta a este tipo de unidad?")) {
    $.ajax({
      url: base_url+'index.php/controlador_producto/darAltaTU',
      type: 'POST',
      dataType: 'json',
      data: {idTU: id}
    });
    mostrar_modificar_producto(iddProPro);
  }
}
var modificar_producto = function() {
	var formdata = new FormData($("#formulario_m_producto")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_producto/modificar_producto',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_producto').modal('hide');
	       $('.formulario_modificar_producto').empty();
	       imprime_lista_producto(iddPro);
      }
  	});
}
var cancelar_modificar_producto = function () {
	$('.modal_modificar_datos_producto').modal('hide');
	$('.formulario_modificar_producto').empty();
}
var addTipoUN = function () {
  var html = "";
  var id = $('#id_tipo_unitario').val();
  var precio_unitario = $('#precio_unitario').val();
  var cantidad_tipo_unitario = $('#cantidad_tipo_unitario').val();
  var precio_tipo_unitario = $('#precio_tipo_unitario').val();
  html += '<tr>';
    html += '<td><input type="hidden" name="id_tipo_unitarioN[]" value="'+tipoUnit[id]["id"]+'">'+tipoUnit[id]["nombre_tipo_u"]+'</td>';
    html += '<td><input type="hidden" name="cantidadN[]" value="'+cantidad_tipo_unitario+'">'+cantidad_tipo_unitario+'</td>';
    html += '<td><input type="hidden" name="PUnitarioN[]" value="'+precio_unitario+'">'+precio_unitario+'</td>';
    html += '<td><input type="hidden" name="PTUnitarioN[]" value="'+precio_tipo_unitario+'">'+precio_tipo_unitario+'</td>';
  html += '</tr>';
  $('#listaUnitarios').append(html);
  $('#precio_unitario').val("");
  $('#cantidad_tipo_unitario').val("");
  $('#precio_tipo_unitario').val("");
}
var calcularPTUup = function (index) {

  var precio_unitario = $('#PUnitario'+index).val();
  var cantidad_tipo_unitario = $('#cantidad'+index).val();
  totalPTU = (precio_unitario * 1) * (cantidad_tipo_unitario * 1);
  $('#PTUnitario'+index).val(totalPTU.toFixed(2));

}
var calcularPUup = function (index) {
  var precio_tipo_unitario = $('#PTUnitario'+index).val();
  var cantidad_tipo_unitario = $('#cantidad'+index).val();
  totalPU = (precio_tipo_unitario * 1) / (cantidad_tipo_unitario * 1);
  $('#PUnitario'+index).val(totalPU.toFixed(2));
}
//funciones para eliminar datos producto
var id_auxproducto = 0
var mostrar_eliminar_producto = function (id) {
 id_auxproducto = id
	$('.modal_eliminar_datos_producto').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_producto/buscar_producto',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_producto(data);
		$('.formulario_eliminar_producto').empty();
		$('.formulario_eliminar_producto').html(html);
		}
	});
}
var imprime_formulario_eliminar_producto = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_producto' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data.producto[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_pro' class='form-control' id='nombre_pro' value= '"+data.producto[i]['nombre_pro']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Descripcion</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='descripcion' class='form-control' id='descripcion' value= '"+data.producto[i]['descripcion']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>precio</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='precio' class='form-control' id='precio' value= '"+data.producto[i]['precio']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Marca</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='marca' class='form-control' id='marca' value= '"+data.producto[i]['marca']+"' disabled></div>";
		  	html += "</div>";

		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_producto = function() {
	//var formdata = new FormData($('#formulario_e_producto')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_producto/eliminar_datos',
      type: 'POST',
      data: {id:id_auxproducto},
      success:function(){
	       $('.modal_eliminar_datos_producto').modal('hide');
	       $('.formulario_eliminar_producto').empty();
	       imprime_lista_producto(iddPro);
      }
  	});
}
var cancelar_eliminar_producto = function () {
	$('.modal_eliminar_datos_producto').modal('hide');
	$('.formulario_eliminar_producto').empty();
}
$(function() {
	//imprime_lista_producto();
});
</script>
<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla tipo_producto
var imprime_lista_tipo_producto = function() {
	$.ajax({
		url: base_url+'index.php/controlador_tipo_producto/listar_tipo_producto',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_tipo_producto(data);
			$('.tabla_tipo_producto').empty();
			$('.tabla_tipo_producto').html(html);
      $('#tipo_productoTabla').DataTable({
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
var imprime_tabla_tipo_producto = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="tipo_productoTabla">';
			html += '<thead>';
				html += '<tr>';
					//html += '<th>id</th>';
					html += '<th>Tipo de producto</th>';
					//html += '<th>estado</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    //html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre_tipo_p']+'</td>';
			    //html += '<td>'+data[i]['estado']+'</td>';
			    html += '<td>';
          if (data[i]["estadoTP"] == 1) {
            html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_tipo_producto('+data[i]['id']+')">Modificar</button>';
            html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_tipo_producto('+data[i]['id']+')">Eliminar</button>';
          }
          else {
            html += '<button class="btn btn-warning btn-xs" onclick ="activar_tipo_producto('+data[i]['id']+')">Activar</button>';
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
var activar_tipo_producto = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_tipo_producto/activar',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id:id},
    success:function () {
      imprime_lista_tipo_producto();
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla tipo_producto
var imprimir_agregar_tipo_producto = function() {
	$('.modal_agregar_datos_tipo_producto').modal('show');
	var html = imprime_formulario_ingreso_tipo_producto();
	$('.formulario_crear_tipo_producto').empty();
	$('.formulario_crear_tipo_producto').html(html);
}
var agregar_tipo_producto = function () {
	var formdata = new FormData($("#formulario_i_tipo_producto")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_tipo_producto/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_tipo_producto').modal('hide');
	     $('.formulario_crear_tipo_producto').empty();
	     imprime_lista_tipo_producto();
      }
  	});
}
var imprime_formulario_ingreso_tipo_producto = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_tipo_producto' enctype='multipart/form-data'>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo de producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_p' class='form-control' id='nombre_tipo_p'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_tipo_producto = function () {
	$('.modal_agregar_datos_tipo_producto').modal('hide');
	$('.formulario_crear_tipo_producto').empty();
}
//funcones para modificar datos de tipo_producto
var mostrar_modificar_tipo_producto = function (id) {
	$('.modal_modificar_datos_tipo_producto').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_tipo_producto/buscar_tipo_producto',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_tipo_producto(data);
		$('.formulario_modificar_tipo_producto').empty();
		$('.formulario_modificar_tipo_producto').html(html);
		}
	});
}
var imprime_formulario_modificar_tipo_producto = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_tipo_producto' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
					html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
					html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
				html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo de producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_p' class='form-control' id='nombre_tipo_p' value= '"+data[i]['nombre_tipo_p']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_tipo_producto = function() {
	var formdata = new FormData($("#formulario_m_tipo_producto")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_tipo_producto/modificar_tipo_producto',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_tipo_producto').modal('hide');
	       $('.formulario_modificar_tipo_producto').empty();
	       imprime_lista_tipo_producto();
      }
  	});
}
var cancelar_modificar_tipo_producto = function () {
	$('.modal_modificar_datos_tipo_producto').modal('hide');
	$('.formulario_modificar_tipo_producto').empty();
}
//funciones para eliminar datos tipo_producto
var id_auxtipo_producto = 0
var mostrar_eliminar_tipo_producto = function (id) {
 id_auxtipo_producto = id
	$('.modal_eliminar_datos_tipo_producto').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_tipo_producto/buscar_tipo_producto',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_tipo_producto(data);
		$('.formulario_eliminar_tipo_producto').empty();
		$('.formulario_eliminar_tipo_producto').html(html);
		}
	});
}
var imprime_formulario_eliminar_tipo_producto = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_tipo_producto' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo de producto</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_p' class='form-control' id='nombre_tipo_p' value= '"+data[i]['nombre_tipo_p']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_tipo_producto = function() {
	//var formdata = new FormData($('#formulario_e_tipo_producto')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_tipo_producto/eliminar_datos',
      type: 'POST',
      data: {id:id_auxtipo_producto},
      success:function(){
	       $('.modal_eliminar_datos_tipo_producto').modal('hide');
	       $('.formulario_eliminar_tipo_producto').empty();
	       imprime_lista_tipo_producto();
      }
  	});
}
var cancelar_eliminar_tipo_producto = function () {
	$('.modal_eliminar_datos_tipo_producto').modal('hide');
	$('.formulario_eliminar_tipo_producto').empty();
}
$(function() {
	imprime_lista_tipo_producto();
});
</script>
<script>
var base_url = '<?=base_url()?>';
// Funcion que imprime la lista de registos de l atabla tipo_unitario
var imprime_lista_tipo_unitario = function() {
	$.ajax({
		url: base_url+'index.php/controlador_tipo_unitario/listar_tipo_unitario',
		dataType: 'json',
		success:function(data) {
			var html = imprime_tabla_tipo_unitario(data);
			$('.tabla_tipo_unitario').empty();
			$('.tabla_tipo_unitario').html(html);
      $('#tipo_unitarioTabla').DataTable({
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
var imprime_tabla_tipo_unitario = function(data) {
	var html = '';
	if (data != 0)
	{
		html += '<table class="table table-striped" id="tipo_unitarioTabla">';
			html += '<thead>';
				html += '<tr>';
					//html += '<th>id</th>';
					html += '<th>Tipo unitario</th>';
					//html += '<th>estado</th>';
					html += '<th></th>';
				html += '</tr>';
			html += '</thead>';
			html += '<tbody>';
			for (var i = 0; i < data.length; i++)
			{
				html += '<tr>';
			    //html += '<td>'+data[i]['id']+'</td>';
			    html += '<td>'+data[i]['nombre_tipo_u']+'</td>';
			    //html += '<td>'+data[i]['estado']+'</td>';
			    html += '<td>';
          if (data[i]["estadoTU"]==1) {
            html += '<button class="btn btn-info btn-xs" onclick ="mostrar_modificar_tipo_unitario('+data[i]['id']+')">Modificar</button>';
            html += '<button class="btn btn-danger btn-xs" onclick ="mostrar_eliminar_tipo_unitario('+data[i]['id']+')">Eliminar</button>';
          }
          else {
            html += '<button class="btn btn-warning btn-xs" onclick ="activar_tipo_unitario('+data[i]['id']+')">Activar</button>';
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
var activar_tipo_unitario = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_tipo_unitario/activar',
    type: 'POST',
    //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: {id: id},
    success:function () {
      imprime_lista_tipo_unitario();
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
// funciones que imprimen formularios de ingreso de nuevos registro de tabla tipo_unitario
var imprimir_agregar_tipo_unitario = function() {
	$('.modal_agregar_datos_tipo_unitario').modal('show');
	var html = imprime_formulario_ingreso_tipo_unitario();
	$('.formulario_crear_tipo_unitario').empty();
	$('.formulario_crear_tipo_unitario').html(html);
}
var agregar_tipo_unitario = function () {
	var formdata = new FormData($("#formulario_i_tipo_unitario")[0]);
	$.ajax({
  	  url: base_url+'/index.php/controlador_tipo_unitario/agregar_datos',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
       $('.modal_agregar_datos_tipo_unitario').modal('hide');
	     $('.formulario_crear_tipo_unitario').empty();
	     imprime_lista_tipo_unitario();
      }
  	});
}
var imprime_formulario_ingreso_tipo_unitario = function() {
	var html ='';
	var data = 0;
	if (data == 0)
	{
		html += "<form class='form form-horizontal' id='formulario_i_tipo_unitario' enctype='multipart/form-data'>";
			html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo unitario</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_u' class='form-control' id='nombre_tipo_u'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var cancelar_agregar_tipo_unitario = function () {
	$('.modal_agregar_datos_tipo_unitario').modal('hide');
	$('.formulario_crear_tipo_unitario').empty();
}
//funcones para modificar datos de tipo_unitario
var mostrar_modificar_tipo_unitario = function (id) {
	$('.modal_modificar_datos_tipo_unitario').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_tipo_unitario/buscar_tipo_unitario',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_modificar_tipo_unitario(data);
		$('.formulario_modificar_tipo_unitario').empty();
		$('.formulario_modificar_tipo_unitario').html(html);
		}
	});
}
var imprime_formulario_modificar_tipo_unitario = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_m_tipo_unitario' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"'></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo unitario</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_u' class='form-control' id='nombre_tipo_u' value= '"+data[i]['nombre_tipo_u']+"'></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var modificar_tipo_unitario = function() {
	var formdata = new FormData($("#formulario_m_tipo_unitario")[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_tipo_unitario/modificar_tipo_unitario',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      success: function(){
	       $('.modal_modificar_datos_tipo_unitario').modal('hide');
	       $('.formulario_modificar_tipo_unitario').empty();
	       imprime_lista_tipo_unitario();
      }
  	});
}
var cancelar_modificar_tipo_unitario = function () {
	$('.modal_modificar_datos_tipo_unitario').modal('hide');
	$('.formulario_modificar_tipo_unitario').empty();
}
//funciones para eliminar datos tipo_unitario
var id_auxtipo_unitario = 0
var mostrar_eliminar_tipo_unitario = function (id) {
 id_auxtipo_unitario = id
	$('.modal_eliminar_datos_tipo_unitario').modal('show');
	$.ajax({
		url: base_url+'index.php/controlador_tipo_unitario/buscar_tipo_unitario',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data) {
		var html = imprime_formulario_eliminar_tipo_unitario(data);
		$('.formulario_eliminar_tipo_unitario').empty();
		$('.formulario_eliminar_tipo_unitario').html(html);
		}
	});
}
var imprime_formulario_eliminar_tipo_unitario = function(data) {
	var html ='';
	var i = 0 ;
	if (data != 0)
	{
		html += "<form class='form form-horizontal' id='formulario_e_tipo_unitario' enctype='multipart/form-data'>";
				html+= "<div class='form-group' style='display:none'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>id</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='id' class='form-control' id='id' value= '"+data[i]['id']+"' disabled></div>";
		  	html += "</div>";
				html+= "<div class='form-group'>";
		    	html +=	"<label class='control-label col-md-4 col-sm-4 col-xs-12'>Tipo unitario</label>";
		    	html += "<div class='col-md-8 col-sm-8 col-xs-12'><input type='text' name='nombre_tipo_u' class='form-control' id='nombre_tipo_u' value= '"+data[i]['nombre_tipo_u']+"' disabled></div>";
		  	html += "</div>";
		html += "</form>";
	}
	else{
		html += "<h1>No se encontraron registros!!</h1>";
	}
	return html;
}
var eliminar_tipo_unitario = function() {
	//var formdata = new FormData($('#formulario_e_tipo_unitario')[0]);
	$.ajax({
  	  url: base_url+'index.php/controlador_tipo_unitario/eliminar_datos',
      type: 'POST',
      data: {id:id_auxtipo_unitario},
      success:function(){
	       $('.modal_eliminar_datos_tipo_unitario').modal('hide');
	       $('.formulario_eliminar_tipo_unitario').empty();
	       imprime_lista_tipo_unitario();
      }
  	});
}
var cancelar_eliminar_tipo_unitario = function () {
	$('.modal_eliminar_datos_tipo_unitario').modal('hide');
	$('.formulario_eliminar_tipo_unitario').empty();
}
$(function() {

	imprime_lista_tipo_unitario();
});
</script>
