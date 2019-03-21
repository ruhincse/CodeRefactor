<?php 
require_once('inc/header.php');
 require_once"bootstrap.php";

if(!is_logged()){

    redirect("sign-in");
    exit;
}

?>



<?php
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];

        $query="select * from users where id=:id";
        $stmt=$connect->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $result= $stmt->fetch();
    }

    $_SESSION['editId']=$id;

?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="update.php" id="sign_up" method="POST" enctype="multipart/form-data">
                    <div class="msg">Update info</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" value="<?php echo $result['name']?>" placeholder="Name Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" value="<?php echo $result['email']?>" required>
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
                            <input type="file" name="images"  >
                        </div>
                    </div>
                    
                    

                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="update" type="submit">Update</button>

                    
                </form>
                <a href="sign-in.php">Login</a>
            </div>
        </div>
    </div>
<?php require_once('inc/fotter.php')?>
   