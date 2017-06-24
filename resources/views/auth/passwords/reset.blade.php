@extends('layouts.app')


@section('main-content')

<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <!-- Here start recover password -->
        <br>
        <div class="container">
            <div class="row">
                <div class="col s12 m12 ñ12">
                    <div class="card-panel ">
                    
		            @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                    @endif
		            @if (count($errors) > 0)
		                <div class="alert alert-danger">
		                  
		                    <ul>
		                        @foreach ($errors->all() as $error)
		                            <li>{{ $error }}</li>
		                        @endforeach
		                    </ul>
		                </div>
		            @endif
            
                        <div class="row">
                            <div class="center col s12">
                                <h4 class="title-blue">Recuperar Contraseña</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="center col s12">
                                <p class="pass-recovery">Ingrese el correo con que se registro y le enviaremos un email para recuperar su contraseña*</p>
                            </div>
                           
                            <form action="{{ url('/user/password/reset') }}" method="post" class="col s12" role="form">
                                {{ csrf_field() }}
								      <input type="hidden" name="id" value="@if(isset($user)){{$user->id}}@endif">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password">
                                        <label for="password">Contraseña*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="password_confirmation">
                                        <label for="email">Vuelve a escribir contraseña*</label>
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

        <!-- FAQ button -->
        <div class="fixed-action-btn">
            <a class="btn_question btn-floating btn-large waves-effect ">
                <i class="ion-help"></i>
            </a>
        </div>
        <!-- heren ends FAQ button -->
        </div>
    </body>

@endsection
