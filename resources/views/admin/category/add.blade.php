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
              <h3 class="box-title">{{(isset($category->id) ? 'Edit Category' : 'Add Category')}}</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body nopadding">
                      <!-- form start -->
                <form name="subjects" id="category_form" action="{{ url('admin/category') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{(isset($category->id) ? $category->id : '')}}">
                
                  <div class="box-body">
                    <div class="form-group col-md-6 nopadding-left">
                      <label for="category">Category Name</label>
                      <input type="text" required class="form-control" id="category_name" placeholder="Category Name" name="name" value="{{(isset($category->name) ? $category->name : '')}}">
                    </div>
                  <!-- /.box-body -->
                  <div class="clearfix">&nbsp;</div>
                  <div class="box-footer nopadding-left">
                    <button type="submit" class="btn btn-primary">
                    {{(isset($category->id) ? 'Update' : 'Save')}}
                    </button>
                    <a href="{{url('/admin/category')}}" class="btn btn-primary">Back</a>
                  </div>
                 </form>
            
                </div><!--end Box Body-->
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection
