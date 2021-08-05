<?php 
   // Template name: page Contact Us
   get_header();
?>
<div class="body" id="main-content" data-currency-code="USD">

   <div class="page-container">
      <div class="container">
         <div class="breadcrumb-wrapper">
            <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            </ul>
         </div>
         <div class="page page-contact">
            <div class="page-header">
               <h1 class="page-heading"><?php the_title(); ?></h1>
            </div>
            <main class="page-content">
               <div class="halo-contact-form">
                  <div id="contact-us-page">
                     <p><span>Have a question or comment? Use the form below to send us a message or contact us by mail
                           at:<span class="Apple-converted-space">&nbsp;support@customifyme.com</span></span></p>
                     <form data-contact-form="" class="form" action="/pages.php?action=sendContactForm" method="post">


                        <input type="hidden" name="page_id" id="page_id" value="4">
                        <div class="form-row form-row--half">
                           <div class="form-field">
                              <label class="form-label" for="contact_fullname">Full Name</label>
                              <input class="form-input" type="text" id="contact_fullname" name="contact_fullname"
                                 value="">
                           </div>

                           <div class="form-field">
                              <label class="form-label" for="contact_phone">Phone Number</label>
                              <input class="form-input" type="text" id="contact_phone" name="contact_phone" value="">
                           </div>

                           <div class="form-field">
                              <label class="form-label" for="contact_email">Email Address
                                 <small>Required</small>
                              </label>
                              <input class="form-input" type="text" id="contact_email" name="contact_email" value="">
                              <span style="display: none;"></span></div>

                           <div class="form-field">
                              <label class="form-label" for="contact_orderno">Order Number</label>
                              <input class="form-input" type="text" id="contact_orderno" name="contact_orderno">
                           </div>


                           <div class="form-field">
                              <label class="form-label" for="contact_rma">RMA Number</label>
                              <input class="form-input" type="text" id="contact_rma" name="contact_rma">
                           </div>
                        </div>

                        <div class="form-field">
                           <label class="form-label" for="contact_question">Comments/Questions
                              <small>Required</small>
                           </label>
                           <textarea name="contact_question" id="contact_question" rows="5" cols="50"
                              class="form-input"></textarea>
                           <span style="display: none;"></span></div>

                        <div class="form-actions">
                           <input class="button button--primary" type="submit" value="Submit Form">
                        </div>
                     </form>
                  </div>
               </div>
               <div class="halo-contact-info">
                  <h3 class="title">Please do get in touch!</h3>
                  <div class="content">
                     <?php 
                        $contact_description = get_field( 'contact_description' );
                        $contact_email = get_field( 'contact_email' );
                        $contact_location = get_field( 'contact_location' );
                        $contact_phone = get_field( 'contact_phone' );
                        $contact_timetable = get_field( 'contact_timetable' );
                     ?>
                     <div class="description"><?php echo $contact_description ?></div>
                     <div class="sample">
                        <a href="mailto:<?php echo $contact_email ?>" class="button button--transparent">Contact Us</a>
                     </div>
                     <div class="store-address"><?php echo $contact_location ?></div>
                     <div class="store-info">
                        <div class="item">
                           Email: <a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a>
                        </div>
                        <div class="item">
                           Toll-free: <a href="tel:<?php echo $contact_phone ?>"><?php echo $contact_phone ?></a>
                        </div>
                     </div>
                     <div class="store-info">
                        <div class="item">Opening Hours:</div>
                        <div class="item"><?php echo $contact_timetable ?></div>
                     </div>
                  </div>
               </div>
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