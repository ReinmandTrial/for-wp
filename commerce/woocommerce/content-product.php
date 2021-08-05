<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id = $product->get_id();

$product_link = get_permalink( $product_id );
$product_name = $product->get_name();
$product_image = $product->get_image_id();
$product_images = $product->get_gallery_image_ids();
$first_image = array_shift( $product_images );

$min_price = wc_price( $product->get_variation_price( 'min', true ) );
$max_price = wc_price( $product->get_variation_price( 'max', true ) );

$max_regular_price = wc_price( $product->get_variation_regular_price( 'max', true ) );

$average_rating = (int)$product->get_average_rating();
$max_rating = 5;

?>
<div class="product">
    <article class="card card-hover" data-product-id="<?php echo $product_id;?>">
        <figure class="card-figure">
            <a href="<?php echo $product_link;?>" class="card-link">
                <div class="card-img-container">
                    <?php echo wp_get_attachment_image( $product_image, 'product', false, ['class' => 'card-image'] );?>
                    <span class="card-image-2">
                        <?php echo wp_get_attachment_image( $first_image, 'product' );?>
                    </span>
                </div>
            </a>
            <div class="card-figure-button">
                <a class="card-quickview" 
                   href="#" 
                   data-event-type="quick-view"
                   data-product-id="<?php echo $product_id;?>">Quick view</a>
            </div>
        </figure>
        <div class="card-body">
            <div class="card-body-content">
                <h4 class="card-title">
                    <a href="<?php echo $product_link;?>" class="card-ellipsis"
                        style="-webkit-box-orient: vertical;">
                        <?php echo $product_name;?>
                    </a>
                </h4>
                <p class="card-rating" data-test-info-type="productRating">
                    <span class="rating--small">
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
                    </span>
                </p>
                <div class="card-price" data-test-info-type="price">

                    <div class="price-section price-section--withoutTax rrp-price--withoutTax" style="display: none;">

                        <span data-product-rrp-price-without-tax class="price price--rrp">

                        </span>
                    </div>
                    <div class="price-section price-section--withoutTax non-sale-price--withoutTax price-none"
                        style="display: none;">
                        <span data-product-non-sale-price-without-tax class="price price--non-sale">
                            <?php echo $max_regular_price;?>
                        </span>
                    </div>
                    <div class="price-section price-section--withoutTax">
                        <span data-product-price-without-tax class="price price--withoutTax"><?php echo $min_price . ' - ' . $max_price; ?></span>
                    </div>

                </div>
                <div class="card-option card-option-532">
                    <div class="form-field"></div>
                </div>
            </div>
            <div class="card-body-button">
                <a href="#" 
                   data-event-type="quick-add" 
                   class="card-action halo-quick-shop" 
                   data-product-id="<?php echo $product_id;?>">
                    <span>Quick Add</span>
                </a>
            </div>
        </div>
    </article>
</div>