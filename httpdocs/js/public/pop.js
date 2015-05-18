		$(function(){
			$("#icon, .icon").click(function(){
				window.location="faqs"
			})
			/*$("#donativo, #btn_dona, #btn_donar2, .circulo_btn, #cauf-d").click(function(){
				  window.location = 'donar.html';
			});*/

			$("#cauf-d").click(function(){
				  window.location = 'donar-causas';
			});
			$("#donador_sec, #btn_dona, #btn_donar2, .circulo_btn").click(function(){
				  window.location = 'donar';
			});
			$("#ac").click(function(){
				window.location = 'donar-2';
			});
			$("#ac2").click(function(){
				window.location = 'gracias';
			});
			$("#fca-i").click(function(){
				window.location = 'impulsar';
			});

			$('#impulsor_sec').click(function(){
				window.location = 'impulsar';
			});

			$("#cauf-i").click(function(){
				window.location = 'impulsar-causa';
			});

			// $("#impulsor_sec, #cauf-i").click(function(){
			// 	window.location = 'impulsar-causa';
			// });

			$("#voluntario_sec, #fca-v, #cauf-v").click(function(){
				window.location = 'voluntario';
			});
			// $(".txt_int, #causa1, #causa2, #causa3, #causa4").click(function(){
			// 	window.location = 'ficha-causas';//este lleva a las fichas pero ya externas
			// 	return false;
			// });
			$(".caja_fca_usu, #txt_evento, .donador_clas, .impulsor_clas, .voluntario_clas").click(function(){
				window.location = 'ficha-donador';//este lleva a las fichas pero ya externas
				return false;
			}); 
			$(".caja_fca2, #txt_noticia h1, #txt_noticia h3").click(function(){
				window.location = 'ficha-noticias';//este lleva a las fichas pero ya externas
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