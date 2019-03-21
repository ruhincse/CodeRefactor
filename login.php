<?php 
 require_once"bootstrap.php";
if(isset($_POST['login'])){
	
	
     $email=$_POST['email'];
	 $password=md5($_POST['password']);
	
				
				$query="select * from users where  email=:email";
				
				$stmt=$connect->prepare($query);
				
				$stmt->bindParam(':email',$email);
				
				$stmt->execute();
				$result=$stmt->fetch();
	
	
	
	
	if($result){
		
		if($password==$result['password']){
			$_SESSION['email']=$email;
			$_SESSION['id']=$result['id'];
			$_SESSION['role']=$result['role'];
	   notification("You have Loged in",'success');
		redirect('dashboard');
			
		}
		else{
			 notification("password dosen't mass",'danger');
			  redirect('sign-in');
			
		}
	}
	
	
	else{
		   notification("password dosen't mass",'danger');
			  redirect('sign-in');
	}
	
	
	
}

?>