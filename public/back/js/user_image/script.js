// Start upload preview image
$(function(){

	$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");

	var $uploadCrop,
		tempFilename,
		rawImg,
		imageId;
	function readFile(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.upload-demo').addClass('ready');
				$('#cropImagePop').modal('show');
				rawImg = e.target.result;
			}
			reader.readAsDataURL(input.files[0]);
		}
		else {
			swal("Sorry - you're browser doesn't support the FileReader API");
		}
	}
	$uploadCrop = $('#upload-demo').croppie({
		viewport: {
			width: 200,
			height: 200,
			type: 'square'
		},
		enforceBoundary: false,
		enableExif: false
	});
	$('#cropImagePop').on('shown.bs.modal', function(){
		$uploadCrop.croppie('bind', {
			url: rawImg
		}).then(function(){
			console.log('jQuery bind complete');
		});
	});

	$('.item-img').on('change', function (e) {
		e.preventDefault();
		imageId = $(this).data('id');
		tempFilename = $(this).val();
		$('#cancelCropBtn').data('id', imageId);
		readFile(this);
	});

	$('#cropImageBtn').on('click', function (ev) {
		$uploadCrop.croppie('result', {
			type: 'base64',
			format: 'jpeg',
			size: {width: 150, height: 200}
		}).then(function (resp) {
			$('.user_img_big').attr('src', resp);
			$('#upload-image').val(resp);
			$('#cropImagePop').modal('hide');
		});
	});
	// End upload preview image

	//========== upload button =========//
	var user_img_upload_flag = 0;
	var face_flag ;

	$('.user_profile_edit_img_delete').on('click', function(){
		user_img_upload_flag = 0;
		var image_No = $('#image_no').val();
		if(image_No > 0){
			if(confirm("Do you really want to remove the image?")){
				$('.main_image_delete_form').submit();
			}
		}else{
			var no_image_path = $('#no-image-path').val();
			$('.user_img_big').attr('src', no_image_path);
		}
	});

	$('.user_img_upload_button').on('click',function(e){
		e.preventDefault();
		if (user_img_upload_flag == 0) {
			alert ("Please specify the path to the file to upload!");
			return;
		}else{
			$('#user_img_uploadform').submit();
			return;
		}
	});

	$('.user_profile_edit_img_add').on('click', function(){
		user_img_upload_flag = 1;
	});

	//============ deploy images from db =============//
	$('.user_img_items1').on('click', function(){
		face_flag = 1;
		$('.user_img_modal_items1').css('display','inline-block');
	});

	$('.user_img_items2').on('click', function(){
		face_flag = 2;
		$('.user_img_modal_items2').css('display','inline-block');
	});

	$('.user_img_items3').on('click', function(){
		face_flag = 3;
		$('.user_img_modal_items3').css('display','inline-block');
	});

	$('.user_img_items4').on('click', function(){
		face_flag = 4;
		$('.user_img_modal_items4').css('display','inline-block');
	});

	$('.user_img_items5').on('click', function(){
		face_flag = 5;
		$('.user_img_modal_items5').css('display','inline-block');
	});

	/// modal close button
	$('.user_img_modal_exit').on('click', function(){
		if(face_flag == 1){
			$('.user_img_modal_items1').css('display','none');
		}else if(face_flag == 2){
			$('.user_img_modal_items2').css('display','none');
		}else if(face_flag == 3){
			$('.user_img_modal_items3').css('display','none');
		}else if(face_flag == 4){
			$('.user_img_modal_items4').css('display','none');
		}else if(face_flag == 5){
			$('.user_img_modal_items5').css('display','none');
		}else{
			return;
		}
	});

	/// modal item delete button
	$('.user_img_modal_delete').on('click', function(){

	});

	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	}, 5000);
});
