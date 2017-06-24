@extends('layouts.app')


@section('main-content')


       <!-- Here begins the registration form -->
        <br>
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif
                    <div class="card-panel">
                     <div class="row">
                            <div class="col s12">
                                <div class="center">
                                    <a class="center" href="{{url('/home')}}"><img src="{{asset('images/signuplogo.png')}}" class="responsive-img" width="320px"></a>
                                </div>
                            </div>
                        </div>        
                    
                        <h4 class="entrar">Regístrate</h4>
                      
                        <div class="row">
                            <form class="col s12" method="POST" action="{{ url('register') }}" autocomplete="off">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="first_name" type="text" class="validate" name="first_name" value="{{ old('first_name') }}">
                                        <label for="first_name">Nombre*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="last_name" type="text" class="validate" name="last_name" value="{{ old('last_name') }}">
                                        <label for="last_name">Apellido*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}">
                                        <label for="email">Correo Electronico*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password">
                                        <label for="password">Contraseña*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="confirm_password">
                                        <label for="email">Vuelve a escribir contraseña*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <a class="center">
                                            <input type="checkbox" class="filled-in" id="filled-in-term-box" name="terms_n_conditions" />
                                            <label for="filled-in-term-box">He leído y acepto los términos y condiciones y la politica de privacidad*</label>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="center">
                                        <button class="center btn-registration btn waves-effect waves-light" type="submit" name="action">Regístrate</button>
                                    </div>
                                </div>
                                <div class="center col s12">
                                    <p class="center">¿Ya estas registraso en SaludVitale?</p>
                                    <a class="registrate" class="modal-trigger" href="#modal1">Entrar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Here ends the registration form -->

        <!-- FAQ button -->
        <div class="fixed-action-btn">
            <a class="btn_question btn-floating btn-large waves-effect ">
                <i class="ion-help"></i>
            </a>
        </div>
        <!-- heren ends FAQ button -->
   
    

@endsection
