<?php

/**
 * 
 * @author rc185213
 *
 *sample return uri: http://localhost:90/wordpres?code=yRfgpRgduzGnLqfGBoL7H8ze5xsrxAMpHL5garFdE9REsogjk7IGeEoRU8dendS4zAyafLqXeEsjnL7rf5GbAkhgKaGEFKy5RgC8g6zMfGqqkdIjxGo4tjeBpLuX8c7EygXcBpKu5qGoEtxpq4jI4r654fx854gCBeaA8F9LbB9hXGLbafL9XM9sd6Ay6f79ep7SAGEjAUeyjezIqr9kzsK8gy5F8bAXRHkMeBnsMxoLqH9Rndzf8gRp7uLKrREf
 */

class UM_GlobeLabs {
	
	const SHORTCODE = 21582052;
	const CROSS_TELCO_SHORTCODE = 29290582052;
	const APP_SECRET = "35c747c1b756f938e0bd530a39ba56d260ef671585b93ca9887fb6cc0edd82eb";
	const APP_ID = "7d6AIkAXAzhMoi4pgecXMKhB5dKjIzja";
	
	
	function __construct() {
	
	}
	
	
	function getRegistrationUrl() {
		return "http://developer.globelabs.com.ph/dialog/oauth?app_id=".self::APP_ID;
	}
	
	/**
	 * 
	 * @param unknown $data
	 */
	public function insertData($data) {
		global $wpdb;
		$table_name = $wpdb->prefix . "subscribers";
		$data['created_date'] = current_time('mysql',1);
		$data['updated_date'] = current_time('mysql',1);
// 		$sql = "INSERT INTO `wp_subscribers`(`user_name`, `mobile_no`, `code`, `token`, `created_date`, `updated_date`, `status`) 
// 				VALUES (".$data['user_email'].",'9179284290','alsdjfksajdlfjasf','lasdjflasjflasjf',".$data['created_date'].",".$data['updated_date'].",0)";
// 		print_r($data);
// 		$wpdb->r
// 		$result = $wpdb->get_results("select * from wp_subscribers where id =1",OBJECT);
// 		print_r($result);
// 		$wpdb->query($sql);
	
		$wpdb->insert( $table_name, $data);
		$wpdb->show_errors();
// 		$wpdb->
	}
		
	public function getAppID () {
		return self::APP_ID;
	}
	
	public function getSecretKey() {
		return self::APP_SECRET;
	}
	
	public function getAccessTokenUrl() {
		return "http://developer.globelabs.com.ph/oauth/access_token";
	}
}