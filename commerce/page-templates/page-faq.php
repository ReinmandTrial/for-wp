<?php 
   // Template name: page Faq
   get_header();
?>
<div class="body" id="main-content" data-currency-code="USD">

   <div class="page-container">
      <div class="container">
         <div class="breadcrumb-wrapper">
            <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            </ul>
         </div>
         <div class="page page-normal">
            <div class="page-header">
               <h1 class="page-heading"><?php the_title(); ?></h1>
               <div class="page-description">
                  <p class="faq-desc">Below FAQ are some common concerns of our clients before purchasing our product,
                     if you have other questions, please just send it to support@customifyme.com<a class="link"
                        href="mailto:support@regalportraits.co"><br></a></p>
               </div>
            </div>
            <div class="page-sidebar halo-faqs-sidebar">
               <div class="page-sidebar-close">
                  <a href="#" class="close">
                     <span class="icon">×</span>
                     <span class="text">Close</span>
                  </a>
               </div>
               <nav class="page-sidebar-content">
                  <div class="faq-contact">
                     <h3 class="faq-title">Need Help?</h3>
                     <div class="faqs-group">
                        <div class="faqs-group-item">
                           <a href="#">
                              <svg class="icon">
                                 <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-messenger"></use>
                              </svg>
                              <span class="text">Message Us</span>
                           </a>
                        </div>
                        <div class="faqs-group-item">
                           <a href="/contact-us/">
                              <svg class="icon">
                                 <use xlink:href="<?php echo get_template_directory_uri();?>/assets/img/sprites.svg#icon-email"></use>
                              </svg>
                              <span class="text">Contact Us</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <main class="page-content halo-faqs-content">
               <div class="page-sidebar-mobile-wrapper">
                  <div class="page-sidebar-mobile">
                     <span class="text">Sidebar</span>
                     <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-sidebar"></use>
                     </svg>
                  </div>
               </div>

               <div class="faqs-paragraph">
                  <?php
                  $common_questions_title = get_field( 'common_questions_title' );
                  ?>
                  <h3 class="faq-title"><?php echo $common_questions_title ?></h3>
                  <div id="accordion">
                  <?php while( have_rows( 'common_questions_list' ) ):
                        the_row();
                        $common_questions_ask = get_sub_field( 'common_questions_ask' );
                        $common_questions_answer = get_sub_field( 'common_questions_answer' );
                     ?>
                     <div class="card">
                        <div id="faqs-1-title" class="card-header"><button class="title" data-toggle="collapse"
                              data-target="#faqs-1-content"> <?php echo $common_questions_ask ?> </button> <span
                              class="icon-plus">&amp;nbsp</span></div>
                        <div id="faqs-1-content" class="collapse" data-parent="#accordion">
                           <div class="card-body">
                              <p><?php echo $common_questions_answer ?></p>
                           </div>
                        </div>
                     </div>
                     <?php endwhile?>
                  </div>
               </div>
               <div class="faqs-paragraph">
                  <?php
                  $general_questions_title = get_field( 'general_questions_title' );
                  ?>
                  <h3 class="faq-title"><?php echo $general_questions_title ?></h3>
                  <div id="accordion">
                     <?php while(have_rows( 'general_questions_list' )):
                        the_row();
                        $general_questions_ask = get_sub_field( 'general_questions_ask' );
                        $general_questions_answer = get_sub_field( 'general_questions_answer' );

                     ?>
                     <div class="card">
                        <div id="faqs-4-title" class="card-header"><button class="title" data-toggle="collapse"
                              data-target="#faqs-4-content"> <?php echo $general_questions_ask?>
                           </button> <span class="icon-plus">&amp;nbsp</span></div>
                        <div id="faqs-4-content" class="collapse" data-parent="#accordion">
                           <div class="card-body">
                              <p><?php echo $general_questions_answer ?></p>
                           </div>
                        </div>
                     </div>
                     <?php endwhile?>
                  </div>
               </div>
               <div class="faq-content">&nbsp;</div>
               <div data-content-region="page_builder_content"></div>
            </main>
         </div>
      </div>
   </div>

   <div id="modal" class="modal" data-reveal="" data-prevent-quick-search-close="">
      <a href="#" class="modal-close" aria-label="Close" role="button">
         <span aria-hidden="true">×</span>
      </a>
      <div class="modal-content"></div>
      <div class="loadingOverlay" style="display: none;"></div>
   </div>

   <div id="previewModal" class="modal modal--large" data-reveal="">
      <a href="#" class="modal-close" aria-label="Close" role="button">
         <span aria-hidden="true">×</span>
      </a>
      <div class="modal-content"></div>
      <div class="loadingOverlay" style="display: none;"></div>
   </div>
   <div id="alert-modal" class="modal modal--alert modal--small" data-reveal="" data-prevent-quick-search-close="">
      <div class="swal2-icon swal2-error swal2-icon-show"><span class="swal2-x-mark"><span
               class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>

      <div class="modal-content"></div>

      <div class="button-container"><button type="button" class="confirm button" data-reveal-close="">OK</button></div>
      <div class="loadingOverlay" style="display: none;"></div>
   </div>
</div>

<?php get_footer();?>