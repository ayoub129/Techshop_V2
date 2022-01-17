<!-- cart page -->
<?php 
    // require the config for db
    require_once("config/config.php");
    // require the header 
    require_once("includes/header.php");

    $sql = "SELECT count(id) as nmbr_of_Contacts FROM `Contacts` ";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result) ;
    $page = $_GET['page'];

    if(!isset($page)) {
        $page = 1;
    } 
    $nbr_elemnts_per_page = 10;
    $nbr_page = ceil($row['nmbr_of_Contacts']/ $nbr_elemnts_per_page);

    $start = ($page - 1) * $nbr_elemnts_per_page;
    $sql2 = "SELECT * FROM `Contacts`  ORDER BY `id` LIMIT $start , $nbr_elemnts_per_page";
    $result2 = mysqli_query($conn , $sql2);

?>
<!-- Contacts summary -->
<section class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="fs-1 fw-bold text-dark">Contacts</h2>
                <div class="text-dark">
                    <span class="fw-bold">
                        <?php
                      echo $row['nmbr_of_Contacts'];
                      ?>
                    </span>
                    <span>Contacts</span>
                </div>
            <table class="table text-dark mt-4">
                <thead>
                    <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Sender_Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Msg</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody >
                     <?php 
                        while ($row2 = mysqli_fetch_assoc($result2)) { 
                            if(count($row2) == 0) {
                                header("Location:./");
                            }
                            ?>
                            <tr class="ms-4" height="5">
                                <td scope="row" class="fw-bold w-20 "><?php echo $row2["id"] ?></td>
                                <td scope="row" class="fw-bold w-20"><?php echo $row2["name"] ?></td>
                                <td scope="row" class="w-20"><span class="fw-bold"><?php echo $row2["email"] ?></span></td>
                                <td scope="row" class="w-20 h-40"><span class="fw-bold "><?php echo $row2["message"] ?></span></td>
                                <td scope="row" class="w-20"><span class="fw-bold"><?php echo $row2["time"] ?></span></td>
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