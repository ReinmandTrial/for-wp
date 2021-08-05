<?php
    defined( 'ABSPATH' ) || exit;

    $title = get_field( 'bestsellers_title', 'option' );

    $_products = get_field( 'bestsellers_items', 'option' );
    $products = [];

    if( ! empty( $_products ) ){
        $products = $_products;
    }else{
        $products = wc_get_products(array(
            'meta_key'             => '_price',
            'status'               => 'publish',
            'limit'                => 8,
            'featured'             => true,
            'paginate'             => true,
            'return'               => 'ids'
        ))->products;
    }

    if( ! empty( $products ) ):
?>

<div class="halo-block halo-block-product halo-block-product2 padding-top-30 padding-bottom-30">
    <div class="container">
        <?php
            if( ! empty( $title ) ):
        ?>
        <div class="halo-block-header">
            <h3 class="title"><?php echo $title;?></h3>
        </div>
        <?php
            endif;
        ?>
        <div class="productCarousel" id="bestseller-block">
            <?php
                foreach($products as $featured_product):
                    $post_object = get_post($featured_product);
                    setup_postdata($GLOBALS['post'] =& $post_object);
            ?>
                        <div class="productCarousel-slide"> <?php wc_get_template_part('content', 'product'); ?> </div>
            <?php
                endforeach;
                
                if( empty( $_products ) ){
                    wp_reset_postdata();
                }
            ?>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function($){
            $('#bestseller-block').slick({
                "dots": true,
                "arrows": false,
                "infinite": false,
                "mobileFirst": true,
                "adaptiveHeight": true,
                "infinite": false,
                "slidesToShow": 2,
                "slidesToScroll": 1,
                "nextArrow": "<svg class='slick-next slick-arrow slick-arrow-large' aria-label='Next Slide'><use xlink:href='#slick-arrow-next'></use></svg>", 
                "prevArrow": "<svg class='slick-prev slick-arrow slick-arrow-large' aria-label='Previous Slide'><use xlink:href='#slick-arrow-prev'></use></svg>",
                "responsive": [
                    {
                        "breakpoint": 1024,
                        "settings": {
                            "arrows": true,
                            "slidesToShow": 4,
                            "slidesToScroll": 4
                        }
                    },
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 3,
                            "slidesToScroll": 3
                        }
                    },
                    {
                        "breakpoint": 767,
                        "settings": {
                            "slidesToShow": 2,
                            "slidesToScroll": 2
                        }
                    }
                ]
            })
        })
    </script>
</div>
<div data-content-region="home_below_featured_products"></div>
<?php
    endif;