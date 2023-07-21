<?php
define('GIFTTALK_THEME_VER', '1.0');
define('GIFTTALK_THEME_DIR', get_stylesheet_directory());
define('GIFTTALK_THEME_URL', get_stylesheet_directory_uri());

include_once BG_THEME_DIR.'/include/class/Binggo_Register.class.php';

include_once BG_THEME_DIR.'/include/class/Binggo.class.php';
include_once BG_THEME_DIR.'/include/class/Binggo_Expert.class.php';
include_once BG_THEME_DIR.'/include/class/Binggo_Portfolio.class.php';
include_once BG_THEME_DIR.'/include/class/Binggo_Quotes.class.php';

include_once BG_THEME_DIR.'/include/class/Binggo_User.class.php';
include_once BG_THEME_DIR.'/include/class/Binggo_Request.class.php';

include_once BG_THEME_DIR.'/include/class/Binggo_User_Controller.class.php';
include_once BG_THEME_DIR.'/include/class/Binggo_Expert_Controller.class.php';

include_once BG_THEME_DIR.'/include/admin/class/Binggo_Admin_Request.class.php';
include_once BG_THEME_DIR.'/include/admin/class/Binggo_Admin_Quotes.class.php';
include_once BG_THEME_DIR.'/include/admin/class/Binggo_Admin_Expert.class.php';
include_once BG_THEME_DIR.'/include/admin/class/Binggo_Admin.class.php';
include_once BG_THEME_DIR.'/include/admin/class/Binggo_Admin_Controller.class.php';

add_action('template_redirect', function(){
	if(get_the_ID() == '990'){
		if(is_user_logged_in()){
			if(get_user_meta(get_current_user_id(), 'is_expert_confirm', true)){
				wp_redirect(get_permalink(1004));
			}
			else{
				wp_redirect(get_permalink(1091));
			}
		}
	};
});

add_action('init', function(){
	show_admin_bar(false);
	
	new Binggo_Admin();
	new Binggo_Register();
});

add_action('admin_init', function(){
	new Binggo_Admin_Controller();
	new Binggo_User_Controller();
	new Binggo_Expert_Controller();
});

add_action('after_setup_theme', function(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',));
	add_theme_support('woocommerce');
}, 10, 1);

function binggo_get_products(){
	global $wpdb;
	
	$select  = '*';
	$from    = "`{$wpdb->prefix}posts` AS `post`";
	$where   = "`post_status` = 'publish' AND `post`.`post_type` = 'product'";
	$order   = "`post_date` DESC";
	$_limit  = 3;
	$_offset = 0;
	
	$limit = '';
	if($_limit){
		$limit = "LIMIT {$_offset}, {$_limit}";
	}
	
	return $wpdb->get_results("SELECT {$select} FROM {$from} WHERE {$where} ORDER BY {$order} {$limit}");
}

/*
page 정보

전문가 공사완료 상세내역 : 1342
전문가 리뷰 확인하기 : 1145
전문가 공사완료 요청 : 1143
고객 견적 상세보기 : 1126
고객 의뢰서 상세보기 : 1140
전문가 견적서 작성 : 1138
고객 전문가 프로필 상세보기 : 1136
고객 재시공 요청, AS 요청 내역 : 1127
고객 재시공 요청, AS 요청 : 1128
고객 공사요청 : 1129
고객 견적 리스트 : 1124
고객 공사완료 확정 : 1122
고객 의뢰서 작성 : 1120
고객 의뢰서 접수 완료 : 1118
고객 전체 공사 내용 : 1116
고객 의뢰내역(견적/A/S) : 1112
고객 전문가찾기(의뢰신청) : 1110
알림 : 1108
전문가 시공/완료 : 1105
전문가 의뢰찾기 : 1103
전문가 포트폴리오 작성/수정 : 1099
전문가 프로필 : 1095
고객 메인 : 1091
전문가 메인 : 1004
로그인 : 990
회원정보 : 702
공지사항 : 102
빙고이야기 : 95
이용약관 : 77
내 계정 : 27
결제 : 26
장바구니 : 25
전체 카테고리 : 24
개인정보 처리방침 : 3
shop: 410
문의사항: 1488
 */