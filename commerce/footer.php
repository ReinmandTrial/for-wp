<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package commerce
 */

 $footer_text   = get_field( 'footer_text', 'option' );
 $location      = get_field( 'location', 'option' );
 $email         = get_field( 'email', 'option' );
 $facebook      = get_field( 'facebook', 'option' );
 $instagram     = get_field( 'instagram', 'option' );
 $footer_rights = get_field( 'footer_rights', 'option' );

?>
<div id="haloBackToTop" class="halo-back-to-top">
        <a href="#" class="haloBackToTop__link">
            <svg class="icon" aria-hidden="true"><use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-keyboard-arrow-down"></use></svg>
        </a>
    </div>
    <footer class="footer">
        <div class="footer-subscription">
            <div class="container">
                <h3 class="footer-info-heading">Sign up for our newsletter</h3>
                <div class="footer-info-wrapper">
                    <form class="form" action="/subscribe.php" method="post">
                        <fieldset class="form-fieldset">
                            <input type="hidden" name="action" value="subscribe">
                            <input type="hidden" name="nl_first_name" value="bc">
                            <input type="hidden" name="check" value="1">
                            <div class="form-field">
                                <label class="form-label is-srOnly" for="nl_email">Email Address</label>
                                <div class="form-prefixPostfix wrap">
                                    <input class="form-input" id="nl_email" name="nl_email" type="email" value=""
                                        placeholder="Enter your email address">
                                    <input class="button button--primary form-prefixPostfix-button--postfix"
                                        type="submit" value="Submit">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-wrapper">
                    <?php
                        if( ! empty(  $footer_text ) ):
                    ?>
                    <div class="footer-info-col footer-info-col--mobile footer-about-us">
                        <h3 class="footer-info-heading">Customify</h3>
                        <div class="footer-info-wrapper">
                            <div class="footer-info-text">
                                <p><?php echo nl2br( $footer_text );?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        endif;

                        $category_menu = wp_get_menu_array( 'footer-menu' );

                        if( ! empty( $category_menu ) ):
                    ?>
                    <div class="footer-info-col footer-info-col--mobile footer-help-list">
                        <h3 class="footer-info-heading">Shop</h3>
                        <div class="footer-info-wrapper">
                            <ul class="footer-info-list">
                                <?php
                                    foreach( $category_menu as $category_item ):
                                ?>
                                    <li>
                                        <a href="<?php echo $category_item['url'];?>" class="link"><?php echo $category_item['title'];?></a>
                                    </li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                        endif;
                        $info_menu = wp_get_menu_array( 'footer-menu-2' );

                        if( ! empty( $info_menu ) ):
                    ?>
                    <div class="footer-info-col footer-info-col--mobile footer-page-list">
                        <h3 class="footer-info-heading">Information</h3>
                        <div class="footer-info-wrapper">
                            <ul class="footer-info-list">
                                <?php
                                    foreach( $info_menu as $info_item ):
                                ?>
                                    <li><a href="<?php echo $info_item['url'];?>" class="link"><?php echo $info_item['title'];?></a></li>
                                <?php
                                    endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                        endif;
                    ?>
                    <div class="footer-info-col footer-info-col--mobile footer-page-location">
                        <h3 class="footer-info-heading">Location</h3>
                        <div class="footer-info-wrapper">
                            <ul class="footer-info-list footer-info-list-2">
                                <?php
                                    if( ! empty( $location ) ):
                                ?>
                                <li>
                                    <span class="footer-info-icon">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-location"></use>
                                        </svg>
                                    </span>
                                    <address><?php echo $location;?></address>
                                </li>
                                <?php
                                    endif;
                                    if( ! empty( $email ) ):
                                ?>
                                <li>
                                    <span class="footer-info-icon">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-mail"></use>
                                        </svg>
                                    </span>
                                    <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
                                </li>
                                <?php
                                    endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-info-col footer-social-media">
                        <h3 class="footer-info-heading">Stay Connected</h3>
                        <ul class="socialLinks socialLinks--alt">
                            <?php 
                                if( ! empty( $facebook ) ):
                            ?>
                            <li class="socialLinks-item">
                                <a class="icon icon--facebook"
                                    href="<?php echo $facebook;?>" target="_blank"
                                    rel="noopener" title="Open Facebook in a new tab">
                                    <svg aria-hidden="true">
                                        <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-facebook" /></svg>
                                </a>
                            </li>
                            <?php
                                endif;
                                if( ! empty( $instagram ) ):
                            ?>
                            <li class="socialLinks-item">
                                <a class="icon icon--instagram" href="<?php echo $instagram; ?>"
                                    target="_blank" rel="noopener" title="Open Instagram in a new tab">
                                    <svg aria-hidden="true">
                                        <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-instagram" /></svg>
                                </a>
                            </li>
                            <?php
                                endif;
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wrapper">
                    <?php
                        if( ! empty( $footer_rights ) ):
                    ?>
                    <div class="footer-bottom-item">
                        <div class="footer-copyright">
                            <p><?php echo $footer_rights;?></p>
                        </div>
                    </div>
                    <?php
                        endif;
                    ?>
                    <div class="footer-bottom-item">
                    </div>
                    <div class="footer-bottom-item footer-payment">
                        <div class="footer-payment-icons">
                            <svg class="footer-payment-icon" aria-label="Visa Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-visa"></use>
                            </svg>
                            <svg class="footer-payment-icon" aria-label="Mastercard Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-mastercard"></use>
                            </svg>
                            <svg class="footer-payment-icon" aria-label="Amex Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-american-express"></use>
                            </svg>
                            <svg class="footer-payment-icon" aria-label="Discover Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-discover"></use>
                            </svg>
                            <svg class="footer-payment-icon" aria-label="Paypal Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-paypal"></use>
                            </svg>
                            <svg class="footer-payment-icon amazonpay" aria-label="Amazonpay Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-amazonpay"></use>
                            </svg>
                            <svg class="footer-payment-icon googlepay" aria-label="Googlepay Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-googlepay"></use>
                            </svg>
                            <svg class="footer-payment-icon klarna" aria-label="Klarna Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-klarna"></use>
                            </svg>
                            <svg class="footer-payment-icon western-union" aria-label="Estern Union Payment">
                                <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-logo-western-union"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->
<div class="modal-background"></div>
<div id="modal" class="modal" 
     data-modal-type="quick-add"
     aria-hidden="false" 
     tabindex="0">
    <a href="#" class="modal-close" aria-label="Close" role="button">
        <span aria-hidden="true">×</span>
    </a>
    <div class="modal-content">
        
    </div>
    <div class="loadingOverlay" style="display: block;"></div>
</div>
<?php wp_footer(); ?>

</body>

</html>
