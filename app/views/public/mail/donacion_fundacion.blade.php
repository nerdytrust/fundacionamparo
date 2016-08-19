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
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Nombre</h2>
				<p style="margin-top:5px;color:#c2c2c2;">{{$nombre}}</p>
			</td>
		
			<td style="font-size:15px">
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Apellidos</h2>
				<p style="margin-top:5px;color:#c2c2c2;">{{$apellidos}}</p>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px">
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Email</h2>
				<p style="margin-top:5px;color:#c2c2c2;">{{$email}}</p>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px">
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Causa</h2>
				<p style="margin-top:5px;color:#c2c2c2;">{{$causa}}</p>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px">
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Monto</h2>
				<p style="margin-top:5px;color:#c2c2c2;">{{$monto}}</p>
			</td>
		</tr>
		@if($r_nombre!="")
			<tr>
				<td style="font-size:15px">
					<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Datos de Comprobante deducible de impuestos</h2>
				</td>
			</tr>
			<tr>
				<td style="font-size:15px">
					<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">RFC</h2>
					<p style="margin-top:5px;color:#c2c2c2;">{{$r_rfc}}</p>
				</td>
			</tr>
			<tr>
				<td style="font-size:15px">
					<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Nombre</h2>
					<p style="margin-top:5px;color:#c2c2c2;">{{$r_nombre}}</p>
				</td>
			</tr>
			<tr>
				<td style="font-size:15px">
					<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Email</h2>
					<p style="margin-top:5px;color:#c2c2c2;">{{$r_email}}</p>
				</td>
			</tr>
			<tr>
				<td style="font-size:15px">
					<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;font-size:17px">Domicilio Fiscal</h2>
					<p style="margin-top:5px;color:#c2c2c2;">{{$r_domicilio_fiscal}}</p>
				</td>
			</tr>

		@endif 
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