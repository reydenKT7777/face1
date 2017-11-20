<header id="head" class="secondary"></header>
<div class="container">
  <div class="container text-center">
		<br> <br>
		<h2 class="thin">Nuestra lista de productos</h2>
	</div>
  <div class="col-md-6">
    <div class="input-group">
      <span class="input-group-addon">Sucursales <i class="fa fa-search"></i> </span>
      <select class="form-control" name="" id="sucursales">
        <?php
        foreach ($sucursales as $row) {
          echo "<option value='$row->id'>$row->nombre $row->direccion</option>";
        }
         ?>
      </select>
    </div>
  </div>
<?php
  if ($this->session->nombres)
  {
    ?>
    <div class="col-md-6">
      <button type="button" class="btn btn-success" onclick="mostrarLista()">Mostrar lista pedido <span class="badge badge-light" id="notificacionL"></span></button>
      <button type="button" class="btn btn-danger" onclick="limpiarLista()">Limpiar lista</button>
    </div>
    <?php
  }
 ?>
  <br><br><br>
  <div id="productos">

  </div>
</div>
<!--====================================================================-->
         <div class="modal fade modal_agregarLista" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-md" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Formulario de ingreso a listas</h4> </div>
                 <div class="modal-body">
                  <div class="formulario_Producto">
                  </div>
				<center><button class="btn btn-success" onclick="agregarL()">Agregar</button></center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->
<!--====================================================================-->
         <div class="modal fade modal_listaPedido" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Lista del pedido</h4> </div>
                 <div class="modal-body">
                  <div class="listaPedido">
                  </div>
          				<center>
                    <button class="btn btn-success" onclick="enviarPedido()">
                      Enviar <i class="fa fa-send (alias)"></i>
                    </button>
                  </center>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

<script>
var base_url = $('#base').val();
$(document).ready(function() {
  var id = $('#sucursales').val();
  listarProductos(id);
});
$('#sucursales').on('change', function() {
  var id = $('#sucursales').val();
  listarProductos(id);
  limpiarLista();
});
var enviarPedido = function () {
  var idSucursal = $('#sucursales').val();
  $.ajax({
    url: base_url+'index.php/controlador_pedido_cli/guardarPedido',
    type: 'POST',
    dataType: 'JSON',
    data: {id_sucursal:idSucursal,idProducto:idProducto,cantidadP:cantidadP,totalP:totalP,totalT:totalT},
    success:function (data) {
      if (data["respuesta"] == "correcto") {
        location.href = base_url+"index.php/admin/misPedidos";
      }
    }
  });
}
var listarProductos = function (id) {
  $.ajax({
    url: base_url+'index.php/controlador_producto/listar_producto',
    type: 'POST',
    dataType: 'JSON',
    data: {id: id},
    success:function (data) {
      var html = "";
      html += '<table class="table" id="tablaproductos">'+
        '<thead>'+
          '<tr>'+
            '<th>Producto</th>'+
            '<th>Marca</th>'+
            '<th>Descripci&oacute;n</th>'+
            '<th>Precio unitario</th>'+
            '<th>Sucursal</th>'+
            <?php
            if ($this->session->nombres) {
              ?>
              '<th>Agregar a la lista</th>'+
              <?php
            }
            ?>
          '</tr>'+
        '</thead>'+
        '<tbody>';
      for (var i = 0; i < data.length; i++) {
        html += "<tr>"+
                  "<td>"+data[i]["nombre_pro"]+"</td>"+
                  "<td>"+data[i]["marca"]+"</td>"+
                  "<td>"+data[i]["descripcion"]+"</td>"+
                  "<td>"+data[i]["precio"]+"</td>"+
                  "<td>"+data[i]["ns"]+"</td>"+
                  <?php
                  if ($this->session->nombres) {
                    ?>
                    "<td><a href='javascript:agregarLista("+data[i]["id"]+")' class='btn btn-primary btn-xs'>Agregar <i class='fa fa-plus-circle'></i></td>"+
                    <?php
                  }
                  ?>
                "</tr>";
      }
      html += '</tbody>'+
    '</table>';
      $('#productos').empty();
      $('#productos').html(html);
      $('#tablaproductos').DataTable({
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
var  idProducto = new Array();
var  cantidadP = new Array();
var  nombreP = new Array();
var  descripcionP = new Array();
var  precioP = new Array();
var totalP = new Array();
var totalT = 0;
var	indice = 0;

var agregarLista = function (id) {
  $('.modal_agregarLista').modal("show");
  $.ajax({
    url: base_url+'index.php/controlador_producto/buscar_producto',
    type: 'POST',
    dataType: 'json',
    data: {id: id},
    success:function (data) {
      var html = "";
      for (var i = 0; i < data.producto.length; i++) {
        html += '<div class="input-group">'+
                    '<input type="hidden" id="id_producto" value="'+data.producto[i]["id"]+'">'+
                    '<input type="hidden" id="nombrePro" value="'+data.producto[i]["nombre_pro"]+'">'+
                    '<input type="hidden" id="descripcionPro" value="'+data.producto[i]["descripcion"]+'">'+
                    '<input type="hidden" id="precioPro" value="'+data.producto[i]["precio"]+'">'+
                    '<span class="input-group-addon">'+data.producto[i]["nombre_pro"]+' '+data.producto[i]["marca"]+' Precio: '+data.producto[i]["precio"]+'</span>'+
                    '<input type="text" class="form-control" id="cantidad" placeholder="Cantidad requerida">'+
                  '</div><br>'+
                  '<p>'+data.producto[i]["descripcion"]+'</p>';

      }
      $('.formulario_Producto').empty();
      $('.formulario_Producto').html(html);
      $('#cantidad').focus();
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
var agregarL = function () {
  $('.modal_agregarLista').modal("hide");
  idProducto[indice]=$('#id_producto').val();
  cantidadP[indice] = $('#cantidad').val();
  nombreP[indice] = $('#nombrePro').val();
  descripcionP[indice] = $('#descripcionPro').val();
  precioP[indice] = $('#precioPro').val();
  totalP[indice] = ($('#cantidad').val()*1) * ($('#precioPro').val()*1);
  indice++;
  $('#notificacionL').html(indice);
}
var mostrarLista = function () {
  $('.modal_listaPedido').modal("show");
  var html ="";
  html += '<table class="table">'+
            '<thead>'+
              '<tr>'+
                '<th>#</th>'+
                '<th>Producto</th>'+
                '<th>Descripcion</th>'+
                '<th>P/U</th>'+
                '<th>Cantidad</th>'+
                '<th>Total</th>'+
              '</tr>'+
            '</thead>'+
            '<tbody>';

  var total = 0;
  for (var i = 0; i < idProducto.length; i++) {
    html += "<tr>";
      html += "<td>"+(i+1)+"</td>";
      html += "<td>"+nombreP[i]+"</td>";
      html += "<td>"+descripcionP[i]+"</td>";
      html += "<td>"+precioP[i]+"</td>";
      html += "<td>"+cantidadP[i]+"</td>";
      html += "<td>"+((cantidadP[i]*1)*(precioP[i]*1))+"</td>";
    html += "</tr>";
    total = (total * 1) + ((cantidadP[i]*1)*(precioP[i]*1));
    //html += idProducto[i]+" "+cantidadP[i]+"\n";
  }
  html += '</tbody>';
  html += '<tfoot>'+
            '<tr>'+
              '<th></th>'+
              '<th></th>'+
              '<th></th>'+
              '<th></th>'+
              '<th>Total</th>'+
              '<th>'+total+'</th>'+
            '</tr>';
  html += '</tfoot>';
      '</table>';
  totalT = total;
  $('.listaPedido').empty();
  $('.listaPedido').html(html);
}
var limpiarLista = function () {
  idProducto.length =0;
  cantidadP.length =0;
  nombreP.length =0;
  descripcionP.length =0;
  precioP.length =0;
  totalP.length = 0;
  indice = 0;
  $('#notificacionL').html("");
}
</script>
