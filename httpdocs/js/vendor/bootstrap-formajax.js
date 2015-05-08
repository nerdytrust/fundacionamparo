function FormAjax(callback)
{
    
    var me = this;
    me.callback = callback;

    $("form[data-async] .cancel").click(function(event){
        event.preventDefault();
        var $me = $(this);

        $('#modal').modal('hide');
    });

    $('form[data-async]').on('submit', function(event) {
        
        var $form = $(this);

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                me.callback(data);
                
            }
        });

        return false;
    });
}