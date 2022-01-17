<?php 
    require_once("config/config.php"); 
    require_once("includes/header.php");

    $id = $_GET["id"];
    
?>
   <div class="row  mt-5">
        <?php 
            $sql = "SELECT * FROM `products`  WHERE `id` = '$id'  ";
            $result = mysqli_query($conn , $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
         <div class=" col-sm-6 col-12">
                <img src="<?php echo $row['src'] ?>" alt="<?php echo $row['name'] ?> " class="img-fluid">
                <div class="row align-items-center mt-4">
                    <div class="col-md-3">
                        <img src="<?php echo $row['src'] ?>" alt="<?php echo $row['name'] ?>" class="img-fluid">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo $row['src1'] ?>" alt="<?php echo $row['name'] ?>" class="img-fluid">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo $row['src2'] ?>" alt="<?php echo $row['name'] ?>" class="img-fluid">
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo $row['src3'] ?>" alt="<?php echo $row['name'] ?>" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class=" col-sm-6 col-12">
                    <h2 class="fs-4  ms-4 fw-bold text-dark">
                        <?php echo $row["name"] ?>
                    </h2>
                    <p class="text-muted ms-4">
                        <?php echo $row['description'] ?>
                    </p>
                    <div class="d-flex align-items-center my-3 ms-4">
                        <p class=" fw-bold text-dark mb-0 fs-5"> Price:  $<?php echo $row["price"] ?></p>
                        <del class="text-muted ms-3">$<?php echo $row["old-price"] ?></del>
                    </div>

                    <div class="d-flex align-items-center my-3 ms-4">
                        <!-- reviws -->
                        <p></p>
                        <!-- orders -->
                        <p>
                        <?php echo $row["sales"] ?>  orders
                        </p>
                    </div>
                    <p class="mb-0 fw-bold ms-4">Quantity</p>
                    <a href="#" class="text-dark ms-4">-</a>
                        <span class="mx-2 fw-bold">1</span>
                    <a href="#" class="text-dark">+</a>
                    <div class="mt-4 d-flex align-items-center ms-4">
                        <a href="#" class="btn btn-outline-primary">Add To Cart</a>
                        <a href="#" class="btn btn-primary ms-3">Buy Now</a>
                    </div>
            </div>
        <?php }   ?>
   </div>
   <!-- feedback -->
   
   <!-- add yours -->
<?php 
    require_once("includes/footer.php")
?>