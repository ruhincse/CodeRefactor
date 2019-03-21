<?php 
require_once('inc/header.php');
 require_once"bootstrap.php";


if(!is_logged()){

    redirect("sign-in");
    exit;
}

if(!is_admin()){
      redirect("dashboard");
    
}

?>

<?php

if(isset($_POST['update'])){

   $id= $_SESSION['editId'];

            $name=$_POST['name'];
            $email=$_POST['email'];
             $image=$_FILES['images'];

           if($image){
               $filename=$_FILES['images']['name'];
                 $tmp_file=$_FILES['images']['tmp_name'];

                 $fileparts=explode('.',$filename);

                $extension = end($fileparts);
                $imagename=time().uniqid('img_',true).".".$extension;
                    $destination="uploads/".$imagename;
                move_uploaded_file($tmp_file,$destination);
           }



            

         $query="update users set name=:name, email=:email,image=:image where id=:id";

         $stmt=$connect->prepare($query);
         $stmt->bindParam(':name', $name);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':image', $imagename);
         $stmt->bindParam(':id', $id);
         $stmt->execute();
         $result=$stmt->rowCount();
         if( $result){
            header('Location:dashboard.php');
         }

           
}



?>

<?php require_once('inc/fotter.php')?>
   