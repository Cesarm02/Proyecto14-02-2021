@extends('layouts.app')

@section('scripts')
    <link rel="stylesheet" href="{{asset("fullcalendar/core/main.css")}}">
    <link rel="stylesheet" href="{{asset("fullcalendar/daygrid/main.css")}}">
    <link rel="stylesheet" href="{{asset("fullcalendar/list/main.css")}}">
    <link rel="stylesheet" href="{{asset("fullcalendar/timegrid/main.css")}}">

    <script src="{{asset("fullcalendar/core/main.js")}}" defer></script>
    <script src="{{asset("fullcalendar/interaction/main.js")}}" defer></script>
    <script src="{{asset("fullcalendar/daygrid/main.js")}}" defer></script>
    <script src="{{asset("fullcalendar/list/main.js")}}" defer></script>
    <script src="{{asset("fullcalendar/timegrid/main.js")}}" defer></script>

    <script>
      var url_ ="{{url('/eventos')}}";
      var url_show="{{url('/eventos/show')}}";
    </script>
     
     <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          defaultDate : new Date(2021,0,23), //Hace que inicie la fecha indicada
          plugins: [ 'dayGrid', 'interaction','timeGrid','list' ],

        header:{
            left:'prev,next today Miboton',
            center:'title',
            right:'dayGridMonth, timeGridWeek, timeGridDay'
        },

        customButtons:{
            Miboton:{
                text:"Botón",
                click:function(){
                    alert("funciona");
                    $('#exampleModal').modal('toggle');
                }
            }
        },

        dateClick:function(info){
          limpiarFormulario();
          $('#txtFecha').val(info.dateStr);
          $("#btnAgregar").prop("disabled", false);
          $("#btnModificar").prop("disabled", true);
          $("#btnEliminar").prop("disabled", true);
          $('#exampleModal').modal();

        },

        eventClick:function(info){
          $("#btnAgregar").prop("disabled", true);
          $("#btnModificar").prop("disabled", false);
          $("#btnEliminar").prop("disabled", false);

            $('#txtID').val(info.event.id);
            $('#txtTitulo').val(info.event.title);
            mes = (info.event.start.getMonth() + 1 );
            dia = (info.event.start.getDate());
            año = (info.event.start.getFullYear());
            mes = (mes<10) ? "0"+mes : mes;
            dia = (dia<10) ? "0"+dia : dia; 
            minutos = info.event.start.getMinutes();
            hora = info.event.start.getHours();
            minutos = (minutos<10) ? "0"+minutos : minutos;
            hora = (hora<10) ? "0"+hora : hora; 
            horario =  (hora+ ":" + minutos);
            $('#txtFecha').val(año  + "-" + mes + "-" + dia);
            $('#txtHora').val(horario);
            $('#txtColor').val(info.event.backgroundColor);
            $('#txtDescripcion').val(info.event.extendedProps.descripcion);
            $('#exampleModal').modal();
        },

          events:url_show

        });

        calendar.setOption('locale', 'Es');

        calendar.render();

        $('#btnAgregar').click(function(){
          objEvento=recolectarDatosGUI("POST");
          EnviarInformacion('',objEvento );
        });

        $('#btnEliminar').click(function(){
          objEvento=recolectarDatosGUI("DELETE");
          EnviarInformacion('/'+$('#txtID').val(),objEvento);
        });

        $('#btnModificar').click(function(){
          objEvento=recolectarDatosGUI("PATCH");
          EnviarInformacion('/'+$('#txtID').val(),objEvento);
        });

        function recolectarDatosGUI(method)
        {
          nuevoEvento = {
            id:  $('#txtID').val(), 
            title: $('#txtTitulo').val(),
            descripcion: $('#txtDescripcion').val(),
            color: $('#txtColor').val(),
            textColor: '#FFFFFF',
            start: $('#txtFecha').val() + " " + $('#txtHora').val(),
            end:  $('#txtFecha').val() + " " + $('#txtHora').val(),
            informacion_user_id: "{{Auth()->user()->id}}",

            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method
          }
          return (nuevoEvento);
        }

        function EnviarInformacion(accion, objEvento){
          $.ajax({
            type:"POST",
            url:url_ + accion,
            data:objEvento,
            success:function(msg){
            $('#exampleModal').modal('toggle');
            calendar.refetchEvents();
              },
            error:function(){ alert(msg);}
          });
        }

        function limpiarFormulario()
        {
            $('#txtID').val("");
            $('#txtTitulo').val("");
            $('#txtFecha').val("");
            $('#txtHora').val("07:00");
            $('#txtColor').val("");
            $('#txtDescripcion').val("");
        }


      });

    </script>
@endsection

@section('content')
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('inicio')}}">Home</a></li>
        <li class="breadcrumb-item active">Calendario</li>

    </ol>
    </nav>
<div class="alert alert-info class=card-header" role="alert">
        <h3> Sección de <strong> Calendario </strong> 
        </h3>
    </div>

    <div class="row">
        <div class="col"> </div>
        <div class="col-8"> <div id='calendar'> </div> </div>
        <div class="col"></div>

        </div>
    </div>
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- d-none --}}
        <div class=""> 
          Id:
          <input type="text" class="form-control" name="txtID" id="txtID" readonly>
          <br>
          Fecha
          <input type="text" class="form-control" name="txtFecha" id="txtFecha" readonly>
          <br>
        </div>

        <div class="form-row">
          <div class="form-group col-md-8">
            <label type=> Título*: </label>
            <input type="text" class="form-control" name="txtTitulo" id="txtTitulo">
          </div>
          <div class="form-group col-md-4">
            <label> Hora*:</label>
            <input type="time" min="05:00" max="24:00" step="600"  class="form-control" name="txtHora" id="txtHora">
          </div>      
          <div class="form-group col-md-12">
            <label> Descripcion* </label>
            <textarea name="txtDescripcion"  class="form-control" id="txtDescripcion" cols="30" rows="3"></textarea>
          </div>
          <div class="form-group col-md-12">
            <label> Color: </label>
            <input type="color" class="form-control"  name="txtColor" id="txtColor">
          </div>
        </div>

      </div>
      <div class="modal-footer">

        <button id="btnAgregar" class="btn btn-success">Agregar</button>
        <button id="btnModificar" class="btn btn-warning">Modificar</button>
        <button id="btnEliminar" class="btn btn-danger">Eliminar</button>
        <button id="btnCancelar" data-dismiss="modal" class="btn btn-primary">Cancelar</button>

      </div>
    </div>
  </div>
</div>


@endsection