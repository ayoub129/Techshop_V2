    </div>
    <footer class='bg-dark mt-5'>
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-3 col-sm-6 col-12">
                     <a class="fw-bold text-white" href="index.php"> <span class="text-primary">T</span>echShop</a>
                     <p class="mt-4 lh-lg text-secondary word-spacing">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <p class='fw-bold text-light'>PRODUCTS</p>
                    <ul class='mt-4 ps-0'>
                        <?php  
                            $sql = "SELECT * FROM `collection` ";
                            $result = mysqli_query($conn , $sql);
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                               <li class="mb-2">
                                   <a href="store.php/collection_id=<?php echo $row['id'] ?>" class="text-white hv-primary "><?php echo  $row["name"] ?></a>
                               </li>
                        <?php   } ?>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                <p class='fw-bold text-light'>OUR SHOP</p>
                    <ul class='mt-4 ps-0'>
                         <li class="mb-2">
                            <a href="about.php" class="text-white hv-primary ">About us</a>
                        </li>
                        <li class="mb-2">
                            <a href="return.php" class="text-white hv-primary ">Return Policy</a>
                        </li>
                        <li class="mb-2">
                            <a href="privacy.php" class="text-white hv-primary ">Privacy Policy</a>
                        </li>
                        <li class="mb-2">
                            <a href="terms.php" class="text-white hv-primary ">Terms & Conditions</a>
                        </li>
                        <li class="mb-2">
                            <a href="contact.php" class="text-white hv-primary ">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <p class='fw-bold text-light'>LET'S SOCIALIZE</p>
                    <div class="mt-3 d-flex align-items-center justify-content-between w-75">
                        <a href="#" class="rounded-circle text-secondary hv-primary">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="rounded-circle text-secondary hv-primary">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="#" class="rounded-circle text-secondary hv-primary">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="rounded-circle text-secondary hv-primary">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr class='bg-white'>
        <div class="text-center my-2">
                <img src="assets/images/paypal.png" alt="paypal">
        </div>
        <hr class='bg-white'>
        <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-white">Copyright © <span id='date'></span> TechShop. All Rights Reserved.</p>
                    <p class="text-white">Powred by <a href="https://abbravei.netlify.app/" class='fw-bold hv-primary'>Abbravei</a></p>
                </div>
        </div>
    </footer>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- swiper -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- custome js -->
    <script src="assets/js/main.js"></script>
    </body>
</html>