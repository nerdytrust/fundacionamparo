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
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        @if(!isset($css))
            <link rel="stylesheet" href="{{ asset('css/public.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/cmb.css') }}">    
        @endif

        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>

    </head>
    <body class="@yield('class')">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        @yield("skeleton")
        

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                </div><!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <?php 

            $js =  [
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

                    '/js/admin/permissions.js'

                    ]; 
        ?>
        {{ Minify::javascript($js,['js_build_path'=>'js/']) }}





    </body>
</html>