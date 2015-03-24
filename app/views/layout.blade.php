@extends("skeleton")
@section("skeleton")



    <!-- if there are creation errors, they will show here -->
    @if ($errors->all())
      <div class="alert alert-danger" role="alert">
        {{ HTML::ul($errors->all()) }}
      </div>
    @endif

    <!-- will be used to show any messages -->
    @if (Session::has('success'))
      <div class="alert alert-success" role="alert">{{ Session::get('success') }} :)</div>
    @endif

    @if (Session::has('error'))
      <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }} :(
      </div>
    @endif

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div id="meenus">
      <header>
        <div id="logo">
          <a href="index.html">
            <img src="images/amparo.png" alt="">
            <h1 id="fundacion-logo">FUNDACIÓN AMPARO</h1>
          </a>
          <div>
                      <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
        </div>
        <div id="section_menu" class="pull">
        
        <nav id="menu_principal">
          <ul id="menu_uno">
            <li><a href="fundacion_como_ayudar.html">Como ayudar</a></li>
            <li><a href="fundacion_amparo_causas.html">Causas vivas</a></li>
            <li><a href="fundacion_usuarios.html">Donadores</a></li>
            <li><a href="fundacion_muro.html">Muro del Éxito</a></li>
          </ul>
          <ul id="menu_dos">
            <li><a href="fundacion01_e.html">La Fundación</a></li>
            <li><a href="fundacion_apoyamos_causa.html">Apoyamos tu causa</a></li>
            <li><a href="fundacion_noticias.html">Noticias</a></li>
            <li><a href="fundacion_faqs.html">Faq´s</a></li>
            <li><a href="fundacion_contacto.html">Contacto</a></li>
          </ul>
        </nav>
          <button id="btn_dona">DONAR</button>
          <div id="perfil">
            <img src="images/monito.jpg" alt=""/>
          </div>
        </div>
      </header> 
      <div id="conteo_donadores" >
        <div id="int_contado">
          <img src="images/icon_donadores.png" alt="">
          <h2>249,863</h2>
          <h3>Donadores <span>#TomandoAcciónFA</span></h3>
        </div>
        <div id="int_busc">
          <input type="text" placeholder="Buscar">
          <button class="fa fa-search busc"></button>
        </div>
      </div>
    </div>
      <section id="Contenedor">

            @yield("content")
      </section>

      <footer>
        <div id="in_footer">
          <nav id="footer_nav">
            <ul>
              <a href=""><li class="fa fa-facebook"></li></a>
              <a href=""><li class="fa fa-twitter"></li></a>
              <a href=""><li class="fa fa-youtube"></li></a>
              <a href=""><li class="fa fa-instagram"></li></a>

            </ul>
          </nav>
          <div id="terminos_footer">
            <img src="images/logo_footer.png" alt="">
            <h1>TÉRMINOS Y  CONDICIONES   |   POLÍTICAS DE PRIVACIDAD <br /><span>© TODOS LOS DERECHOS RESERVADOS POR FUNDACIÓN AMPARO 2014 </span></h1>
          </div>
          <div id="logo_3indesign">
            <a href="http://3indesign.com/" target="_blank"><img src="images/3indesign_footer.png" alt=""></a>
          </div>
        </div>
        <div id="plc_blck">
          
        </div>
      </footer>




@stop