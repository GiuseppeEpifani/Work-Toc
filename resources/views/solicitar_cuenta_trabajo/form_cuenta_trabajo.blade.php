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
            width: 260px !important;
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
            border-radius: 10px;
        }

        /* creamos el loader con css */
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #85bb65;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <title>Solicitar Cuenta Trabajador</title>
</head>

<body>
    <div class="container mt-5">

        @if(isset($trabajador->id))
        <style>
            html {
                background: #85bb65 !important;
            }

            .container {
                background: #85bb65 !important;
            }
        </style>
        <h5 class="text-center" style="background: #85bb65 !important; color: #ffffff !important;"> La Solicitud ya se
            Envío</h5>


        @else
        <h5 class="text-center"> Trabaja con Nosotros!</h5>
        <h5 class="text-center">{{$usuario->nombre}} {{$usuario->ape_paterno}} solicita tu cuenta</h5>
        <center>
            <div class="alert" style="!important; color: #B42B10 !important; display:none; height: 50px
                !important;" id="validar_campos">
            </div>
        </center>
        <form action="" method="POST" enctype="multipart/form-data" id="solicitud">
            @csrf
            <div class="form-group col-md-6">
                <label for="titulo">Soy</label>
                <input type="text" class="form-control" id="titulo" name="titulo"
                    placeholder="Oficio, Tecnico, Titulo, Otros">
            </div>
            <div class="form-group col-md-6">
                <label for="Especialidad">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad"
                    placeholder="Describe tu experiencia laboral">
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
                <center>
                    <span class="antecedentes_pdf">
                        <input type="file" class="form-control-file" id="antecedentes_pdf" name="antecedentes_pdf">
                    </span>
                    <label for="antecedentes_pdf"><i class="fas fa-arrow-circle-up"></i> <span> Subir Antecedentes
                        </span></label>
                </center>
            </div>

            <input id="id" name="id" type="hidden" value="{{$usuario->id}}">
            <div class="form-group col-md-6">
                <button type="button" class="btn btn-block botones" id="btn_enviar"
                    onclick="validar_campos();">Enviar</button>
            </div>
        </form>
        <center>
            <div class="alert alert-warning"
                style="background: #85bb65 !important; color: #ffffff !important; display:none; height: 50px !important;"
                id="divmsg">
            </div>
        </center>

        <center>
            <div class="modal fade bd-example-modal-sm" id="modal_cargando" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width: 150px !important;">
                    <div class="modal-content">
                        <center>
                            <div class="loader"></div>
                        </center>
                    </div>
                </div>
            </div>
        </center>
        @endif
    </div>




    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/cc66cadfbc.js" crossorigin="anonymous"></script>

    <script type="application/javascript">
        //funcion que sirve para escribir en el label el pdf que se escogio
        jQuery('#antecedentes_pdf').change(function(){
    var filename = jQuery(this).val().split('\\').pop();
    var idname = jQuery(this).attr('id');
    console.log(jQuery(this));
    console.log(filename);
    console.log(idname);
    jQuery('span.'+idname).next().find('span').html(filename);
    });

    


    function mostrarMensaje(mensaje)
    {
        $('#divmsg').empty(); //limpiar vid
        $('#divmsg').append("<p>"+mensaje+"</p>");
        $('#divmsg').show(500);
        $('#divmsg').hide(5000);
    }

    function mostrarMensaje_rellene_campos(mensaje)
    {
        $('#validar_campos').empty(); //limpiar vid
        $('#validar_campos').append("<p> Rellene todos los campos</p>");
        $('#validar_campos').show(500);
        $('#validar_campos').hide(5000);
    }


    function deshabilitar_Campos()
    {
        $('#btn_enviar').attr("disabled", true);
        $('#titulo').attr("disabled", true);
        $('#especialidad').attr("disabled", true);
        $('#categorias').attr("disabled", true);
        $('#antecedentes_pdf').attr("disabled", true);
    }

     function enviar_solicitud_ajax(e){

   //emulamos el formulario con jquery
          var parametros= new FormData($('#solicitud')[0]);

         $.ajax({
             type: 'POST',
             url:"{{ route('enviar_solicitud_trabajo') }}",
             contentType: false,
             processData: false,
             data:parametros,
             beforeSend: function(){
                deshabilitar_Campos();
                $('#modal_cargando').modal('show');
             },
           
             success:function(mensaje){
                $('#modal_cargando').modal('hide');
                $("#btn_enviar").html('Solicitud Enviada');
                mostrarMensaje(mensaje.mensaje); 
             }
         });
         
     };



     function validar_campos() {    
        if ($('#titulo').val().length == 0 && $('#titulo').val()== "") {
            mostrarMensaje_rellene_campos();   
            return false;
        }
        if ($('#especialidad').val().length == 0 && $('#especialidad').val()== "") {
            mostrarMensaje_rellene_campos();          
            return false;
        }
        if ($('#categorias').val() == "Seleccioné categoria") {
            mostrarMensaje_rellene_campos();          
            return false;
        }
        if ($('#antecedentes_pdf').val().length == 0 && $('#antecedentes_pdf').val()== "") {
            mostrarMensaje_rellene_campos();       
            return false;
        }

       
        var archivo = $("#antecedentes_pdf").val();
        var extensiones = archivo.substring(archivo.lastIndexOf("."));
        if(extensiones != ".pdf")
        {
        alert("El archivo de tipo " + extensiones + " no es válido");
        return false;
        }

        enviar_solicitud_ajax();
        
        
    }

    </script>




</body>

</html>