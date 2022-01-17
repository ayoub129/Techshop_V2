<?php 

session_start();
if(isset($_POST['logout'])){
    unset($_SESSION['id']);
    header("Location:index.php");
}


if(isset($_POST['search'])) {
    $search_text = $_POST['search_text'];
    header("Location : store.php?collection=''&search_text=$search_text&filterby=bestselling");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- swiper -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <!-- style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home Page</title>
</head>
<body>
<header>
    <!-- promotion -->
    <div class="text-center w-100 p-1 bg-dark">
        <p class="mb-0 text-white"> Free Shipping to Our First-Time Customers  </p>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="http://localhost/techshop/"> <span class="text-primary">T</span>echShop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex w-75 ms-4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input class="form-control" type="search" name="search_text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" name="search" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav ms-auto align-items-center mb-2 mb-lg-0">
                    <?php 
                        if(isset($_SESSION["id"])) { ?>
                            <li class="nav-item me-3">
                              <a class="nav-link text-dark fw-bold hv-primary" href="account.php?page=1">Account</a>
                            </li>
                            <li class="nav-item me-3">
                                <form method="POST">
                                    <button type="submit" name="logout" class="btn p-0 nav-link text-dark fw-bold hv-primary" >Log Out</button>
                                </form>
                            </li>
                        <?php
                        } else {
                        ?>
                             <li class="nav-item me-3">
                                <a class="nav-link text-dark fw-bold hv-primary" href="login.php">Log In</a>
                             </li>
                         <?php }?>
                    |
                    <li class="nav-item ms-3">
                        <a class="nav-link  hv-primary position-relative text-dark" href="cart.php">
                             <i class="fas fa-shopping-cart me-2 "></i> <span class="fw-bold ">Cart</span> 
                             <?php                              
                                    if(isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']) ;
                                        echo "<span class='position-absolute number-cart rounded-circle bg-primary text-white'>$count</span>";
                                    } else {
                                        echo "<span class='position-absolute number-cart rounded-circle bg-primary text-white'>0</span>";
                                    }
                             
                             ?>
                                 
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   <hr class="bg-danger">
 <!-- categories list links -->
 <div class="bg-light py-2">
        <div class="container">
            <?php  
                $sql = "SELECT * FROM `collection`";
                $result = mysqli_query($conn , $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                      <a href="store.php/collection_id=<?php echo $row['id'] ?>" class="text-dark hv-primary fw-bold"><?php echo  $row["name"] ?></a>
               <?php   } ?>
        </div>
    </div>
</header>

<div class="container">