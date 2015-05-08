<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <base href="{{ asset("") }}">
        <title>{{ getenv('APP_TITLE') }}</title>
        <meta charset="utf-8">
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        @if(!isset($css))
            <link rel="stylesheet" href="{{ asset('css/public.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/cmb.css') }}">    
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

    </head>
    <body class="@yield('class')">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="animsition">
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
                '/js/public/video.js'
            ];
        ?>
        {{ Minify::javascript($js,['js_build_path'=>'js/']) }}
        @if ( isset( $timeline ) )
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/headjs/1.0.3/head.core.min.js"></script>
            <script type="text/javascript">     
                $(function(){
                    //$(".animsition").animsition();

                    citrussized();

                    $('#main_time .carousel-inner .item a').click(function(e){
                        e.preventDefault();
                        $('#main_time').hide().fadeOut(200, "swing", function(){
                            $('#moments_time').fadeIn(800);
                        });
                    });

                    $('#moments_time .btn-cerrar').click(function(e){
                        e.preventDefault();
                        $('#moments_time').hide().fadeOut(200, "swing", function(){
                            $('#main_time').fadeIn(800);    
                        });
                    })
                });

                $(window).bind("pageshow", function(event) {
                    if (event.originalEvent.persisted) {
                        location.reload();
                    }
                });

                function citrussized(){
                    var ratio = $(window).width() / $(window).height();
                    /*var _ratio = ( Math.abs(ratio - 4 / 3 ) < Math.abs( ratio - 16 / 9 ) ) ? '4:3' : '16:9';*/
                    var title = 48;
                    var subtitle = 33;
                    var description = 16.5;
                    var left = 0;
                    var height = $(window).height();
                    var percent = height / 768;
                    var newtitle = Math.floor( title * percent ) - 1;
                    var newsubtitle = Math.floor( subtitle * percent ) - 1;
                    var newdescription = Math.floor( description * percent ) - 1;
                    if ( Math.abs( ratio - 4 / 3 ) < Math.abs( ratio - 16 / 9 ) ){
                        left = ( Math.abs( ratio - 4 / 3 ) * 100 ) * 9;
                    }

                    if ( $('html').hasClass('w-320') || $('html').hasClass('w-360') || $('html').hasClass('w-412') || 
                        $('html').hasClass('w-480') || $('html').hasClass('w-600') || $('html').hasClass('w-640') || 
                        $('html').hasClass('w-690') || $('html').hasClass('w-768') || $('html').hasClass('w-800') ||
                        $('html').hasClass('w-960') || $('html').hasClass('w-1024') || $('html').hasClass('w-1280') ||
                        $('html').hasClass('w-1366') || $('html').hasClass('w-1440') ){
                    } else {
                        $('.slide_container .slide img').css({
                            'height': ( parseInt( $(window).height() ) - $('#meenus').height() ) + 'px',
                            'max-width': 'none',
                            'width': $(window).width() + left + 'px'
                        });

                        $('.moment-description h1').css({'font-size': newtitle });
                        $('.moment-description h2').css({'font-size': newsubtitle });
                        $('.moment-description p').css({'font-size': newdescription });
                        $('.moment-description a').css({'font-size': newdescription });
                    }

                    $(window).resize(function(){
                        var ratio = $(window).width() / $(window).height();
                        var title = 48;
                        var subtitle = 33;
                        var description = 16.5;
                        var height = $(window).height();
                        var percent = height / 768;
                        var newtitle = Math.floor( title * percent ) - 1;
                        var newsubtitle = Math.floor( subtitle * percent ) - 1;
                        var newdescription = Math.floor( description * percent ) - 1;
                        /*var _ratio = ( Math.abs(ratio - 4 / 3 ) < Math.abs( ratio - 16 / 9 ) ) ? '4:3' : '16:9';*/
                        var left = 0;
                        if ( Math.abs( ratio - 4 / 3 ) < Math.abs( ratio - 16 / 9 ) ){
                            left = ( Math.abs( ratio - 4 / 3 ) * 100 ) * 9;
                        }

                        if ( $('html').hasClass('w-320') || $('html').hasClass('w-360') || $('html').hasClass('w-412') || 
                            $('html').hasClass('w-480') || $('html').hasClass('w-600') || $('html').hasClass('w-640') || 
                            $('html').hasClass('w-690') || $('html').hasClass('w-768') || $('html').hasClass('w-800') ||
                            $('html').hasClass('w-960') || $('html').hasClass('w-1024') || $('html').hasClass('w-1280') ||
                            $('html').hasClass('w-1366') || $('html').hasClass('w-1440') ){
                        } else {
                            $('.slide_container .slide img').css({
                                'height': ( parseInt( $(window).height() ) - $('#meenus').height() ) + 'px',
                                'max-width': 'none',
                                'width': $(window).width() + left + 'px'
                            });

                            $('.moment-description h1').css({'font-size': newtitle });
                            $('.moment-description h2').css({'font-size': newsubtitle });
                            $('.moment-description p').css({'font-size': newdescription });
                            $('.moment-description a').css({'font-size': newdescription });
                        }
                    });
                }
            </script>
        @endif
        <script type="text/javascript">
            $(document).ready(function(){
                if ( $('body').hasClass( 'donar' ) || $('body').hasClass( 'donar-causas' ) || $('body').hasClass( 'entrar' ) || $('body').hasClass( 'registro' ) ){
                    $('body').css({
                        'background': '#beda3e'
                    });
                } else if ( $('body').hasClass( 'impulsar' ) ){
                    $('body').css({
                        'background': '#4f99d9'
                    });
                } else if ( $('body').hasClass( 'voluntario' ) ){
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