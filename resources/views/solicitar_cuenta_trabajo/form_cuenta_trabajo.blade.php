<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .botones {
            background: #85bb65 !important;
            color: #ffffff !important;
        }

        #antecedentes_pdf {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        label[for="antecedentes_pdf"] {
            width: 200px !important;
            font-size: 12px;
            font-weight: 600;
            color: #fff;
            background-color: #85bb65;
            display: inline-block;
            transition: all .5s;
            cursor: pointer;
            padding: 8px 30px !important;
            text-transform: uppercase;
            width: fit-content;
            text-align: center;
            /* esto hace que al momento de abarcar mucho texto, lo corte y ponga puntos suspencivos */
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            border-radius: 5px;
        }
    </style>
    <title>Solicitar Cuenta Trabajador</title>
</head>

<body>

    @if (isset($id))
    {{ $id}}
    @endif

    <div class="container mt-5">
        <h5 class="text-center"> Trabaja con Nosotros!</h5>
        <h5 class="text-center">{{$usuario->nombre}} {{$usuario->ape_paterno}} solicita tu cuenta</h5>

        <form action="{{ route('enviar_solicitud_trabajo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label for="titulo">Soy</label>
                <input type="text" class="form-control" id="titulo" name="titulo"
                    placeholder="Oficio, Tecnico, Titulo, Otros">
            </div>
            <div class="form-group col-md-6">
                <label for="Especialidad">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad"
                    placeholder="Describete, junto con tu experiencia laboral">
            </div>
            <div class="form-group col-md-6">
                <label for="categorias">Categoria de Identificación</label>
                <select id="categorias" name="categorias" class="form-control">
                    <option selected>Seleccioné categoria</option>
                    <option>Informatica</option>
                    <option>Construcción</option>
                    <option>Electricidad</option>
                    <option>Hogar</option>
                </select>
            </div>
            <div class="form-group col-md-6 ">
                <span class="antecedentes_pdf">
                    <input type="file" class="form-control-file" id="antecedentes_pdf" name="antecedentes_pdf">
                </span>
                <label for="antecedentes_pdf"><i class="fas fa-arrow-circle-up"></i> <span> Subir Antecedentes
                    </span></label>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-block botones">Enviar</button>
            </div>
            <input id="id" name="id" type="hidden" value="{{$usuario->id}}">
        </form>
        @if (session('mensaje'))
        <div class="alert alert-warning" style="background: #85bb65 !important; color: #ffffff !important;"><button
                type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('mensaje') }}
        </div>
        @endif
    </div>


    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/cc66cadfbc.js" crossorigin="anonymous"></script>
    <script type="application/javascript">
        jQuery('#antecedentes_pdf').change(function(){
    var filename = jQuery(this).val().split('\\').pop();
    var idname = jQuery(this).attr('id');
    console.log(jQuery(this));
    console.log(filename);
    console.log(idname);
    jQuery('span.'+idname).next().find('span').html(filename);
    });
    </script>




</body>

</html>