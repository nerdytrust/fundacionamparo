		$(function(){
		    $("#voluntario_sec, #fca-v").click(function(){
		        $("#naranja1").slideToggle("slow");
		    });

		    $("#donativo, #btn_dona, #donador_sec, #btn_donar2, #fca-d").click(function(){
		        $("#verde1").slideToggle("slow");
		    });
		    $("#impulsor_sec, #fca-i").click(function(){
		        $("#azul1").slideToggle("slow");
		    });
		    $(".txt_int").click(function(){
		        $("#blanco1").slideToggle("slow");
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
