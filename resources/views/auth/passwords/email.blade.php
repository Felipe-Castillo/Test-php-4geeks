@extends('layouts.app')


@section('main-content')

        <!-- Here start recover password -->
        <br>
        <div class="container">
            <div class="row">
               
                <div class="col s12 m12 ñ12">
                    <div class="card-panel ">

                        <div class="row">
                            <div class="center col s12">
                                <h4 class="title-blue">Recuperar Contraseña</h4>
                            </div>

                        </div>
                        @include('layouts.partials.success')
                        @include('layouts.partials.errors')
                        <div class="row">
                            <div class="center col s12">
                                <p class="pass-recovery">Ingrese el correo con que se registro y le enviaremos un email para recuperar su contraseña*</p>
                            </div>
                            <form action="{{ url('/user/password/email') }}" method="post" class="col s12">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate" name="email">
                                        <label for="email">Correo Electronico*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="center col s12">
                                        <button class="center btn-registration btn waves-effect waves-light" type="submit" name="action">Entrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Here ends retrieve password-->

@endsection
