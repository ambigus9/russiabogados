<?php

	$to = 'abogadarussi@gmail.com, ambigus9@gmail.com, contacto@russiabogados.com';  // please change this email id
	
	$errors = array();
	// print_r($_POST);

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Por favor ingrese su nombre';
	}
	
	//Check if message has been entered
	if (!isset($_POST['consulta'])) {
		$errors['consulta'] = 'Por favor ingrese un mensaje';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}



	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$message = $_POST['consulta'];
	$subject = 'Nuevo mensaje de Consulta para Russiabogados';
	
	$body = "Cliente: $name\nTelefono: $phone\nMensaje:\n$message";


	//send the email
	$result = '';
	if (mail ($to, $subject, $body)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Gracias!! Hemos recibido tu consulta, y nos pondremos en contacto contigo tan pronto sea posible';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Ha habido un error enviando el mensaje. Porfavor, intente nuevamente';
	$result .= '</div>';

	echo $result;
	die();


?>
	