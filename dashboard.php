<?php 

 require_once"inc/header.php";
 require_once"bootstrap.php";



if(!is_logged()){
	redirect("sign-in");
	exit;
}


$id=$_SESSION['id'];
$query="select * from users where id=$id";
$stmt=$connect->query($query);
$stmt->execute();

$result=$stmt->fetch();

?>

<body class="login-page">
    <div class="">
        <?php require_once('inc/message.php'); ?>
        <div class="row">
        	<h2>Welcome Mr <?php echo $_SESSION['email']?> </h2>

 <table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">id</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">image</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row"><?php echo $id?></th>
			      <td><?php echo $result['name']?></td>
			      <td><?php echo $result['email']?></td>
			     
			      <td><img src="uploads/<?php echo $result['image']?>"  height="100" width='100'> </td>  
			      <td>
			      	

			      	 
			    

		 <a href="userupdate.php">Updare Profile</a>

		 
			  </td>
			    </tr>
			    
			  </tbody>
			 
</table>




		<?php if(is_admin()):?>
			<p> <a href="userlist.php">UserList</a>
			<?php endif;?>
			</p>

		 <a href="logout.php">logout</a>
		
            
        </div>
    </div>
    

<?php require_once"inc/fotter.php";?>