<header id="head" class="secondary"></header>
<div class="container">
  <center><h1>Mis pedidos</h1></center>
  <table class="table" id="tablaPedidos">
    <thead>
      <tr>
        <th>Nro de pedido</th>
        <th>Fecha de pedido</th>
        <th>Estado</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($misPedidos as $row) {
        echo "<tr>";
          echo "<td>$row->nro_pedido</td>";
          echo "<td>$row->fecha_pedido</td>";
          if ($row->nro_pedido == 1) {
            echo "<td>procesado</td>";
          }
          else {
            echo "<td>no visto</td>";
          }
          echo "<td><a class='btn btn-primary' onclick='verPedido($row->nro_pedido)' title='Ver el pedido'><i class='fa fa-eye'></i></a></td>";
        echo "</tr>";
      }
       ?>
    </tbody>
  </table>
</div>
<!--====================================================================-->
         <div class="modal fade modal_verPedido" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span></button>
                 <h4 class="modal-title" id="myLargeModalLabel">Lista del pedido</h4> </div>
                 <div class="modal-body">
                  <div class="listaPedido">
                  </div>
               </div>
             </div>
           </div>
       </div>
<!--====================================================================-->

<script>
var base_url = $('#base').val();
  $(document).ready(function() {
    $('#tablaPedidos').DataTable({
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
  });
  var verPedido = function (id) {
    $.ajax({
      url: base_url+'index.php/controlador_pedido_cli/verPedido',
      type: 'POST',
      dataType: 'json',
      data: {id: id},
      success:function (data) {
        $('.modal_verPedido').modal("show");
        var html = "";
        html += "<h1>"+data.pedido[0]["nombre"]+"</h1>";
        html += "<h3>Fecha: "+data.pedido[0]["fecha_pedido"]+"</h3>";
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
            for (var i = 0; i < data.pedido.length; i++) {
              html += '<tr>'+
                '<td>'+(i+1)+'</td>'+
                '<td>'+data.pedido[i]["nombre_pro"]+" "+data.pedido[i]["marca"]+'</td>'+
                '<td>'+data.pedido[i]["descripcion"]+'</td>'+
                '<td>'+data.pedido[i]["precio"]+'</td>'+
                '<td>'+data.pedido[i]["cantidad"]+'</td>'+
                '<td>'+data.pedido[i]["total"]+'</td>'+
              '</tr>';
            }
          html += '</tbody>'+
          '<tfoot>'+
            '<tr>'+
              '<th></th>'+
              '<th></th>'+
              '<th></th>'+
              '<th></th>'+
              '<th></th>'+
              '<th>'+data.pedido[0]["monto"]+'</th>'+
            '</tr>'+
          '</tfoot>'+
        '</table>';
        $('.listaPedido').empty();
        $('.listaPedido').html(html);
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
</script>
