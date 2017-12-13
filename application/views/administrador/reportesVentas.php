<div class="row">
  <center><h1>Control de ventas</h1></center>
  <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">Tipo busqueda</span>
                      <select class="form-control" id="tipoBusqueda">
                        <option value="1">Fechas</option>
                        <option value="2">Numero de nota</option>
                        <option value="3">Cliente</option>
                        <option value="4">Cliente por fechas</option>
                      </select>
                    </div>
                    <button type="button" class="btn btn-success btn-block" onclick="buscarNotas()">Buscar <i class="fa fa-search"></i></button>
                  </div>
                  <div class="col-md-8" id="tipos">
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">Fecha inicial</span>
                        <input type="text" id="f1" class="form-control datepicker" placeholder="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group">
                        <input type="text" id="f2" class="form-control datepicker" placeholder="">
                        <span class="input-group-addon">Fecha final</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" id="resultado">

                  </div>
                </div>
            </div>
        </div>

</div>
<script>
var base_url = "<?=base_url()?>";
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
  $('#tipoBusqueda').on('change', function() {
    var id = $('#tipoBusqueda').val();
    var html = "";
    if (id == 1) {
      html += '<div class="col-md-6">'+
        '<div class="input-group">'+
          '<span class="input-group-addon">Fecha inicial</span>'+
          '<input type="text" id="f1" class="form-control datepicker" placeholder="">'+
        '</div>'+
      '</div>'+
      '<div class="col-md-6">'+
        '<div class="input-group">'+
          '<input type="text" id="f2" class="form-control datepicker" placeholder="">'+
          '<span class="input-group-addon">Fecha final</span>'+
        '</div>'+
      '</div>';
      $('#tipos').empty();
      $('#tipos').html(html);
      $('.datepicker').datepicker({
				dateFormat:'yy-mm-dd'
			});
    }
    if (id == 2) {
      html += '<div class="col-md-6">'+
        '<div class="input-group">'+
          '<span class="input-group-addon">Numero de nota</span>'+
          '<input type="text" id="nota" class="form-control" placeholder="">'+
        '</div>'+
      '</div>';
      $('#tipos').empty();
      $('#tipos').html(html);
    }
    if (id == 3) {
          $.ajax({
            url: base_url+'index.php/controlador_cliente/listar_cliente',
            dataType: 'json',
            success:function (data) {
              var html = "";
              html += '<div class="col-md-12">'+
                '<div class="input-group">'+
                  '<span class="input-group-addon">Cliente</span>'+
                  '<select type="text" id="cliente" class="form-control" placeholder="">';
              for (var i = 0; i < data.length; i++) {
                html += "<option value='"+data[i]["id"]+"'>"+data[i]["nombre_cliente"]+"</option>";
              }
              html += '</select>'+
                '</div>'+
              '</div>';
              $('#tipos').empty();
              $('#tipos').html(html);
            }
          });
    }
    if (id == 4) {
      $.ajax({
        url: base_url+'index.php/controlador_cliente/listar_cliente',
        dataType: 'json',
        success:function (data) {
          var html = "";
          html += '<div class="col-md-12">'+
          '<div class="input-group">'+
              '<span class="input-group-addon">Cliente</span>'+
              '<select type="text" id="cliente" class="form-control" placeholder="">';
          for (var i = 0; i < data.length; i++) {
            html += "<option value='"+data[i]["id"]+"'>"+data[i]["nombre_cliente"]+"</option>";
          }
          html += '</select>'+
            '</div>'+
          '</div>'+
          '<div class="col-md-6">'+
            '<div class="input-group">'+
              '<span class="input-group-addon">Fecha inical</span>'+
              '<input type="text" id="f1" class="form-control datepicker" placeholder="">'+
            '</div>'+
          '</div>'+
          '<div class="col-md-6">'+
            '<div class="input-group">'+
              '<input type="text" id="f2" class="form-control datepicker" placeholder="">'+
              '<span class="input-group-addon">Fecha final</span>'+
            '</div>'+
          '</div>';
          $('#tipos').empty();
          $('#tipos').html(html);
          $('.datepicker').datepicker({
    				dateFormat:'yy-mm-dd'
    			});
        }
      });
    }
  });
  var buscarNotas = function () {
    idbusqueda = $('#tipoBusqueda').val();
    if (idbusqueda == 1) {
      var f1 = $('#f1').val();
      var f2 = $('#f2').val();
      $.ajax({
        url: base_url+'index.php/ventaPedido/buscarFechas',
        type: 'POST',
        dataType: 'json',
        data: {f1:f1,f2:f2},
        success:function (data) {
          var html = "";
          html = imprimirResultados(data);
          $('#resultado').html(html);
        }
      });
    }
    if (idbusqueda == 2) {
      var nota = $('#nota').val();
      $.ajax({
        url: base_url+'index.php/ventaPedido/buscarNotasV',
        type: 'POST',
        dataType: 'json',
        data: {nota:nota},
        success:function (data) {
          var html = "";
          html = imprimirResultados(data);
          $('#resultado').html(html);
        }
      });
    }
    if (idbusqueda == 3) {
      var id = $('#cliente').val();
      $.ajax({
        url: base_url+'index.php/ventaPedido/buscarClientes',
        type: 'POST',
        dataType: 'json',
        data: {idCliente: id},
        success:function (data) {
          var html = "";
          html = imprimirResultados(data);
          $('#resultado').html(html);
        }
      });
    }
    if (idbusqueda == 4) {
      var id = $('#cliente').val();
      var f1 = $('#f1').val();
      var f2 = $('#f2').val();
      $.ajax({
        url: base_url+'index.php/ventaPedido/buscarClientesFecha',
        type: 'POST',
        dataType: 'json',
        data: {idCliente: id,f1:f1,f2:f2},
        success:function (data) {
          var html = "";
          html = imprimirResultados(data);
          $('#resultado').html(html);
        }
      });
    }

  }
  var imprimirResultados = function (data) {
    var html="";
    html += '<table class="table table-striped">'+
      '<thead>'+
        '<th>#</th>'+
        '<th>Nro nota</th>'+
        '<th>Fecha Venta</th>'+
        '<th>Cliente</th>'+
        '<th>CI</th>'+
        '<th>Total</th>'+
      '</thead>'+
      '<tbody>';
      for (var i = 0; i < data.length; i++) {
        html += '<tr>';
          html += '<td>'+(i+1)+'</td>';
          html += '<td>'+data[i]["nro_pedido"]+'</td>';
          html += '<td>'+data[i]["fecha_venta"]+'</td>';
          html += '<td>'+data[i]["nombre_cliente"]+'</td>';
          html += '<td>'+data[i]["nit"]+'</td>';
          html += '<td>'+data[i]["monto_total"]+'</td>';
          html += '<td><a target="_blank" class="btn btn-info" href="'+base_url+'/index.php/ventaPedido/reportePDF?id='+data[i]["nro_pedido"]+'"><i class="fa fa-eye"></i></a></td>';
        html += '</tr>';
      }
        html += '</tbody>'+
        '</table>';
    //html += '<a href="'+base_url+'index.php/ventaPedido/verReporteTotal?idCliente='+id+'" target="_blank" class="btn btn-success">Ver todo el repo  <i class="fa fa-eye"></i></a>';
    return html;
  }
</script>
