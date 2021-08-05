<?php
    defined( 'ABSPATH' ) || exit;

    $product_link = get_permalink( $product_id );
    $product_name = $product->get_id();
    $product_name = $product->get_name();
    $product_image = $product->get_image_id();
    $product_images = $product->get_gallery_image_ids();
    $first_image = array_shift( $product_images );

    $average_rating = (int)$product->get_average_rating();
    $max_rating = 5;

    $min_price = woocommerce_price( $product->get_variation_price( 'min', true ) );
    $max_price = woocommerce_price( $product->get_variation_price( 'max', true ) );

    $max_regular_price = woocommerce_price( $product->get_variation_regular_price( 'max', true ) );

    $size_attr_id = 'pa_canvas-size';
    $product_size = $product->get_attribute( $size_attr_id );

    $product_variation = $product->get_available_variations();
?>

<div class="modal-body quickShop">
    <div class="productView halo-quickShop">
        <div class="halo-productView-left productView-images zoom-image" data-image-gallery="">
            <div class="productView-image-wrapper">
                <div class="productView-nav">
                    <figure class="productView-image" data-image-gallery-main=""
                        style="position: relative; overflow: hidden;">
                        <div class="productView-img-container">
                            <a href="<?php echo $product_link;?>">
                                <?php echo wp_get_attachment_image( $product_image, 'product', false, ['class' => 'productView-image--default'] );?>
                            </a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
        <div class="halo-productView-right">
            <div class="productView-details">
                <div class="productView-product">
                    <h1 class="productView-title" style="-webkit-box-orient: vertical;"><?php echo $product_name;?></h1>
                    <div class="productView-topInfo">
                        <div class="productView-rating">
                            <span role="img">
                                <?php
                                    for ($i = 1; $i <= $max_rating; $i++):
                                ?>
                                    <span class="icon<?php echo $i > $average_rating ? ' icon--ratingEmpty' : '';?>">
                                        <svg aria-hidden="true">
                                            <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-star" />
                                        </svg>
                                    </span>
                                <?php
                                    endfor;
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="productView-price">

                        <div class="price-section price-section--withoutTax rrp-price--withoutTax"
                            style="display: none;">

                            <span data-product-rrp-price-without-tax="" class="price price--rrp">

                            </span>
                        </div>
                        <div class="price-section price-section--withoutTax non-sale-price--withoutTax price-none"
                            style="display: none;">
                            <span data-product-non-sale-price-without-tax="" class="price price--non-sale">
                                <?php echo $max_regular_price;?>
                            </span>
                        </div>
                        <div class="price-section price-section--withoutTax">
                            <span data-product-price-without-tax="" class="price price--withoutTax"><?php echo $min_price . ' - ' . $max_price; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="halo-quickShop-action">
        <div class="productView-options">
            <form class="form" method="post" 
                  id="quick-add-form"
                  data-cart-item-add="">
                <input type="hidden" name="quantity" value="1">
                <input type="hidden" name="action" value="variation_cart_add">
                <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                <div data-product-option-change="">
                    <?php
                        if( ! empty( $product_size ) ):
                            $taxonomy_label = wc_attribute_label( $size_attr_id, $product );
                    ?>
                        <div class="form-field" data-product-attribute>
                            <label class="form-label form-label--alternate form-label--inlineSmall">
                                <?php echo $taxonomy_label;?>
                                <small>
                                    *
                                </small>
                            </label>

                            <?php 
                                foreach( $product_variation as $variation ):
                                    $term = get_term_by( 'slug', $variation['attributes']['attribute_' . $size_attr_id], $size_attr_id );
                            ?>
                                <input class="form-radio" 
                                    type="radio" 
                                    name="variation_id"
                                    id="attribute_size_<?php echo $variation['variation_id'];?>"
                                    value="<?php echo $variation['variation_id'];?>"
                                    data-variation-id="<?php echo $variation['variation_id'];?>"
                                    required="">
                                <label class="form-option form-option-rectangle" 
                                    for="attribute_size_<?php echo $variation['variation_id'];?>">
                                    <span class="form-option-variant form-option-length"><?php echo $term->name;?></span>
                                </label>
                            <?php
                                endforeach;
                            ?>
                        </div>
                    <?php
                        endif;
                    ?>

                    <div class="form-field" data-product-attribute="input-file">
                        <label class="form-label form-label--alternate form-label--inlineSmall"
                            for="attribute_file_908">
                            Choose your photo
                            <small>
                                *
                            </small>
                        </label>
                        <input class="form-file" 
                               accept=".bmp, .gif, .jpg, .jpeg, .jpe, .jif, .jfif, .jfi, .png, .wbmp, .xbm, .tiff" 
                               type="file" 
                               id="attribute_file_908" 
                               name="image" 
                               required>
                    </div>
                </div>
                <div class="alertBox productAttributes-message" style="display:none">
                    <div class="alertBox-column alertBox-icon">
                        <icon glyph="ic-success" class="icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z">
                                </path>
                            </svg></icon>
                    </div>
                    <p class="alertBox-column alertBox-message"></p>
                </div>

                <div class="productView-actions">
                    <div class="form-action">
                        <input id="form-action-addToCart" data-form-action-addtocart=""
                            data-wait-message="Adding to cart…" class="button button--primary" type="submit"
                            value="Add to Cart">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>