<?php $disable_header = 1; $disable_footer = 1; ?>
@extends( 'public.covers.layout' )ficha-noticias
	@section( 'class' )
	@stop
	@section( 'content' )
		<div class="lightbox" style="display:block;">
			<div class="usuario-light">
				<span class="usuario foto">
					<div id="txt_evento">						
						<nav>
							<ul>
								<a href=""><li class="fa fa-facebook"></li></a>
								<a href=""><li class="fa fa-twitter"></li></a>
								<a href=""><li class="fa fa-heart"></li></a>
								<p>96 likes</p>
							</ul>
						</nav>
					</div>
					<img src="{{ asset( 'images/image-not.png' ) }}" alt="" id="ev-im">	
				</span>
				<span class="datos ev">
					<button value="" class="cerrar" onClick="history.back()"></button>
					<h1>domingos familiares</h1>
						<h2>02 Nov 2014</h2>
					<div class="datos-inf" id="style-4">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil modi nulla libero, rem, consequuntur reiciendis voluptas debitis vel facilis, error dolorem in ut ipsa praesentium laudantium dignissimos, saepe quidem.</p></br>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil modi nulla libero, rem, consequuntur reiciendis voluptas debitis vel facilis, error dolorem in ut ipsa praesentium laudantium dignissimos, saepe quidem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil modi nulla libero, rem, consequuntur reiciendis voluptas debitis vel facilis, error dolorem in ut ipsa praesentium laudantium dignissimos, saepe quidem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil modi nulla libero, rem, consequuntur reiciendis voluptas debitis vel facilis, error dolorem in ut ipsa praesentium laudantium dignissimos, saepe quidem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil modi nulla libero, rem, consequuntur reiciendis voluptas debitis vel facilis, error dolorem in ut ipsa praesentium laudantium dignissimos, saepe quidem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea nihil modi nulla libero, rem, consequuntur reiciendis voluptas debitis vel facilis, error dolorem in ut ipsa praesentium laudantium dignissimos, saepe quidem.</p>
					</div>
				</span>
			</div>
		</div>
	@stop
@stop