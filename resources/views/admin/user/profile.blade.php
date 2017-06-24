@extends('admin.layouts.app')

@section('htmlheader_title')
  
@endsection

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
              <h3 class="box-title">Admin Profile</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body nopadding">
                      <!-- form start -->
                <form name="speciality" id="speciality" action="{{ url('admin/profile') }}" method="POST" autocomplete="off"> 
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{(isset($user['id']) ? $user['id']: '')}}">
                
                  <div class="box-body">
                    <div class="form-group row">
                     
                      <div class="col-md-6">
                      <label for="statelabel" class="control-label">First Name</label>
                     
                      <input type="text" class="form-control " id="name" placeholder="First Name" name="first_name" value="{{(isset($user->first_name) ? $user->first_name : '')}}">
                     
                     
                      </div>

                      <div class="col-md-6">
                      <label for="statelabel" class="control-label">Last Name</label>
                     
                      <input type="text" class="form-control " id="name" placeholder="Last Name" name="last_name" value="{{(isset($user->last_name) ? $user->last_name : '')}}">
                     
                     
                      </div>
                      
                    </div>

                    <div class="form-group row">
                     
                      <div class="col-md-6">
                      <label for="statelabel" class="control-label">Email</label>
                     
                      <input type="email" class="form-control " id="name" placeholder="Email" name="email" value="{{(isset($user->email) ? $user->email : '')}}">
                     
                      </div>

                    </div>
                    
                  <!-- /.box-body -->
                  <div class="clearfix">&nbsp;</div>
                  <div class="box-footer nopadding-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
                   
                  </div>
                 </form>
            
                </div><!--end Box Body-->
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection
