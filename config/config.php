<?php 

// connect to database
$conn = mysqli_connect("localhost" , "root" , ""  , "Techshop");


if(mysqli_error($conn)) {
    echo "connect database";
}
?>