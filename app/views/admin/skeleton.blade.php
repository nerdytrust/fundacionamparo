<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <base href="{{ asset("") }}">
        <title> ADMIN :: {{ getenv('APP_TITLE') }}</title>
        <meta charset="utf-8">
        
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/stylus.css') }}">

        <script src="{{ asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>

    </head>
    <body class="@yield('class')">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        @yield("skeleton")

        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        -->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>


        <script src="{{ asset('js/jquery.plugin.min.js') }}"></script>

        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/js-webshim/minified/polyfiller.js') }}"></script>

        <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
        
        <script src="{{ asset('js/bootstrap-confirmation.js') }}"></script>
        <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>

        <script src="{{ asset('js/bootstrap-combobox.js') }}"></script>

        <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

       
        <script src="{{ asset('js/moment-with-locales.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

        <script src="{{ asset('js/bootstrap-scrollertab.js') }}"></script>


        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script>

        $(function () { 

            // money format
                webshims.setOptions('forms-ext', {
                    replaceUI: 'auto',
                    types: 'number'
                });
                webshims.polyfill('forms forms-ext');

            // tabs
            // http://jsfiddle.net/adrienne/La2765jn/

            $('[data-toggle="tabajax"]').click(function(e) {
                var $this = $(this),
                    loadurl = $this.attr('href'),
                    targ = $this.attr('data-target');

                $.get(loadurl, function(data) {
                    $(targ).html(data);
                });

                $this.tab('show');
                return false;
            });

            // load first tab content
            $('.nav-tabs .active a').trigger("click")



            // dates

            $('.datetime').datetimepicker({
                format: "YYYY-MM-DD HH:mm:ss",
                sideBySide:true,
                collapse:true
            });

            $('.date').datetimepicker({
                format: "YYYY-MM-DD",
                collapse:true
            });

            $('.time').datetimepicker({
                format: "HH:mm:ss",
                collapse:true
            });


            $('[data-toggle="confirmation"]').confirmation({
                onConfirm: function(event, element){
                    $(element).closest("form").submit();
                }
            });

            // Show errors at validate
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

            $('.combobox').combobox();

            $(".switch").bootstrapSwitch();


            $(".combo").change(function()
            {
                var $id_parent = $(this).val();
                $(".combo-table").removeClass("hidden");

                $(".combo-table").find("[opt-id-parent]").addClass("hidden");
                $(".combo-table").find("[opt-id-parent='"+$id_parent+"']").removeClass("hidden");

            });


            $('.combo-table .switch').on('switchChange.bootstrapSwitch', function(event, deny) {

                var $me                     = $(this),
                    $id_permissions         = $me.attr("opt-id-permissions"),
                    $id_permissions_roles   = $me.attr("opt-id-permissions-roles"),
                    $id_roles               = $me.attr("opt-id-roles"),
                    $id_permissions_users   = $me.attr("opt-id-permissions-users"),
                    $id_users               = $me.attr("opt-id-users");


                if($id_users)
                {

                    if($id_permissions_users)
                    {

                            $.ajax({
                              headers: { 'X-CSRF-Token' : "{{ csrf_token() }}" },  
                              type: "POST", 
                              url: "./permissions_user/"+$id_permissions_users,
                              data : { _method:"PUT", id_permissions_users:$id_permissions_users, id_permissions: $id_permissions, id_users: $id_users, deny: deny } 
                            })
                            .done(function(msg) {
                              var json = jQuery.parseJSON( msg );

                              $(".combo-msg").html('<div class="alert alert-'+( json.success ? "success" : "danger" )+'" role="alert"> '+ json.msg + ' ' +( json.success ? ":)" : ":(" )+' </div>');
                            });

                    }else 
                    {

                        $.ajax({
                          headers: { 'X-CSRF-Token' : "{{ csrf_token() }}" },  
                          type: "POST", 
                          url: "./permissions_user",
                          data : { id_permissions: $id_permissions, id_users: $id_users, deny: deny } 
                        })
                        .done(function(msg) {
                          var json = jQuery.parseJSON( msg );

                          if(json.success)
                            $me.attr("opt-id-permissions-users",json.id);

                          $(".combo-msg").html('<div class="alert alert-'+( json.success ? "success" : "danger" )+'" role="alert"> '+ json.msg + ' ' +( json.success ? ":)" : ":(" )+' </div>');
                        });
                        

                    }

                }else if($id_roles)
                {
                    if(deny)
                    {
                        $.ajax({
                          headers: { 'X-CSRF-Token' : "{{ csrf_token() }}" },  
                          type: "POST", 
                          url: "./permissions_role",
                          data : { id_permissions: $id_permissions, id_roles: $id_roles, deny: deny } 
                        })
                        .done(function(msg) {
                          var json = jQuery.parseJSON( msg );

                          if(json.success)
                            $me.attr("opt-id-permissions-roles",json.id);

                          $(".combo-msg").html('<div class="alert alert-'+( json.success ? "success" : "danger" )+'" role="alert"> '+ json.msg + ' ' +( json.success ? ":)" : ":(" )+' </div>');
                        });

                    }else {


                        $.ajax({
                          headers: { 'X-CSRF-Token' : "{{ csrf_token() }}" },  
                          type: "POST", 
                          url: "./permissions_role/"+$id_permissions_roles,
                          data : { _method:"DELETE" } 
                        })
                        .done(function(msg) {
                          var json = jQuery.parseJSON( msg );
                          $(".combo-msg").html('<div class="alert alert-'+( json.success ? "success" : "danger" )+'" role="alert"> '+ json.msg + ' ' +( json.success ? ":)" : ":(" )+' </div>');
                        });
                    }  
                }





            });

        });
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>


    </body>
</html>