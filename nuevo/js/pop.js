		$(function(){
		    $("#voluntario_sec, #fca-v").click(function(){
		        $("#naranja1").show("slow");
		    });

		    $("#donativo, #btn_dona, #donador_sec, #btn_donar2, #fca-d").click(function(){
		        $("#verde1").show("slow");
		    });
		    $("#impulsor_sec, #fca-i").click(function(){
		        $("#azul1").show("slow");
		    });
		    $(".txt_int").click(function(){
		        $("#blanco1").show("slow");
		    });
		    $(".caja_fca_usu, #txt_noticia h3, #txt_evento").click(function(){
		        $(".lightbox").show("slow");
		    });
		});

		$(function(){
		    $(".cerrar-h, .cerrar").click(function(){
		        $(".lightbox-h, .lightbox").fadeOut("slow");
			    });
			});
