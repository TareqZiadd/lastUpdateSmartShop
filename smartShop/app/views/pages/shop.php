<?php require APPROOT . '/views/inc/header.php'; ?>



<!-- left join   -- product on left   -->
<!-- all left table  && some right table   -->




<div class="hero-wrap hero-bread" style="background-image: url(<?php echo URLROOT; ?>/images/post-item7.jpg)">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
                <h1 class="mb-0 bread">Shop</h1>
            </div>
        </div>
    </div>
</div>
<a href="<?php echo URLROOT ?>/product/add" style="background-color:rgba(72,71,71,0.01);margin-left:230px;border-radius: 13px;font-size: 22px" class="add-to-cart text-center py-2 mr-1"><span>Add Product </span></a>

<section class="ftco-section bg-light">

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-lg-10 order-md-last">

                <div class="row">
                    <?php  foreach ($data['shops'] as $product): ?>

                        <h1>cart quantity </h1>
                        <?php echo $product->cart_quantity?>
                    <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                    <div class="product d-flex flex-column <?php echo $product->cart_quantity > 0 ? 'dark-card' : ''; ?>">
                    <!--                             to add photo-->
                    <a href="#" class="img-prod">
        <img class="img-fluid <?php echo $product->cart_quantity > 0 ? 'shadow-img' : ''; ?>" 
             src="<?php echo URLROOT; ?>/images/banner-image1.png" alt="Colorlib Template">
        <div class="overlay"></div>
    </a>

                            <div class="text py-3 pb-4 px-3">
                                <div class="d-flex">
                                    <div class="cat">
                                        <h3><?php echo $product->name; ?></h3>

                                    </div>

                                </div>
                                <h3><a href="#"><?php echo "price of product : ".$product->price. "jd"; ?></a></h3>
                                <div class="pricing">
                                    <p class="price"><span><?php echo $product->description . '  and i have ' . $product->quantity . '  for this product'; ?></span></p>
                                </div>
                                <p class="bottom-area d-flex px-3">
                                <form action="<?php echo URLROOT; ?>/carts/quantityNum" method="POST" class="bottom-area d-flex px-3">
                                 <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                                 <input type="hidden" name="product_name" value="<?php echo $product->name; ?>">
                                 <input type="hidden" name="product_price" value="<?php echo $product->price; ?>">
                                <input type="hidden" name="product_quantity" value="<?php echo $product->quantity; ?>">
                                <button type="submit" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
</form>
                                    <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>



                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <ul>
                                <li><a href="#">&lt;</a></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2">
                <div class="sidebar">
                    <div class="sidebar-box-2">
                        <h2 class="heading">Categories</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Men's Shoes
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Sport</a></li>
                                                <li><a href="#">Casual</a></li>
                                                <li><a href="#">Running</a></li>
                                                <li><a href="#">Jordan</a></li>
                                                <li><a href="#">Soccer</a></li>
                                                <li><a href="#">Football</a></li>
                                                <li><a href="#">Lifestyle</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Women's Shoes
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Sport</a></li>
                                                <li><a href="#">Casual</a></li>
                                                <li><a href="#">Running</a></li>
                                                <li><a href="#">Jordan</a></li>
                                                <li><a href="#">Soccer</a></li>
                                                <li><a href="#">Football</a></li>
                                                <li><a href="#">Lifestyle</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Accessories
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Jeans</a></li>
                                                <li><a href="#">T-Shirt</a></li>
                                                <li><a href="#">Jacket</a></li>
                                                <li><a href="#">Shoes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">Clothing
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Jeans</a></li>
                                                <li><a href="#">T-Shirt</a></li>
                                                <li><a href="#">Jacket</a></li>
                                                <li><a href="#">Shoes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-gallery">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
                <h2 class="mb-4">Follow Us On Instagram</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo URLROOT; ?>/images/insta-item2.jpg)">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo URLROOT; ?>/images/insta-item3.jpg)">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo URLROOT; ?>/images/insta-item4.jpg)">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo URLROOT; ?>/images/insta-item5.jpg)">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo URLROOT; ?>/images/cat-item6.png)">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 ftco-animate">
                <a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo URLROOT; ?>/images/insta-item6.jpg)">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-instagram"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
