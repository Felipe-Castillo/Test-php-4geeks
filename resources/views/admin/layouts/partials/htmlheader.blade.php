<head>
    <meta charset="UTF-8">
    <title>Notes System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css')}}">
    
    <!-- REQUIRED JS SCRIPTS -->

    <!-- DataTables -->


    <!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
    <script src="{{asset('plugins/jquery-2.2.3.min.js')}}" type="text/javascript"></script>
    <script src="https://almsaeedstudio.com/themes/AdminLTE/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="{{asset('plugins/jquery.dataTables.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('plugins/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>



    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

 
</head>
