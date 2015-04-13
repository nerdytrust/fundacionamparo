		$(function(){
		    $("#voluntario_sec, #fca-v").click(function(){
		        $("#naranja1").slideToggle("slow");
		    });

		   /* $("#donativo, #btn_dona, #btn_donar2").click(function(){
		        $("#verde1").slideToggle("slow");
		    });
			$("#donador_sec").click(function(){
		        $("#verdeimagen").slideToggle("slow");
		    });*/
			$("#donativo, #btn_dona, #btn_donar2, .circulo_btn").click(function(){
				  window.location = 'verde1.html';
			});
			$("#donador_sec").click(function(){
				  window.location = 'verdePago.html';
			});
			$("#ac").click(function(){
				window.location = 'verdepago2.html';
			});
			$("#ac2").click(function(){
				window.location = 'verde3.html';
			});
		     
		    $("#impulsor_sec, #fca-i").click(function(){
		        $("#azul1").slideToggle("slow");
		    });
		    $(".txt_int, #causa1, #causa2, #causa3, #causa4").click(function(){
		        $("#blanco1").slideToggle("slow");
		        return false;
		    });
		    $(".caja_fca2, #txt_noticia h1, .caja_fca_usu, #txt_noticia h3, #txt_evento").click(function(){
		        $(".lightbox").slideToggle("slow");
		    });
		    
			$("#tab-2").click(function(){
				$("#ski").addClass("mover-ski");
			});
			$("#tab-1").click(function(){
				$("#ski").removeClass("mover-ski");
			});
		});

		$(function(){
		    $(".cerrar-h, .cerrar").click(function(){
		        $(".lightbox-h, .lightbox").fadeOut("slow");
			    });
			});
