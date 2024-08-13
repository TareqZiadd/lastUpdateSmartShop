<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="hero-wrap hero-bread" style="background-image: url(<?php echo URLROOT; ?>/images/post-item7.jpg)">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Carts</h1>
            </div>
        </div>
    </div>
</div>


<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <?php 
                    $total = 0; 
                    if (!empty($data['carts'])): 
                        foreach ($data['carts'] as $cart) {
                            $total += $cart->price * $cart->quantity; 
                        }
                    endif;
                    ?>
                    <form action="<?php echo URLROOT; ?>/carts/checkout" method="post">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['carts'])): ?>
                                    <?php foreach ($data['carts'] as $cart): ?>
                                        <tr class="text-center">
                                            <td class="product-remove">
                                                <a href="<?php echo URLROOT . "/carts/delById/" . $cart->product_id; ?>">
                                                    <span class="ion-ios-close"></span> DELETE
                                                </a>
                                            </td>
                                            <td class="image-prod">
                                                <div class="img" style="background-image:url(<?php echo URLROOT; ?>/images/banner-image.png);"></div>
                                            </td>
                                            <td class="product-name">
                                                <h3><?php echo $cart->name; ?></h3>
                                            </td>
                                            <td class="price">$<?php echo number_format($cart->price, 2); ?></td>
                                            <td class="quantity">
                                                <input type="hidden" name="products[<?php echo $cart->product_id; ?>][product_id]" value="<?php echo $cart->product_id; ?>">
                                                <select name="products[<?php echo $cart->product_id; ?>][quantity]" class="form-control quantity-select" data-price="<?php echo $cart->price; ?>">
                                                    <?php for ($i = 1; $i <= $cart->quantity; $i++): ?>
                                                        <option value="<?php echo $i; ?>" <?php echo ($i == $cart->quantity) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </td>
                                            <td class="total">$<span class="product-total"><?php echo number_format($cart->price * $cart->quantity, 2); ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No items in cart</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="row justify-content-start">
                            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                                <div class="cart-total mb-3">
                                    <h3>Cart Totals</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span id="cart-subtotal">$<?php echo number_format($total, 2); ?></span>
                                    </p>
                                </div>
                                <p class="text-center">
                                    <button type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/cart-js.php'; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
