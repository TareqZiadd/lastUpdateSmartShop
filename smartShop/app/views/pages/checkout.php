<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="hero-wrap hero-bread" style="background-image: url(<?php echo URLROOT; ?>/images/post-item7.jpg)">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo URLROOT; ?>/index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <!-- Display errors if there are any -->
                <?php if (isset($data['errors']) && !empty($data['errors'])): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($data['errors'] as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo URLROOT; ?>/carts/insertAdress" method="POST" class="billing-form">
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Shipping Address</label>
                                <input type="text" class="form-control" name="shipping_address" required minlength="7" maxlength="230">
                                <?php if (isset($data['errors']['shipping_address'])): ?>
                                    <span class="text-danger"><?php echo htmlspecialchars($data['errors']['shipping_address']); ?></span>
                                <?php endif; ?>
                                <input hidden type="text" name="total_amount" value="<?php echo htmlspecialchars($data['total']); ?>">
                            </div>
                        </div>
                    </div>
                    <p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
                </form>

                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total bg-light p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span><?php echo htmlspecialchars($data['total']); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
