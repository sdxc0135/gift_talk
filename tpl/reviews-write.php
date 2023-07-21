<?php
/*
 * Template Name: 리뷰 작성
 */

if(!defined('ABSPATH')) exit;

get_header();
?>



<div style="overflow: hidden;">

	<!-- 상품리스트 01-->
	<ul class="product_List_product_ul_002" >
		<li><h5>리뷰작성</h5></li>
		<li></li>
	</ul>


	<div class="product_List_product_div_001 reviews_write_div_001">
		<div>
			<img src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt="" width="100%">
		</div>
		<div class="product_List_product_div_002">
			<div>
				<span>업체명</span>
				<h5>상품 제목</h5>
			</div>
			<div>
				<span>보낸 날짜 : 2023.05.21</span>
			</div>
		</div>
	</div>
	<hr>

	<div style="text-align: center; padding:20px; margin:10px 0 ;">
		<div style="margin-bottom: 20px;">
			<h4>선물은 만족 하셨나요?</h4>
		</div>
		<div>
			<i class="fa fa-star fa003"></i>	
			<i class="fa fa-star fa003"></i>
			<i class="fa fa-star fa003"></i>
			<i class="fa fa-star fa003"></i>
			<i class="fa fa-star fa003"></i>
		</div>
	</div>
	<hr>

	<div style="text-align: center; padding:20px; margin:0; margin-top:10px;">
		<div style="margin-bottom: 20px;">
			<h5>선물에 대한 솔직한 후기를 남겨주세요.</h5>
		</div>
		<div class="textContainer">
			<textarea id="myTextarea" maxlength="500" name="" rows="7"></textarea>
			<div id="textareaCounter">0 / 500자</div>
		</div>
	</div>

	<div style="padding:0 20px; display:flex; gap:5px;">
		<div class="file-input-wrapper">
			<label for="customFileInput07" class="file-input-label" onclick="addImageField(this, 'scene', 8, 'request_images[scene][]')">
				<span class="file-input-icon">+</span>
			</label>
		</div>
		<div class="img_field_wrap">
			<?php if($request->scene && is_array($request->scene)):?>
			<?php foreach($request->scene as $idx=>$id):?>
			<label>
				<input type="hidden" class="image_fields scene n<?php echo esc_attr($idx)?>" name="uploaded_request_images[scene][]" value="<?php echo esc_attr($id)?>">
				<div class="file_input_img_wrapper">
					<img class="file_input_img" src="<?php echo esc_url_raw(wp_get_attachment_image_url($id))?>" alt="">
					<div class="delete-icon">×</div>
				</div>
			</label>
			<?php endforeach?>
			<?php endif?>
		</div>
	</div>


	<!-- 하단 버튼 -->
	<div class="product_Detail_div_001">
		<div></div>
		<div>
			<button type="submit" class="btn btn-warning btn-block btn-lg product_Detail_btn_001" onclick="">리뷰 등록하기</button>
		</div>
	</div>


</div>

<script>

	
	jQuery(document).ready(function(){

		//별 클릭시 이벤트
		jQuery(".fa003").click(function(){
			var clickedIndex = jQuery(this).index();
			var score = clickedIndex + 1; // 별의 인덱스는 0부터 시작하기 때문에 점수는 인덱스에 1을 더합니다.
			jQuery(".fa003").each(function(index){
			if(index <= clickedIndex){
				jQuery(this).css('color', '#FFD400')
			}else{
				jQuery(this).css('color','#F2F2F2')
			}
			});
			console.log("Score: " + score); // 여기서 점수를 출력하고 있습니다. 필요에 따라 변경하실 수 있습니다.
		});


        //리뷰 등록 카운터 이벤트
		jQuery("#myTextarea").on('input', function() {
			var textLength = jQuery(this).val().length;
			jQuery('#textareaCounter').text(textLength + " / 500자");
		});

	});

	//이미지 시작
	function addImageField(obj, cls, lmt, name){
		var image_field = jQuery(".image_fields."+cls)
		if(image_field.length >= lmt){
			alert(lmt+'개 까지 선택 가능합니다.');
			return false;
		}
		
		var seq   = image_field.length + 1;
		var field = '<label>';
		field += '<input type="file" class="image_fields '+cls+' n'+seq+'" name="'+name+'" accept="image/*" hidden>';
		field += '<div class="file_input_img_wrapper"><img class="file_input_img" src="<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png" alt=""><div class="delete-icon">×</div></div>';
		field += '</label>';
		
		var wrap = jQuery(obj).parent().siblings(".img_field_wrap");
		
		jQuery(wrap).append(field);
		
		setTimeout(() => {
			jQuery(".image_fields."+cls+".n"+seq).click();
		});
		
		activteHandleImagePreview();
		expert_image_delete_icon();
	}

	function expert_image_delete_icon(){
		jQuery(".delete-icon").on("click", function(e){
			e.preventDefault();
			jQuery(this).parent().parent().remove();
		});
	}

	function activteHandleImagePreview(){
		jQuery(".image_fields").on("click", function(){
			var image_field = jQuery(this);
			var image       = image_field.siblings(".file_input_img_wrapper").find(".file_input_img");
			
			handleImagePreview(image_field, image);
		})
	}

	function handleImagePreview(inputElement, previewSelector){
		inputElement.on('change', function(){
			if (this.files && this.files[0]) {
				const fileInputImgs = jQuery(previewSelector);
				const availableImg = fileInputImgs.filter(function () {
					return !jQuery(this).data('used');
				}).first();
				
				if (availableImg.length) {
					const reader = new FileReader();
					
					reader.onload = function (e) {
						availableImg.attr('src', e.target.result);
						availableImg.data('used', true);
					};
					
					reader.readAsDataURL(this.files[0]);
				}
			}
		});
		
		inputElement.on('focus', function () {
			if (inputElement.val()) {
				inputElement.blur();
			}
		});
	}

	function createDeleteIcon(imgElement, inputElement) {
		const deleteIcon = jQuery('<div>', {
			class: 'delete-icon',
			html: '&times;'
		});
		
		deleteIcon.on('click', function () {
			imgElement.attr('src', '<?php echo get_template_directory_uri()?>/assets/image/img_avatar2.png');
			imgElement.data('used', false);
			deleteIcon.remove();
			inputElement.val('');
		});
		
		return deleteIcon;
	}
	//이미지 종료

</script>

<?php
get_footer();
?>