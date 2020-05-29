@extends('layouts.app')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="{{ asset('css/estilo_dataTable_usuarios_activar.css') }}" rel="stylesheet">
@section('content')
<div id="element" class="introLoading"></div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('mensaje_edit'))
      <div class="alert alert-warning" style="background: #85bb65 !important; color: #ffffff !important;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">
            &times;
          </span>
        </button>
        {{ session('mensaje_edit') }}
      </div>
      @endif

      @if (session('mensaje_delete'))
      <div class="alert alert-warning" style="background: #EF291F !important; color: #ffffff !important;"><button
          type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {{ session('mensaje_delete') }}
      </div>
      @endif
      <div class="card sombra">

        <div class="card-header d-flex justify-content-between align-items-center text-center card_header">
          <div class="container"><span><i class="fas fa-lock-open" style="font-size: 30px;"></i> Cuentas por
              Activar</span></div>

        </div>
        <div class="container" style="margin-top: 10px !important; margin-bottom: 10px !important;">
          <div class="row">
            <div class="col-lg-12">
              <table class="table display responsive nowrap" cellspacing="0" width="100%" id="tabla_usuarios_activar">
                <thead>
                  <tr>
                    <th width="40%">Nombre</th>
                    <th width="25%">Antecedentes</th>
                    <th width="35%">Acción</th>
                  </tr>
                </thead>
                @isset($usuarios)
                <tbody>
                  @foreach ($usuarios as $item)
                  <!-- data-id sirve para obtener elementos especificos de una tabla -->
                  <tr data-id="{{$item}}">
                    <td>{{ $item->nombre}} {{$item->ape_paterno}} {{$item->ape_materno}}</td>
                    <td><a target="-blank" href="{{ url('/storage/antecedentes/'.$item->antecedentes)}}">Ver
                        Antecedentes</a></td>
                    <td class="achicar_botones"><a title="Habilitar Trabajador"
                        class="btn btn-primary btn-sm btn_activar"
                        style="background: #28C2EB !important; color:#ffffff !important;"><i
                          class="fas fa-check-circle"></i> <span class="label_icon"> Activar </span></a>

                      <a title="Borrar Solicitud" class="btn btn-danger btn-sm btn_eliminar"
                        class="btn btn-danger btn-sm" style="color: #ffffff"><i class="fas fa-times-circle"></i>
                        <span class="label_icon">Eliminar</span></a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
                @endisset
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><label id="parrafo_nombre_usuario"> </label>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Eliminar la solicitud de trabajo?
      </div>
      <div class="modal-footer">

        <form action="{{route('usuarios_trabajador.delete', 'USER_ID')}}" class="d-inline" method="POST"
          id="form-delete">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger btn-sm" style="width:40px;">Si</button>
        </form>
        <button type="button" class="btn btn-sm" data-dismiss="modal"
          style="width:40px; background: #85bb65 !important; color: #ffffff !important;">No</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modal_confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><label id="text_confirmar">
          </label>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro de Realizar la siguiente acción?
      </div>
      <div class="modal-footer">
        <a type="submit" class="btn btn-danger btn-sm" style="width:40px;" href="" id="btn_si">Si</a>
        <button type="button" class="btn btn-sm" data-dismiss="modal"
          style="width:40px; background: #85bb65 !important; color: #ffffff !important;">No</button>
      </div>
    </div>
  </div>
</div>






@endsection
@section('script_dataTable')
<script src="{{ asset('js/configuracioIntroLoader.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.4/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="{{ asset('js/configuracion_dataTable.js') }}"></script>
@endsection



@section('script')
<script>
  $(document).ready( function () {
        $('.btn_eliminar').click(function (){
            var row = $(this).parents('tr');
            var objUsuario= row.data('id');
            var nombre_completo= objUsuario.nombre+" "+objUsuario.ape_paterno+" "+objUsuario.ape_materno;
            var form = $('#form-delete');
          // alert(form.attr('action').replace("USER_ID", objUsuario.id));  

          form.attr('action','{{url('')}}/delete/'+objUsuario.id);

          
            //form.attr('action').replace("USER_ID", objUsuario.id);           
            $('#parrafo_nombre_usuario').text("Solicitud de "+nombre_completo);
            $('#modal_eliminar').modal('show');

        })  
        
        $('.btn_activar ').click(function (){
          var row = $(this).parents('tr');
          var objUsuario= row.data('id');
          var nombre_completo= objUsuario.nombre+" "+objUsuario.ape_paterno+" "+objUsuario.ape_materno;
          var btnActivar= $('#btn_si');
          btnActivar.attr('href','{{url('')}}/edit/'+objUsuario.id);     
          $('#text_confirmar').text("Activar al trabajador "+ nombre_completo);
          $('#modal_confirmar').modal('show');
      })  

});
</script>
@endsection