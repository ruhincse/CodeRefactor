<?php 
 require_once"bootstrap.php";
if(isset($_GET['token])){
	if($_GET['token']==null || empty($_GET['token])){
		redirect('sign-in');
	}
	
	$token=$_GET['token];
	
	
	$query="select * from usres where email_verification_token=:token";
	
	$stmt=$connect->prepare($query);
	$stmt->bindParam(':token',$token);
	
	$stmt->execute();
	
	$result=$stmt->fetch();
	
	if($stmt->rowCount()>0){
		$id=$result[$id];
		
		$query="update users set mail_status=1";
		$stmt=$connect->query($query);
		$stmt->execute();
		
		notification('account successfully Activated');
		redirect("sign-in");
	}
	
	
	
}

?>