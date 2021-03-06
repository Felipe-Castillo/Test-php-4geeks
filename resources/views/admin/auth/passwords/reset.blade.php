@extends('admin.layouts.auth')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Reset Password</div>
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

            <form class="form-horizontal" role="form" method="POST"  action="{{ url('/admin/password/reset') }}" autocomplete="off">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id" value="{{$user->id}}">

              <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password"
                          autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="confirm_password" autofocus>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Reset</button>
                </div>
              </div>
            </form>
         
          </div>
         
        </div>
       
      </div>
    </div>
  </div>
@endsection
