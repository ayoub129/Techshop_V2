<!-- Info page -->
<?php 
    // require the config for db
    require_once("config/config.php");
    // require the header 
    require_once("includes/header.php");

    // check if the user loged in
    if(!isset($_SESSION['id'])) {
        header("Location : login.php");
    }

    // get the id to get his data
    $id = $_SESSION["id"];
    // init the variables
    $email = $state = $postal = $discount = $firstname = $city = $country = $phone = $address = $lastname = $nameErr = $emailErr = $countryerr = $addressErr = $postalerr = $phoneErr = "";

        if(isset($_POST['info-checkout'])) {
            // security check
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            // email validation
            if (empty($_POST["email"])) {
              $emailErr = "email is required";
            } 
            else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
            }
            else {
              $email = test_input($_POST["email"]);
            }

            // check if address is empty
            if (empty($_POST["address"])) {
                $addressErr = "Address is required";
              } else {
                $address = test_input($_POST["address"]);
              }

            // check if postal is empty
              if (empty($_POST["postal"])) {
                $postalErr = "postal Code is required";
              } else {
                $postal = test_input($_POST["postal"]);
              }

            // check if phone is empty
              if (empty($_POST["phone"])) {
                $phoneErr = "phone is required";
              } else {
                $phone = test_input($_POST["phone"]);
              }

            // check if fname and lname are empty
             if (empty($_POST["firstname"] || empty($_POST['lastname']))) {
                $nameErr = "Name is required";
              } else {
                $firstname = test_input($_POST["firstname"]);
                $lastname = test_input($_POST["lastname"]);
              }

            //   check if country and city are empty
              if (empty($_POST["country"] || empty($_POST['city']))) {
                $nameErr = "Country and City is required";
              } else {
                $country = test_input($_POST["country"]);
                $city = test_input($_POST["city"]);
              }

             

            //   test the state values
              $state = test_input($_POST["state"]);

            //   if there are no err update the user 
              if( $nameErr == null && $emailErr == null && $countryerr == null && $addressErr == null && $postalerr == null && $phoneErr == null) {
                if(isset($_POST['promote'])) {
                     //   update the user except the email with the promotion
                  $sql = "UPDATE users SET `lastname`='$lastname' ,`firstname`='$firstname' , `state`='$state' , `country`='$country' , `city`='$city' , `postal`='$postal' , `phone`='$phone' , `promote`= 'true', `address`='$address' WHERE id=$id";
                } else {
                     //   update the user except the email
                  $sql = "UPDATE users SET `lastname`='$lastname' ,`firstname`='$firstname' , `state`='$state' , `country`='$country' , `city`='$city' , `postal`='$postal' , `phone`='$phone' , `address`='$address' WHERE id=$id";
                }
               
                 if(mysqli_query($conn , $sql)){
                        // send him to checkout  if the info is uppdated
                        header("Location : checkout.php");
                 } 
              }
        }

        // remove from the cart
        if (isset($_POST['remove'])){
            if ($_GET['action'] == 'remove'){
                foreach ($_SESSION['cart'] as $key => $value){
                    if($value["product_id"] == $_GET['id']){
                        unset($_SESSION['cart'][$key]);
                        echo "<script>alert('Product has been Removed...!')</script>";
                    }
                }
            }
          }

        // get total
        $total = $_GET['total'];
?>

<!-- breadcumps -->
<section class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="index.php" class="text-primary">Home</a></li>
            <li class="breadcrumb-item "><a href="cart.php" class="text-primary">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Information</li>
        </ol>
    </nav>
</section>

<!-- shopping cart summary -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-6 col-12">
            <h2 class="fs-1 fw-bold text-dark">Contact information</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!-- get the data if the user is logged in -->
                <?php if(isset($_SESSION['id'])) { 
                       $id = $_SESSION['id'];
                       $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
                       $result = mysqli_query($conn , $sql);
                       while ($row = mysqli_fetch_assoc($result)) {?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text"   class="form-control" id="email" value="<?php 
                        if($row['email'] != null) {echo $row['email'] ;} else   { echo $email;}?>" name="email" placeholder="name@example.com">
                        <div class="text-danger fw-bold"> <?php  echo $emailErr ?></div>
                    </div>
                    <!-- checkbox  -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="promote" id="checkbox" checked>
                        <label class="form-check-label" for="checkbox">
                            Email me with news and offers
                        </label>
                   </div>
                <div class="line bg-secondary w-100 my-3 "></div>
                <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="FirstName" class="form-label">FirstName</label>
                                <input type="text" value="<?php 
                        if($row['firstname'] != null) {echo $row['firstname'] ;} else   { echo $firstname;}?>" name="firstname" class="form-control" id="FirstName" >
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="LastName" class="form-label">LastName</label>
                                <input type="text" value="<?php if($row['lastname'] != null) {echo $row['lastname'] ;} else   { echo $lastname;}?>" name="lastname" class="form-control" id="LastName" >
                            </div>
                    </div>
                    <div class="text-danger fw-bold"> <?php  echo $nameErr ?></div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Country" class="form-label">Country</label>
                                <input type="text" class="form-control" value="<?php if($row['country'] != null) {echo $row['country'] ;} else   { echo $country;}?>" name="country" id="Country" placeholder="ex: USA" >
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="City" class="form-label">City</label>
                                <input type="text" class="form-control" value="<?php if($row['city'] != null) {echo $row['city'] ;} else   { echo $city;}?>" name="city" id="City" >
                            </div>
                    </div>
                    <div class="text-danger fw-bold"> <?php  echo $countryerr ?></div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="PostalCode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control"  value="<?php if($row['postal'] != null) {echo $row['postal'] ;} else   { echo $postal;}?>" name="postal" id="PostalCode"  >
                                    <div class="text-danger fw-bold"> <?php  echo $postalerr ?></div>
                                </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="state" class="form-label">state</label>
                            <input type="text" class="form-control" value="<?php if($row['state'] != null) {echo $row['state'] ;} else   { echo $state;}?>" name="state" id="state" >
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" value="<?php if($row['phone'] != null) {echo $row['phone'] ;} else   { echo $phone;}?>" name="phone" id="Phone" >
                                <div class="text-danger fw-bold"> <?php  echo $phoneErr ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Address" class="form-label">Address</label>
                                <input type="text" class="form-control" value="<?php if($row['address'] != null) {echo $row['address'] ;} else   { echo $address;}?>" name="address" id="Address" >
                                <div class="text-danger fw-bold"> <?php  echo $addressErr ?></div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                <!-- send the info checkout to DB and redirect to checkout -->
               <button type="submit" name="info-checkout" class="btn btn-primary my-3 w-50">Checkout</button>
            </form>
        </div>
        <div class="col-md-6 col-12">
            <!-- the summary -->
        <h2 class="fs-1 fw-bold text-dark ">Summary</h2>
        <!-- subtotal -->
        <div class="d-flex align-items-center justify-content-between ">
            <p class="text-dark">
                Subtotal Price
            </p>
            <p class="text-dark">
                $<?php echo $total ?>
            </p>
        </div>
        <!-- shipping -->
        <div class="d-flex align-items-center justify-content-between mb-2">
            <p class="text-dark">
                 Shipping 
            </p>
            <p class="text-success">
                FREE
            </p>
        </div>
        <div class="line bg-secondary w-100"></div>
        <!-- total -->
        <div class="d-flex align-items-center justify-content-between my-3">
            <p class="text-dark">
                 Total 
            </p>
            <p class="text-dark">
                $<?php
                    echo $total;
                ?>
            </p>
        </div>
      </div>
    </div>
</section>


<!-- Email call -->
<section class="mt-5 justify-content-center text-center container d-flex">
    <address class="me-5">
        <p class="text-dark">
            Email us
        </p>
        <a href="mailto:techshop000.store@gmail.com" class="text-primary">
            techshop000.store@gmail.com
        </a>
    </address>
</section>

<?php 
    // require the footer 
    require_once("includes/footer.php");
?>
<!-- finished -->