<?php
/**
 * Binggo_Estimate_Controller
 * @copyright Copyright 2022 thefunnel. All rights reserved.
 */
final class Binggo_Estimate_Controller {
	
	public function __construct(){
		add_action('admin_post_binggo_user_estimate_edit', array($this, 'user_estimate_edit'));
		add_action('admin_post_binggo_pro_estimate_send', array($this, 'pro_estimate_send'));
	}
	
	public function user_estimate_edit(){
		global $wpdb;
		
		if(isset($_POST['security']) && wp_verify_nonce($_POST['security'], 'binggo_user_estimate_edit')){
			
			$_POST = stripslashes_deep($_POST);
			
			$estimate_id = isset($_POST['estimate_id']) ? intval($_POST['estimate_id']) : '';
			$estimate_category = isset($_POST['estimate_category']) ? sanitize_text_field($_POST['estimate_category']) : '';
			$work_place = isset($_POST['work_place']) ? sanitize_text_field($_POST['work_place']) : '';
			$estimate_location = isset($_POST['estimate_location']) ? sanitize_text_field($_POST['estimate_location']) : '';
			$work_start_ymdhis = isset($_POST['work_start_ymdhis']) ? sanitize_text_field($_POST['work_start_ymdhis']) : '';
			$work_end_ymdhis = isset($_POST['work_end_ymdhis']) ? sanitize_text_field($_POST['work_end_ymdhis']) : '';
			$visit_ymd = isset($_POST['visit_ymd']) ? sanitize_text_field($_POST['visit_ymd']) : '';
			$visit_his = isset($_POST['visit_his']) ? sanitize_text_field($_POST['visit_his']) : '';
			$comment = isset($_POST['comment']) ? sanitize_textarea_field($_POST['comment']) : '';
			
			include_once BINGGO_DIR . '/class/Binggo_Photo_Scene_Storage.class.php';
			$photo_scene_storage = new Binggo_Photo_Scene_Storage();
			$photo_scene_storage->connect();
			$photo_scene  = isset($_FILES['photo_scene']) ? $_FILES['photo_scene'] : '';
			
			// 이미지 포맷 체크
			foreach($photo_scene['type'] as $key=>$type_row){
				if($type_row){
					$type = str_replace('image/', '', $type_row);
					if($type != 'jpeg' && $type != 'jpg' && $type != 'png' && $type != 'gif' && $type != 'bmp'){
						echo '<script>alert("지원하지 않는 이미지 포맷입니다."); window.location.href = "'. esc_url_raw(wp_get_referer()) .'";</script>';
						exit;
					}
				}
			}
			
			include_once BINGGO_DIR . '/class/Binggo_Photo_Drawing_Storage.class.php';
			$photo_drawing_storage = new Binggo_Photo_Drawing_Storage();
			$photo_drawing_storage->connect();
			$photo_drawing  = isset($_FILES['photo_drawing']) ? $_FILES['photo_drawing'] : '';
			
			// 이미지 포맷 체크
			foreach($photo_drawing['type'] as $key=>$type_row){
				if($type_row){
					$type = str_replace('image/', '', $type_row);
					if($type != 'jpeg' && $type != 'jpg' && $type != 'png' && $type != 'gif' && $type != 'bmp'){
						echo '<script>alert("지원하지 않는 이미지 포맷입니다."); window.location.href = "'. esc_url_raw(wp_get_referer()) .'";</script>';
						exit;
					}
				}
			}
			
			if($estimate_id){
				$estimate = new Binggo_Estimate();
				$estimate->estimate_category = $estimate_category;
				$estimate->estimate_status = 'request';
				$estimate->estimate_location = $estimate_location;
				$estimate->work_place = $work_place;
				$estimate->work_start_ymdhis = date('YmdHis', strtotime($work_start_ymdhis));
				$estimate->work_end_ymdhis = date('YmdHis', strtotime($work_end_ymdhis));
				$estimate->visit_ymdhis = date('YmdHis', strtotime($visit_ymd . ' ' . $visit_his));
				$estimate->comment = $comment;
				$estimate->update();
			}
			else{
				$estimate = new Binggo_Estimate();
				$estimate->user_id = get_current_user_id();
				$estimate->estimate_category = $estimate_category;
				$estimate->estimate_status = 'request';
				$estimate->estimate_location = $estimate_location;
				$estimate->work_place = $work_place;
				$estimate->work_start_ymdhis = date('YmdHis', strtotime($work_start_ymdhis));
				$estimate->work_end_ymdhis = date('YmdHis', strtotime($work_end_ymdhis));
				$estimate->visit_ymdhis = date('YmdHis', strtotime($visit_ymd . ' ' . $visit_his));
				$estimate->comment = $comment;
				$estimate_id = $estimate->create();
			}
			
			foreach($photo_scene['tmp_name'] as $key=>$tmp_name){
				if($photo_scene['size'][$key] && is_uploaded_file($tmp_name)){
					
					// 이미지 리사이즈 시작
					$img_info = getimagesize($tmp_name);
					$img_width = $img_info[0];
					$img_height = $img_info[1];
					
					// 이미지 가로가 1920px이 넘어갈 때 1920으로 맞춤
					if($img_width > 1920){
						$image = wp_get_image_editor($tmp_name);
						if(!is_wp_error($image)){
							$image->set_quality(80);
							$image->resize(1920, null, false);
							$resize_img = $image->save($tmp_name);
							$tmp_name = $resize_img['path'];
						}
					}
					// 이미지 세로가 1920px이 넘어갈 때 1920으로 맞춤
					elseif($img_height > 1920){
						$image = wp_get_image_editor($tmp_name);
						if(!is_wp_error($image)){
							$image->set_quality(80);
							$image->resize(null, 1920, false);
							$resize_img = $image->save($tmp_name);
							$tmp_name = $resize_img['path'];
						}
					}
					// 이미지 리사이즈 종료
					
					$file_upload_name = $photo_scene['name'][$key];
					$file_extension = explode('.', $file_upload_name);
					$file_extension = end($file_extension);
					$file_extension = strtolower($file_extension);
					$file_name = sprintf('%s.%s', uniqid(), $file_extension);
					
					$result = $photo_scene_storage->put($tmp_name, $file_name);
					
					if($result->url){
						$file_url = $result->url;
						
						$data = array();
						$data['estimate_id'] = $estimate_id;
						$data['file_name'] = $file_name;
						$data['file_path'] = $file_url;
						$wpdb->insert("{$wpdb->prefix}binggo_photo_scene", $data);
					}
				}
			}
			
			foreach($photo_drawing['tmp_name'] as $key=>$tmp_name){
				if($photo_drawing['size'][$key] && is_uploaded_file($tmp_name)){
					
					// 이미지 리사이즈 시작
					$img_info = getimagesize($tmp_name);
					$img_width = $img_info[0];
					$img_height = $img_info[1];
					
					// 이미지 가로가 1920px이 넘어갈 때 1920으로 맞춤
					if($img_width > 1920){
						$image = wp_get_image_editor($tmp_name);
						if(!is_wp_error($image)){
							$image->set_quality(80);
							$image->resize(1920, null, false);
							$resize_img = $image->save($tmp_name);
							$tmp_name = $resize_img['path'];
						}
					}
					// 이미지 세로가 1920px이 넘어갈 때 1920으로 맞춤
					elseif($img_height > 1920){
						$image = wp_get_image_editor($tmp_name);
						if(!is_wp_error($image)){
							$image->set_quality(80);
							$image->resize(null, 1920, false);
							$resize_img = $image->save($tmp_name);
							$tmp_name = $resize_img['path'];
						}
					}
					// 이미지 리사이즈 종료
					
					$file_upload_name = $photo_drawing['name'][$key];
					$file_extension = explode('.', $file_upload_name);
					$file_extension = end($file_extension);
					$file_extension = strtolower($file_extension);
					$file_name = sprintf('%s.%s', uniqid(), $file_extension);
					
					$result = $photo_drawing_storage->put($tmp_name, $file_name);
					
					if($result->url){
						$file_url = $result->url;
						
						$data = array();
						$data['estimate_id'] = $estimate_id;
						$data['file_name'] = $file_name;
						$data['file_path'] = $file_url;
						$wpdb->insert("{$wpdb->prefix}binggo_photo_drawing", $data);
					}
				}
			}
			
			// 견적요청, 상담중, 요청마감, 계약됨, 거래완료
			// request, consulting, closing, contracted, completed
			
			wp_redirect('/user-estimate-complete/?estimate_id=' . $estimate_id);
			exit;
		}
		else{
			wp_die('권한이 없습니다.');
		}
	}
	
	public function pro_estimate_send(){
		global $wpdb;
		
		if(isset($_POST['security']) && wp_verify_nonce($_POST['security'], 'binggo_pro_estimate_send')){
			
			$_POST = stripslashes_deep($_POST);
			
			$estimate_proposal_id = isset($_POST['estimate_proposal_id']) ? intval($_POST['estimate_proposal_id']) : '';
			$estimate_id = isset($_POST['estimate_id']) ? intval($_POST['estimate_id']) : '';
			$install_people_number = isset($_POST['install_people_number']) ? sanitize_text_field($_POST['install_people_number']) : '';
			$install_working_time = isset($_POST['install_working_time']) ? sanitize_text_field($_POST['install_working_time']) : '';
			$install_cost = isset($_POST['install_cost']) ? sanitize_text_field($_POST['install_cost']) : '';
			$demolition_people_number = isset($_POST['demolition_people_number']) ? sanitize_text_field($_POST['demolition_people_number']) : '';
			$demolition_working_time = isset($_POST['demolition_working_time']) ? sanitize_text_field($_POST['demolition_working_time']) : '';
			$demolition_cost = isset($_POST['demolition_cost']) ? sanitize_text_field($_POST['demolition_cost']) : '';
			$part_name = isset($_POST['part_name']) ? sanitize_text_field($_POST['part_name']) : '';
			$part_cost = isset($_POST['part_cost']) ? sanitize_text_field($_POST['part_cost']) : '';
			$other_name = isset($_POST['other_name']) ? sanitize_text_field($_POST['other_name']) : '';
			$other_cost = isset($_POST['other_cost']) ? sanitize_text_field($_POST['other_cost']) : '';
			
			$estimate = new Binggo_Estimate($estimate_id);
			if($estimate->ID()){
				if($estimate_proposal_id){
					$estimate_proposal = new Binggo_Estimate_Proposal();
					$estimate_proposal->estimate_id = $estimate_id;
					$estimate_proposal->install_people_number = $install_people_number;
					$estimate_proposal->install_working_time = $install_working_time;
					$estimate_proposal->install_cost = $install_cost;
					$estimate_proposal->demolition_people_number = $demolition_people_number;
					$estimate_proposal->demolition_working_time = $demolition_working_time;
					$estimate_proposal->demolition_cost = $demolition_cost;
					$estimate_proposal->part_name = $part_name;
					$estimate_proposal->part_cost = $part_cost;
					$estimate_proposal->other_name = $other_name;
					$estimate_proposal->other_cost = $other_cost;
					$estimate_proposal->update();
				}
				else{
					$estimate_proposal = new Binggo_Estimate_Proposal();
					$estimate_proposal->estimate_id = $estimate_id;
					$estimate_proposal->user_id = get_current_user_id();
					$estimate_proposal->to_user_id = $estimate->user_id;
					$estimate_proposal->install_people_number = $install_people_number;
					$estimate_proposal->install_working_time = $install_working_time;
					$estimate_proposal->install_cost = $install_cost;
					$estimate_proposal->demolition_people_number = $demolition_people_number;
					$estimate_proposal->demolition_working_time = $demolition_working_time;
					$estimate_proposal->demolition_cost = $demolition_cost;
					$estimate_proposal->part_name = $part_name;
					$estimate_proposal->part_cost = $part_cost;
					$estimate_proposal->other_name = $other_name;
					$estimate_proposal->other_cost = $other_cost;
					$estimate_proposal_id = $estimate_proposal->create();
				}
			}
			
			wp_redirect('/pro-estimate-send-complete/?estimate_id=' . $estimate_id);
			exit;
		}
		else{
			wp_die('권한이 없습니다.');
		}
	}
}