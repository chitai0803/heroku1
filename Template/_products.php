<!--   product  -->
<?php

    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] =="POST"){
        if (isset($_POST['_product_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <img style="height:500px; width: 450px;" img src="./assets/products/<?php echo $item['item_image'] ?? "./assets/products/" ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-20 font-baloo">
                    <form>
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                    </div>
                    </form>
                    <div class="col">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-15">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="_product_submit" class="btn btn-warning font-size-15">Add to Cart</button>';
                            }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>$162.00</strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">$<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">$152.00</span></td>
                    </tr>
                </table>
                <!---    !product price       -->

                <!--    #policy -->
               
                <!--    !policy -->
                <hr>

                <!-- order-details -->
               
                <!-- !order-details -->

                <div class="row">
                   
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>            


            </div>

            <div class="col-12">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <?php echo $item['item_register'];?>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
        endif;
        endforeach;
?>