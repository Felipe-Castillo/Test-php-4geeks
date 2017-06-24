@extends('admin.layouts.auth')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Forgot Password</div>
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

            <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/admin/password/email') }}" autocomplete="off">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email"
                         value="{{ old('email') }}" autofocus>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary"> Send Password Reset Link</button>
                  <a href="{{ url('/admin/login') }}" class="btn btn-primary">Back</a>
                </div>
              </div>
            </form>
         
          </div>
         
        </div>
       
      </div>
    </div>
  </div>
@endsection
