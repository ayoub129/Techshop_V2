<?php
    require_once("config/config.php"); 
    require_once("includes/header.php") 
?>

<section class="mt-5">
    <h2 class="fs-2 fw-bold text-dark">Add New Category</h2>
    <form class="row" method="POST">
        <div class="col-sm-3 col-12"></div>
        <div class="col-sm-6 col-12">
            <div class="card  w-100">
                <div class="card-body p-4">
                    <div class="mb-5">
                        <label for="Name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="Name" >
                    </div>
                    <div class="mb-5">
                        <label for="desc" class="form-label">Type Description</label>
                        <textarea class="form-control" rows='5' id="desc" ></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="img-main" class="form-label">Upload Img</label>
                        <input type="file" class="form-control" id="img-main" >
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