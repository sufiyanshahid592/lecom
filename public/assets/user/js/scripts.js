$(document).ajaxStart(function(){
    $("#preloader-active").fadeIn();
});
$(document).ajaxComplete(function(){
    $("#preloader-active").fadeOut();
});
jQuery.validator.addMethod("SpaceNotAllow", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");
function update_setting(){
    $(".cart-row").each(function(){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var row_id = $(this).find(".qty-val").attr("data-row-id");
        var product_price = $(this).find(".qty-val").attr("data-product-price");
        var product_qty = $(this).find(".qty-val").html();
        $.ajax({
            url: "http://127.0.0.1:8000/update-cart",
            method: "post",
            data:{row_id:row_id, product_price:product_price, product_qty:product_qty, "_token":csrf_token},
            success: function(success){
            }
        });
    });
    $.ajax({
        url: "http://127.0.0.1:8000/update-cart-area",
        success: function(success){
            $(".home-cart-content-area").html(success);
        }
    });
    $.ajax({
        url: "http://127.0.0.1:8000/count-cart",
        success: function(success){
            $(".cart-page-counter").html(success);
        }
    });
    $.ajax({
        url: "http://127.0.0.1:8000/checkout-total",
        success: function(success){
            $(".sub-total").html(success);
            $(".checkout-total").html(success);
        }
    });
} 
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
$(document).on("click", ".qty-up", function(){
    var row_id = $(this).attr("data-row-id");
    var product_price = $(".qty-val-"+row_id).attr("data-product-price");
    var product_qty = $(".qty-val-"+row_id).html();
    var final_qty = parseFloat(product_qty)+1
    if(final_qty==0){
        final_qty = 1;
    }
    $(".qty-val-"+row_id).html(final_qty);
    var product_qty = $(".qty-val-"+row_id).html();
    if($("h4").hasClass("sub-total")){
        var sub_total = parseFloat(product_qty)*parseFloat(product_price);
        $("."+row_id+" .product-sub-total").html(sub_total.toFixed(2));
    }
    $(".update-cart").removeAttr("disabled");
    $(".disabled-checkout-btn").attr("disabled", "disabled");
});
$(document).on("click", ".qty-down", function(){
    var row_id = $(this).attr("data-row-id");
    var product_price = $(".qty-val-"+row_id).attr("data-product-price");
    var product_qty = $(".qty-val-"+row_id).html();
    var final_qty = parseFloat(product_qty)-1
    if(final_qty==0){
        final_qty = 1;
    }
    $(".qty-val-"+row_id).html(final_qty);
    var product_qty = $(".qty-val-"+row_id).html();
    if($("h4").hasClass("sub-total")){
        var sub_total = parseFloat(product_qty)*parseFloat(product_price);
        $("."+row_id+" .product-sub-total").html(sub_total.toFixed(2));
    }
    $(".update-cart").removeAttr("disabled");
    $(".disabled-checkout-btn").attr("disabled", "disabled");
});
$(document).ready(function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	$(".register-form").validate({
		rules:{
			first_name:{
				required: true
			},
            last_name:{
                required: true
            },
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
            first_name:{
                required: "First Name is Required"
            },
            last_name:{
                required: "Last Name is Required"
            },
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
$(document).ready(function(){
    $(".login-form").validate({
        rules: {
            username_email:{
                required: true
            },
            password:{
                required: true
            }
        },
        messages:{
            username_email:{
                required: "Email/Username is Required"
            },
            password:{
                required: "Password is Required"
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
$(document).on("click", ".button-add-to-cart", function(){
    var product_id = $(this).attr("data-product-id");
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var product_price_val = $(".product-price-val").html();
    var variation_content = {};
    if($("div").hasClass("product-variations-row")){
        $(".product-variations-row").each(function(){
            var variation_title = $(this).find("li.active").attr("data-variation-title");
            var variation_value = $(this).find("li.active a").html();
            variation_content[variation_title] = variation_value;
        });
    }
    $.ajax({
        url: "http://127.0.0.1:8000/add-to-cart",
        method: "post",
        data:{product_id:product_id, variation_content:JSON.stringify(variation_content), product_price_val:product_price_val, "_token":csrf_token},
        success: function(success){
            update_setting();
        }
    });
});
$(document).on("click", ".update-cart", function(){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $(".cart-row").each(function(){
        var row_id = $(this).find(".qty-val").attr("data-row-id");
        var product_price = $(this).find(".qty-val").attr("data-product-price");
        var product_qty = $(this).find(".qty-val").html();
        $.ajax({
            url: "http://127.0.0.1:8000/update-cart",
            method: "post",
            data:{row_id:row_id, product_price:product_price, product_qty:product_qty, "_token":csrf_token},
            success: function(success){
                update_setting();
                $(".disabled-checkout-btn").removeAttr("disabled");
                $(".update-cart").attr("disabled", "disabled");
            }
        });
    });
});
$(document).ready(function(){
    $("#empty_cart").click(function(){
        $.ajax({
            url: "http://127.0.0.1:8000/destroy-cart",
            async: false,
            success: function(){
                $(".cart-row").fadeOut();
                update_setting();
            }
        });
    });
});
$(document).ready(function(){
    setTimeout(function(){
        $('.ss-alert-section .alert').fadeOut();
    }, 4000);
});
$(document).on("click", ".change-password-checkbox", function(){
    if($(this).is(":checked")){
        $(".change-password-section").fadeIn();
    }else{
        $(".change-password-section").fadeOut();
    }
});
$(document).ready(function(){
    $(".update-profile").validate({
        rules:{
            first_name:{
                required: true
            },
            last_name:{
                required: true
            },
            old_password:{
                required: true
            },
            password:{
                required: true
            },
            cpassword:{
                required: true,
                equalTo:  "#password"
            }
        },
        messages:{

        }
    });
});
$(document).on("click", ".remove-from_cart", function(){
    var id = $(this).attr("data-id");
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "http://127.0.0.1:8000/remove-cart",
        method: "POST",
        data: {id:id, "_token":csrf_token},
        async: false,
        success: function(succ){
            update_setting();
            $("."+id).remove();
        }
    });
});