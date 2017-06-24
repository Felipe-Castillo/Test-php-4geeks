@extends('admin.layouts.auth')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading ">Register</div>
          <div class="panel-body">

            
            @if (count($errors) > 0)
                       <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div>
            @endif

            <form class="form-horizontal" id="register_form" role="form" method="POST" action="{{ url('admin/register') }}" autocomplete="off">
              <input type="hidden" required name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">Nombre*</label>
                <div class="col-md-8">
                  <input id="first_name" required type="text" class="validate" name="first_name" value="{{ old('first_name') }}">
            
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Apellido*</label>
                <div class="col-md-6">
                 <input id="last_name" required type="text" class="validate" name="last_name" value="{{ old('last_name') }}">
            
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Correo Electronico*</label>
                <div class="col-md-6">
                 <input id="email" type="email" required class="validate" name="email" value="{{ old('email') }}">
            
                </div>
              </div>

               <div class="form-group">
                <label class="col-md-4 control-label">Contraseña*</label>
                <div class="col-md-6">
                 <input id="password" type="password" required class="validate" name="password">
            
                </div>
              </div>

                <div class="form-group">
                <label class="col-md-4 control-label">Vuelve a escribir contraseña*</label>
                <div class="col-md-6">
                <input id="password2" type="password"  required class="validate" name="confirm_password">
            
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary" class="register">Register</button>
                </div>
              </div>
             <div class="messages">
            
             </div>
            </form>
     
          </div>
         
        </div>
       
      </div>
    </div>
  </div>
@endsection
