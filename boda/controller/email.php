<?php 


if($_POST){

	try {

		include_once("../class.phpmailer.php");

			$Host = "mail.cocodrillos.com";
			$From = $_POST["correo"];
			$Username = "programacion@cocodrillos.com";
			$Password = "kkx(_~elpdb*";
			$Subject  =  "Cuestionario Boda";
			$FromName = $_POST['nombre'];
			$To = "charlysillo0600@gmail.com";
			$Message = "";
			if($_POST['boda'] == "si"){

				$Message = "<!DOCTYPE html>
					<html>
					<head>
						<title>Confirmación de La Boda</title>
						<meta charset='UTF-8'>
						<meta name='viewport' content='width=device-width, initial-scale=1'>
						<style>
							th,td {
								border: 2px solid #94444c;
								color: #5b2f0a;
							}
							th, td {
								padding: .75rem;
								vertical-align: top;
							}
							table {
								border-collapse: collapse;
							}
						</style>
					</head>
					<body style='font-family: sans-serif;'>
						<div style='width: 481px;'>
							<table>
								<thead>
								<tr>
									<th colspan='2'>
										<img src='https://cocodrillos.com/boda/img/logo.png' style='width: 300px; text-align: center;'>
									</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td><b>Nombre</b></td>
										<td>".$_POST['nombre']."</td>
									</tr>
									<tr>
										<td><b>Email</b></td>
										<td>".$_POST['correo']."</td>
									</tr>
									<tr>
										<td><b>Asistirá a la boda?</b></td>
										<td>".$_POST['boda']."</td>
									</tr>
									<tr>
										<td><b>Adultos</b></td>
										<td>".$_POST['adultos']."</td>
									</tr>
									<tr>
										<td><b>Niños</b></td>
										<td>".$_POST['kids']."</td>
									</tr>
									<tr>
										<td><b>Dias extras despues de la boda</b></td>
										<td>".$_POST['afterWedding']."</td>
									</tr>
									<tr>
										<td><b>Tienen donde quedarse</b></td>
										<td>".$_POST['staying']."</td>
									</tr>					
								</tbody>
							</table>
						</div>
					</body>
					</html>";
			}
			else{
				$Message = "<!DOCTYPE html>
					<html>
					<head>
						<title>No podra asistir a la Boda</title>
						<meta charset='UTF-8'>
						<meta name='viewport' content='width=device-width, initial-scale=1'>
						<style>
							th,td {
								border: 2px solid #94444c;
								color: #5b2f0a;
							}
							th, td {
								padding: .75rem;
								vertical-align: top;
							}
							table {
								border-collapse: collapse;
							}
						</style>
					</head>
					<body style='font-family: sans-serif;'>
						<div style='width: 481px;'>
							<table>
								<thead>
								<tr>
									<th colspan='2'>
										<img src='https://cocodrillos.com/boda/img/logo.png' style='width: 300px; text-align: center;'>
									</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td><b>Nombre</b></td>
										<td>".$_POST['nombre']."</td>
									</tr>
									<tr>
										<td><b>Email</b></td>
										<td>".$_POST['correo']."</td>
									</tr>
									<tr>
										<td><b>Asistirá a la boda?</b></td>
										<td>".$_POST['boda']."</td>
									</tr>
									<tr>
										<td><b>Dedicatoria</b></td>
										<td>".$_POST['dedicatoria']."</td>
									</tr>					
								</tbody>
							</table>
						</div>
					</body>
					</html>";
			}

			$mail = new PHPMailer();
			$mail->SetLanguage('en');
			$mail->IsSMTP();
			$mail->Host     = $Host;
			$mail->SMTPAuth = true;
			$mail->Username = $Username;
			$mail->Password = $Password;
			$mail->From     = $From;
			$mail->FromName = $FromName;
			$mail->AddAddress($To);
			$mail->WordWrap = 50; 
			$mail->IsHTML(true);  
			$mail->Subject = $Subject;
			$mail->Body = $Message;
			$mail->Send();

			echo json_encode(array("type" => "success" , "message" => "El mensaje se envió con exito."));
			
	} catch (Exception $e) {
		echo json_encode(array("type" => "error" , "message" => "Hubo un error al enviar el mensaje, intente de nuevo." ));
		return false;
	}

}

?>