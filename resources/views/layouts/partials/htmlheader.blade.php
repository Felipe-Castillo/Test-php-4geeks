<head>
    <meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title', 'Salud Vitale')</title>
    
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}" media="screen,projection" />
    <!-- Style main-->
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <!-- ionics icons -->
   <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}">


      <!-- full calendar -->
    <link rel='stylesheet' href="{{asset('/plugins/fullcalendar/fullcalendar.css')}}"/>

   <!-- custom css -->
   <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
   <script src="{{asset ('plugins/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset ('js/constantes.js') }}"></script>
	<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
  </script>
</head>
