$(document).ready(function(){
	$('.select2').select2();
	setTimeout(function(){
		$(".alert").fadeOut();
	}, 2000);
	$('.summernote').summernote()
});
$(function () {
	$("#example1").DataTable({
		"responsive": true, "lengthChange": false, "autoWidth": false,
		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
});
function makeid() {
    var r = (Math.random() + 1).toString(36).substring(7);
    return r;
}
$(document).on("click", ".delete-product-gallery-image", function(){
	data_id = $(this).attr("data-id");
	$(".product-gallery-image-"+data_id).remove();
});
$(document).on("click", ".close-modal", function(){
	$(".modal").removeClass("show");
	$(".modal").css("display", "");
	$(".modal").css("padding-right", "");
	$(".modal").removeAttr("aria-modal", "true");
	$(".modal").removeAttr("role", "dialog");
	$("body").removeClass("modal-open");
	$("body").css("padding-right", "");
});
$(document).on("click", ".add-variation", function(){
	$(".admin-variation-modal").addClass("show");
	$(".admin-variation-modal").css("display", "block");
	$(".admin-variation-modal").css("padding-right", "17px");
	$(".admin-variation-modal").attr("aria-modal", "true");
	$(".admin-variation-modal").attr("role", "dialog");
	$("body").addClass("modal-open");
	$("body").css("padding-right", "17px");
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
		url: "http://127.0.0.1:8000/admin/admin-variation-modal",
		method: "post",
		data:{"_token":csrf_token},
		success: function(data){
			$(".admin-variation-modal .modal-body").html(data);
		}
	});
    $(".variation-input-content").html('<div class="input-group input-group" style="margin: 10px 0;"><input type="text" class="form-control variation-title-value" placeholder="Enter Variation Title"><span class="input-group-append"><button type="button" class="btn btn-primary btn-flat add-variation-title">Add Variation</button></span></div>');
});
$(document).on("click", ".attribute-value", function(){
	var attribute_value_title = $(this).val();
	var attribute_title = $(this).attr("data-variation-title");
	if($(this).is(":checked")){
		if(!$("th").hasClass(attribute_title+"-head")){
			$(".variation-table-header-row").append("<th class='"+attribute_title+"-head'>"+attribute_title+"</th>");
			$(".variation-table-body-row").append("<td class='"+attribute_title+"-body'>"+attribute_value_title+"</td>");
		}else{
			$(".variation-table-body").append("<tr class'variation-table-header-row'><td class='"+attribute_title+"-body'>"+attribute_value_title+"</td></tr>");
		}
	}else{
		$(".variation-table-header ."+attribute_title+"-head").remove();
		$(".variation-table-body ."+attribute_title+"-body").remove();
	}

});
$(document).on("click", ".add-variation-title", function(){
	var gen_key = makeid();
	$(".variation-real-content").after('<div class="card card-primary collapsed-card id-'+gen_key+'"><div class="card-header"><h3 class="card-title">'+$(".variation-title-value").val()+'</h3><input type="hidden" name="variation_title[]" value="'+$(".variation-title-value").val()+'" /><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button><button type="button" class="btn btn-tool remove-variation" data-id="'+gen_key+'"><i class="fas fa-times"></i></button></div></div><div class="card-body '+$(".variation-title-value").val()+'-Parent" style="display: none;"><div class="row"><div class="col-lg-12 '+$(".variation-title-value").val()+'-Values-Content"></div><div class="col-lg-12 '+$(".variation-title-value").val()+'-Values"></div></div><span type="submit" class="btn btn-warning variation-title-value-input" data-id="'+$(".variation-title-value").val()+'">Add '+$(".variation-title-value").val()+' Value</span></div></div>');
	$(".variation-input-content").html("");
});
$(document).on("click", ".variation-title-value-input", function(){
	var variation_title = $(this).attr("data-id");
	$("."+variation_title+"-Values").html('<div class="input-group input-group" style="margin: 10px 0;"><input type="text" class="form-control" placeholder="Enter '+variation_title+' Value"><span class="input-group-append"><button type="button" class="btn btn-primary btn-flat add-variation-value" data-id="'+variation_title+'">Add Value</button></span></div>');
});
$(document).on("click", ".add-variation-value", function(){
	var gen_key = makeid();
	var variation_title = $(this).attr("data-id");
	var variation_title_value = $("."+variation_title+"-Values input").val();
	$("."+variation_title+"-Values-Content").before("<span class='variation-title-value-content id-"+gen_key+"'>"+variation_title_value+"<input type='hidden' name='"+variation_title+"_variation_value[]' value='"+variation_title_value+"' /><i class='fas fa-times remove-variation' data-id='"+gen_key+"'></i></span>");
	$("."+variation_title+"-Values").html("");
});
$(document).on("click", ".remove-variation", function(){
	var data_id = $(this).attr("data-id");
	$(".id-"+data_id).remove();
});
$(document).ready(function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var product_id = $("input[name=product_id]").val();
	$(".admin-product-form").validate({
		rules:{
			product_slug:{
				remote:{
                    url: "http://127.0.0.1:8000/admin/check-product-slug-exist",
                    method: "post",
                    data:{"_token":csrf_token, product_id, product_id}
                }
			}
		},
		messages:{
			product_slug:{
				remote: "Product Slug Already Exist!..."
			}
		}
	});
});
$(document).ready(function(){
	$(".add-new-variation").validate({
		submitHandler: function(data){
			var result           = '';
			var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			var charactersLength = characters.length;
			var length = 10;
			for ( var i = 0; i < length; i++ ) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
			}
			var variation_data = {};
			var product_variation_length = $(".product-variation-row").length;
			var add_variation_row = "<tr class='product-variation-row "+result+"'>";
			$(".variation-value").each(function(vdata){
				if($(this).val()!=""){
					variation_data[$(this).attr("name")] = $(this).val();
					add_variation_row += "<td><input type='text' class='form-control' name='"+$(this).attr('name')+"["+product_variation_length+"]' value='"+$(this).val()+"' /></td>";
				}else{
					$(".add-new-variation-error").html("<span style='color: red; font-weight: bold;'>Please Enter "+$(this).attr("name")+" Value.</span>");
					exit();
				}
			});
			if(data.price.value!=""){
				add_variation_row += "<td><input type='text' class='form-control add-new-variation-price' name='price["+product_variation_length+"]' value='"+data.price.value+"' /></td>";
			}else{
				$(".add-new-variation-error").html("<span  style='color: red; font-weight: bold;'>Please Price Value.</span>");
				exit();
			}
			add_variation_row += "<td><a class='btn btn-danger delete-variation' data-row-id='"+result+"'>Delete</a></td>";
			add_variation_row += "</tr>";
			var product_id = data.product_id.value;
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				url: "http://127.0.0.1:8000/admin/update-product-variations",
                method: "post",
                data: {"_token":csrf_token, variation_data:JSON.stringify(variation_data), product_variation_price:data.price.value, product_id:product_id},
                success: function(data){
                	$("tbody").append(data);
                }
			});
		}
	});
});
$(document).on("keyup", ".variation-value, .add-new-variation-price", function(){
	$(".add-new-variation-error").html("");
})
$(document).on("click", ".delete-variation", function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var product_variation_id = $(this).attr("data-row-id");
	if(confirm("Are you sure you want to to delete this variation row.")){
		$.ajax({
			url: "http://127.0.0.1:8000/admin/delete-product-variation-row",
	        method: "post",
	        data: {"_token":csrf_token, product_variation_id:product_variation_id},
	        success: function(data){
	        	console.log(product_variation_id);
				$("."+product_variation_id).remove();
	        }
		});
	}
});
$(document).on("click", ".edit-variation", function(){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var product_variation_id = $(this).attr("data-row-id");
	var product_id = $(this).attr("data-product-id");
	$.ajax({
		url: "http://127.0.0.1:8000/admin/edit-product-variation-row",
        method: "post",
        data: {"_token":csrf_token, product_variation_id:product_variation_id, product_id:product_id},
        success: function(data){
			$(".admin-variation-modal").addClass("show");
			$(".admin-variation-modal").css("display", "block");
			$(".admin-variation-modal").css("padding-right", "17px");
			$(".admin-variation-modal").attr("aria-modal", "true");
			$(".admin-variation-modal").attr("role", "dialog");
			$(".admin-variation-modal").html(data);
        }
	});
});
$(document).on("submit", ".edit-product-variation", function(data){
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var variation_data = {};
	var product_variation_row = data.target.product_variation_row.value;
	var product_variation_price = data.target.product_variation_price.value;
	$(".variation-value").each(function(vdata){
		if($(this).val()!=""){
			variation_data[$(this).attr("name")] = $(this).val();
		}
	});
	$.ajax({
		url: "http://127.0.0.1:8000/admin/update-product-variation-row",
        method: "post",
        data: {"_token":csrf_token, variation_data:variation_data, product_variation_row:product_variation_row, product_variation_price:product_variation_price},
        success: function(data){
			$(".modal").removeClass("show");
			$(".modal").css("display", "");
			$(".modal").css("padding-right", "");
			$(".modal").removeAttr("aria-modal", "true");
			$(".modal").removeAttr("role", "dialog");
			$("body").removeClass("modal-open");
			$("body").css("padding-right", "");
			$("."+product_variation_row).html(data);
			console.log(data);
        }
	});
});