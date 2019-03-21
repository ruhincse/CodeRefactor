<?php 
 require_once"bootstrap.php";

		if(isset($_POST['signup'])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$image=$_FILES['image'];
			$token=rand().md5($name);

			if(isset($image)){
				 $filename=$_FILES['image']['name'];
				 $tmp_file=$_FILES['image']['tmp_name'];

				 $fileparts=explode('.',$filename);

				$extension = end($fileparts);
			    $imagename=time().uniqid('img_',true).".".$extension;
			    	$destination="uploads/".$imagename;
			    move_uploaded_file($tmp_file,$destination);

   				
			}

			$query="Insert into users (name,email,password,image,mail_verified_token) values (:name,:email,:password,:image,:token)";

			$stmt=$connect->prepare($query);

			$stmt->bindvalue('name',$name);
			$stmt->bindvalue('email',$email);
			$stmt->bindvalue('password',$password);
			$stmt->bindvalue('image',$imagename);
			$stmt->bindvalue('token',$token);			
			$result=$stmt->execute();
			$mail = new PHPMailer\PHPMailer\PHPMailer;


			if($result){

				$mail->SMTPDebug = 2;                                       // Enable verbose debug output
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
					    $mail->Body    = 'Please verify your mail <b>Click the blow linik</b> <a href="http://localhost/SSB-Batch-02/Code_Refector/active.php?token=<?php echo $token?>">Click Here </a> ';
					    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					    $mail->send();




				redirect('sign-in');
				notification('You have successfully Register');
			}


		}


?>