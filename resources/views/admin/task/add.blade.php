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
              <h3 class="box-title">{{(isset($task->id) ? 'Edit Task' : 'Add Task')}}</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body nopadding">
                      <!-- form start -->
                <form name="task" id="task_form" action="{{ url('admin/task') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{(isset($task->id) ? $task->id : '')}}">
                
                  <div class="box-body">
                    <div class="form-group col-md-12 col-lg-12 nopadding-left">
                      <div class="row">
                      <div class="col-md-6 col-lg-6">
                      <label for="task">Title</label>
                      <input type="text" class="form-control" id="category_name" placeholder="Title..." name="title" value="{{(isset($task->title) ? $task->title : '')}}">
                      </div>
                      <br>
                   
                    </div>
                    <br>
                    <label for="task">note</label>
                    <textarea required class="form-control" name="note" value="" placeholder="Task...">{{(isset($task->note)? $task->note:'')}}</textarea>
                      <br>
                      <div class="row">
                      <div class="col-md-6 col-sm-6 col-lg-6">
                      <select class="form-control" name="category">
                      @if(!empty($category))
                      <option>Categorias</option>
                      
                        @foreach($category as $c)
                        <option value="{{$c['id']}}" >{{$c["name"]}}</option>
                        @endforeach
                        @else
                        <option>sin categorias</option>
                      @endif
                      
                      </select>
                        </div>
                        <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                      <select class="form-control" name="status">
                      
                        <option >status</option>
                        <option value="1" >Finalizada</option>
                        <option value="0" >Pendiente</option>
                       
                      </select>

                        </div>
                        
                          </div>
                          <br>
                          <div class="col-md-6 col-sm-6 col-lg-6">
                        <input type="date" name="date" class="datepicker form-control">
                        </div>
                      </div>
                    </div>
                  <!-- /.box-body -->
                  <div class="clearfix">&nbsp;</div>
                  <div class="box-footer nopadding-left">
                    <button type="submit" class="btn btn-primary">
                    {{(isset($task->id) ? 'Update' : 'Save')}}
                    </button>
                    <a href="{{url('/admin/task')}}" class="btn btn-primary">Back</a>
                  </div>

                 </form>
            
                </div><!--end Box Body-->
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection
@section('scripts')
@parent
    <script src="{{asset('/js/controlador/tasks.js') }}"></script>
@endsection