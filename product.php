<?php 
    // require the config Db
    require_once("config/config.php"); 
    // require the header
    require_once("includes/header.php");

    $id = $_GET["id"];

       // add to cart functionality
       if(isset($_POST['add'])) {
        // check if the session exist
        if(isset($_SESSION['cart'])) {
            //  get the product id that on cart
            $item_arr_id = array_column($_SESSION['cart'], column_key:"product_id");
            // check if the product already on cart 
            if(in_array($_POST['product_id'] , $item_arr_id)) {
                // display an alert
                echo '<script>alert("product is already added to the cart")</script>';
            // if the product not on cart add it
            } else {
                // see how much item on the cart
                $count = count($_SESSION['cart']);
                // create an array with that product id
                $item_arr=array('product_id'=>$_POST["product_id"]);
                // add it to cart with the count as a key
                $_SESSION['cart'][$count] = $item_arr;
                }
            } 
        // session cart variable not exist
        else {
            // create an array with that product id
            $item_arr=array('product_id'=>$_POST["product_id"]);
            // create a new session with cart variable with the0 key
            $_SESSION['cart'][0] = $item_arr;
        }
       }

       $user = $_SESSION['id'];

       if(isset($_POST['submit_review'])) {

         // security check
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

             // check if review is empty
             if (empty($_POST['review'])) {
                $reviewErr = "review is required";
              } else {
                $review = test_input($_POST["review"]);
              }

              // check if stars is empty
             if (empty($_POST['stars'])) {
                $starsErr = "stars is required";
              } else {
                $stars = test_input($_POST["stars"]);
              }
           
              $sql4 = "INSERT INTO reviews (`stars` , `reviews` , `product_id` , `user_id`) VALUES ('$stars' , '$review' , '$id' , '$user')";
              $query = mysqli_query($conn , $sql4);
            
       }

?>
   <div class="row  mt-5">
        <?php 
            $sql = "SELECT * FROM `products`  WHERE `id` = '$id'  ";
            $result = mysqli_query($conn , $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <!-- images  -->
         <div class="col-sm-6 col-12">
                <img src="<?php echo $row['src'] ?>" alt="<?php echo $row['name'] ?>" id="main-img" class="img-fluid">
                <div class="row align-items-center mt-4">
                    <div class="col-md-3">
                        <img src="<?php echo $row['src'] ?>" onfocus="changeImage('<?php echo $row['src'] ?>')" alt="<?php echo $row['name'] ?>" class="img-fluid product-img">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo $row['src1'] ?>" onfocus="changeImage('<?php echo $row['src1'] ?>')" alt="<?php echo $row['name'] ?>" class="img-fluid product-img">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo $row['src2'] ?>" onfocus="changeImage('<?php echo $row['src2'] ?>')" alt="<?php echo $row['name'] ?>" class="img-fluid product-img">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo $row['src3'] ?>" onfocus="changeImage('<?php echo $row['src3'] ?>')" alt="<?php echo $row['name'] ?>" class="img-fluid product-img">
                    </div>
                </div>
            </div>
            <div class=" col-sm-6 col-12">
                    <h2 class="fs-4  ms-4 fw-bold text-dark">
                        <?php echo $row["name"] ?>
                    </h2>
                    <div class="d-flex align-items-center my-3 ms-4">
                        <p class=" fw-bold text-dark mb-0 fs-5"> Price:  $<?php echo $row["price"] ?></p>
                        <del class="text-muted ms-3">$<?php echo $row["old-price"] ?></del>
                    </div>
                    <div class="d-flex align-items-center my-3 ms-4">
                        <!-- reviws -->
                        <?php  
                        $stars = 0;
                        $sql2 = "SELECT count(id) as nmbr_of_reviews FROM `reviews` WHERE `product_id` = '$id'";
                        $result2 = mysqli_query($conn , $sql2);
                        $row2 = mysqli_fetch_assoc($result2) ;

                        $sql = "SELECT * FROM `reviews`  WHERE `product_id` = '$id'  ";
                        $result = mysqli_query($conn , $sql);
                        while ($row = mysqli_fetch_assoc($result)) {

                           $stars = $stars + $row['stars'];

                            $reviews = $stars / $row2['nmbr_of_reviews'];
                            echo $reviews;
                            switch ($reviews) {
                                case 0 < $reviews < 1 :
                                    echo "<i class='fas text-warning fa-star-half'></i> 
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i> ";
                                    break;

                                case 1 < $reviews < 2 :
                                    echo "<i class='fas text-warning fa-star'></i> 
                                    <i class='fas text-warning fa-star-half'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i> ";   
                                    break;

                                case 2 < $reviews < 3 :
                                    echo "<i class='fas text-warning fa-star'></i> 
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star-half'></i>
                                    <i class='fas fa-star'></i>
                                    <i class='fas fa-star'></i> ";   

                                case 3 < $reviews < 4 :
                                    echo "<i class='fas text-warning fa-star'></i> 
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas  text-warning fa-star'></i>
                                    <i class='fas text-warning  fa-star-half'></i>
                                    <i class='fas fa-star'></i> ";    

                                case 4 < $reviews < 5 :
                                    echo "<i class='fas text-warning fa-star'></i> 
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star-fa-star-half'></i> ";    
                                    
                                default:
                                    echo "<i class='fas text-warning fa-star'></i> 
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star'></i>
                                    <i class='fas text-warning fa-star'></i> ";  
                                    break;
                            }

                            echo $row2['nmbr_of_reviews'] . "Reviews";
                        }
                            
                        ?>
                        <p>
                          <?php echo $row["sales"] ?>  orders
                        </p>
                    </div>
                    <form method="POST" class="mt-4 d-flex align-items-center ms-4">
                         <button type="submit" name="add" class="btn btn-outline-primary">
                                Add To Cart
                         </button>
                    </form>
            </div>
        <?php }   ?>
   </div>
    <div class="row">
        <div class="col-12">
            <div class="my-5 card">
                <?php echo $row['description'] ?>
            </div>
        </div>
    </div>
   <!-- feedback -->
   <?php 
        $sql = "SELECT * FROM `reviews`  WHERE `product_id` = '$id'  ";
        $result = mysqli_query($conn , $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['id'];
            $sql2 = "SELECT * FROM `user`  WHERE `id` = '$user_id'  ";
            $result2 = mysqli_query($conn , $sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
   ?>
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <img src="<?php if($row2['user-img']) echo $row['user_img']; else echo 'assets/images/avatar.jpg';  ?>" alt="<?php echo $row2['firstname']   ?>" class="img-fluid">
                    <div >
                        <h6 class="fw-bold"><?php echo $row2['firstname'] . $row['lastname'] ?></h6>
                        <p class="text-dark"><?php echo $row['reviews']   ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } }   ?>
   <!-- add  -->
   <?php 
        // check if he is login
        if (isset($user)) {
            // check if he is buy it
            $sql3 = "SELECT count(id) as ismakingorder FROM `orders`  WHERE `user_id` = '$user'";
            $result3 = mysqli_query($conn , $sql3);
            $row3 = mysqli_fetch_assoc($result3) ;

            if($row3['ismakingorder'] >= 1) { ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <input type="number" name="stars" value='<?php echo $stars  ?>' placeholder="5 stars" class="form-control">
                        <span class="text-danger"> <?php echo $starsErr  ?></span>
                        <textarea name="review" class="form-control" value='<?php echo $review  ?>'  rows="20"></textarea>
                        <span class="text-danger"> <?php echo $reviewErr  ?></span>
                        <button name="submit_review" class="w-100 btn btn-primary">Submit</button>
                </form>

        <?php 
                } 
                else {
                    echo '<h6 class="fw-bold text-center text-danger">You Need To Be Loged In To Create An Review <a href="login.php">Login Now</a> </h6>';
                }
            }

    
    ?>
<?php 
    require_once("includes/footer.php")
?>
<!-- finished -->