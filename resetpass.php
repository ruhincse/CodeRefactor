<?php 
 require_once"bootstrap.php";

if(isset($_POST['forgotpass'])){

	$email=$_POST['email'];

	$query="select * from users where email=:email";

	$stmt=$connection->prepare($query);
	$stmt->bindParam(':email',$email);
	$stmt->execute();
	$result=$stmt->rowCount();

	if($result){
		$id=$result['id'];
		$email=$result['email'];

		$token=uniqid().rand().$email;

		$query="insert into tbl_reset (email,token,status) values(:email,:token)";

		$stmt=$connection->prepare($query);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':token',$token);
		$stmt->execute;
		$result=$stmt->rowCount();
		if($result>0){

			$mail = new PHPMailer\PHPMailer\PHPMailer;




			    $mail->isSMTP();                                            // Set mailer to use SMTP
					    $mail->Host       = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
					    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					    $mail->Username   = 'eb468fd0a21404';                     // SMTP username
					    $mail->Password   = 'c0865fb7d570c4';                               // SMTP password
					    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
					    $mail->Port       = 465;                                    // TCP port to connect to

					    //Recipients
					    $mail->setFrom('noreply@hello.com', 'Mailer');
					    $mail->addAddress($email);     // Add a recipient
					    

					    // Attachments
					       // Optional name

					    // Content
					    $mail->isHTML(true);                                  // Set email format to HTML
					    $mail->Subject = 'Verify Your Mail';
					    $mail->Body    = 'Please verify your mail <b>Click the blow linik</b> <a href="http://localhost/SSB-Batch-02/Code_Refector/renewpass.php?token=<?php echo $token?>">Click Here </a> ';
					    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					    $mail->send();




				redirect('sign-in');
				notification('You Password has been resit');
			
		}
	

	}


}

?>