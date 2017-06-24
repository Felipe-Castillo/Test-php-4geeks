@extends('admin.layouts.app')


@section('main-content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body nopadding">
                      <!-- form start -->
                <form name="user" id="userEdit_form" action="{{ url('admin/user') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{(isset($user->id) ? $user->id : '')}}">
                
                  <div class="box-body">
                    <div class="form-group col-md-12 col-lg-12 nopadding-left">
                      
                      <label for="First_name">First_name</label>
                      <input type="text" required class="form-control" id="user_name" placeholder="first name..." name="First_name" value="{{(isset($user->first_name) ? $user->first_name : '')}}">
                      <br>
                      <label for="last_name">last_name</label>
                      <input type="text" required class="form-control" id="user_name" placeholder="last name..." name="last_name" value="{{(isset($user->last_name) ? $user->last_name : '')}}">

                      <label for="email">email</label>
                      <input type="email" required class="form-control" id="user_name" placeholder="email..." name="email" value="{{(isset($user->email) ? $user->email : '')}}">

                      <label for="password">password</label>
                      <input type="password" required class="form-control"  id="password"  name="password" value="">
                     

                      <label for="password">password</label>
                      <input type="password" required class="form-control"  id="password2" name="password_2" value="">
                      
                    
                      <br>
                      <div class="row">
                      <div class="form-group col-md-6 col-sm-6 col-lg-6 ">
                      <label for="role">Roles</label>
                      <select class="form-control" name="role">
                      @if(!empty($role))
                      <option>Roles</option>
                      
                        @foreach($role as $r)
                        <option value="{{$r->id}}" >{{$r->name}}</option>
                        @endforeach
                        @else
                        <option>No roles</option>
                      @endif
                      
                      </select>
                       <!-- /.box-body -->
                  <div class="clearfix">&nbsp;</div>
                  <div class="box-footer nopadding-left">
                    <button type="submit" class="btn btn-primary">
                      Update
                    </button>
                    <a href="{{url('/admin/user')}}" class="btn btn-primary">Back</a>
                  </div>
                             </div>
                          </div>
                        </div>
                      </div>
                    
                 

                 </form>
            
                </div><!--end Box Body-->
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection

