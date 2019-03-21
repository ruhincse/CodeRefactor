<?php 

 require_once"bootstrap.php";
if(isset($_GET['token])){

	if($_GET['token']==null || empty($_GET['token])){
		redirect('sign-in');
	}

$token=$_GET['token'];


$query="select email,token from tbl_reset where token=:token";

$stmt=$connect->prepare($query);

$stmt->bindParam(';token',$token);
$stmt->execute();
$resutls=$stmt->rowCount();
if($resutls){
	$result=$stmt->fetch()

	$email=$result['email'];


$query="select email users where email=:email";
$stmt=$connect->prepare($query);


$stmt->bindParam(':email',$email);

$stmt->execute();
$result=$stmt->fetch();

if($result){
	$_SESSION['email']=$result['email'];




}





}

else{
	notification('The token has been expired');
}









?>


<?php 
 require_once"bootstrap.php";
require_once('inc/header.php');

if(is_logged()){
    redirect("sign-in");
    exit;
}

?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <?php require_once('inc/message.php'); ?>
        
        <div class="card">
            <div class="body">
                <form action="changepass.php" id="sign_up" method="POST" enctype="multipart/form-data">
                    <div class="msg">Recover Password</div>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email'];?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>

                    <
                    

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="changepass" type="submit">Change Password</button>

                    
                </form>
                <a href="sign-in.php">Login</a>
            </div>
        </div>
    </div>
<?php require_once('inc/fotter.php')?>
   

