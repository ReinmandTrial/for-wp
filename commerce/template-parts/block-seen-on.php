<?php
    defined( 'ABSPATH' ) || exit;

    if( have_rows( 'seen_on', 'option' ) ):
        $seen_on_title = get_field( 'seen_on_title' );
?>
    <div id="halo_top_brands" class="halo-marketing-banners">
        <div class="halo-block halo-top-brands padding-top-60 padding-bottom-30">
            <div class="container container-custom2 container-no-padding">
                <?php
                    if( ! empty( $seen_on_title ) ):
                ?>
                    <div class="halo-block-header">
                        <h2 class="title"><?php echo $seen_on_title;?></h2>
                    </div>
                <?php
                    endif;
                ?>
                <div class="halo-row">
                    <?php
                        while( have_rows( 'seen_on', 'option' ) ):
                            the_row();
                            $image_id = get_sub_field( 'image' );
                            $link     = get_sub_field( 'link' );
                            if( empty( $link ) ){
                                $link = get_home_url();
                            }
                    ?>
                    <div class="halo-row-slider">
                        <div class="halo-row-item">
                            <a class="image-with-border"
                                href="<?php echo $link;?>">
                                <?php echo wp_get_attachment_image( $image_id, 'medium' );?>
                            </a>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    endif;
?>