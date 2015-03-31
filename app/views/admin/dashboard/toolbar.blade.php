    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">

        <div class="navbar-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li>
              <button type="button" class="navbar-toggle show" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </li>
            <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/',getenv('APP_TITLE'),array('class' => 'navbar-brand')) }}</li>
            <li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/','Home') }}</li>
            
            <li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/causas', 'Causas')}}</li>
            <li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/donadores', 'Donadores')}}</li>
            <li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/noticias', 'Noticias')}}</li>
            <li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/eventos', 'Eventos')}}</li>
            <li class="hidden-xs">{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/faq', 'FAQ')}}</li>
            <li class="dropdown hidden-xs">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Formularios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/contacto', 'Contacto')}}</li>
                <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/unete_nosotros', 'Únete a nosotros')}}</li>
                <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/apoyamos_causa', 'Apoyamos tu causa')}}</li>
              </ul>
            </li>
          </ul>


          <ul class="nav navbar-nav navbar-right hidden-xs">

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/users','Usuarios') }}</li>
                    <li>{{ HTML::link(getenv('APP_ADMIN_PREFIX').'/roles','Roles') }}</li>

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