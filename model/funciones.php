<?php 

function enviar_correo_electronico($Asunto,$correo_usuario,$mensaje){

	$host = 'smtp.gmail.com';
	$puerto = 587;
	$encryptacion = 'tls';
	$correo_admin = 'cecomp.laravel@gmail.com';
	$nombre_admin = 'SisAdmin';
	$pass_admin = 'amen1234';

	try {
    		
		    $transport = (new Swift_SmtpTransport($host, $puerto,$encryptacion))
		        ->setUsername($correo_admin)
		        ->setPassword($pass_admin);
		 
		    // Create the Mailer using your created Transport
		    $mailer = new Swift_Mailer($transport);
		 
		    // Create a message
		    $message = new Swift_Message();
		 
		    // Set a "subject"
		    $message->setSubject($Asunto);
		 
		    // Set the "From address"
		    $message->setFrom([$correo_admin => $nombre_admin]);
		 
		    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
		    $message->addTo($correo_usuario,'');
		 
		    // Add "CC" address [Use setCc method for multiple recipients, argument should be array]
		    //$message->addCc('recipient@gmail.com', 'recipient name');
		 
		    // Add "BCC" address [Use setBcc method for multiple recipients, argument should be array]
		    //$message->addBcc('recipient@gmail.com', 'recipient name');
		 
		    // Add an "Attachment" (Also, the dynamic data can be attached)
		    //$attachment = Swift_Attachment::fromPath('example.xls');
		    //$attachment->setFilename('report.xls');
		    //$message->attach($attachment);
		 
		    // Add inline "Image"
		    //$inline_attachment = Swift_Image::fromPath('nature.jpg');
		    //$cid = $message->embed($inline_attachment);
		 
		    // Set the plain-text "Body"
		    $message->setBody($mensaje);
		 
		    // Set a "Body"
		    //$message->addPart('This is the HTML version of the message.<br>Example of inline image:<br><img src="'.$cid.'" width="200" height="200"><br>Thanks,<br>Admin', 'text/html');
		 
		    // Send the message
		    
		    $result = $mailer->send($message);

		} catch (Exception $e) {
		  echo $e->getMessage();
		}



}

 ?>