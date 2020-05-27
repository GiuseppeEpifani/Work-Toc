@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="-webkit-box-shadow: 1px 2px 4px rgba(0,0,0,.5);
            -moz-box-shadow: 1px 2px 4px rgba(0,0,0,.5);
            box-shadow: 1px 2px 4px rgba(0,0,0,.5);">
                <div class="card-header d-flex justify-content-between align-items-center text-center card_header">
                    <div class="container"><span><i class="fas fa-key" style="font-size: 30px;"></i> {{ __('Confirmar Contraseña') }}</span></div>
                    
                </div>

                
                <div class="card-body">
                    <center>{{ __('Por protocolo de seguridad confirma tu contraseña para continuar.') }}</center>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row mt-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="background: #000 !important; color: #ffffff !important;">
                                    {{ __('Confirmar contraseña') }}
                                </button>                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
