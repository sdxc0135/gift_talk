<?php
/*
 * Template Name: 기본 페이지 템플릿
 */

if(!defined('ABSPATH')) exit;

get_header();
?>

<div id="primary" class="content-area">
	<?php
	while(have_posts()){
		
		// 데이터 초기화
		the_post();
		?>
		
		<h1 class="single-title">
			<?php
			// 제목 출력
			the_title();
			?>
		</h1>
		
		<div class="single-content">
			<?php
			// 내용 출력
			the_content();
			?>
		</div>
		
		<?php
	}
	?>
</div>

<?php
get_footer();
?>