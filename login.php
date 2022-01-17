<?php
    require_once("config/config.php"); 
    require_once("includes/header.php");
    $passerr ="";
    $emailerr ="";

    if(isset($_POST["login"])) {

       // email validation
        if (empty($_POST["email"])) {
              $emailerr = "email is required";
        } 
        elseif (empty($_POST["password"])) {
            $passerr = "password is required";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailerr = "Invalid email format";
        }
        else {
              $email = test_input($_POST["email"]);
              $password = test_input($_POST['password']);
              $sql = "SELECT * FROM `users` WHERE `email` = '$email'  ";
              $result = mysqli_query($conn , $sql);
              $count = mysqli_num_rows($result);
              if($count == 1){  
                  while ($row = mysqli_fetch_assoc($result)) {
                      if(password_verify($password , $row["password"])){
                          session_start();
                          $_SESSION["id"] = $row['id'];
                          $admin = $row['isAdmin'];
                          if($admin == "true") {
                              header("Location:admin/products.php?page=1") ; 
                          } else {
                              header("Location:index.php") ; 
                          }
                      } else {
                          $passerr = "Password Not Correct";
                      }
                  }
              }  
          }

          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
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
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" value="<?php  echo $email ?>" id="email" name='email' placeholder="name@example.com">
                        <span class="text-danger fw-bold"><?php echo $emailerr ?></span>
                    </div>
                    <div class="mb-5">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" name='password' class="form-control" id="pass" >
                        <span class="text-danger fw-bold"><?php echo $passerr ?></span>
                    </div>
                    <button type="submit" name='login' class="btn btn-outline-primary w-100">
                        Submit
                    </button>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                   <p class="text-muted">
                       Dosn't Have An Account Yet ? <a href="register.php">Register</a>
                   </p>
                   <!-- <p class="text-muted">
                        <a href="forgote.php">Forgote Password ?</a>
                   </p> -->
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12"></div>
    </form>
</section>

<?php
    require_once("includes/footer.php") 
?>