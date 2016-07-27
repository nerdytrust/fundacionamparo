<?php $disable_header = 1; $disable_footer = 1; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body style="font-size: 16px">
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:'Open Sans', sans-serif" width="700px">
		<tr>
			<td>
				<img src="{{ asset( '/images/logo_mail.png') }}" alt="" style="width:80px">
				<h1 style="margin-top:0px;margin-bottom:0px;font-weight:bold;font-size:42px;color:#000;">Fundación <br />Amparo</h1>
				<h2 style="margin-top:0px;color:#beda3e;">#TomadoAcciónFA</h2>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px">
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;">¡Hola! </h2>
				<p style="margin-top:5px;color:#c2c2c2;">Se han registrado para ser voluntario para la causa <strong> {{ $causa }} </strong></p>
			</td>
		</tr>
		<tr>
			<td style="font-size:13px;padding-top:15px;">
				<p style="margin:0; padding:0;">Nombre: <strong>{{ $nombre .' '. $apellidos}}</strong></p>
				<p style="margin:0; padding:0;">Email: <strong>{{ $email }}</strong></p>
				<p style="margin:0; padding:0;">Teléfono: <strong>{{ $telefono }}</strong></p>
				<p style="margin:0; padding:0;">Lugar de Residencia</p>
				<p style="margin:0; padding:0;">Estado: <strong>{{ $estado }}</strong></p>
				<p style="margin:0; padding:0;">Ciudad: <strong>{{ $ciudad }}</strong></p>
				<p style="margin:0; padding:0;">Edad: <strong>{{ $edad }}</strong></p>
				<p style="margin:0; padding:0;">Ocupación: <strong>{{ $ocupacion }}</strong></p>
				<p style="margin:0; padding:0;">Horario disponible: <strong>{{ $horario }}</strong></p>
				<p style="margin:0; padding:0;">Área en la que le gustaría participar: <strong>{{ $tipo_ayuda }}</strong></p>
				<p style="margin:0; padding:0;">¿Por qué le gustaría ser voluntario en la Fundacion Amparo?: <strong>{{ $porque }}</strong></p>
			</td>
		</tr>
		<tr>
			<td style="font-size:12px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="vertical-align:top" width="30%">
							<a href="#"><img src="{{ asset( '/images/mail_facebook_icon.jpg') }}" alt="" style="width:30px;margin-left:5px;"></a>
							<a href="#"><img src="{{ asset( '/images/mail_twitter_icon.jpg') }}" alt="" style="width:30px;margin-left:5px;"></a>
							<a href="#"><img src="{{ asset( '/images/mail_youtube_icon.jpg') }}" alt="" style="width:30px;margin-left:5px;"></a>
							<a href="#"><img src="{{ asset( '/images/mail_instagram_icon.jpg') }}" alt="" style="width:30px;margin-left:5px;"></a>
						</td>
						<td style="vertical-align:top" width="30%">
							<strong>Mantengamos el contacto:</strong>
							<p style="margin:0;padding:15px 0 0 0">Tel. 222 229 3850</p>
							<p style="margin:0;padding:0 0 0 0"><a href="mailto:info@fundacionamparo.com" target="_blank" style="color:#beda3e">info@fundacionamparo.com</a></p>
						</td>
						<td style="vertical-align:top" width="30%">
							<strong>¡Síguenos!</strong>
							<p style="margin:0;padding:15px 0 0 0">facebook/FundacionAmparo</p>
							<p style="margin:0;padding:0">twitter/@FundacionAmparo</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>	