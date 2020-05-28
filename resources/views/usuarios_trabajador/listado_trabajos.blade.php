@extends('layouts.app')

@section('css_dataTable')
<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="{{ asset('css/estilo_dataTable_trabajos.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card sombra">

                <div class="card-header d-flex justify-content-between align-items-center text-center card_header">
                    <div class="container"><span><i class="fas fa-briefcase" style="font-size: 30px;"></i> Trabajos
                            finalizados</span></div>

                </div>

                @if ( session('mensaje') )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>
                @endif



                <div class="container" style="margin-top: 10px !important; margin-bottom: 10px !important;">
                    <table class="table" id="tabla_trabajos">
                        <thead>
                            <tr>
                                <th scope="col">Trabajador Involucrado</th>
                                <th scope="col">Cliente Involucrado</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Correo Trabajador</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajos as $item)
                            <?php $cliente = App\usuario::find($item->id_cliente);  ?>
                            <tr>
                                <td>{{ $item->nombre }} {{ $item->ape_paterno }} {{ $item->ape_materno }}</td>
                                <td> {{  $cliente['nombre']}} {{ $cliente['ape_paterno'] }}
                                    {{ $cliente['ape_materno'] }}
                                </td>
                                <td>{{ $item->precio }}</td>
                                <td>{{ $item->categoria }}</td>
                                <td>{{ $item->direccion }}</td>
                                <td>{{ $item->correo }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@section('script_dataTable')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="{{ asset('js/configuracion_dataTable.js') }}"></script>
@endsection