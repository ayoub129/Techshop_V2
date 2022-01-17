<?php 
    require_once("config/config.php"); 
    require_once("includes/header.php");
    // get the user id
    $user_id = $_SESSION['id'];

    // pagination on orders
    $sql2 = "SELECT count(id) as nmbr_of_orders FROM `orders` WHERE `user_id` = '$user_id'";
    $result2 = mysqli_query($conn , $sql2);
    $row2 = mysqli_fetch_assoc($result2) ;
    $page = $_GET['page'];

    // set the pagination if it's equal to nothing
    if(!isset($page)) {
        $page = 1;
    } 
    $nbr_elemnts_per_page = 10;
    $nbr_page = ceil($row2['nmbr_of_orders']/ $nbr_elemnts_per_page);

    // get the orders page after page
    $start = ($page - 1) * $nbr_elemnts_per_page;
    $sql3 = "SELECT * FROM `orders` WHERE `user_id` = '$user_id'  ORDER BY `id` DESC  LIMIT $start , $nbr_elemnts_per_page";
    $result3 = mysqli_query($conn , $sql3);

?>

<?php if($row2['nmbr_of_orders'] == 0){ ?>
    <section class="mt-5 container">
        <div class="row">
            <div class="col-md-2 col-0"></div>
            <div class="bg-white col-md-8 col-12">
                <h2 class="text-dark fs-4 fw-bold mb-5">Order History</h2>
                <div class="text-center">
                  <h3 class="fs-5 fw-bold">
                        Uh ho!
                  </h3> 
                  <p class="text-muted">You haven't placed any orders yet.</p>
                  <a href="store.php" class="btn btn-outline-primary"> Take Me To Shop Now </a>
                </div>
            </div>
            <div class="col-md-2 col-0"></div>
        </div>
    </section>
<?php } else {?>
    <!-- Orders summary -->
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fs-1 fw-bold text-dark">Orders History</h2>
                <div class="text-dark">
                    <span class="fw-bold">
                        <?php
                          echo $row2['nmbr_of_orders'];
                          ?>
                    </span>
                    <span>Order</span>
                </div>
                <table class="table text-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col">image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody >
                         <?php 
                            while ($row3 = mysqli_fetch_assoc($result3)) { 
                                $product_id = $row3["product_id"];
                                ?>
                                <tr class="ms-4">
                                    <?php  
                                        $sql4 = "SELECT * FROM `products` WHERE `id` = '$product_id'";
                                        $result4 = mysqli_query($conn , $sql4);
                                        while ($row4 = mysqli_fetch_assoc($result4)) {  ?>
                                                <td scope="row" class="fw-bold w-15"> <a href="product.php?id=<?php echo $product_id ?>"> <img src="<?php echo $row4["src"] ?>" alt="<?php echo $row4["name"] ?>" class="img-fluid"></a></td>
                                 
                                                <td scope="row" class="fw-bold w-15">$<?php echo $row4["price"] ?></td>
                                        <?php } ?>
                                    <td scope="row" class="w-15"><span class="mx-2 fw-bold"><?php echo $row3["Quantity"] ?></span></td>
                                    <td scope="row" class="w-15"><span class="mx-2 fw-bold"><?php echo $row3["date"] ?></span></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <div id="pagination" class="mt-5">
                        <?php 
                            for($i=1 ; $i<=$nbr_page;$i++) {
                                echo "<a class='btn btn-primary' href='?page=".$i."'>".$i."</a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

<?php 
    require_once("includes/footer.php")
?>

<!-- good good very good -->