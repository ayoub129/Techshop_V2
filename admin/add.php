<?php
    require_once("config/config.php"); 
    require_once("includes/header.php");

    if(isset($_POST['new_product'])) {
        $name = $_POST['name'];
        $orders = $_POST['orders'];
        $old = $_POST['old'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];



    }
?>

<section class="mt-5">
    <h2 class="fs-2 fw-bold text-dark">Add New Products</h2>
    <form class="row" method="POST">
        <div class="col-sm-3 col-12"></div>
        <div class="col-sm-6 col-12">
            <div class="card  w-100">
                <div class="card-body p-4">
                    <div class="mb-5">
                        <label for="Name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="Name" >
                    </div>
                    <div class="mb-5">
                        <label for="orders" class="form-label">Orders</label>
                        <input type="text" name="orders" class="form-control" id="orders" >
                    </div>
                    <div class="mb-5 row">
                        <div class="col-6">
                            <label for="oldprice" class="form-label">Old Price</label>
                            <input type="text" name="old" class="form-control" id="oldprice" >
                        </div>
                        <div class="col-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" id="price" >
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="desc" class="form-label">Type Description</label>
                        <textarea class="form-control" name="desc" rows='5' id="desc" ></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="img-main" class="form-label">Upload Img</label>
                        <input type="file" name="img" class="form-control" id="img-main" >
                    </div>
                    <div class="mb-5">
                        <label for="img-media" class="form-label">Upload 1 Media</label>
                        <input type="file" name="media1"  class="form-control" id="img-media" >
                    </div>
                    <div class="mb-5">
                        <label for="img-media" class="form-label">Upload 2 Media</label>
                        <input type="file" name="media2"  class="form-control" id="img-media" >
                    </div>
                    <div class="mb-5">
                        <label for="img-media" class="form-label">Upload 3 Media</label>
                        <input type="file" name="media3"  class="form-control" id="img-media" >
                    </div>
                    <div class="mb-5">
                        <label for="img-media" class="form-label">Upload 4 Media</label>
                        <input type="file" name="media4"  class="form-control" id="img-media" >
                    </div>
                    <button type="submit" name="new_product" class="btn btn-outline-primary w-100">
                        Add
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-3 col-12"></div>
    </form>
</section>

<?php
    require_once("includes/footer.php") 
?>