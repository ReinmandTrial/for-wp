<?php
    defined( 'ABSPATH' ) || exit;

    $term = get_term( $args['category_id'], $args['taxonomy'] );
    $term_link = get_term_link( $args['category_id'], $args['taxonomy'] );

    $query = new WP_Query( [
        'post_type'      => 'product',
        'posts_per_page' => 4,
        'tax_query'      => [
            [
                'taxonomy'      => 'product_cat',
                'field'         => 'term_id',
                'terms'         => $args['category_id'],
                'operator'      => 'IN' 
            ],
            [
                    'taxonomy'      => 'product_visibility',
                    'field'         => 'slug',
                    'terms'         => 'exclude-from-catalog',
                    'operator'      => 'NOT IN'
            ]
        ]
    ] );
?>

<div class="halo-block halo-block-product halo-block-product-banners padding-top-30 padding-bottom-30"
    data-category-with-banner-id="107">
    <!-- <div class="loadingOverlay"></div> -->
    <div class="container">
        <div class="halo-block-header">
            <h2 class="title"><?php echo $term->name;?></h2>
        </div>
        <div class="productCarousel-wrapper">
            <div class="productCarousel" id="category-slider-<?php echo $args['category_id'];?>">
                <?php
                    if( $query->have_posts() ):
                        while( $query->have_posts() ){
                            $query->the_post();
                        ?>
                            <div class="productCarousel-slide">
                        <?php
                            wc_get_template_part('content', 'product');
                        ?>
                            </div>
                        <?php
                        }
                    else:
                ?>
                    <p>No products</p>
                <?php
                    endif;
                    wp_reset_query();
                ?>
            </div>
            <div class="productBanner">
                <div class="bannerContent">
                    <a class="image" href="<?php echo $term_link;?>">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/block.jpg"
                            data-src=""
                            alt="<?php echo $term->name;?>" 
                            title="<?php echo $term->name;?>">
                    </a>
                    <div class="content">
                        <span class="sub-heading">Must Have</span>
                        <h3 class="heading heading-with-line heading-with-line2">
                            <span><?php echo $term->name;?></span>
                        </h3>
                        <a href="<?php echo $term_link;?>" class="button button--primary">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#category-slider-<?php echo $args['category_id'];?>').slick({
        'dots': true,
        'arrows': false,
        'infinite': false,
        'mobileFirst': true,
        'adaptiveHeight': true,
        'infinite': false,
        'slidesToShow': 2,
        'slidesToScroll': 1,
        'nextArrow': "<svg class='slick-next slick-arrow slick-arrow-large' aria-label='Next Slide'><use xlink:href='#slick-arrow-next'></use></svg>", 
        'prevArrow': "<svg class='slick-prev slick-arrow slick-arrow-large' aria-label='Previous Slide'><use xlink:href='<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#slick-arrow-prev'></use></svg>",
        'responsive': [
            {
                'breakpoint': 1024,
                'settings': {
                    'arrows': true,
                    'slidesToShow': 4,
                    'slidesToScroll': 4
                }
            },
            {
                'breakpoint': 991,
                'settings': {
                    'slidesToShow': 3,
                    'slidesToScroll': 3
                }
            },
            {
                'breakpoint': 767,
                'settings': {
                    'slidesToShow': 2,
                    'slidesToScroll': 2
                }
            }
        ]
    })
</script>