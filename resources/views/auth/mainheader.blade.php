<nav>
        <div class="menu nav-wrapper">
            <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
            <a href="{{url('/')}}" class="brand-logo"> <img class="logo responsive-img" src="{{ asset('/images/saludvitale.png') }}" width="200px"></a>
            <i id="buscador-icon" class="material-icons">search</i>
            <form style="margin-top: -5px" id="buscador" class="brand-logo center validate" action="{{url('/doctor_listing')}}">
               <div class="row">
                <div class="col s12 m12 l12">
                   <div class="input-group">

                      <input id="searchtxt" type="text" class="form-control" placeholder="Estoy buscando..." aria-describedby="ddlsearch"  name="searchText">  
                      <div class="ddl-select input-group-btn" >
                        <select id="ddlsearch" class="selectpicker form-control browser-default validate" data-style="btn-primary"  name="city">
                           <option value="" disabled selected>ciudad</option>
                      
                        </select>
                      </div>
                     
                      <span class="input-group-btn">
                       <button class="btn-buscar btn waves-effect waves-light" type="submit" style="border-radius: 0">buscar</button>
                      </span>
                    </div>
                  <!--   <div class="input-group my-group"> 
                       <input id="icon_prefix" type="" placeholder="Estoy buscando..." class="input-search">
                       <select class="browser-default">
                        <option value="" disabled selected>Select City</option>
                            @foreach($allcities as $cities)
                                <option value="{{$cities->id}}">{{$cities->name}}</option>
                            @endforeach
                      </select>
                      <span class="input-group-btn">
                        <button class="btn-buscar btn waves-effect waves-light" type="submit" name="action">buscar</button>
                      </span>
                    </div> -->
        <!-- /input-group -->
                    </div>
                </div>
                <!-- <div class="">
                    <input id="icon_prefix" type="" placeholder="Estoy buscando..." class="input-search">

                      <select class="browser-default" disabled>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                      </select>
                    <button class="btn-buscar btn waves-effect waves-light" type="submit" name="action">buscar</button>
                </div> -->

            </form>
            <ul class="right hide-on-med-and-down">
                @if(auth::check()) 
                <li><a href="javascript::void(0)" onclick="confirmLogout();">Logout</a></li>
               
                @else
                <li><a class="modal-trigger" href="#modal1">Ingresa</a></li>
                <li><a href="{{url('/register') }}">Regístrate</a></li>
                @endif
                @if(auth::check()) 
                <li class="publicar"><a href="{{'/profile'}}">Publicar Perfil</a></li>
                 @else
                 <li class="publicar"><a href="{{'/profile/post/'}}">Publicar Perfil</a></li>
                @endif
            </ul>
            <ul id="slide-out" class="side-nav">
                @if(auth::check()) 
                <li>
                    <div class="userView">
                        <div class="background">
                        </div>
                        <div class="row">
                            <div class="center col s12 m6 l6">
                            @if(isset($authUser->profile_pic))
                                <img class="picture-user-fixed picture-user responsive-img " src="{{asset('users/thumbnail/'.$authUser->profile_pic)}}">
                            @else
                                <img class="picture-user-fixed picture-user responsive-img " src="{{asset('img/default.png')}}">
                            @endif   
                            </div>
                            <div class="center col s12 m6 l6">
                                <a href="#!name" style="background-color:#fff"><span class="black-text name">{{$authUser->first_name}}</span></a>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox">
                                        <span class="lever"></span>
                                        <p>Conectado</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="active"><a href="{{url('/home')}}"><i class="material-icons">home</i>Inicio</a></li>
                @if(($userType == 'Doctor'))
                <li><a><i class="material-icons">chat</i>Mensajes</a></li>
                <li><a href="#!"><i class="material-icons">folder</i>Reservaciones</a></li>
                <li><a href="{{url('/profile/post')}}"><i class="material-icons">account_circle</i> Perfil Profesional</a></li>
                <li><a href="#!"><i class="material-icons">refresh</i> Renovar <span style="font-size:13px;font-weight:normal;"></span></a></li>
                <li><a href="{{url('/profile/postProfile#edit_fee')}}"><i class="material-icons">credit_card</i> Honorarios</a></li>
                <li><a href="#!"><i class="material-icons">assignment</i> Historial de Pagos</a></li>
                @else
                <li><a><i class="material-icons">chat</i>Mensajes</a></li>
                <li><a href="#!"><i class="material-icons">folder</i>Reservaciones</a></li>
                <li><a href="{{url('/profile/post')}}"><i class="material-icons">add</i>Publicar Perfil Profesional</a></li>
                @endif
                @else
                <li class="active"><a href="{{url('/home')}}"><i class="material-icons">home</i>Inicio</a></li>
                <li><a class="modal-trigger" href="#modal1"><i class="material-icons">account_circle</i>Ingresar</a></li>
                <li><a href="{{url('/register')}}"><i class="ion-android-create"></i>Regístrate</a></li>
                <li><a href="{{url('/profile/post/')}}"><i class="material-icons">add</i>Publicar Perfil</a></li>
                @endif
                <li>
                    <div class="divider"></div>
                </li>
                @if(auth::check()) 
                <li><a href="{{url('/myaccount')}}"><i class="material-icons">settings</i>Mi Cuentas</a></li>
                <li><a href="{{url('logout')}}"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
                @endif
                <li><a href="#!"><i class="material-icons">phone</i>Contacto</a></li>
                <li><a href="#!"><i class="material-icons">help_outline</i>Término y Condiciones</a></li>
            </ul>
        </div>
</nav>
<script type="text/javascript">
$(function() {
    $("#buscador").validate({
        errorPlacement: function (error, element) {
            return false;
        },
        rules: {
          searchText: "required",
          city: "required",
        },
        messages: {
            firstname: "Please enter any search keyword",
            lastname: "Please select any city"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
function confirmLogout(){
     if(confirm('Are you sure you want to logout?') == true)
     {
       $.ajax(
        {
            url: "/logout",
            type: 'GET',
            success: function (data)
            {
               window.location = "/home";
            }
        });
      }
      else
      {
          event.preventDefault();
          return false;
      }   

      

} 
</script>