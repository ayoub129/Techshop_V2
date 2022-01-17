<?php
    // require_once("config/config.php"); 
    // require_once("includes/header.php");
    // require_once('includes/mailer/src/Exception.php');
    // require_once('includes/mailer/src/SMTP.php');
    // require_once('includes/mailer/src/PHPMailer.php');
    
    // //Import PHPMailer classes into the global namespace
    // //These must be at the top of your script, not inside a function
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    
    // //Create an instance; passing `true` enables exceptions
    // $mail = new PHPMailer();
    

    
    // if(isset($_POST['forgote']) && $_POST['email']) {
    //     $email = $_POST["email"];
    //     $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    //     $result = mysqli_query($conn , $sql);
    //     $count = mysqli_num_rows($result);
    //     if( $count==1) {
    //         while($row=mysqli_fetch_array($result)){
    //         $email = $row['email'];
    //         $pass = $row['password'];
        
    //         $link="<a href='reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    //         try {
    //             //Server settings
    //             // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //             $mail->isSMTP();                                            //Send using SMTP
    //             $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //             $mail->Username   = 'techshop000.store@gmail.com';                     //SMTP username
    //             $mail->Password   = '0699272311aA@';                               //SMTP password
    //             $mail->SMTPSecure = "ssl";            //Enable implicit TLS encryption
    //             $mail->isHTML(true);                                  //Set email format to HTML
    //             $mail->CharSet = "UTF-8";                                  //Set email format to HTML
                
    //             //Recipients
    //             $mail->setFrom('techshop000.store@gmail.com', 'TechShop');
    //             $mail->addAddress($email);               //Name is optional
            
    //             //Content
    //             $mail->Subject = 'test';
    //             $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //             $mail->send();
    //             if(!$mail->Send()) {
    //                 echo "Mailer Error: " . $mail->ErrorInfo;
    //             } else {
    //                 echo "Message has been sent";
    //             }
    //         } catch (Exception $e) {
    //             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         }
    //     }
    //   }	
    // }
?>

<!-- <section class="mt-5 container">
    <div class="row">
        <div class="col-md-4 col-0"></div>
        <div class="col-md-4 col-12 bg-light p-5"> 
         <?php 
        // if($result) {?>
            <div class="card" style="width: 18em;">
                 We Will Send You An Email To reset  Your Password <br>
                All Love From <a class="fw-bold text-white" href="index.php"> <span class="text-primary">T</span>echShop</a>
            </div>
        <?php 
    // } else { ?>
            <form  method="post" class="text-dark">
                <div class="text-center mb-5">
                    <a class="fw-bold text-dark fs-3" href="index.php"> <span class="text-primary">T</span>echShop</a>
                    <h3 class="fs-5 fw-bold text-capitalize mt-4"> Reset Your Password</h3> 
                    <p class="mt-4">We will send you an email to reset your password.</p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <button type="submit" name="forgote" class="btn btn-outline-primary w-48">Submit</button>
                    <a href="login.php" class="w-48"><button type="button" class="btn btn-outline-primary w-100 ">Cancel</button></a> 
                </div>
           
            </form>
            <?php  
        // } ?>
        </div>
        <div class="col-md-4 col-0"></div>
    </div>
</section> -->

<?php
    // require_once("includes/footer.php") 
?>