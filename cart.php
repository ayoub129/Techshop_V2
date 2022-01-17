<!-- cart page -->
<?php 
    // require the config for db
    require_once("config/config.php");
    // require the header 
    require_once("includes/header.php");

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

      
?>
<!-- breadcumps -->
<section class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="index.php" class="text-primary">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
</section>

<!-- shopping cart summary -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-9">
            <h2 class="fs-1 fw-bold text-dark">Shopping Cart</h2>
            <div class="text-dark">
                <?php 
                   if(isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']) ;
                    echo "<span class='fw-bold'>$count</span>";
                } else {
                    echo "<span class='fw-bold'>0</span>";
                }
                ?>
                
                <span>item'(s) on the cart  </span>
            </div>
            <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])){ ?>
                    
                    <table class="table  text-dark mt-4">
                        <thead>
                            <tr >
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody >
                    <?php
                        $product_id = array_column($_SESSION['cart'], column_key:'product_id');
                        $sql = "SELECT * FROM `products`";
                        $result = mysqli_query($conn , $sql);
                        while ($row = mysqli_fetch_assoc($result)) { 
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){ ?>
                                <tr class="align-items-center">
                                        <td scope="row" class="ms-01 ">
                                            <a href="product.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row['src'] ?>" class="img-fluid " alt="<?php echo $row['name'] ?>"> </a>
                                        </td>
                                        <td scope="row" class="w-15 fw-bold">
                                                <a href="product.php?id=<?php echo $row['id'] ?>" class="w-75 text-dark ms-2"><?php echo $row['name'] ?></a>
                                            <!-- <form  method="post">
                                                <button id="mince" type="button" class="fw-bold p-0 px-2 btn btn-light">-</button>
                                                <input name="quantity" class="mx-2 fw-bold w-25" id="quantity" value="1" disabled/>
                                                <button id="adding" type="button"  class="fw-bold p-0 px-2 btn btn-light">+</button>
                                            </form> -->
                                            </td>
                                        <td scope="row" class="fw-bold w-15">$<?php echo $row['price'] ?></td>
                                        <td scope="row" class="w-15">
                                            <form action="cart.php?action=remove&id=<?php echo $row['id'] ?>" method="POST" class="cart-items">
                                                <button type="submit" class="btn btn-danger " name="remove">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php 
                                $total = $total + $row['price'];
                                }
                            }
                        } ?>
                        </tbody>
                    </table>
                <?php }
                    else { ?>
                    <section class="mt-5 container">
                        <div class="row">
                            <div class="col-md-2 col-0"></div>
                            <div class="bg-white col-md-8 col-12">
                                <div class="text-center">
                                <h3 class="fs-5 fw-bold">
                                        Uh ho!
                                </h3> 
                                <p class="text-muted">Your Shopping Cart Is Empty</p>
                                <a href="store.php?filterby=bestselling" class="btn btn-primary"> Take Me To Shop Now </a>
                                </div>
                            </div>
                            <div class="col-md-2 col-0"></div>
                        </div>
                    </section>
                <?php } ?>
                    

        </div>
        <div class="col-md-3">
        <h2 class="fs-1 fw-bold text-dark ">Summary</h2>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div >

                <?php 
                  if (isset($_SESSION['cart'])){
                        $count  = count($_SESSION['cart']);
                        echo "<h6>Price ($count items)</h6>";
                    } else{
                        echo "<h6>Price (0 items)</h6>";
                    }
                    ?>
                      <h6>Delivery Charges</h6>
            </div>
            <div >
                <p class="text-dark">
                    $<?php echo $total; ?>
                </p>
                <h6 class="text-success">FREE</h6>
            </div>
        </div>
        <div class="line bg-secondary w-100"></div>
         <p class="text-muted fs-12">Shipping, taxes, and discount codes calculated at checkout.</p>
         <a href="info.php?total=<?php echo $total ?>" class="mt-3 btn w-100 btn-outline-primary fw-bold">
            Go To Checkout
         </a>
        </div>
    </div>
</section>

<!-- descount and continue section -->

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
    <address>
        <p class="text-dark">
            Call us
        </p>
        <a href="tel:+212 635747467" class="text-primary">
            +212 635747467
        </a>
    </address>
</section>

<?php 
    // require the footer 
    require_once("includes/footer.php");
?>