$(function(){
    $("#voluntario_sec, #fca-v").click(function(){
        $("#naranja1").slideToggle("slow");
    });

    $("#donativo, #btn_dona, #btn_donar2").click(function(){
        $("#verde1").slideToggle("slow");
    });
     $("#donador_sec").click(function(){
        $("#verdeimagen").slideToggle("slow");
    });
    $("#impulsor_sec, #fca-i").click(function(){
        $("#azul1").slideToggle("slow");
    });
    $(".txt_int").click(function(){
        $("#blanco1").slideToggle("slow");
        return false;
    });
    $(".caja_fca_usu, #txt_noticia h3, #txt_evento").click(function(){
        $(".lightbox").slideToggle("slow");
    });
});

$(function(){
    $(".cerrar-h, .cerrar").click(function(){
        $(".lightbox-h, .lightbox").fadeOut("slow");
    });
});
