
<?php 
    // require the config and the header files
    require_once("config/config.php");
    require_once("includes/header.php");

    // init variables
    $quantity = 0;
    $discount = "";

    // add and mince the quantity
    if(isset($_POST['mince'])) {
        $quantity = $_POST['Q'];
        if($quantity > 1) {
            $quantity = $quantity - 1; 
        }
    }

    if(isset($_POST['adding'])) {
        $quantity = $_POST['Q'];
        if( $quantity == null) {
            $quantity = 1;
        } else {
            $quantity = $quantity + 1;    
        }
    }

    // remove from cart
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

    //   discount
    if(isset($_POST['send'])) {
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        $discount = test_input($_POST['discount']);    
    }

    $sql2 = "SELECT * FROM discount WHERE `code` = '$discount'";
    $result2 = mysqli_query($conn , $sql2);

?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="text-center fw-bold fs-4">Products</div>
                 <!-- products on cart -->
                <?php if (isset($_SESSION['cart'])){ 
                    $total = 0;
                    ?> 
                            <?php
                                $product_id = array_column($_SESSION['cart'], column_key:'product_id');
                                $sql = "SELECT * FROM `products`";
                                $result = mysqli_query($conn , $sql);
                                while ($row = mysqli_fetch_assoc($result)) { 
                                    foreach ($product_id as $id){
                                        if ($row['id'] == $id){ ?>
                                         <div class="row my-5">
                                                 <div class="col-md-3">
                                                    <a href="product.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row['src'] ?>" class="img-fluid " alt="<?php echo $row['name'] ?>"> </a>
                                                </div>
                                                <div class="col-md-8 fw-bold">
                                                        <a href="product.php?id=<?php echo $row['id'] ?>" class="w-75 text-dark ms-2"><?php echo $row['name'] ?></a>
                                                        <div class="fw-bold  mt-2">
                                                            <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                                    <button name="mince" type="submit" class="fw-bold p-0 px-2 btn btn-light">-</button>
                                                                    <input  class="mx-2 fw-bold  quantity" name="Q" placeholder="1" value="<?php echo $quantity ?>" />
                                                                    <button name="adding" type="submit"  class="fw-bold p-0 px-2 btn btn-light">+</button>
                                                            </form>
                                                        </div>
                                                        <form action="info.php?action=remove&id=<?php echo $row['id'] ?>" method="POST" class="cart-items mt-2">
                                                               <button type="submit" class="btn btn-outline-warning " name="remove">Delete From Cart</button>
                                                        </form>
                                                 </div>
                                                 <div class="fw-bold fs-4 text-danger mb-5 col-md-1">$<?php echo $row['price'] ?></div>            
                                         </div>
                                    <?php 
                                        $total = $total + $row['price'];
                                        }
                                    }
                                } ?>
                    <?php } ?>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                                <div class="text-center fw-bold fs-4">Price Details</div>
                                 <!-- discount -->
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="input-group my-4">
                                    <input type="text" id="discount" class="form-control" name="discount" placeholder="discount Code" aria-label="discount Code" aria-describedby="btn">
                                    <button class="btn btn-outline-primary" name="send" type="submit" id="btn">Send</button>
                                </form>
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                        <?php 
                                        if (isset($_SESSION['cart'])){
                                                $count  = count($_SESSION['cart']);
                                                echo "<h6>Price ($count items)</h6>";
                                        } else{
                                            echo "<h6>Price (0 items)</h6>";
                                        }
                                        ?>
                                        <p class="text-dark">
                                            $<?php echo $total; ?>
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between ">
                                        <h6 class="text-dark">
                                            Discount code
                                        </h6>
                                        <p class="text-dark">
                                            <?php 
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                $persentage = $row2["persentage"];
                                                echo "-$persentage% " ;
                                            }?>
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between ">
                                        <h6>Delivery Charges</h6>
                                        <p class="text-success">
                                            FREE
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6>Amount Payble</h6>
                                            <div class="">

                                                <?php
                                                if(isset($persentage)) {
                                                    $total1 = $total * $persentage / 100; 
                                                    echo "<span id='amount'>" . ceil($total1) . "</span><span>$</span>";
                                                } else {
                                                    echo "<span id='amount'>" . $total . "</span><span>$</span>";
                                                }
                                                ?>
                                            </div>
                                    </div>
                                    <div id="paypal-button-container"></div>
                    </div>
                </div>
         </div>

    <!-- Set up a container element for the button -->


<?php 
    require_once("includes/footer.php")
?>