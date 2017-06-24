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
              <h3 class="box-title">Pdf Management</h3>
            </div>
            <!-- /.box-header -->
           <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>ID</th>
                      <th>reporte</th>
                      <th>ver</th>
                      <th>descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reporte de Tareas Terminadas</td>
                      <td><a href="{{url('admin/endTask/1')}}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('admin/endTask/2')}}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                    </tr>

                      <tr>
                      <td>2</td>
                      <td>Reporte de Tareas sin Terminar</td>
                      <td><a href="{{url('admin/endTask/3')}}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('admin/endTask/6')}}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                    </tr>

                     </tr>

                      <tr>
                      <td>3</td>
                      <td>Reporte de todas las Tareas</td>
                      <td><a href="{{url('admin/endTask/4')}}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('admin/endTask/5')}}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                    </tr>
                   
                  </tbody></table>
                </div><!-- /.box-body -->
            </div><!--end Box-->
          </div><!--end Xs-12 -->
      </div><!--end Row-->
   </section>
@endsection
@section('pagescript')

    <script src="{{asset('/js/datatables/task.js') }}"></script>
@stop
