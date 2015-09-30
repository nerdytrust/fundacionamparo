<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        <base href="{{ asset("") }}">
        <title>{{ getenv('APP_TITLE') }}</title>
        <meta charset="utf-8">
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Language" content="es"/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <link rel="apple-touch-icon-precomposed" href="{{ asset( 'images/favicon-152.png' ) }}">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="{{ asset( 'images/favicon-144.png' ) }}">
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ asset( 'images/favicon-152.png' ) }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset( 'images/favicon-144.png' ) }}">
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ asset( 'images/favicon-120.png' ) }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset( 'images/favicon-114.png' ) }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset( 'images/favicon-72.png' ) }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset( 'images/favicon-57.png' ) }}">
        <link rel="icon" href="{{ asset( 'images/favicon-32.png" sizes="32x32' ) }}">
        @if ( ! isset( $css ) )
            {{-- <link rel="stylesheet" href="{{ asset('css/public.css') }}"> --}}
        @else
            {{-- <link rel="stylesheet" href="{{ asset('css/cmb.css') }}">     --}}
        @endif
        <link rel="stylesheet" href="{{ asset('css/public/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/public/pop.css') }}">
        <link rel="stylesheet" href="{{ asset('css/public/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/public/tabs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/public/animsition.min.css') }}">
        <link href="{{ asset( 'css/public/video-js.css' ) }}" rel="stylesheet" type="text/css">
        @if ( isset( $timeline ) )
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{ asset( 'css/public/timeline.css' ) }}">
        @endif
        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
        <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
    </head>
    <body class="@yield('class')">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="animsition">
            <div id="foo"></div>
            @yield("skeleton")
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div><!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <?php 
            /*$js =  [
                '/js/vendor/jquery-1.9.1.min.js',
                '/js/vendor/jquery.plugin.min.js',
                '/js/vendor/bootstrap.min.js',
                '/js/vendor/js-webshim/minified/polyfiller.js',
                '/js/vendor/jasny-bootstrap.min.js',
                '/js/vendor/bootstrap-confirmation.js',
                '/js/vendor/bootstrap-combobox.js',
                '/js/vendor/bootstrap-switch.min.js',
                '/js/vendor/moment-with-locales.js',
                '/js/vendor/bootstrap-datetimepicker.js',
                '/js/vendor/bootstrap-scrollertab.js',
                '/js/vendor/plugins.js',
                '/js/vendor/main.js',
                '/js/admin/permissions.js',
                '/js/vendor/jquery.animsition.min.js'
            ];*/
            $js = [
                '/js/public/jquery.min.js',
                '/js/public/jquery.animsition.min.js',
                '/js/public/nav.js',
                '/js/public/pop.js',
                '/js/public/script.js',
                '/js/public/complements.js',
                '/js/public/video.js',
                '/js/public/spin.min.js',
                '/js/public/jquery.timeline.js',
                '/js/public/froogaloop.js',
                '/js/public/jquery.fitvid.js',
                '/js/public/jquery.form.min.js'
            ];
        ?>
        {{ Minify::javascript($js,['js_build_path'=>'js/']) }}
        <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.0/js/conekta.js"></script>
        <script type="text/javascript" src="{{ asset( 'js/public/nice.scripts.js' ) }}"></script>
        @if ( isset( $timeline ) )
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/headjs/1.0.3/head.core.min.js"></script>
            <script type="text/javascript">
                $(window).load(function(){
                    $(".flexslider").fitVids().flexslider({
                        animation: "slide",
                        useCSS: false,
                        animationLoop: false,
                        //manualControls: ".flex-control-nav li",
                        smoothHeight: true,
                        start: function(slider){
                            $('body').removeClass('loading');
                        },
                        before: function(slider){
                            //$f(player).api('pause');
                        }
                    });

                    $('#momento a').click(function(e){
                        e.preventDefault();
                        
                        var moment = $(this).attr('id');
                        
                        $.post( "{{ URL::to( 'ajax-moments' ) }}", { moment: moment }, function(data){
                            if ( data != false ){
                                $('#moments_time').html(data);
                                //coverImg();
                                $('#main_time').fadeOut(1000, "linear", function(){
                                   $(".flexslider").fitVids().flexslider({
                                        animation: "slide",
                                        useCSS: false,
                                        animationLoop: false,
                                        directionNav: false,
                                        //manualControls: ".flex-control-nav",
                                        smoothHeight: true,
                                        start: function(slider){
                                            $('body').removeClass('loading');
                                        },
                                        before: function(slider){
                                            //$f(player).api('pause');
                                        }
                                    });
                                    $('#moments_time').fadeIn(2800);
                                     $('[data-toggle="tooltip"]').tooltip();   
                                });
                            }
                        });
                    });
                });
            </script>
            
        @endif
        <script type="text/javascript">
            $(document).ready(function(){
                if ( $('body').hasClass( 'donar' ) 
                    || $('body').hasClass( 'donar-causa' ) 
                    || $('body').hasClass( 'entrar' )
                    || $('body').hasClass( 'salir' ) 
                    || $('body').hasClass( 'registro' ) 
                    || $('body').hasClass( 'recuperar-contrasena' )
                    || $('body').hasClass( 'donar-step-two' ) 
                    || $('body').hasClass( 'donar-gracias' )
                    || $('body').hasClass( 'donar-error' )  
                    || $('body').hasClass( 'donar-spei' ) 
                    || $('body').hasClass( 'donar-oxxo' ) 
                    || $('body').hasClass( 'donar-paypal' ) ){
                    $('body').css({
                        'background': '#beda3e'
                    });
                } else if ( $('body').hasClass( 'impulsar' ) || $('body').hasClass( 'impulsar-causa' ) || $('body').hasClass( 'gracias-impulsar' )){
                    $('body').css({
                        'background': '#4f99d9'
                    });
                } else if ( $('body').hasClass( 'voluntario' ) || $('body').hasClass( 'gracias-voluntario' ) ){
                    $('body').css({
                        'background': '#ffa93c'
                    });
                } else if ( $('body').hasClass( 'ficha-causas' ) ){
                    $(".ficha-causas .lightbox .datos").hover(function(){
                        $("#barra progress").toggleClass("barramover");
                    });
                }
            });
        </script>
    </body>
</html>