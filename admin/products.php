<!-- cart page -->
<?php 
    // require the config for db
    require_once("config/config.php");
    // require the header 
    require_once("includes/header.php");

    $sql = "SELECT count(id) as nmbr_of_products FROM `products` ";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result) ;
    $page = $_GET['page'];

    if(!isset($page)) {
        $page = 1;
    } 
    $nbr_elemnts_per_page = 10;
    $nbr_page = ceil($row['nmbr_of_products']/ $nbr_elemnts_per_page);

    $start = ($page - 1) * $nbr_elemnts_per_page;
    $sql2 = "SELECT * FROM `products`  ORDER BY `id` LIMIT $start , $nbr_elemnts_per_page";
    $result2 = mysqli_query($conn , $sql2);

?>
<!-- products summary -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="fs-1 fw-bold text-dark">Products</h2>
            <div class="d-flex align-items-center justify-content-between">
                <div class="text-dark">
                    <span class="fw-bold">
                        <?php
                      echo $row['nmbr_of_products'];
                      ?>
                    </span>
                    <span>Products</span>
                </div>
                <div>
                    <a href="cat.php" class="btn btn-primary">Add New Category</a>
                    <a href="add.php" class="btn btn-outline-primary">Add New</a>
                </div>
            </div>
            <table class="table text-dark mt-4">
                <thead>
                    <tr >
                        <th scope="col">Product</th>
                        <th scope="col">image</th>
                        <th scope="col">Compare Price</th>
                        <th scope="col">Price</th>
                        <th scope="col">Orders</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody >
                     <?php 
                        while ($row2 = mysqli_fetch_assoc($result2)) { 
                            if(count($row2) == 0) {
                                header("Location:./");
                            }
                            ?>
                            <tr class="ms-4">
                                <td scope="row" class="fw-bold w-20 "><a href="techshop/product.php?id=<?php echo $row2["id"] ?>"></a><?php echo $row2["name"] ?></td>
                                <td scope="row" class="fw-bold w-20">
                                    <img src="<?php echo $row2["src"] ?>" alt="<?php echo $row2["name"] ?>" class='img-fluid'>
                                </td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["old-price"] ?></span></td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["price"] ?></span></td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["sales"] ?></span></td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold">
                                    <form  method="post">
                                        <button type="submit" class='btn btn-danger'>Delete</button>
                                        <button type="button" class='btn btn-warning'>Edit</button>
                                    </form>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-center">
                <div id="pagination">
                    <?php 
                        for($i=1 ; $i<=$nbr_page;$i++) {
                            echo "<a href='?page=".$i."'>".$i."</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
    // require the footer 
    require_once("includes/footer.php");
?>