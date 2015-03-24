    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="#"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <li>
              <button type="button" class="navbar-toggle show" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </li>

            <li><a href="">Inicio</a></li>
            <li>{{ HTML::link('./admin/causas', 'Causas')}}</li>
            <li>{{ HTML::link('./admin/donadores', 'Donadores')}}</li>
            <li>{{ HTML::link('./admin/noticias', 'Noticias')}}</li>
            <li>{{ HTML::link('./admin/eventos', 'Eventos')}}</li>
            <li>{{ HTML::link('./admin/faq', 'FAQ')}}</li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Formularios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{{ HTML::link('./admin/contacto', 'Contacto')}}</li>
                <li>{{ HTML::link('./admin/unete_nosotros', 'Únete a nosotros')}}</li>
                <li>{{ HTML::link('./admin/apoyamos_causa', 'Apoyamos tu causa')}}</li>
              </ul>
            </li>
          </ul>


          <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li>{{ HTML::link('users','Usuarios') }}</li>
                    <li>{{ HTML::link('roles','Roles') }}</li>

                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    {{ Auth::getUser()->first_name }} {{ Auth::getUser()->last_name }}
                    <!-- <span class="caret"></span> -->
                  </a>
                  <ul class="dropdown-menu" role="menu">
<!--                     <li> {{ HTML::link('/profile','My profile') }} </li>
                    
                    <li class="divider"></li> -->
                    
                    <li> {{ HTML::link('/logout','Salir') }}</li>

                  </ul>
                </li>

          </ul>

        </div><!--/.navbar-collapse -->
      </div>
    </div>