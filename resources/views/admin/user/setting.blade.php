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
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body nopadding">
                      <!-- form start -->
                <form name="speciality" id="speciality" action="{{ url('admin/profile/setting') }}" method="POST" autocomplete="off"> 
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{(isset($user['id']) ? $user['id']: '')}}">
                
                  <div class="box-body">
                    <div class="form-group row">
                     
                      <div class="col-md-6">
                      <label for="statelabel" class="control-label">Current Password</label>
                     
                      <input type="password" class="form-control " id="name" placeholder="Current Password" name="current_password">
                     
                     
                      </div>

                      <div class="col-md-6">
                      <label for="statelabel" class="control-label">New Password</label>
                     
                      <input type="password" class="form-control " id="name" placeholder="New Password" name="new_password">
                     
                     
                      </div>
                      
                    </div>

                    <div class="form-group row">
                     
                      <div class="col-md-6">
                      <label for="statelabel" class="control-label">Confirm New Password</label>
                     
                      <input type="password" class="form-control " id="name" placeholder="Confirm Password" name="confirm_password">
                     
                      </div>

                    </div>
                    
                  <!-- /.box-body -->
                  <div class="clearfix">&nbsp;</div>
                  <div class="box-footer nopadding-left">
                    <button type="submit" class="btn btn-primary">Update</button>
                   
                  </div>
                 </form>
            
                </div><!--end Box Body-->
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection
