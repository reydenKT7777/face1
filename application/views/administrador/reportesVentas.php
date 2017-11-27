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
          '<input type="text" id="f1" class="form-control" placeholder="">'+
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
    $.ajax({
      url: 'index.php/controlad',
      type: 'default GET (Other values: POST)',
      dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
      data: {param1: 'value1'}
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
