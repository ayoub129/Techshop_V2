<?php 

// connect to database
$conn = mysqli_connect("localhost" , "root" , ""  , "Techshop");

// check for err
if(mysqli_error($conn)) {
    echo "connect database";
}
?>

<!-- finished -->