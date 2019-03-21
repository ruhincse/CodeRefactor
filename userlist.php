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

 $query="select * from users";
 $stmt=$connect->query($query);
 $stmt->execute();
 $results=$stmt->fetchAll();


?>

<body class="signup-page">
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
                <?php if($results){
                        foreach($results as $result){?>
                <tr>
                   

                <td><?php echo $result['id']?> </td>
                  <td><?php echo $result['name']?></td>
                  <td><?php echo $result['email']?></td>
                  <td><img src="uploads/<?php echo $result['image']?>"  height="100" width='100'> </td>  
                  <td><a href="edit.php?id=<?php echo $result['id']?>">Edit</a>||

                    <?php if($_SESSION['id']!=$result['id']):?>
                        
                         <a href="delete.php?delId=<?php echo $result['id']?> " onclick="return confirm('Are You sure to delete this!!')">delete</a></td>
                <?php endif;?>
                  

              </tr>
              <?php
              }}?>

                </tr>
                
              </tbody>
             
</table>
        
<?php require_once('inc/fotter.php')?>
   