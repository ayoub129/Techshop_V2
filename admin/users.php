<!-- cart page -->
<?php 
    // require the config for db
    require_once("config/config.php");
    // require the header 
    require_once("includes/header.php");

    $sql = "SELECT count(id) as nmbr_of_users FROM `users` ";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result) ;
    $page = $_GET['page'];

    if(!isset($page)) {
        $page = 1;
    } 
    $nbr_elemnts_per_page = 10;
    $nbr_page = ceil($row['nmbr_of_users']/ $nbr_elemnts_per_page);

    $start = ($page - 1) * $nbr_elemnts_per_page;
    $sql2 = "SELECT * FROM `users`  ORDER BY `id` LIMIT $start , $nbr_elemnts_per_page";
    $result2 = mysqli_query($conn , $sql2);

?>
<!-- users summary -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="fs-1 fw-bold text-dark">Users</h2>
                <div class="text-dark">
                    <span class="fw-bold">
                        <?php
                      echo $row['nmbr_of_users'];
                      ?>
                    </span>
                    <span>Users</span>
                </div>
            <table class="table text-dark mt-4">
                <thead>
                    <tr >
                        <th scope="col">id</th>
                        <th scope="col">FirstName</th>
                        <th scope="col">LastName</th>
                        <th scope="col">Email</th>
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
                             
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["id"] ?></span></td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["firstname"] ?></span></td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["lastname"] ?></span></td>
                                <td scope="row" class="w-20"><span class="mx-2 fw-bold"><?php echo $row2["email"] ?></span></td>
                                <td scope="row" class="w-20 mx-2 fw-bold">
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