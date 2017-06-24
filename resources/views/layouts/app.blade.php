<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<div id="app" v-cloak>
    <div class="wrapper">

    @include('layouts.partials.mainheader')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    @include('layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('layouts.partials.scripts')
@show
@yield('pagescript')
</body>
</html>
