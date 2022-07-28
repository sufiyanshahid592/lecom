jQuery.validator.addMethod("SpaceNotAllow", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");

var productDetails = function () {
    $('.product-image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        asNavFor: '.slider-nav-thumbnails',
    });

    $('.slider-nav-thumbnails').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-image-slider',
        dots: false,
        focusOnSelect: true,
        
        prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
    });

    // Remove active class from all thumbnail slides
    $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

    // Set active class to first thumbnail slides
    $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

    // On before slide change match active thumbnail to current slide
    $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var mySlideNumber = nextSlide;
        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
        $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
    });

    $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var img = $(slick.$slides[nextSlide]).find("img");
        $('.zoomWindowContainer,.zoomContainer').remove();
        $(img).elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
        });
    });
    //Elevate Zoom
    if ( $(".product-image-slider").length ) {
        $('.product-image-slider .slick-active img').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
        });
    }
    //Filter color/Size
    $('.list-filter').each(function () {
        $(this).find('a').on('click', function (event) {
            event.preventDefault();
            $(this).parent().siblings().removeClass('active');
            $(this).parent().toggleClass('active');
            $(this).parents('.attr-detail').find('.current-size').text($(this).text());
            $(this).parents('.attr-detail').find('.current-color').text($(this).attr('data-color'));
        });
    });
    //Qty Up-Down
    $('.detail-qty').each(function () {
        var qtyval = parseInt($(this).find(".qty-val").val(), 10);

        $('.qty-up').on('click', function (event) {
            event.preventDefault();
            qtyval = qtyval + 1;   
            $(this).prev().val(qtyval);
        });

         $(".qty-down").on("click", function (event) {
             event.preventDefault(); 
             qtyval = qtyval - 1;
             if (qtyval > 1) {
                 $(this).next().val(qtyval);
             } else {
                 qtyval = 1;
                 $(this).next().val(qtyval);
             }
         });
    });

    $('.dropdown-menu .cart_list').on('click', function (event) {
        event.stopPropagation();
    });
};
$(document).ready(function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	$(".register-form").validate({
		rules:{
			username:{
				required: true,
				SpaceNotAllow: true,
				remote:{
					url: "http://127.0.0.1:8000/check-username-exist",
					method: "post",
					data:{"_token":csrf_token}
				}
			},
			email:{
				required: true,
				email: true,
				remote:{
					url: "http://127.0.0.1:8000/check-email-exist",
					method: "post",
					data:{"_token":csrf_token}
				}
			},
			password:{
				required: true
			},
			cpassword:{
				required: true,
				equalTo: "#password"
			}
		},
		messages:{
			username:{
				required: "Username is Required",
				SpaceNotAllow: "Space not allow in username",
				remote: "Username Already Existed"
			},
			email:{
				required: "Email is Required",
				email: "Enter Valid Email",
				remote: "Email Already Existed"
			},
			password:{
				required: "Password is Required"
			},
			cpassword:{
				required: "Confirm Password is Required",
				equalTo: "Confirm Password is not equal to Password"
			}
		}
	});
});
$(document).on("click", ".quickViewModal", function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var product_id = $(this).attr("data-product-id");
	$.ajax({
		url: "http://127.0.0.1:8000/product-quick-view",
		method: "post",
		data:{product_id:product_id, "_token":csrf_token},
		success: function(success){
			$("#quickViewModal").html(success);
				productDetails();
			
		}
	});
});
$(document).ready(function(){
	$("input[data-bootstrap-switch]").each(function(){
  		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});
});