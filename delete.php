<?php 
 require_once"bootstrap.php";

 if(!is_logged()){
	redirect("sign-in");

	exit;
}

if(!is_admin()){
    
    redirect("dashboard");
}


if($_SESSION['id']==$_GET['delId']){
  redirect("dashboard");

}



if(isset($_GET['delId'])){
	$id=$_GET['delId'];
	
	if($id==0){
		
		redirect("sign-in");
	}

	$query="Delete from users where id=:id";

	$stmt=$connect->prepare($query);
	$stmt->bindParam(':id',$id);

	$stmt->execute();
	
	$result=$stmt->rowCount();

	if($result>0){
		redirect("sign-in");
	}

}

?>