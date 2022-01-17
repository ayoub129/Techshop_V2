<?php
    require_once("config/config.php"); 
    require_once("includes/header.php");

    $err = "";
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $name = $_POST['name'];
        $home = $_POST['home'];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $err = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        $err = "Sorry, file already exists.";
        $uploadOk = 0;
        }
    
        // Check file size
        if ($_FILES["img"]["size"] > 500000) {
        $err = "Sorry, your file is too large.";
        $uploadOk = 0;
        }
    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        $err = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            // $err = "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
    
            if($home != null && $name != null) {
                $sql = "INSERT INTO `promotion` (`src` , `name` , `home_page`) VALUES ('$target_file' , '$name' , '$home')";
    
                if( mysqli_query($conn , $sql)) {
                    header("Location: ../index.php");
                }
    
            } else {
                $err = "Name And Home Page Are Required";
            }
    
        } else {
            $err = "Sorry, there was an error uploading your file.";
        }
        }
    }

?>
<section class="mt-5">
    <h2 class="fs-2 fw-bold text-dark">Add New Promotion</h2>
    <form class="row mt-5" method="POST" enctype="multipart/form-data">
        <div class="col-sm-6 col-12">
            <div class="card  w-100">
                <div class="card-body p-4">
                    <div class="mb-5">
                        <label for="name" class="form-label">name</label>
                        <input type="text" name="name" class="form-control" id="name" >
                    </div>
                    <div class="mb-5">
                        <label for="home-page" class="form-label">home-page</label>
                        <input type="text" name="home" class="form-control" id="home-page" >
                    </div>
                    <div class="mb-5">
                        <label for="img" class="form-label">Promotion img</label>
                        <input type="file" name="img" class="form-control" id="img" >
                    </div>
                    <?php echo "<span class='text-danger'>$err</span>" ?>
                    <button type="submit" name="submit" class="btn btn-outline-primary w-100">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
<?php
    require_once("includes/footer.php") 
?>