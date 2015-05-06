        $(function () { 


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