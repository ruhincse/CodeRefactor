<?php 
 require_once"bootstrap.php";

if(isset($_POST['changepass'])){

	$email=$_POST['email'];
	$pass=md5($_POST['password']);


	$query="update users set password=:pass where email=:email";

	$stmt=$connect->prepare($query);


	$stmt->bindParam(':pass',$pass);
	$stmt->bindParam(':email',$email);

	$stmt->execute();
	$result=$stmt->rowCount();
	if($result>0){
		notification('you have successfully Change your Passwoed');
		redirect('sign-in');



	}


}

?>