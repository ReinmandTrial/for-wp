<?php
    // Template name: Home page
    get_header();
?>

<?php
    if( have_rows( 'banners_slider' ) ):
?>
<div class="heroCarousel-wrapper">
    <div class="heroCarousel" id="home-carousel">
        <?php
                while( have_rows( 'banners_slider' ) ):
                    the_row();
                    $image_id = get_sub_field( 'image' );
                    $image_mobile_id = get_sub_field( 'image_mobile' );
                    $link = get_sub_field( 'link' );

                    if( empty( $image_mobile_id ) ){
                        $image_mobile_id = $image_id;
                    }
                    if( empty( trim( $link ) ) ){
                        $link = get_home_url();
                    }
            ?>
        <div class="heroCarousel-slide">
            <div class="heroCarousel-image-wrapper">
                <a class="heroCarousel-image" href="<?php echo $link;?>">
                    <?php echo wp_get_attachment_image( $image_id, 'full' );?>
                    <?php echo wp_get_attachment_image( $image_mobile_id, 'full', false, ['class' => 'image-mobile'] );?>
                </a>
            </div>
            <div class="heroCarousel-content-wrapper">
            </div>
        </div>
        <?php
                endwhile;
            ?>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $('#home-carousel').slick({
            "arrows": false,
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "autoplay": false,
            "autoplaySpeed": 1000,
            "lazyLoad": "anticipated",
            "infinite": true
        })
    })
</script>
<?php
    endif;
?>
<div class="main full">
    <?php 
        get_template_part( 'template-parts/block', 'advantages' ); 
        get_template_part( 'template-parts/block', 'seen-on' );
        //get_template_part( 'template-parts/block', 'bestseller' );
        
        if( have_rows( 'browse_collection' ) ):
            $collection_title = get_field( 'browse_collection_title' );
            $collection = get_field( 'browse_collection' );
    ?>
    <div id="halo_top_banners" class="halo-marketing-banners">
        <div class="halo-block halo-banners padding-top-30 padding-bottom-0">
            <div class="container">
                <?php
                    if( ! empty( $collection_title ) ):
                ?>
                <div class="halo-block-header">
                    <h3 class="title"><?php echo $collection_title;?></h3>
                </div>
                <?php
                    endif;

                    $first_el  = $collection[0];
                    $second_el = isset( $collection[1] ) ? $collection[1] : [];
                    $third_el  = isset( $collection[2] ) ? $collection[2] : [];
                    $fourth_el = isset( $collection[3] ) ? $collection[3] : [];
                ?>
                <div class="halo-image-collection">
                    <div class="item">
                        <div class="image-collection"><a class="image-wrapper image-with-overlay"
                                href="<?php echo $first_el['link'];?>"><?php echo wp_get_attachment_image( $first_el['image'], 'full' );?>
                            </a>
                            <div class="content-wrapper">
                                <h2 class="title"><?php echo $first_el['title'];?></h2>
                                <a class="button button--primary"
                                    href="<?php echo $first_el['link'];?>"><?php echo $first_el['button_text'];?></a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="item-child two-item-child">
                            <?php
                                if( ! empty( $second_el ) ):
                            ?>
                            <div class="image-collection"><a class="image-wrapper image-with-overlay"
                                    href="<?php echo $second_el['link'];?>"><?php echo wp_get_attachment_image( $second_el['image'], 'full' );?>
                                </a>
                                <div class="content-wrapper">
                                    <h2 class="title"><?php echo $second_el['title'];?></h2>
                                    <a class="button button--primary"
                                        href="<?php echo $second_el['link'];?>"><?php echo $second_el['button_text'];?></a>
                                </div>
                            </div>
                            <?php
                                endif;
                                if( ! empty( $third_el ) ):
                            ?>
                            <div class="image-collection"><a class="image-wrapper image-with-overlay"
                                    href="<?php echo $third_el['link'];?>"><?php echo wp_get_attachment_image( $third_el['image'], 'full' );?>
                                </a>
                                <div class="content-wrapper">
                                    <h2 class="title"><?php echo $third_el['title'];?></h2>
                                    <a class="button button--primary"
                                        href="<?php echo $third_el['link'];?>"><?php echo $third_el['button_text'];?></a>
                                </div>
                            </div>
                            <?php
                                endif;
                            ?>
                        </div>
                        <?php
                            if( ! empty( $fourth_el ) ):
                        ?>
                        <div class="item-child">
                            <div class="image-collection half-height"><a class="image-wrapper image-with-overlay"
                                    href="<?php echo $fourth_el['link'];?>"><?php echo wp_get_attachment_image( $fourth_el['image'], 'full' );?>
                                </a>
                                <div class="content-wrapper">
                                    <h2 class="title"><?php echo $fourth_el['title'];?></h2>
                                    <a class="button button--primary"
                                        href="<?php echo $fourth_el['link'];?>"><?php echo $fourth_el['button_text'];?></a>
                                </div>
                            </div>
                        </div>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        endif;
        $category_1_id = get_field( 'category_1' );

        if( ! empty( $category_1_id ) ){
            get_template_part('template-parts/block', 'product-category', [
                'category_id' => $category_1_id,
                'taxonomy' => 'product_cat'
            ]);
        }

        if( have_rows( 'categories_list' ) ):
            $categories_list_title = get_field( 'title' );
    ?>
    <div id="halo_middle_banners" class="halo-marketing-banners">
        <div class="halo-block halo-banners halo-banners2 padding-top-30 padding-bottom-30">
            <div class="container">
                <?php
                        if( ! empty( $categories_list_title ) ):
                    ?>
                <div class="halo-block-header">
                    <h3 class="title"><?php echo $categories_list_title;?></h3>
                </div>
                <?php
                        endif;
                    ?>
                <div class="halo-image-collection2">
                    <?php
                            while( have_rows( 'categories_list' ) ):
                                the_row();
                                $category_id = get_sub_field( 'category' );

                                $term = get_term( $category_id, 'product_additional_cat' );
                                $term_link = get_term_link( $category_id, 'product_additional_cat' );
                                $image_id = get_field( 'featured_image', $term );
                                
                        ?>
                    <div class="item">
                        <div class="image-collection2">
                            <a class="image-wrapper image-with-overlay" href="<?php echo $term_link;?>">
                                <?php echo wp_get_attachment_image( $image_id, 'full' );?>
                            </a>
                            <div class="content-wrapper">
                                <h2 class="title"><?php echo $term->name;?></h2>
                                <span class="desc"><?php echo $term->description;?></span> <a
                                    class="button button--primary" href="<?php echo $term_link;?>">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            endwhile;
                        ?>
                </div>
                <div class="halo-block-footer"><a class="button button--transparent"
                        href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">Browse All</a></div>
            </div>
        </div>
    </div>
    <?php
        endif;

        $about_image = get_field( 'about_image' );
        $about_image_mobile = get_field( 'about_image_mobile' );
        $about_subtitle = get_field( 'about_subtitle' );
        $about_title = get_field( 'about_title' );
        $about_description = get_field( 'about_description' );
        $about_link = get_field( 'about_link' );
    ?>
    <div id="halo_middle_parralax_banners" class="halo-marketing-banners">
        <div class="halo-block halo-banners-3 padding-top-0 padding-bottom-0">
            <div class="container">
                <div class="halo-banner-parallax">
                    <div class="image-wrapper">
                        <?php 
                            echo wp_get_attachment_image( $about_image, 'full' );
                            echo wp_get_attachment_image( $about_image_mobile, 'full', false, ['class' => 'image-mobile'] );
                        ?>
                        <div class="white-banner" data-parallax="{">&nbsp;</div>
                    </div>
                    <div class="content-wrapper">
                        <?php
                            if( ! empty( $about_subtitle ) ):
                        ?>
                        <span class="subtitle"><?php echo $about_subtitle;?></span>
                        <?php
                            endif;
                        ?>
                        <h2 class="title heading-with-line"><span><?php echo $about_title;?></span></h2>
                        <div class="desc"><?php echo $about_description;?></div>
                        <?php
                            if( ! empty( $about_link ) ):
                        ?>
                        <a class="button" href="<?php echo $about_link;?>"> <span>Learn
                                How</span> </a>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
     $category_2_id = get_field( 'category_2' );

     if( ! empty( $category_1_id ) ){
         get_template_part('template-parts/block', 'product-category', [
             'category_id' => $category_2_id,
             'taxonomy' => 'product_additional_cat'
         ]);
     }
     $learn_title = get_field( 'learn_title' );
     $learn_text = get_field( 'learn_text' );
     $learn_link = get_field( 'learn_link' );
     $learn_image = get_field( 'learn_image' );
     $learn_video = get_field( 'learn_video' );
     ?>

<div id="halo_bottom_banners" class="halo-marketing-banners">
    <div class="halo-block halo-banners-5 padding-top-0 padding-bottom-0">
        <div class="container-fluid">
            <div class="halo-fullwidth-banner" style="background: #000000;">
                <div class="video-block-left">
                    <div class="video-block-content">
                        <h2 class="title heading-with-line"><span><?php echo $learn_title?></span>
                        </h2>
                        <span class="desc"><?php echo nl2br($learn_text)?></span>
                        <?php
                            if( ! empty( $learn_link ) ) : 
                         ?><a class="button button--primary" href="<?php echo $learn_link?>">Learn How</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="video-block-right"><a class="video-block-image" href="<?php echo $learn_video?>"
                        data-fancybox="videos">\
                        <?php echo wp_get_attachment_image( $learn_image, 'full') ?>
                    </a>
                    <div class="block-content-video"><a class="button-popup-video" href="<?php echo $learn_video?>"
                            data-fancybox="videos2"> <img title="<?php echo $learn_title?>"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/home-banner-video-icon.png"
                                alt="<?php echo $learn_title?>" data-src="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
     $story_title = get_field( 'story_title' );
     $story_avatar = get_field( 'story_avatar' );
     $story_text = get_field( 'story_text' );
     $story_sign = get_field( 'story_sign' );
     $story_autor = get_field( 'story_autor' );
     $story_descr = get_field( 'story_descr' );

?>
<div id="halo_short_faqs" class="halo-marketing-banners">
    <div class="halo-block halo-faqs-block padding-top-40 padding-bottom-40">
        <div class="container">
            <div class="halo-short-faqs">
                <div class="short-faqs-left">
                    <div class="image-wrapper">
                        <?php echo wp_get_attachment_image( $story_avatar, 'full') ?>
                    </div>
                    <div class="content-wrapper"><span class="subtitle">Our Story</span>
                        <h3 class="title"><?php echo $story_title ?></h3>
                        <div class="desc"><?php echo nl2br($story_text) ?></div>
                        <div class="signature">
                            <?php echo wp_get_attachment_image( $story_sign, 'thumbnail') ?>
                        </div>
                        <h4 class="name"><?php echo $story_autor?></h4>
                        <span class="company"><?php echo $story_descr?></span>
                    </div>
                </div>
                <div class="short-faqs-right">
                    <div class="faqs-paragraph"><span class="subtitle">Help and FAQs</span>
                        <div id="accordion">
                            <?php while( have_rows( 'faq_list' ) ):
                                
                                the_row();
                                $faq_ask = get_sub_field( 'faq_ask' );
                                $faq_answer = get_sub_field( 'faq_answer' );
                                ?>
                            <div class="card">
                                <div id="" class="card-header"><button class="title" data-toggle="collapse"
                                        data-target=""> <?php echo $faq_ask ?>
                                    </button> <span class="icon-plus">&amp;nbsp</span>
                                </div>
                                <div id="" class="collapse" data-parent="">
                                    <div class="card-body">
                                        <p><?php echo $faq_answer ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile?>
                        </div>
                        <div class="faqs-paragraph-footer"><a class="link"
                                href="https://customifyme.com/faqs/"><span>View all topics</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="halo_instagram" class="halo-marketing-banners">
    <div class="halo-block halo-banners halo-banners2 padding-top-30 padding-bottom-30">
        <div class="container">
            <div class="halo-block-header">
                <h3 class="title">@regalportraitsco</h3>
                <span class="desc">Follow us on Instagram</span>
            </div>
            <div id="instafeed">
                <script type="text/javascript"
                    src="https://snapppt.com/widgets/widget_loader/bb5eec69-548d-0600-ccc9-7c06ee64ad10/sauce_homepage.js"
                    class="snptwdgt_init"></script>

            </div>
        </div>
    </div>
</div>
<div class="halo-block halo-block-icon-text halo-block-icon-text2 padding-top-0 padding-bottom-0">
    <div class="container container-no-padding">
        <div class="halo-row">
        <?php while( have_rows( 'footer_advantages_list' ) ):
            the_row();
            $footer_advantages_img = get_sub_field( 'footer_advantages_img' );
            $footer_advantages_title = get_sub_field( 'footer_advantages_title' );
            $footer_advantages_text = get_sub_field( 'footer_advantages_text' );
        ?>
            <div class="halo-row-slider">
                <div class="halo-row-item">
                    <div class="icon-with-text icon-with-text2">
                        <div class="icon" aria-hidden="true">
                            <?php echo wp_get_attachment_image( $footer_advantages_img, 'thumbnail') ?>
                        </div>
                        <div class="content">
                            <h3 class="title"><?php echo $footer_advantages_title ?></h3>
                            <span class="desc"><?php echo $footer_advantages_text?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile ?>
        </div>
    </div>
</div>
<?php get_footer();?>