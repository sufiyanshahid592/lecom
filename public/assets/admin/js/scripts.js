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
