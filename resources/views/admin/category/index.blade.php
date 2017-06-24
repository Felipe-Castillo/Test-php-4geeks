@extends('admin.layouts.app')

@section('htmlheader_title')
  
@endsection


@section('main-content')
  <section class="content">
      <div class="row">
        <div class="col-xs-12" id="all_messages">
         @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
         @endif
         @if ($message = Session::get('errors'))
          <div class="alert alert-danger">
              <p>{{ $message }}</p>
          </div>
         @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Management</h3>
              <div class="pull-right">
                <a href="{{url('/admin/category/create')}}" class="btn btn-primary">Add category</a>
                <button  class="delete_multiple btn btn-danger f-left" id="delete_multiple" >Delete</button>
              </div>
            </div>
            <!-- /.box-header -->
            <form name="category_listing_form" id="category_listing_form" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="box-body">
	               <table id="category-table" class="table table-bordered table-hover" width="100%">
	                <thead>
	                <tr>
		               <th><input type="checkbox" name="selected_category[]" id="checkall"></th>
		               <th>Name</th>
		               <th width="10%">Actions</th>
	                </tr>
	                </thead>
	               
	                <tbody>
	                <td></td>
	                <td></td>
	                <td ></td>
	                </tbody>
	               
	              
	                </table>
                </div><!--end Box Body-->
           </form>
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection
@section('pagescript')

    <script src="{{asset('/js/datatables/category.js') }}"></script>
@stop
