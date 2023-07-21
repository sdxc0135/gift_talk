<?php
/**
 * Binggo_Estimate
 * @copyright Copyright 2022 thefunnel. All rights reserved.
 */
final class Binggo_Estimate {
	
	var $_data;
	
	public function __construct($estimate_id=''){
		$this->_data = array();
		
		if($estimate_id){
			$this->init_with_id($estimate_id);
		}
	}
	
	public function __get($key){
		if(isset($this->_data[$key])){
			return $this->_data[$key];
		}
		return '';
	}
	
	public function __set($key, $value){
		$this->_data[$key] = $value;
	}
	
	public function set_data($data){
		$this->_data = $data;
	}
	
	public function init_with_id($estimate_id){
		global $wpdb;
		
		$this->_data = array();
		$estimate_id = intval($estimate_id);
		
		if($estimate_id){
			$estimate_id = esc_sql($estimate_id);
			$row = $wpdb->get_row("SELECT * FROM `{$wpdb->prefix}binggo_estimate` WHERE `estimate_id`='{$estimate_id}' LIMIT 1", ARRAY_A);
			
			if($row){
				$this->set_data($row);
			}
		}
	}
	
	public function ID(){
		return intval($this->estimate_id);
	}
	
	public function create(){
		global $wpdb;
		
		$data = array();
		$data['user_id'] = intval($this->user_id);
		$data['estimate_category'] = $this->estimate_category;
		$data['estimate_status'] = $this->estimate_status;
		$data['estimate_location'] = $this->estimate_location;
		$data['work_place'] = $this->work_place;
		$data['work_start_ymdhis'] = $this->work_start_ymdhis;
		$data['work_end_ymdhis'] = $this->work_end_ymdhis;
		$data['visit_ymdhis'] = $this->visit_ymdhis;
		$data['comment'] = $this->comment;
		$data['update_ymdhis'] = date('YmdHis', current_time('timestamp'));
		$data['create_ymdhis'] = date('YmdHis', current_time('timestamp'));
		
		$estimate_id = 0;
		
		if($data['user_id']){
			$wpdb->insert("{$wpdb->prefix}binggo_estimate", $data);
			$estimate_id = $wpdb->insert_id;
		}
		return $estimate_id;
	}
	
	public function update(){
		global $wpdb;
		
		if($this->estimate_id){
			$data = array();
			$data['user_id'] = intval($this->user_id);
			$data['estimate_category'] = $this->estimate_category;
			$data['estimate_status'] = $this->estimate_status;
			$data['estimate_location'] = $this->estimate_location;
			$data['work_place'] = $this->work_place;
			$data['work_start_ymdhis'] = $this->work_start_ymdhis;
			$data['work_end_ymdhis'] = $this->work_end_ymdhis;
			$data['visit_ymdhis'] = $this->visit_ymdhis;
			$data['comment'] = $this->comment;
			$data['update_ymdhis'] = date('YmdHis', current_time('timestamp'));
			$data['create_ymdhis'] = $this->create_ymdhis;
			
			$where = array();
			$where['estimate_id'] = $this->estimate_id;
			
			if($data['user_id'] && $where['estimate_id']){
				$wpdb->update("{$wpdb->prefix}binggo_estimate", $data, $where);
			}
		}
		return $this->estimate_id;
	}
	
	public function delete(){
		global $wpdb;
		
		if($this->estimate_id){
			$where = array();
			$where['estimate_id'] = $this->estimate_id;
			
			if($where['estimate_id']){
				$wpdb->delete("{$wpdb->prefix}binggo_estimate", $where);
			}
		}
	}
	
	public function get_title(){
		$title = '';
		
		if($this->estimate_id){
			$title = sprintf('%s %s', $this->work_place, $this->estimate_category);
		}
		return $title;
	}
	
	public function get_user(){
		$user = new WP_User();
		
		if($this->estimate_id){
			$user = new WP_User($this->user_id);
		}
		return $user;
	}
	
	public function get_status_number(){
		$status_number = '1';
		
		if($this->estimate_id){
			switch($this->estimate_status){
				case 'request' : $status_number = '1'; break; // 견적요청
				case 'consulting' : $status_number = '2'; break; // 상담중
				case 'closing' : $status_number = '3'; break; // 요청마감
				case 'contracted' : $status_number = '4'; break; // 계약됨
				case 'completed' : $status_number = '5'; break; // 거래완료
			}
		}
		return intval($status_number);
	}
	
	public function get_proposal_count(){
		global $wpdb;
		
		$proposal_count = 0;
		
		if($this->estimate_id){
			$estimate_id = esc_sql($this->estimate_id);
			$proposal_count = $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}binggo_estimate_proposal` WHERE `estimate_id`='{$estimate_id}' LIMIT 1");
		}
		return intval($proposal_count);
	}
	
	public function get_photo_scene_list(){
		global $wpdb;
		
		$photo_scene_list = array();
		
		if($this->estimate_id){
			$estimate_id = esc_sql($this->estimate_id);
			$photo_scene_list = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}binggo_photo_scene` WHERE `estimate_id`='{$estimate_id}' ORDER BY `photo_scene_id` DESC");
		}
		return $photo_scene_list;
	}
	
	public function get_photo_drawing_list(){
		global $wpdb;
		
		$photo_drawing_list = array();
		
		if($this->estimate_id){
			$estimate_id = esc_sql($this->estimate_id);
			$photo_drawing_list = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}binggo_photo_drawing` WHERE `estimate_id`='{$estimate_id}' ORDER BY `photo_drawing_id` DESC");
		}
		return $photo_drawing_list;
	}
	
	public function is_exists_proposal_with_user_id($user_id=0){
		global $wpdb;
		
		$is_exists = false;
		
		if(!$user_id){
			$user_id = get_current_user_id();
		}
		
		if($this->estimate_id && $user_id){
			$estimate_id = esc_sql($this->estimate_id);
			$user_id = esc_sql($user_id);
			$is_exists = $wpdb->get_row("SELECT * FROM `{$wpdb->prefix}binggo_estimate_proposal` WHERE `estimate_id`='{$estimate_id}' AND `user_id`='{$user_id}' LIMIT 1");
		}
		return $is_exists;
	}
}