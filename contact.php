<?php 
        require_once("config/config.php"); 
        require_once("includes/header.php");

       $nameErr = $emailerr = $msgerr = "";

        if(isset($_POST['contact'])) {
             if (empty($_POST["name"])) {
                $nameErr = "Name is required";
              } else {
                $name = test_input($_POST["name"]);
              }

              if (empty($_POST["email"])) {
                $emailErr = "email is required";
              } 
              else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
              }
              else {
                $email = test_input($_POST["email"]);
              }

              if (empty($_POST["message"])) {
                $msgerr = "message is required";
              } else {
                $msg = test_input($_POST["message"]);
              }


              if($nameErr == null && $emailerr == null && $msgerr == null) {
                  $sql = "INSERT INTO Contacts (`name` , `email` , `message`) VALUES ('$name' , '$email' , '$msg')";
                  $result = mysqli_query($conn , $sql);
              }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
?>
   <div class="row mt-5">
       <div class="col-md-2 col-0"></div>
       <div class="col-md-8 col-12">
             <div class="card p-3" >
                     <form method="POST" class="card-body" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                         <h5 class="card-title text-center mb-4">Contact Us</h5>
                         <div class="mb-3">
                                 <label for="Name" class="form-label">Name</label>
                                 <input type="text" name="name" class="form-control" value="<?php  echo $name ?>" id="Name" placeholder="Name" >
                                 <div class="text-danger fw-bold"> <?php  echo $nameErr ?></div>
                         </div>
                         <div class="mb-3">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="email" name="email" class="form-control" value="<?php  echo $email ?>" id="email" placeholder="Email Address" >
                                 <div class="text-danger fw-bold"> <?php  echo $emailErr ?></div>
                         </div>
                         <div class="mb-3">
                                 <label for="msg" class="form-label">Message</label>
                                 <textarea rows="5" name="message" id="msg" class="form-control" value="<?php  echo $msg ?>" placeholder="Message" ></textarea>
                                 <div class="text-danger fw-bold"> <?php  echo $msgerr ?></div>
                         </div>
                         <button type="submit" name="contact" class="btn btn-primary w-100">Send</button>
                     </form>
             </div>
            </div>
       <div class="col-md-2 col-0"></div>
   </div>
<?php 
    require_once("includes/footer.php")
?>