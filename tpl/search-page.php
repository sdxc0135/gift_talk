<?php
/*
 * Template Name: 검색 화면
 */

if(!defined('ABSPATH')) exit;

get_header();
?>



<div class="div_004">
	<div class="input-group mb-3">
		<input type="text" class="form-control " placeholder="어버이날 선물">
		<div class="input-group-append">
			<button class="btn btn-outline-warning " type="submit"><a href="/product-list/"><img src="<?php echo get_template_directory_uri()?>/assets/image/search-btn.svg" alt="" width="20px"></a></button>
		</div>
	</div>

	<div id="accordion-resizer" class="ui-widget-content">
		<div id="accordion">
			<h5 id="select001" style="text-align:center">누구에게 선물하나요?</h5>
			<div>
				<p style="display:grid; grid-template-columns: calc(50% - 5px) calc(50% - 5px) ; column-gap: 10px; width:100%">
					<select id="genderSelect" class="custom-select custom-select-sm">
						<option value="all">전체</option>
						<option value="male">낭성</option>
						<option value="female">여성</option>
					</select>
					<select class="custom-select custom-select-sm">
						<option value="" disabled selected>나이</option>
						<option value="10under">10대 미만</option>
						<option value="10">10대</option>
						<option value="20">20대</option>
						<option value="30">30대</option>
						<option value="40">40대</option>
						<option value="50">50대</option>
						<option value="60more">60대 이상</option>
					</select> 
					<p>
						<input class="genderSel01 radio_btn_cus_in unisex" id="radio-나" type="radio" name="code01" value="나">
						<label class="radio_btn_cus_la" for="radio-나">나에게 선물하기</label>
					</p>                 
				</p>
				<p class="search_page_span_001" id="search_radio_fnc">
					<!-- //라디오 버튼 함수01 -->
				</p>
			</div>
			<h5 id="select002" style="text-align:center">무엇을 기념하여 선물하나요?</h3>
			<div>
				<p class="search_page_p_002">
					<img src="<?php echo get_template_directory_uri()?>/assets/image/ex_img.png" alt="">
					<img src="<?php echo get_template_directory_uri()?>/assets/image/ex_img.png" alt="">
					<img src="<?php echo get_template_directory_uri()?>/assets/image/ex_img.png" alt="">
				</p>
				<p class="search_page_span_001" id="search_radio_fnc2">
					<!-- //라디오 버튼 함수02 -->
				</p>
			</div>
			<h5 id="select003" style="text-align:center">어떤 마음을 전하고 싶은가요?</h3>
			<div>
				<p class="search_page_p_002" id="search_radio_fnc3">
					<img src="<?php echo get_template_directory_uri()?>/assets/image/ex_img.png" alt="">
					<img src="<?php echo get_template_directory_uri()?>/assets/image/ex_img.png" alt="">
					<img src="<?php echo get_template_directory_uri()?>/assets/image/ex_img.png" alt="">
				</p>
				<p class="search_page_span_001">
					<!-- //라디오 버튼 함수03 -->
				</p>
			</div>
		</div>
	</div>
	<div><a href="/search-page-list">임시버튼</a></div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  jQuery( function() {
    jQuery( "#accordion" ).accordion({
      heightStyle: "fill"
    });
 
    jQuery( "#accordion-resizer" ).resizable({
      minHeight: 300,
      minWidth: 300,
      resize: function() {
        jQuery( "#accordion" ).accordion( "refresh" );
      }
    });
  } );
</script>



<?php
get_footer();
?>