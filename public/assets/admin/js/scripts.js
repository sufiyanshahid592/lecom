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
$(document).on("click", ".delete-product-gallery-image", function(){
	data_id = $(this).attr("data-id");
	$(".product-gallery-image-"+data_id).remove();
});
$(document).on("click", ".add-variation", function(){
    $(".variation-input-content").html('<div class="input-group input-group" style="margin: 10px 0;"><input type="text" class="form-control variation-title-value" placeholder="Enter Variation Title"><span class="input-group-append"><button type="button" class="btn btn-primary btn-flat add-variation-title">Add Variation</button></span></div>');
});
$(document).on("click", ".add-variation-title", function(){
	$(".variation-real-content").after('<div class="card card-primary collapsed-card"><div class="card-header"><h3 class="card-title">'+$(".variation-title-value").val()+'</h3><input type="hidden" name="variation_title[]" value="'+$(".variation-title-value").val()+'" /><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button></div></div><div class="card-body '+$(".variation-title-value").val()+'-Parent" style="display: none;"><div class="row"><div class="col-lg-12 '+$(".variation-title-value").val()+'-Values-Content"></div><div class="col-lg-12 '+$(".variation-title-value").val()+'-Values"></div></div><span type="submit" class="btn btn-warning variation-title-value-input" data-id="'+$(".variation-title-value").val()+'">Add '+$(".variation-title-value").val()+' Value</span></div></div>');
	$(".variation-input-content").html("");
});
$(document).on("click", ".variation-title-value-input", function(){
	var variation_title = $(this).attr("data-id");
	$("."+variation_title+"-Values").html('<div class="input-group input-group" style="margin: 10px 0;"><input type="text" class="form-control" placeholder="Enter '+variation_title+' Value"><span class="input-group-append"><button type="button" class="btn btn-primary btn-flat add-variation-value" data-id="'+variation_title+'">Add Value</button></span></div>');
});
$(document).on("click", ".add-variation-value", function(){
	var variation_title = $(this).attr("data-id");
	$("."+variation_title+"-Values-Content").after($("."+variation_title+"-Values input <input type='hidden' name=''").val());
	$("."+variation_title+"-Values").html("");
});