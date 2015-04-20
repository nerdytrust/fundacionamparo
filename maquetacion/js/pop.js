		$(function(){
			$("#icon, .icon").click(function(){
				window.location="fundacion_faqs.html"
			})
			/*$("#donativo, #btn_dona, #btn_donar2, .circulo_btn, #cauf-d").click(function(){
				  window.location = 'donar.html';
			});*/

			$("#donativo, #cauf-d").click(function(){
				  window.location = 'verdePago.html';
			});
			$("#donador_sec, #btn_dona, #btn_donar2, .circulo_btn").click(function(){
				  window.location = 'donar.html';
			});
			$("#ac").click(function(){
				window.location = 'verdepago2.html';
			});
			$("#ac2").click(function(){
				window.location = 'verde3.html';
			});
			$("#impulsor_sec, #fca-i, #cauf-i").click(function(){
				window.location = 'impulsar.html';
			});
			$("#voluntario_sec, #fca-v, #cauf-v").click(function(){
				window.location = 'voluntario.html';
			});
			$(".txt_int, #causa1, #causa2, #causa3, #causa4").click(function(){
				window.location = 'ficha-donadoreshome.html';//este lleva a las fichas pero ya externas
				return false;
			});
			$(".caja_fca_usu, #txt_evento, .donador_clas, .impulsor_clas, .voluntario_clas").click(function(){
				window.location = 'ficha-donadores.html';//este lleva a las fichas pero ya externas
				return false;
			}); 
			$(".caja_fca2, #txt_noticia h1, #txt_noticia h3").click(function(){
				window.location = 'ficha-noticias.html';//este lleva a las fichas pero ya externas
				return false;
			}); 
			
		    /*$(".txt_int, #causa1, #causa2, #causa3, #causa4").click(function(){
		        $("#blanco1").slideToggle("slow");
		        return false;
		    });
		    $(".caja_fca2, #txt_noticia h1, .caja_fca_usu, #txt_noticia h3, #txt_evento").click(function(){
		        // $(".lightbox").slideToggle("slow");
		        $(".lightbox").fadeIn(800, 'swing', function(){});
		    });*/
		    $("#ultimos_dona .donador_clas").click(function(){
		        $("#ficha-d").slideToggle("slow");
		    });
		     $(" #ultimos_dona .impulsor_clas").click(function(){
		        $("#ficha-d").slideToggle("slow");
		    });
		      $(" #ultimos_dona .voluntario_clas").click(function(){
		        $("#ficha-d").slideToggle("slow");
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
		        // $(".lightbox-h, .lightbox").fadeOut("slow");
		        $(".lightbox-h, .lightbox").fadeOut(800, 'swing', function(){} );
			});
		});


/*$(document).ready(function(){
   var altura = $(window).height();
   var ancho = $(window).width();
   if(ancho<=640){
   		$('.cot-scroll').first().css('height',altura+'px');
   }

});*/