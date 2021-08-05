<?php
    defined( 'ABSPATH' ) || exit;

    if( have_rows( 'advantages', 'option' ) ):
?>
    <div class="halo-block halo-block-icon-text padding-top-0 padding-bottom-0">
        <div class="container container-no-padding">
            <div class="halo-row">
                <?php
                    while( have_rows( 'advantages', 'option' ) ):
                        the_row();
                        $image_id = get_sub_field( 'image' );
                        $title    = get_sub_field( 'title' );
                        $desc     = get_sub_field( 'desc' );
                ?>
                    <div class="halo-row-slider">
                        <div class="halo-row-item">
                            <div class="icon-with-text">
                                <div class="icon">
                                    <?php echo wp_get_attachment_image( $image_id, 'thumbnail' );?>
                                </div>
                                <div class="content">
                                    <h3 class="title"><?php echo $title;?></h3>
                                    <?php
                                        if( ! empty( $desc ) ):
                                    ?>
                                        <span class="desc"><?php echo $desc;?></span>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                ?>
            </div>
        </div>
    </div>
    <div data-content-region="home_below_icon_with_text_block"></div>
<?php
    endif;
?>