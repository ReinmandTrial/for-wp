<?php
    if( ! empty( $regular_price ) ):
?> 
<div class="price-section price-section--withoutTax non-sale-price--withoutTax price-none" style="">
    <span data-product-non-sale-price-without-tax="" class="price price--non-sale"><?php echo wc_price( $regular_price );?></span>
</div>
<?php
    endif;
    if( ! empty( $sale_price ) ):
?>

<div class="price-section price-section--withoutTax">
    <span data-product-price-without-tax="" class="price price--withoutTax"><?php echo wc_price( $sale_price );?></span>
</div>

<?php
    endif;
?>