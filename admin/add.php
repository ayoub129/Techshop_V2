<?php
    require_once("config/config.php"); 
    require_once("includes/header.php") 
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
                        <input type="text" class="form-control" id="Name" >
                    </div>
                    <div class="mb-5">
                        <label for="orders" class="form-label">Orders</label>
                        <input type="text" class="form-control" id="orders" >
                    </div>
                    <div class="mb-5 row">
                        <div class="col-6">
                            <label for="oldprice" class="form-label">Old Price</label>
                            <input type="text" class="form-control" id="oldprice" >
                        </div>
                        <div class="col-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" >
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="desc" class="form-label">Type Description</label>
                        <textarea class="form-control" rows='5' id="desc" ></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="img-main" class="form-label">Upload Img</label>
                        <input type="file" class="form-control" id="img-main" >
                    </div>
                    <div class="mb-5">
                        <label for="img-media" class="form-label">Upload All Media</label>
                        <input type="file" multiple class="form-control" id="img-media" >
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-100">
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