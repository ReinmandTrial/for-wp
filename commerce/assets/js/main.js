var $ = jQuery.noConflict();

var product = {
    $modal: null,
    $bg: null,
    isLoading: false,
    setLoader: function(state){
        if( state ){
            $('.loadingOverlay').show();
        }else{
            $('.loadingOverlay').hide();
        }
        this.isLoading = state;
    },
    addToCart: function(){

    },
    quickView: function(){

    },
    quickAdd: function(productId){
        var _this = this;
        this.setLoader(true);
        this.$modal.attr('class', 'modal modal--quickShop modal--small');

        this.prepareModal();
        this.openModal();

        $.ajax({
            method: 'POST',
            url: site_data.ajaxurl,
            data: {
                action: 'quick_add',
                product_id: productId
            },
            success: function(json){
                _this.insertHtml(json.data.html);
            },
            complete: function(){
                _this.setLoader(false);
            }
        })
    },
    openModal: function(){
        this.$modal.addClass('open');
        this.$bg.fadeIn();
    },
    closeModal: function(){
        this.$modal.removeClass('open');
        this.$bg.fadeOut();
    },
    prepareModal: function(){
        this.$modal.find('.modal-content').html('');
    },
    insertHtml: function(html){
        this.$modal.find('.modal-content').html(html);
    },
    changePrice: function(variationId){
        var _this = this;
        $.ajax({
            method: 'POST',
            url: site_data.ajaxurl,
            data: {
                action: 'change_variation_price',
                variation_id: variationId
            },
            success: function(json){
                _this.$modal.find('.productView-price').html(json.data.price_html);
            }
        })
    },
    init: function(){
        var _this = this;
        this.$modal = $('#modal');
        this.$bg = $('.modal-background');

        $('#modal .modal-close').on('click', function(ev){
            ev.preventDefault();
            _this.closeModal();
        });

        this.$bg.on('click', function(){
            _this.closeModal();
        })
    }
}

var cart = {
    addVariation: function($form){
        $.ajax({
            method: 'POST',
            url: site_data.ajaxurl,
            processData: false,
            contentType: false,
            data: this.formatData($form),
            success: function(json){

            }
        })
    },
    formatData: function($form){
        var $inputs = $form.find('input[type="file"], input[type="hidden"], input[type="radio"]:checked, input[type="checkbox"]:checked, input[type="text"], input[type="email"], input[type="tel"]');
        var formData = new FormData();
        $inputs.each(function(){
            var type = $(this).attr('type');
            var key  = $(this).attr('name');
            if( type === 'file' ){
                var file = $(this)[0].files[0];
                formData.append(key, file, file.name);
            }else{
                formData.append(key, $(this).val());
            }
        })
        return formData;
    }
}

$(document).ready(function(){
    product.init();

    $('[data-event-type="quick-add"]').on('click', function(ev){
        ev.preventDefault();
        product.quickAdd( $(this).attr('data-product-id') );
    })

    $('#modal').on('change', '[type="radio"][data-variation-id]', function(){
        product.changePrice($(this).attr('data-variation-id'));
    })

    $('#modal').on('submit', '#quick-add-form', function(ev){
        ev.preventDefault();
        cart.addVariation($(this));
    })
	$('.haloBackToTop__link').on('click',function(event){
		event.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});
	$(window).scroll(checkScroll);
	checkScroll();


    //FAQ
    // $('.halo-faqs-content > .faqs-paragraph > .collapse').css('display','none')
    $('.card-header > button.title').on('click',function(){
        $(this).toggleClass('collapsed');
        $(this).closest('.card').find('.collapse').slideToggle();
    })
    //FAQ end
});
function checkScroll(){
	var header = $('.header')
	var scrolled = $(window).scrollTop();

	if ( scrolled > 200 ) {
		if(!header.hasClass('is-sticky')){
			header.addClass('is-sticky');
			$('body').css('padding-top','188px');
		}
	} else {
			header.removeClass('is-sticky');
			$('body').css('padding-top','0px');
	}
	if(scrolled > 400){
		if(!$('#haloBackToTop').hasClass('is-visible')){
			$('#haloBackToTop').addClass('is-visible');
		}
	}else{
			$('#haloBackToTop').removeClass('is-visible');
	}
}
