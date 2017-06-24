@extends('layouts.app')

@section('title')
   {{$page_title}}
@stop

@section('main-content')
 <!-- Here start reservation -->
        <br>
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                  @include('layouts.partials.success')
                  @include('layouts.partials.errors')
                    <div class="card ">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <h4 class="title-blue">Reservaciones</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <ul id="tabs-swipe-demo" class="tabs">
                                    <li class="tab col s6"><a class="active" href="#test-swipe-1">Reservaciones</a></li>
                                    @if(($userType == 'Doctor'))
                                    <li class="tab col s6"><a href="#disponibilidad">Disponibilidad</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div style="padding:30px" id="test-swipe-1" class="col s12 ">
                                <div class="row">
                                    <div class="calendar col s12 m12 l6">
                                        <div id='calendar'></div>
                                    </div>
                                    <div class="col s12 m12 l6">
                                        <div class="row">
                                            <div class="reservetions_p col s12">
                                                <h6 class="bold-text">Reservación de Consulta para el:</h6>
                                                <ul>
                                                    <li data-gotodate={{$goToDate}} id="goToDate"><a href="">{{$displayDate}}</a></li>
                                                   @if(($reservationList ))
                                                    	@foreach($reservationList as $reservation)
                                                   		 <li> <a href="#modal_reservation_{{$reservation['id']}}">{{$reservation['start_time']}} <i class="material-icons">play_arrow</i></a></li>
                                                    	@endforeach
                                                   @else
                                                    			<li>Reserva no disponible fecha seleccionada</li>
                                                   @endif 
                                                    <!--<li><a href="#modal_reservation2">10:00 am <i class="material-icons">play_arrow</i></a></li>
                                                    <li><a href="#modal_reservation3">3:00 pm <i class="material-icons">play_arrow</i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(($userType == 'Doctor'))
                            <div style="padding:50px"  id="disponibilidad" class="col s12 " >
                                <div class="row">
                                
                                    <p class="bold-text center">Configura tu disponibilidad para recibir reservaciones</p>
                                    <div class="card availability">
                                        <div class="card-content">
                                            <form class="" action="{{url('save_single_timeslot')}}"  method="POST" id="save_single_time_slot">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="user_id" value="{{$authUser->id}}">
                                                <input type="hidden" id="is_single_timeslot" value="" name="is_single_timeslot">
                                                <div id="date_reservation" class="row">
                                                  <div class="input-field col s12 m6 l6">
                                                      <input type="date" class="datepicker validate" id="start_date_reservation" name="start_date">
                                                      <label for="start_date_reservation">29-2-1017</label>
                                                      <div class="errstart_date"></div>
                                                  </div>
                                                  <div class="input-field col s12 m6 l6">
                                                      <input type="date" class="datepicker validate" id="end_date_reservation" name="end_date">
                                                      <label for="end_date_reservation">29-2-1017</label>
                                                      <div class="errend_date"></div>
                                                  </div>
                                                </div>
                                                <div class=" btns-spaces row">
                                                    <a id="add_only_space" class="btn-only waves-effect waves-light btn"><i class="material-icons left">add</i>Unico espacio</a>
                                                    <a id="add_several_space" class="btn-only waves-effect waves-light btn"><i class="material-icons left">add</i>Varios espacios</a>
                                                </div>
                                                <div id="only_space" class="row">
                                                    <?php $ts = 1; ?>
                                                    <div class="input-field col s12 m12 l12 xl3">
                                                        <select name="no_of_slot" class="validate">
                                                            <option value="" disabled selected>5 Espacios de tiempo</option>
                                                            @foreach($timeSlots as $slot)
                                                                  <option value="{{$ts}}">{{$slot}}</option>
                                                                  <?php $ts++; ?>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-field col s12 m12 l12 xl2">
                                                        <select name="start_time" class="validate" id='single_start_time'>
                                                            <option value="" disabled selected>Hora de Inicio</option>
                                                            @foreach($aTime as $time)
                                                                <option value="{{$time}}">{{$time}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="input-field col s12 m12 l12 xl2">
                                                        <select name="end_time" class="validate" id='single_end_time'>
                                                            <option value="" disabled selected>Hora Final</option>
                                                            @foreach($aTime as $time)
                                                                <option value="{{$time}}">{{$time}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="center input-field col s12 m12 l12 xl5 ">
                                                        <button id="create_only_spaces" class="btn-color3 btn waves-effect waves-light">Agregar</button>
                                                        <button id="close_only_space" class="btn-white btn waves-effect waves-light">Cerrar</button>
                                                    </div>
                                                </div>
                                                </form>
                                                <div id="preview_single_timeslot"></div>
                                                <form action="{{url('save_multiple_timeslot')}}" method="POST" id="save_multiple_time_slot">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="user_id" value="{{$authUser->id}}">
                                                <input type="hidden" id="is_multiple_timeslot" name="is_multiple_timeslot" value="">
                                                <input type="hidden"  id="multiple_start_date_reservation" name="start_date">
                                                 <input type="hidden" id="multiple_end_date_reservation" name="end_date">
                                                <div id="several_space" class="row">
                                                    <div class="input-field col s12 m12 l12 xl2">
                                                        <select name="start_time" class="validate" id='multi_start_time'>
                                                            <option value="" disabled selected>Hora Inicio</option>
                                                              @foreach($aTime as $time)
                                                                <option value="{{$time}}">{{$time}}</option>
                                                              @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="input-field col s12 m12 l12 xl2">
                                                        <select name="end_time" class="validate" id='multi_end_time'>
                                                            <option value="" disabled selected>Hora Final</option>
                                                             @foreach($aTime as $time)
                                                                <option value="{{$time}}">{{$time}}</option>
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                    <?php $i =1;?>
                                                    <div class="input-field col s12 m12 l12 xl4">
                                                        <select name="time_duration" class="validate">
                                                            <option value="" disabled selected>1 Espacio Disponible</option>
                                                             @foreach($aDuration as $duration)
                                                                <option value="{{$i}}">{{$duration}}</option>
                                                                <?php $i++; ?>
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                    <?php $j =1;?>
                                                    <div class="input-field col s12 m12 l12 xl2">
                                                        <select name="time_interval" class="validate">
                                                            <option value="" disabled selected>Tiempo Entre</option>
                                                             @foreach($aInterval as $interval)
                                                                <option value="{{$j}}">{{$interval}}</option>
                                                                <?php $j++; ?>
                                                             @endforeach
                                                        </select>
                                                    </div>
                                                    <?php $s =1;?>
                                                    <div class="input-field col s12 m12 l12 xl2">
                                                        <select name="no_of_slot" class="validate">
                                                            <option value="" disabled selected>Cada 1 Hora </option>
                                                            @foreach($timeSlots as $slot)
                                                                <option value="{{$s}}">{{$slot}}</option>
                                                                 <?php $s++; ?>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="center input-field col s12 m12 l12 xl12 ">
                                                        <button id="create_several_spaces" class="btn-color3 btn waves-effect waves-light">Agregar</button>
                                                        <button id="close_several_space" class="btn-white btn waves-effect waves-light">Cerrar</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div id="preview_multiple_timeslot">
                                            </div>
                                            <!-- <div id="preview_multiple_timeslot"><ul class="collection with-header"><li class="collection-header"><h5>ESPACIOS DISPONSIBLES <span style="float: right;">HORA</span></h5></li><li class="collection-item"><div><a href="javascript:void(0);" class="decrease-slot"><i class="mdi-content-add-circle-outline"></i></a><span class="increase-decrease-slot" data-slot="1">1</span> ESPACIOS DISPONSIBLES<a href="javascript:void(0);"><i class="icon ion-ios-plus-outline"></i></a><span class="preview-secondary-content"><i class="icon ion-android-time"></i> 03:00 am - 04:00 am</span></div></li><li class="collection-item"><div><a href="javascript:void(0);" class="decrease-slot"><i class="icon ion-ios-minus-outline"></i></a><span><span class="increase-decrease-slot" data-slot="1"> 1</span> ESPACIOS DISPONSIBLES </span><a href="javascript:void(0);"><i class="icon ion-ios-plus-outline"></i></a><span class="preview-secondary-content"><i class="icon ion-android-time"></i> 04:05 am - 05:05 am</span></div></li><li class="collection-item"><div><a href="javascript:void(0);" class="decrease-slot"><i class="icon ion-ios-minus-outline"></i></a><span><span class="increase-decrease-slot" data-slot="1"> 1</span> ESPACIOS DISPONSIBLES </span><a href="javascript:void(0);"><i class="icon ion-ios-plus-outline"></i></a><span class="preview-secondary-content"><i class="icon ion-android-time"></i> 05:10 am - 06:10 am</span></div></li></ul></div> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="center-s-m-l col s12">
                                            <a class="btn-add-date waves-effect waves-light btn"><i class="material-icons left">add</i>Añadir Fechas</a>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="center col s12">
                                            <a id="save_timeslot" class="btn-color3 waves-effect waves-light btn">Guardar disponibilidad</a> 
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Here ends reservations-->

        <!-- Modal reservation 1 -->
        @if(($reservationList ))
             @foreach($reservationList as $reservation)
             		
             		<div id="modal_reservation_{{$reservation['id']}}" class="modal ">
				            <div class="modal-content">
				                <div class="row">
				                    <div class="modal_reservation col s12">
				                        <h5 class="center">Detalle Reserva</h5>
				                        <ul>
                                        @if($reservation['user_type'] == 1)
                                        <li><p><a href="{{route('userProfile',['user' => Crypt::encrypt($reservation['professional_id']) ])}}">{{$reservation['first_name']}} {{$reservation['last_name']}}</a></p></li>
                                             <li><p>{{$reservation['speciality']}}</p></li>
                                        @else
				                            <li><p>{{$reservation['first_name']}} {{$reservation['last_name']}}</p></li>
				                        @endif  
                                            <li><p><i class="ion-android-calendar"></i> {{$reservation['booking_date']}}</p></li>
				                            <li><p><i class="ion-android-time"></i> {{$reservation['start_time']}}</p></li>
				                            <li><p>{{$reservation['type_of_consultation']}}</p></li>
                                            <li><p>{{$reservation['fees']}} USD</p></li>
                                       
				                        </ul>
				                    </div>
				                </div>
				            
				                <div class="center">
				                	@if(($reservation['user_type'] == 1) && ($reservation['is_rating'] == 1))
				                		
				                    	<form id="giveReview" action="{{'/user/review'}}" method="GET">
                        					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        					<input type="hidden" name="professional_id" value="{{$reservation['professional_id']}}">
                        					<input type="hidden" name="time_slot_id" value="{{$reservation['id']}}">
                        					<input type="hidden" name="user_id" value="{{$authUser->id}}">
                        					<button type="submit" class="btn-color3 waves-effect waves-light btn">Calificar Profesional</button>
                    					</form>
				                   @else
                                    @if(($reservation['is_rating'] == 0))
                                        <form id="cancelReservation" action="{{'/cancel_reservation'}}" method="GET">
                                            <input type="hidden" name="date" value="{{$reservation['booking_date']}}">
                                            <input type="hidden" name="slot_id" value="{{$reservation['id']}}">
                                            <button type="submit" class="btn-color3 waves-effect waves-light btn">Cancel Reservation</button>
                                       </form>
                                    @endif 
				                   @endif   
				                </div>
				               
				            </div>
				      </div>
             @endforeach
        @endif    
        <div id="modal_reservation1" class="modal ">
            <div class="modal-content">
                <div class="row">
                    <div class="modal_reservation col s12">
                        <h5 class="center">Detalle Reserva</h5>
                        <ul>
                            <li><p>Nombre Usuario</p></li>
                            <li><p>Especialidad</p></li>
                            <li><p><i class="ion-android-calendar"></i> 00-00-2017</p></li>
                            <li><p><i class="ion-android-time"></i> 8:00am</p></li>
                            <li><p>Consulta Virtual</p></li>
                        </ul>
                    </div>
                </div>
                <div class="center">
                    <a class="btn-color3 waves-effect waves-light btn" href="{{'user/review'}}">Calificar Profesional</a>
                </div>
            </div>
            <!--<div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>-->
        </div>
        <!-- end modal reservation 1-->

        <!-- Modal reservation 2 -->
        <div id="modal_reservation2" class="modal ">
            <div class="modal-content">
                <div class="row">
                    <div class="modal_reservation col s12">
                        <h5 class="center">Detalle Reserva</h5>
                        <ul>
                            <li><p>Nombre Usuario</p></li>
                            <li><p>Especialidad</p></li>
                            <li><p><i class="ion-android-calendar"></i> 00-00-2017</p></li>
                            <li><p><i class="ion-android-time"></i> 8:00am</p></li>
                            <li><p>Consulta Virtual</p></li>
                        </ul>
                    </div>
                </div>
                <div class="center">
                    <a class="btn-color3 waves-effect waves-light btn" href="{{'user/review'}}">Calificar Profesional</a>
                </div>
            </div>
            <!--<div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>-->
        </div>
        <!-- end modal reservation 2-->

        <!-- Modal reservation 3 -->
        <div id="modal_reservation3" class="modal ">
            <div class="modal-content">
                <div class="row">
                    <div class="modal_reservation col s12">
                        <h5 class="center">Detalle Reserva</h5>
                        <ul>
                            <li><p>Nombre Usuario</p></li>
                            <li><p>Especialidad</p></li>
                            <li><p><i class="ion-android-calendar"></i> 00-00-2017</p></li>
                            <li><p><i class="ion-android-time"></i> 8:00am</p></li>
                            <li><p>Consulta Virtual</p></li>
                        </ul>
                    </div>
                </div>
                <div class="center">
                    <form id="giveReview" action="{{'/user/review'}}" method="GET">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="professional_id" value="12">
                        <input type="hidden" name="user_id" value="{{$authUser->id}}">
                        <button type="submit" class="btn-color3 waves-effect waves-light btn">Calificar Profesional</button>
                    </form>
          
                </div>
            </div>
            <!--<div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>-->
        </div>
        <!-- end modal reservation 3-->
<!--         <div id="modal_start_date" class="modal ">
            <div class="modal-content">
                <div class="row">
                    <div class="modal_reservation col s12">
                        <h5 class="center">Detalle Reserva</h5>
                                        
                        </div>
                </div>
            </div>
        </div>
        <div id="modal_end_date" class="modal ">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="modal_reservation col s12">
                                        <h5 class="center">Detalle Reserva</h5>
                                        
                                    </div>
                                </div>
                            </div>
        </div> -->
@endsection
 @section('pagescript')
    <script type="text/javascript" src="{{asset ('js/profile-validate.js') }}"></script>
 @stop    