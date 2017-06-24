<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
       {{-- @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> online</a>
                </div>
            </div>
        @endif 

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form --> --}}

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
           
            <!-- Optionally, you can add icons to the links -->
            <li @if (Request::is('admin/dashboard*')) class="active" @endif><a href="{{ url('admin/dashboard') }}"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
            @if($userType=='Admin')
            <li @if (Request::is('admin/user*')) class="active" @endif><a href="{{ url('admin/user') }}"><i class='fa fa-user'></i> <span>Users</span></a></li>
            @endif
            <li @if (Request::is('admin/category*')) class="active" @endif><a href="{{ url('admin/category') }}"><i class="fa fa-user-md" aria-hidden="true"></i><span>Categorias</span></a></li>

            <li @if (Request::is('admin/task*')) class="active" @endif><a href="{{ url('admin/task') }}" ><i class="fa fa-user-md" aria-hidden="true"></i><span>Tareas</span></a></li>

            <li @if (Request::is('admin/reportes*')) class="active" @endif><a href="{{ url('admin/reportes') }}" ><i class="fa fa-user-md" aria-hidden="true"></i><span>Reportes</span></a></li>
             
           
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
