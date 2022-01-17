<!-- cart page -->
<?php 
    // require the config for db
    require_once("config/config.php");
    // require the header 
    require_once("includes/header.php");
?>
<!-- breadcumps -->
<section class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="index.php" class="text-primary">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
</section>

<!-- Orders summary -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="fs-1 fw-bold text-dark">Orders History</h2>
            <div class="text-dark">
                <span class="fw-bold">
                    <?php
                      $sql = "SELECT count(id) as nmbr_of_orders FROM `orders` ";
                      $result = mysqli_query($conn , $sql);
                      $row = mysqli_fetch_assoc($result) ;
                      echo $row['nmbr_of_orders'];
                      ?>
                </span>
                <span>Order</span>
            </div>
            <table class="table text-dark mt-4">
                <thead>
                    <tr >
                        <th scope="col">Product-Id</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody >
                     <?php 
                        $sql = "SELECT * FROM `orders` ORDER BY `id` DESC Limit 0,10";
                        $result = mysqli_query($conn , $sql);
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $product_id = $row["product_id"];
                            ?>
                            <tr class="ms-4">
                                <td scope="row" class="fw-bold w-15 "><a href="../product.php?id=<?php echo $row["product_id"] ?>"><?php echo $row["product_id"] ?></a></td>
                                <?php  
                                    $sql2 = "SELECT * FROM `products` WHERE `id` = '$product_id'";
                                    $result2 = mysqli_query($conn , $sql2);
                                    while ($row2 = mysqli_fetch_assoc($result2)) {  ?>
                                            <td scope="row" class="fw-bold w-15">$<?php echo $row2["price"] ?></td>
                                    <?php } ?>
                                <td scope="row" class="w-15"><span class="mx-2 fw-bold"><?php echo $row["Quantity"] ?></span></td>
                                <td scope="row" class="w-15"><span class="mx-2 fw-bold"><?php echo $row["date"] ?></span></td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
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