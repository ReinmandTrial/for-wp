<?php 
   // Template name: page How It Works
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
            </div>
            <main class="page-content halo-page-content">
               <!-- <div class="how-it-works-page"><strong> <img
                        src="https://cdn.shopify.com/s/files/1/0558/0813/1244/files/Step_by_Step_Large_aa1d4eba-6b52-409e-81a3-7f045bee0a62.png?v=1618167118"
                        alt=""></strong></div> -->
               <div class="how-it-works-page">
                  <?php the_content(); ?>
               </div>
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

<?php get_footer(); ?>