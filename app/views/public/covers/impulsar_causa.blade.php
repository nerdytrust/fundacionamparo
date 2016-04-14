<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( "public.covers.layout" )
	@section("class")impulsar-causa
	@stop
	@section("content")
		<div class="lightbox-h i" id="azul1">
			<div class="lightbox-h-cont imp">
				<img src="{{ asset( 'images/icon_donadores-v.png' ) }}" alt="">
				<h1>impulsar</h1>
				<p>Lleguemos a más oídos y toquemos más corazones en una sola voz</p>
				<!--<button class="cerrar-h"></button>-->
				<button onClick="location.href='{{ URL::to( '/ficha-causas/'.$causa->id_causas.'/'.Str::slug($causa->titulo) );}}'" class="regresar"> Regresar</button>
				<div class="imagen">
					<img src="{{ asset( 'path_image/' . $causa->imagen . '/' . '282x280' ) }}" alt="">
						<button>{{ $causa->id_categorias_record->nombre }}</button>
						<p>{{ $causa->titulo }}</p>
				</div>
				</br>
				<div class="check-azul">
					<input type="checkbox" value="None" id="check-azul" name="check" />
					<label for="check-azul"></label>
					No mostrar mi perfil en el sitio
				</div>
				<button class="feis"> 
         @if ( Helper::getRegisterIsFB() )
            {{ Helper::facebookShareImpulsor( '<div id="invitar">Comparte</div>', URL::to( '/ficha-causas/'.$causa->id_causas.'/'.Str::slug($causa->titulo).'/'.Helper::getRegisterId() ),  URL::to( '/gracias-3/'.$causa->id_causas.'/'.Helper::getRegisterId() ),'' ) }}   
          @else
            <div id="invitar" onclick="location.href='{{ URL::to( '/fb-impulsar-causa/'.$causa->id_causas ) }}';">Entra con FaceBook</div>
          @endif
        </button> 
				<a href="{{ URL::to( '/faqs' ) }}" target="_blank" class="help">Si necesitas ayuda da click aquí<img src="{{ asset( 'images/i.png' ) }}" alt=""></a>			
			</div>	
		</div>
		<script type="text/javascript">

		window.fbAsyncInit = function() {
        FB.init({
          appId      : '776167932490026',
          xfbml      : true,
          cookie: true,
          oauth: true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));


		function renderMFS() {
		FB.ui({
      method: 'share',
      href: 'http://design4causes.com/ficha-causas/1',
    }, function(response){
    	console.log(response);
    });



/*FB.ui({
  method: 'feed',
  link: 'http://amparo.design4causes.com/impulsar-causa/1',
  caption: 'An example caption',
}, function(response){

	console.log(response);
});*/

/*FB.api(
    "/100006469513247/tagged",
    function (response) {
     console.log(response);
    }
);*/

/*FB.api(
    "/100006469513247/taggable_friends?fields=email,id,name,picture.type(large)",
    function (response) {
     console.log(response);
    }
);*/

/*FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    var accessToken = response.authResponse.accessToken;
    console.log(accessToken);
  } else{
    console.log('error');
  }
} );*/

/*FB.api(
    "/1877310539161245_1889226601302972/likes",
    function (response) {
      console.log(response);
    }
);*/

/*FB.api(
    "/me/friends?fields=email",
    function (response) {
     console.log(response);
    }
);*/

/*FB.ui({
  method: 'send',
  link: 'http://amparo.design4causes.com/ficha-causas/1',
  function (response) {
      console.log(response);
    }
});*/


/*FB.api(
    "/100006469513247/friends",
    function (response) {
      console.log(response);
    }
);*/


		}

		</script>
	@stop
@stop