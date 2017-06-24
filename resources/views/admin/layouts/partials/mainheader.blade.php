<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('admin/dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{asset('images/web-icon.png')}}"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><h4 style="color:blue;" >Notes System</h4></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">togglenav</span>
        </a>
      
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
       
         <li class="dropdown">
            
              <li>
                <a href="{{ url('/logout') }}" 
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                   <i class="fa fa-lock"></i> Signout
                 </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="submit" value="logout" style="display: none;">
                </form>
              </li>
              
            </ul>
          
              
              

        </div>
    </nav>
</header>
