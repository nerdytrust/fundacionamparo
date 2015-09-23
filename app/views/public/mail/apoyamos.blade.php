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
				<h2>Apoyamos tu causa</h2>
			</td>
		</tr>
		<tr>
			<td style="font-size:13px">
				<p style="margin:0; padding:0;">Han solicitado apoyar una nueva causa con los siguientes datos</p>
				
			</td>
		</tr>
		<tr>
			<td style="font-size:13px;padding-top:15px;">
				<p style="margin:0; padding:0;">Nombre: <strong>{{ $nombre }}</strong></p>
				<p style="margin:0; padding:0;">Email: <strong>{{ $email }}</strong></p>
				<p style="margin:0; padding:0;">Teléfono: <strong>{{ $telefono }}</strong></p>
				<p style="margin:0; padding:0;">Descripción: <strong>{{ $descripcion }}</strong></p>
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
			</td>
		</tr>
	</table>
</body>
</html>