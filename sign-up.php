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
                <form action="reg.php" id="sign_up" method="POST" enctype="multipart/form-data">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
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

                    <div class="input-group">
                       
                        <div class="form-line">
                            <input type="file" name="image" >
                        </div>
                    </div>
                    
                    

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="signup" type="submit">SIGN UP</button>

                    
                </form>
                <a href="sign-in.php">Login</a>
            </div>
        </div>
    </div>
<?php require_once('inc/fotter.php')?>
   