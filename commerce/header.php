<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package commerce
 */

$logo_id = get_field( 'logo', 'option' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site page-full-width">
		<header class="header header-sticky">
			<div class="halo-top-bar-promotion">
				<div class="container">
					<a class="text" href="/shop-now/">
						Special Sale: Up to 70% off selected items.
						<span>Shop Now</span>
					</a>
				</div>
			</div>
			<div class="halo-middleHeader">
				<div class="container">
					<div class="middleHeader-item text-left">
						<div class="items item--hamburger">
							<a class="mobileMenu-toggle" href="#" data-mobile-menu-toggle="menu">
								<span class="mobileMenu-toggleIcon">Toggle menu</span>
							</a>
						</div>
						<div class="items item--searchMobile">
							<a class="navUser-action" href="#" data-search="quickSearch" aria-controls="quickSearch"
								aria-expanded="false" aria-label="Search button">
								<div class="navUser-icon">
									<svg class="icon" aria-hidden="true">
										<use
											xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-search">
										</use>
									</svg>
								</div>
							</a>
						</div>
					</div>
					<div class="middleHeader-item text-center">
						<div class="items item--logo">
							<h1 class="header-logo">
								<a href="<?php echo get_home_url();?>" class="header-logo__link">
									<?php echo wp_get_attachment_image( $logo_id, 'full' );?>
								</a>
							</h1>
						</div>
					</div>
					<div class="middleHeader-item text-right">
						<?php echo get_search_form();?>
						<div class="items item--account">
							<p class="myAccount">My Account</p>
							<?php
								if( ! is_user_logged_in() ):
							?>
							<div class="myAccount-link">
								<a href="javascript:void(0)" class="js-open-login">
									Login
								</a>
								<span>or</span>
								<a
									href="<?php echo get_permalink(woocommerce_get_page_id('myaccount')) . '?action=register';?>">
									Register
								</a>
							</div>
							<div id="login-pc-popup" class="login-form-popup halo-auth-popup">
								<div class="halo-popup-content">
									<form class="form" action="https://customifyme.com/login.php?action=check_login"
										method="post">
										<div class="login-form-wrapper">
											<div class="form-field form-field--input form-field--inputEmail">
												<label class="form-label" for="login_email">
													Email Address
													<em class="text-danger">*</em>
												</label>
												<input id="login_email" class="form-input" type="email" value=""
													name="login_email" placeholder="Email">
												<span style="display: none;"></span></div>
											<div class="form-field form-field--input form-field--inputPassword">
												<label class="form-label" for="login_pass">
													Password
													<em class="text-danger">*</em>
												</label>
												<input id="login_pass" class="form-input" type="password" value=""
													placeholder="Password" name="login_pass">
												<span style="display: none;"></span></div>
											<div class="form-actions text-center">
												<button type="button" class="button button--primary">Login</button>
												<a class="forgot-password"
													href="/login.php?action=reset_password">Forgot password?</a>
												<a class="create-account button"
													href="/login.php?action=create_account">Create an account</a>
											</div>
										</div>
									</form>
								</div>
							</div>
							<?php
								endif;
							?>
							<a class="navUser-action myAccountMobile" href="/login.php" data-login-form-mobile
								aria-label="My Account">
								<div class="navUser-icon">
									<svg class="icon" aria-hidden="true">
										<use
											xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-user" />
									</svg>
								</div>
							</a>
						</div>
						<div class="items item--cart halo-cart">
							<a class="navUser-action cartDesktop" data-cart-preview data-options="align:right"
								href="<?php echo wc_get_cart_url();?>">
								<div class="navUser-icon navUser-item-cartIcon">
									<svg class="icon" aria-hidden="true">
										<use
											xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-cart">
										</use>
									</svg><span
										class="countPill cart-quantity"><?php echo WC()->cart->cart_contents_count;?></span>
								</div>
							</a>
							<div class="dropdown-cart" id="cart-preview-dropdown" aria-hidden="true"></div>
							<a class="navUser-action cartMobile" data-cart-preview2
								href="<?php echo wc_get_cart_url();?>">
								<div class="navUser-icon navUser-item-cartIcon">
									<svg class="icon" aria-hidden="true">
										<use
											xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-cart">
										</use>
									</svg>
									<span
										class="countPill cart-quantity js-cart-total"><?php echo WC()->cart->cart_contents_count;?></span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="halo-bottomHeader">
				<div class="navPages-container" id="menu" data-menu="" aria-hidden="true">
					<nav class="navPages" role="navigation" aria-label="Main Navigation">
						<ul class="navPages-list navPages-list-megamenu">
							<li class="navPages-item has-dropdown has-megamenu style-1 fullWidth">
								<p class="navPages-action has-subMenu is-root">
									<a class="text" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">Shop Now</a>
									<span class="navPages-action-moreIcon" aria-hidden="true">
										<svg class="icon" aria-hidden="true">
											<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
										</svg>
									</span>
								</p>
								<div class="navPage-subMenu navPage-subMenu-horizontal" aria-hidden="true"
									tabindex="-1">
									<div class="cateArea columns-3" style="width: 100%; max-width: 50%;">
										<ul class="navPage-subMenu-links navPage-subMenu-list">
											<li class="navPage-subMenu-item-child">
												<p
													class="navPage-subMenu-action navPages-action navPages-action-depth-max has-subMenu">
													<span class="text">Shop by</span> <span
														class="navPages-action-moreIcon" aria-hidden="true"> <svg
															class="icon" aria-hidden="true">
															<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
														</svg> </span> </p>
												<div class="navPage-subMenu navPage-subMenu-horizontal"
													aria-hidden="true" tabindex="-1">
													<ul class="navPage-subMenu-list">
														<li class="navPage-subMenu-item-child navPage-subMenu-title">
															<p class="navPage-subMenu-action navPages-action"> <span
																	class="navPages-action-moreIcon" aria-hidden="true">
																	<svg class="icon" aria-hidden="true">
																		<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
																	</svg> <span>back</span> </span> <span
																	class="text">Shop by</span> </p>
														</li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=date"><span class="text"> What's
																	New</span></a> </li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=popularity"><span
																	class="text">Best Selling</span></a> </li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=rating"><span
																	class="text">Top Rated</span></a> </li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>"><span class="text">All
																	Products</span></a> </li>
													</ul>
												</div>
											</li>
										</ul>
										<ul class="navPage-subMenu-list">
											<li class="navPage-subMenu-item-child navPage-subMenu-title">
												<p class="navPage-subMenu-action navPages-action">
													<span class="navPages-action-moreIcon" aria-hidden="true">
														<svg class="icon" aria-hidden="true">
															<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
														</svg>
														<span>back</span>
													</span>
													<a class="text" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">Shop
														Now</a>
												</p>
											</li>
											<li
												class="navPage-subMenu-item-child navPages-action-end navPage-subMenu-all">
												<a class="navPage-subMenu-action navPages-action"
													href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">
													<span class="text">All Shop Now</span>
												</a>
											</li>
											<?php
												$categories = get_taxonomy_hierarchy( 'product_additional_cat' );
												foreach( $categories as $category ):
													$term_link = get_term_link( $category->term_id, 'product_additional_cat' );
											?>
												<li class="navPage-subMenu-item-child has-dropdown">
													<p
														class="navPage-subMenu-action navPages-action navPages-action-depth-max has-subMenu">
														<a class="text"
															href="<?php echo $term_link;?>"><?php echo $category->name;?></a>
														<span class="navPages-action-moreIcon" aria-hidden="true">
															<svg class="icon" aria-hidden="true">
																<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
															</svg>
														</span>
													</p>
													<?php
														if( $category->children ):
													?>
														<div class="navPage-subMenu navPage-subMenu-horizontal"
															aria-hidden="true" tabindex="-1">
															<ul class="navPage-subMenu-list">
																<li class="navPage-subMenu-item-child navPage-subMenu-title">
																	<p class="navPage-subMenu-action navPages-action">
																		<span class="navPages-action-moreIcon"
																			aria-hidden="true">
																			<svg class="icon" aria-hidden="true">
																				<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
																			</svg>
																			<span>back</span>
																		</span>
																		<a class="text"
																			href="<?php echo $term_link;?>"><?php echo $category->name;?></a>
																	</p>
																</li>
																<?php
																	foreach( $category->children as $child ):
																		$child_link = get_term_link( $child->term_id, 'product_additional_cat' );
																?>
																	<li
																		class="navPage-subMenu-item-child navPages-action-end">
																		<a class="navPage-subMenu-action navPages-action"
																			href="<?php echo $child_link;?>">
																			<span class="text"><?php echo $child->name;?></span>
																		</a>
																	</li>
																<?php
																	endforeach;
																?>
															</ul>
														</div>
													<?php
														endif;
													?>
												</li>
											<?php
												endforeach;
											?>
										</ul>
									</div>
									<div class="imageArea" style="width: 100%; max-width: 50%;">
										<div class="megamenu-left-item megamenu-product-list">
											<h3 class="megamenu-title">Featured Products</h3>
											<div class="megamenu-slider slick-initialized slick-slider slick-dotted">
												<div class="slick-list draggable">
													<div class="slick-track"
														style="opacity: 1; width: 235px; transform: translate3d(0px, 0px, 0px);">
														<div class="slick-slide slick-current slick-active"
															data-slick-index="0" aria-hidden="false"
															style="width: 235px;" tabindex="0" role="tabpanel"
															id="slick-slide10" aria-describedby="slick-slide-control10">
															<div>
																<div class="item"
																	style="width: 100%; display: inline-block;">
																	<div class="card card-custom card-custom3"
																		data-product-id="506">
																		<div class="card-image">
																			<a class="card-link"
																				href="https://customifyme.com/the-king-custom-canvas/"
																				tabindex="0">
																				<img src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/images/stencil/390x485/products/506/2093/32__58405.1620441459.jpg?c=1"
																					alt="The King - Custom Canvas"
																					title="The King - Custom Canvas">
																			</a>
																		</div>
																		<div class="card-content">
																			<h4 class="card-title">
																				<a href="https://customifyme.com/the-king-custom-canvas/"
																					class="card-ellipsis"
																					style="-webkit-box-orient: vertical;"
																					tabindex="0">
																					The King - Custom Canvas
																				</a>
																			</h4>
																			<div class="card-price"
																				data-test-info-type="price">

																				<div class="price-section price-section--withoutTax rrp-price--withoutTax"
																					style="display: none;">

																					<span
																						data-product-rrp-price-without-tax=""
																						class="price price--rrp">

																					</span>
																				</div>
																				<div class="price-section price-section--withoutTax non-sale-price--withoutTax price-none"
																					style="display: none;">
																					<span
																						data-product-non-sale-price-without-tax=""
																						class="price price--non-sale">
																						$124.88
																					</span>
																				</div>
																				<div
																					class="price-section price-section--withoutTax">
																					<span
																						data-product-price-without-tax=""
																						class="price price--withoutTax">$49.95
																						- $99.95</span>
																				</div>

																				<div class="price-section price-section--saving price"
																					style="display: none;">
																					<span class="price">(You save</span>
																					<span data-product-price-saved=""
																						class="price price--saving">

																					</span>
																					<span class="price">)</span>
																				</div>
																			</div>
																			<div class="card-option card-option-506">
																			</div>
																			<a href="https://customifyme.com/the-king-custom-canvas/"
																				class="card-action" tabindex="0">
																				<span class="text">Details</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
															<div>
																<div class="item"
																	style="width: 100%; display: inline-block;">
																	<div class="card card-custom card-custom3"
																		data-product-id="503">
																		<div class="card-image">
																			<a class="card-link"
																				href="https://customifyme.com/the-queen-custom-canvas/"
																				tabindex="0">
																				<img src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/images/stencil/390x485/products/503/2102/33__57169.1620441970.jpg?c=1"
																					alt="The Queen - Custom Canvas"
																					title="The Queen - Custom Canvas">
																			</a>
																		</div>
																		<div class="card-content">
																			<h4 class="card-title">
																				<a href="https://customifyme.com/the-queen-custom-canvas/"
																					class="card-ellipsis"
																					style="-webkit-box-orient: vertical;"
																					tabindex="0">
																					The Queen - Custom Canvas
																				</a>
																			</h4>
																			<div class="card-price"
																				data-test-info-type="price">

																				<div class="price-section price-section--withoutTax rrp-price--withoutTax"
																					style="display: none;">

																					<span
																						data-product-rrp-price-without-tax=""
																						class="price price--rrp">

																					</span>
																				</div>
																				<div class="price-section price-section--withoutTax non-sale-price--withoutTax price-none"
																					style="display: none;">
																					<span
																						data-product-non-sale-price-without-tax=""
																						class="price price--non-sale">
																						$124.88
																					</span>
																				</div>
																				<div
																					class="price-section price-section--withoutTax">
																					<span
																						data-product-price-without-tax=""
																						class="price price--withoutTax">$49.95
																						- $99.95</span>
																				</div>

																				<div class="price-section price-section--saving price"
																					style="display: none;">
																					<span class="price">(You save</span>
																					<span data-product-price-saved=""
																						class="price price--saving">

																					</span>
																					<span class="price">)</span>
																				</div>
																			</div>
																			<div class="card-option card-option-503">
																			</div>
																			<a href="https://customifyme.com/the-queen-custom-canvas/"
																				class="card-action" tabindex="0">
																				<span class="text">Details</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<ul class="slick-dots" role="tablist">
													<li class="slick-active" role="presentation"><button type="button"
															role="tab" id="slick-slide-control10"
															aria-controls="slick-slide10" aria-label="1 of 1"
															tabindex="0" aria-selected="true">1</button></li>
												</ul>
											</div>
										</div>
										<div class="megamenu-right-item"><a class="image" href="#"> <img
													class=" lazyloaded"
													src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mm1.jpg"
													data-src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mm1.jpg"
													alt="" title=""> </a></div>
									</div>
								</div>
							</li>
							<li class="navPages-item has-dropdown has-megamenu style-2 fullWidth">
								<p class="navPages-action has-subMenu is-root"
									data-label="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">
									<a class="text" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">Themes<span
											class="navPages-label new-label">New</span></a>
									<span class="navPages-action-moreIcon" aria-hidden="true">
										<svg class="icon" aria-hidden="true">
											<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
										</svg>
									</span>
								</p>
								<div class="navPage-subMenu navPage-subMenu-horizontal" aria-hidden="true"
									tabindex="-1">
									<div class="cateArea columns-3" style="width: 100%; max-width: 50%;">
										<ul class="navPage-subMenu-links navPage-subMenu-list">
											<li class="navPage-subMenu-item-child">
												<p
													class="navPage-subMenu-action navPages-action navPages-action-depth-max has-subMenu">
													<span class="text">Shop by</span> <span
														class="navPages-action-moreIcon" aria-hidden="true"> <svg
															class="icon" aria-hidden="true">
															<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
														</svg> </span> </p>
												<div class="navPage-subMenu navPage-subMenu-horizontal"
													aria-hidden="true" tabindex="-1">
													<ul class="navPage-subMenu-list">
														<li class="navPage-subMenu-item-child navPage-subMenu-title">
															<p class="navPage-subMenu-action navPages-action"> <span
																	class="navPages-action-moreIcon" aria-hidden="true">
																	<svg class="icon" aria-hidden="true">
																		<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
																	</svg> <span>back</span> </span> <span
																	class="text">Shop by</span> </p>
														</li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=date"><span class="text"> What's
																	New</span></a> </li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=popularity"><span class="text">Best
																	Selling</span></a> </li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=rating"><span
																	class="text">Top Rated</span></a> </li>
														<li class="navPage-subMenu-item-child navPages-action-end"> <a
																class="navPage-subMenu-action navPages-action"
																href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>?orderby=?orderby=price"><span class="text">All
																	Products</span></a> </li>
													</ul>
												</div>
											</li>
										</ul>
										<ul class="navPage-subMenu-list">
											<li class="navPage-subMenu-item-child navPage-subMenu-title">
												<p class="navPage-subMenu-action navPages-action">
													<span class="navPages-action-moreIcon" aria-hidden="true">
														<svg class="icon" aria-hidden="true">
															<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
														</svg>
														<span>back</span>
													</span>
													<a class="text" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">Themes</a>
												</p>
											</li>
											<li
												class="navPage-subMenu-item-child navPages-action-end navPage-subMenu-all">
												<a class="navPage-subMenu-action navPages-action"
													href="<?php echo get_permalink( wc_get_page_id( 'shop' ) );?>">
													<span class="text">All Themes</span>
												</a>
											</li>
											<?php
												$product_categories = get_taxonomy_hierarchy( 'product_cat' );
												foreach( $product_categories as $category ):
													$term_link = get_term_link( $category->term_id, 'product_cat' );
											?>
											<li class="navPage-subMenu-item-child has-dropdown">
												<p
													class="navPage-subMenu-action navPages-action navPages-action-depth-max has-subMenu">
													<a class="text" href="<?php echo $term_link;?>"><?php echo $category->name;?></a>
													<span class="navPages-action-moreIcon" aria-hidden="true">
														<svg class="icon" aria-hidden="true">
															<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
														</svg>
													</span>
												</p>
												<div class="navPage-subMenu navPage-subMenu-horizontal"
													aria-hidden="true" tabindex="-1">
													<ul class="navPage-subMenu-list">
														<li class="navPage-subMenu-item-child navPage-subMenu-title">
															<p class="navPage-subMenu-action navPages-action">
																<span class="navPages-action-moreIcon"
																	aria-hidden="true">
																	<svg class="icon" aria-hidden="true">
																		<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
																	</svg>
																	<span>back</span>
																</span>
																<a class="text"
																	href="<?php echo $term_link;?>"><?php echo $category->name;?></a>
															</p>
														</li>
														<?php
															foreach( $category->children as $child ):
																$child_url = get_term_link( $child->term_id, 'product_cat' )
														?>
															<li class="navPage-subMenu-item-child navPages-action-end">
																<a class="navPage-subMenu-action navPages-action"
																	href="<?php echo $child_url;?>"><span
																		class="text"><?php echo $child->name;?></span></a>
															</li>
														<?php
															endforeach;
														?>
													</ul>
												</div>
											</li>
											<?php
												endforeach;
											?>
										</ul>
									</div>
									<div class="imageArea" style="width: 100%; max-width: 50%;">
										<?php
											if( have_rows( 'seen_on', 'option' ) ):
										?>
											<div class="megamenu-left-item megamenu-product-list">
												<h3 class="megamenu-title">Publications</h3>
												<div class="megamenu-brands"> 
													<?php
														while( have_rows( 'seen_on', 'option' ) ):
															the_row();
															$image_id = get_sub_field( 'image' );
															$link     = get_sub_field( 'link' );
															if( empty( $link ) ){
																$link = get_home_url();
															}
													?>
														<a class="image" href="<?php echo $link;?>"> 
															<?php echo wp_get_attachment_image( $image_id, 'medium' );?>
														</a>
													<?php
														endwhile;
													?>
												</div>
											</div>
										<?php
											endif;
										?>
										<div class="megamenu-right-item">
											<div class="item"><a class="image" href="/themes/galactic"> <img
														class=" ls-is-cached lazyloaded"
														src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/starwars.jpg"
														data-src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/starwars.jpg"
														alt="Galactic" title="Galactic"> </a></div>
											<div class="item"><a class="image" href="/themes/vikings"> <img
														class=" ls-is-cached lazyloaded"
														src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/vikings.jpg"
														data-src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/vikings.jpg"
														alt="Vikings" title="Vikings"> </a></div>
										</div>
									</div>
								</div>
							</li>
							<li class="navPages-item has-dropdown has-megamenu style-3 fullWidth">
								<p class="navPages-action has-subMenu is-root"
									data-label="https://customifyme.com/products/">
									<a class="text" href="https://customifyme.com/products/">Products<span
											class="navPages-label hot-label">Hot</span></a>
									<span class="navPages-action-moreIcon" aria-hidden="true">
										<svg class="icon" aria-hidden="true">
											<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
										</svg>
									</span>
								</p>
								<div class="navPage-subMenu navPage-subMenu-horizontal" aria-hidden="true"
									tabindex="-1">
									<div class="container">
										<div class="cateArea columns-5">
											<ul class="navPage-subMenu-list">
												<li class="navPage-subMenu-item-child navPage-subMenu-title">
													<p class="navPage-subMenu-action navPages-action">
														<span class="navPages-action-moreIcon" aria-hidden="true">
															<svg class="icon" aria-hidden="true">
																<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
															</svg>
															<span>back</span>
														</span>
														<a class="text"
															href="https://customifyme.com/products/">Products</a>
													</p>
												</li>
												<li
													class="navPage-subMenu-item-child navPages-action-end navPage-subMenu-all">
													<a class="navPage-subMenu-action navPages-action"
														href="https://customifyme.com/products/">
														<span class="text">All Products</span>
													</a>
												</li>
												<?php
													$categories = get_taxonomy_hierarchy( 'product_additional_cat' );
													foreach( $categories as $category ):
														$term_link = get_term_link( $category->term_id, 'product_additional_cat' );
														$featured_image = get_field( 'featured_image', $category );
												?>
												<li class="navPage-subMenu-item-child navPages-action-end">
													<a class="navPage-subMenu-action navPages-action"
														href="<?php echo $term_link;?>"><span
															class="text"><?php echo $category->name;?></span></a>
													<a class="image"
														href="<?php echo $term_link;?>">
														<?php echo wp_get_attachment_image( $featured_image, 'additional_cat_header' );?>
													</a>
												</li>
												<?php
													endforeach;
												?>
											</ul>
										</div>
									</div>
									<div class="megamenu-custom-list">
										<div class="container"><span class="text">Sale upto 70% off on selected
												items.</span><span class="megamenu-countDown"
												data-menu-countdown="Jun 6,2021 24:00:00"></span></div>
									</div>
								</div>
							</li>
							<li class="navPages-item navPages-item-page has-dropdown has-megamenu style-4 fullWidth">
								<p class="navPages-action has-subMenu is-root" data-label="javascript:void(0)">
									<a class="text" href="javascript:void(0)">Info</a>
									<span class="navPages-action-moreIcon" aria-hidden="true">
										<svg class="icon" aria-hidden="true">
											<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
										</svg>
									</span>
								</p>
								<div class="navPage-subMenu navPage-subMenu-horizontal" aria-hidden="true"
									tabindex="-1">
									<div class="leftArea itemArea"><a class="image" href="/how-it-works/"> <img
												class=" ls-is-cached lazyloaded"
												src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mmhowitworks.jpg"
												data-src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mmhowitworks.jpg"
												alt="Tools and Accessories" title="Tools and Accessories"> </a></div>
									<div class="centerArea itemArea columns-3">
										<ul class="navPage-subMenu-list">
											<li class="navPage-subMenu-item-child navPage-subMenu-title">
												<p class="navPage-subMenu-action navPages-action">
													<span class="navPages-action-moreIcon" aria-hidden="true">
														<svg class="icon" aria-hidden="true">
															<use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-chevron-down"></use>
														</svg>
														<span>back</span>
													</span>
													<a class="text" href="javascript:void(0)">Info</a>
												</p>
											</li>
											<li
												class="navPage-subMenu-item-child navPages-action-end navPage-subMenu-all">
												<a class="navPage-subMenu-action navPages-action"
													href="javascript:void(0)">
													<span class="text">All Info</span>
												</a>
											</li>
											<li class="navPage-subMenu-item-child navPages-action-end">
												<a class="navPage-subMenu-action navPages-action"
													href="https://customifyme.com/faqs/"><span
														class="text">FAQs</span></a>
											</li>
											<li class="navPage-subMenu-item-child navPages-action-end">
												<a class="navPage-subMenu-action navPages-action"
													href="https://customifyme.com/how-it-works/"><span class="text">How
														it works</span></a>
											</li>
											<li class="navPage-subMenu-item-child navPages-action-end">
												<a class="navPage-subMenu-action navPages-action"
													href="https://customifyme.com/photo-guidelines/"><span
														class="text">Photo Guidelines</span></a>
											</li>
											<li class="navPage-subMenu-item-child navPages-action-end">
												<a class="navPage-subMenu-action navPages-action"
													href="https://customifyme.com/contact-us/"><span
														class="text">Contact Us</span></a>
											</li>
										</ul>
									</div>
									<div class="rightArea itemArea">
										<div class="megamenu-left-item megamenu-product-list">
											<h3 class="megamenu-title"></h3>
											<div class="megamenu-slider2"></div>
										</div>
										<div class="megamenu-right-item">
											<div class="item"><a class="image" href="/faqs/"> <img
														class=" ls-is-cached lazyloaded"
														src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mmfaq.jpg"
														data-src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mmfaq.jpg"
														alt="faq" title="faq"> </a></div>
											<div class="item"><a class="image" href="#"> <img
														class=" ls-is-cached lazyloaded"
														src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mmaboutus.jpg"
														data-src="https://cdn11.bigcommerce.com/s-nf1vpx5tt1/product_images/uploaded_images/mmaboutus.jpg"
														alt="/about-us/" title="/about-us/"> </a></div>
										</div>
									</div>
								</div>
							</li>




						</ul>
					</nav>
				</div>
			</div>
		</header>
		<script>
			jQuery(document).ready(function ($) {
				$('.js-open-login').on('click', function () {
					$('#login-pc-popup').fadeToggle();
				})
				$(document).on('click', function (ev) {
					if (!ev.target.closest('#login-pc-popup') &&
						!ev.target.closest('.js-open-login')) {
						$('#login-pc-popup').fadeOut();
					}
				})
			})
		</script>