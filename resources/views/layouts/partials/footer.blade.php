  <!-- FAQ button -->
        <!--   <div class="fixed-action-btn">
            <a class="btn_question btn-floating btn-large waves-effect ">
                <i class="ion-help"></i>
            </a>
        </div>-->
<!-- heren ends FAQ button -->
<!--     <div class="container"> -->
        <div class="app row">
           <div class="container">
            <div class="col s12 m6 l6">
                <div class="descarga-app center">
                    <h5 class="bold-text">¡Descarga SaludVitale en tu celular!</h5>
                    <img class="responsive-img" src="{{asset('/images/googleplay.png') }}">
                    <img class="responsive-img" src="{{asset ('/images/appstore.png') }}">
                </div>
            </div>
            <div class="center col s12 m6 l6">
                <img class=" responsive-img" src="{{asset ('/images/telephone2.png') }}">
            </div>
            </div>
        </div>
 <!--    </div> -->
<!-- Main Footer -->
	<footer class="footer page-footer">
        <div class="container">
            <div class="row">
                <div class="list-footer col l4 m4 s12">
                    <ul class="li-footer">
                        <li><a class="bold-text" href="{{url('/')}}">SaludVitale.com</a></li>
                        <li><a href="{{url('sobreNosotros')}}">Acerca de Nosotros</a></li>
                        <li><a href="{{url('contacto')}}">Contáctanos</a></li>
                        <li><a href="{{url('preguntasFrecuentes')}}">Preguntas Frecuentes</a></li>
                        <li><a href="{{url('terminos-legales')}}">Términos Legales</a></li>
                    </ul>
                </div>
                <div class=" list-footer col l4 m4 s12">
                    <ul class="li-footer">
                        <li><a class="bold-text white-text">Aplicaciones Moviles</a></li>
                        <li><a href="#!">Google Play</a></li>
                        <li><a href="#!">App Store</a></li>
                    </ul>
                </div>
                <div class="list-footer col l4 m4 s12">
                    <p class="bold-text white-text">Redes Sociales</p>
                    <ul class="redes-sociales">
                        <li>
                            <a class="grey-text text-lighten-3 m-right-5" href="#!"><img class="responsive-img" src="{{asset('/images/facebook.png')}}"></a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3 m-right-5" href="#!"><img class="responsive-img" src="{{asset('/images/instagram.png')}}"></a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3 m-right-5" href="#!"><img class="responsive-img" src="{{asset('/images/twitter.png')}}"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2017 Desarrollado por <a href="#">PixSolution</a>
               <!--<a class="grey-text text-lighten-4 right" href="#!">More Links</a>-->
            </div>
        </div>
    </footer>
     <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <div class="row">
                	<div id="validation-errors" class="m-top-10"></div>
                    <form class="col s12" method="POST" action="{{ url('/login')}}" id="ajax-form" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="subscription_type" id="subscription-plan-modal" value="">
                    <input type="hidden" name="subscription_price" id="subscription-price-modal" value="">
                    <input type="hidden" id="redirect_to" value="0">
                      <div class="row">
                            <div class="col s12">
                                <h4 class="title-blue">Entrar</h4>
                            </div>
                         
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mail_outline</i>
                                <input type="email"  id="exampleInputEmail1" name="email" class="validate">
                                <label for="icon_prefix">Correo Electronico</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input type="password"  id="exampleInputPassword1" name="password" class="validate">
                                <label for="icon_telephone">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <a class="center">
                                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" name="remember"  />
                                    <label for="filled-in-box">Recordarme</label>
                                </a>
                            </div>
                            <div class="col s6">
                                <a class="recovery-pass right" href="{{ url('/user/password/reset') }}">
                                    ¿Has olvidado tu Contraseña?
                                </a>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="center">
                                <button class="center btn-registration btn waves-effect waves-light" type="submit" name="action">Entrar</button>
                            </div>
                        </div>
                    </form>
                    <div class="center col s12">
                        <p>¿Eres nuevo en SaludVitale?</p>
                        <a class="registrate" href="{{url('/register')}}">Regístrate</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Cerrar</a>
            </div>
        </div>  
        {{-- modal de especialidades--}}
        <div id="modal_especialidad" class="modal modal-pequeño">
        <div class="center modal-content">
        <h5>BUSCAR POR ESPECIALIDAD</h5>
        <img class="responsive-img" src="../images/corazon.png" width="80px">
        <ul id="especialModal">
        
         
        </ul>
        </div>
        <div class="modal-footer"><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a></div>
    </div>

    {{-- modal de ciudades--}}

<div id="modal_ciudad" class="modal modal-pequeño">
        <div class="center modal-content">
        <h5>BUSCAR POR CIUDAD</h5>
        <img class="responsive-img" src="../images/location.png" width="80px">
        <ul id="ciudadModal">
          
        </ul>
        </div>
        <div class="modal-footer"><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a></div>
    </div>
