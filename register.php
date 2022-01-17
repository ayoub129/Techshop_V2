<?php
    require_once("config/config.php"); 
    require_once("includes/header.php");


    $passerr ="";
    $emailerr ="";
    $fnameerr = '';
    $lnameerr = '';

    if(isset($_POST["register"])) {

              // email validation
        if (empty($_POST["email"])) {
            $emailerr = "email is required";
        } 
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Invalid email format";
        } 
        else {
            $email = test_input($_POST["email"]);
        }

        
         if (empty($_POST["fname"] )) {
            $fnameerr = "FirstName is required";
          } else {
            $fname = test_input($_POST["fname"]);
          }


          if (empty($_POST["lname"] )) {
            $lnameerr = "LastName is required";
          } else {
            $lname = test_input($_POST["lname"]);
          }


          if (empty($_POST["password"] )) {
            $passerr = "password is required";
          } else {
            $password = test_input($_POST["password"]);
            $hash_pass = password_hash("$password", PASSWORD_BCRYPT);
          }


          if($passerr == null && $emailerr == null && $lnameerr == null && $fnameerr == null) {
              $sql = "INSERT INTO `users` (`firstname` , `lastname` , `email` , `password` , `isAdmin`) VALUES ('$lname' , '$lname' , '$email' , '$hash_pass' , 'false') ";
              if(mysqli_query($conn , $sql)){  
                  header("Location:login.php") ; 
                }  
          } 
    } 
?>

<section class="mt-5">
    <form class="row" method="POST">
        <div class="col-sm-3 col-12"></div>
        <div class="col-sm-6 col-12">
            <div class="card  w-100">
            <i class="fas p-4 text-center text-info fa-user fa-3x" alt="account"></i>
                <div class="card-body p-4">
                     <div class="mb-5">
                        <label for="FirstName" class="form-label">FirstName</label>
                        <input type="FirstName" value="<?php  echo $fname ?>" name="fname" class="form-control" id="FirstName" placeholder="FirstName">
                        <span class="text-danger fw-bold"><?php echo $fnameerr ?></span>
                    </div>
                    <div class="mb-5">
                        <label for="LastName" class="form-label">LastName</label>
                        <input type="LastName" value="<?php  echo $lname ?>" name="lname" class="form-control" id="LastName" placeholder="LastName">
                        <span class="text-danger fw-bold"><?php echo $lnameerr ?></span>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" value="<?php  echo $email ?>" name="email" class="form-control" id="email" placeholder="name@example.com">
                        <span class="text-danger fw-bold"><?php echo $emailerr ?></span>
                    </div>
                    <div class="mb-5">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="pass" >
                        <span class="text-danger fw-bold"><?php echo $passerr ?></span>
                    </div>
                    <button type="submit" name="register" class="btn btn-outline-primary w-100">
                         Register
                    </button>
                </div>
                <div class="card-footer ">
                   <p class="text-muted">
                       You Already Have An Account ? <a href="login.php">Log in</a>
                   </p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12"></div>
    </form>
</section>

<?php
    require_once("includes/footer.php") 
?>
<!-- good good very good -->