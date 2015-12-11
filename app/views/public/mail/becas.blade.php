<?php $disable_header = 1; $disable_footer = 1; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body style="background-color: #beda3e; color: #fff; font-size: 16px">
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family: Verdana" width="700px">
		<tr>
			<td style="text-align: center">
				<img src="{{ asset( '/images/amparo2.png') }}" alt="">
			</td>
		</tr>
		<tr>
			<td>
				<h2>Becas</h2>
			</td>
		</tr>
		<tr>
			<td style="font-size:13px">
				<p style="margin:0; padding:0;">Han solicitado apoyar una nueva beca con los siguientes datos</p>
				
			</td>
		</tr>
		<tr>
			<td style="font-size:13px;padding-top:15px;">
				<p style="margin:0; padding:0;">Nombre: <strong>{{ $nombre }}</strong></p>
				<p style="margin:0; padding:0;">Email: <strong>{{ $email }}</strong></p>
				<p style="margin:0; padding:0;">Teléfono: <strong>{{ $telefono }}</strong></p>
				<p style="margin:0; padding:0;">Motivo: <strong>{{ $motivo }}</strong></p>
			</td>
		</tr>
		<tr>
			<td>
				<p style="font-style: italic">Equipo de {{ getenv('APP_TITLE') }}</p>
			</td>
		</tr>
		<tr>
			<td>
				<hr style="border-top:1px solid #ffffff">
			</td>
		</tr>
		<tr>
			<td style="font-size:12px;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td style="vertical-align:top" width="30%">
							<strong>Contáctanos</strong>
							<p style="margin:0; padding:15px 0 0 0;">Tel: (222) 229 38 50</p>
						</td>
						<td style="vertical-align:top" width="30%">
							<strong>Envíanos un Correo</strong>
							<p style="margin:0;padding:15px 0 0 0"><a href="mailto:info@fundacionamparo.com" target="_blank" style="color:#beda3e">info@fundacionamparo.com</a></p>
						</td>
						<td style="vertical-align:top" width="30%">
							<strong>Síguenos en Redes Sociales</strong>
							<p style="margin:0;padding:15px 0 0 0">facebook/FundacionAmparo</p>
							<p style="margin:0;padding:0">twitter/@FundacionAmparo</p>
							<p style="margin:0;padding:0">youtube.com/FundacionAmparo</p>
							<p style="margin:0;padding:0">instagram.com/FundacionAmparo</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>