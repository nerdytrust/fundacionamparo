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
				<img src="http://design4causes.com/images/logo_mail.png" alt="" style="width:80px">
				<h1 style="margin-top:0px;margin-bottom:0px;font-weight:bold;font-size:42px;color:#000;">Fundación <br />Amparo</h1>
				<h2 style="margin-top:0px;color:#beda3e;">#TomadoAcciónFA</h2>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px">
				<h2 style="margin-top:0px;margin-bottom:0px;color:#beda3e;">¡Restablecer mi contraseña </h2>
				<p style="margin-top:5px;margin-bottom:0px;color:#c2c2c2;">Has solicitado recuperar tu contraseña.  Te compartimos los datos de tu cuenta actual.</p>
				<p style="margin-top:5px;margin-bottom:0px;padding:0;color:#c2c2c2;">Ingresa a <a href="{{ URL::to( 'login' ) }}" style="font-weight: bold;">Iniciar Sesión</a> para acceder al sitio.</p>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;padding-top:15px;">
				<p style="margin:0; padding:0;color:#c2c2c2;">Usuario: <strong style="color:#000;">{{ $username }}</strong></p>
				<p style="margin:0; padding:0;color:#c2c2c2;">Contraseña: <strong style="color:#000;">{{ $password }}</strong></p>
			</td>
		</tr>
		<tr>
			<td style="font-size:15px;padding-top:15px;">
				<p style="margin-top:0px;">¡Gracias por tu visita!</p>
				<!--<p style="margin-top:5px;color:#c2c2c2;">dsfsdfsdf dsf sd fd sf sdf sd fsdfds f sdf sd fsd </p>-->
			</td>
		</tr>
		<tr>
			<td style="font-size:12px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="vertical-align:top" width="30%">
							<a href="#"><img src="http://design4causes.com/images/c1.png" alt="" style="width:30px;margin-left:5px;"></a>
							<a href="#"><img src="http://design4causes.com/images/c1.png" alt="" style="width:30px;margin-left:5px;"></a>
							<a href="#"><img src="http://design4causes.com/images/c1.png" alt="" style="width:30px;margin-left:5px;"></a>
							<a href="#"><img src="http://design4causes.com/images/c1.png" alt="" style="width:30px;margin-left:5px;"></a>
						</td>
						<td style="vertical-align:top" width="30%">
							<strong>Mantengamos el contacto:</strong>
							<p style="margin:0;padding:15px 0 0 0">Tel. 222 229 3850</p>
							<p style="margin:0;padding:0 0 0 0">info@fundacionamparo.com</p>
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