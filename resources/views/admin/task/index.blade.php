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
              <h3 class="box-title">Task Management</h3>
              <div class="pull-right">
                <a href="{{url('/admin/task/create')}}" class="btn btn-primary">Add Task</a>
                <button  class="delete_multiple btn btn-danger f-left" id="delete_multiple" >Delete</button>

                <button  class="done_multiple btn btn-success f-left" id="done_multiple" >Done</button>
              </div>
            </div>
            <!-- /.box-header -->
            <form name="task_listing_form" id="task_listing_form" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="box-body">
	               <table id="task-table" class="table table-bordered table-hover" width="100%">
	                <thead>
	                <tr>
		               <th><input type="checkbox" name="selected_task[]" id="checkall"></th>
		               <th>Title</th>
                   <th>Category</th>
		               <th>Note</th>
                   <th>Status</th>
                   <th>Date</th>
                   <th width="10%">Actions</th>
	                </tr>
	                </thead>
	               
	                <tbody>
	                <td></td>
	                <td></td>
	                <td ></td>
	                <td ></td>
                  <td ></td>
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

    <script src="{{asset('/js/datatables/task.js') }}"></script>
@stop
