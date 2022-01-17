<?php
// require_once("config/config.php"); 
// require_once("includes/header.php");

// if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
// {
//   $email=$_POST['email'];
//   $pass=$_POST['password'];
//   $sql2 = "UPDATE user SET `password`='$pass' WHERE `email`='$email'";
//   $result2 = mysqli_query($conn , $sql2);

//   if($result2) {
//     header("Location: index.php");
//   }
// }

// if($_GET['key'] && $_GET['reset'])
// {
//   $email=$_GET['key'];
//   $pass=$_GET['reset'];
//   $sql = "SELECT * FROM `users` WHERE md5(`email`)='$email' and md5(`password`)='$pass'";
//   $result = mysqli_query($conn , $sql);
//   if(mysqli_num_rows($result) == 1)
//   {
    ?>
    <!-- <form method="post" >
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
    </form> -->
    <?php
//   }
// }
?>