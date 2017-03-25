<?php
   /*
   Plugin Name: N1 Radio Program
   Plugin URI: //
   Description: a plugin to get radio program information from N1
   Version: 1.0
   Author: Luuk Mesker
   Author URI: //
   License: GPL2
   */
   
	function gids_func(){
		require 'auth.php';

		$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
		$prev_date = date('Y-m-d', strtotime($date .' -1 day'));
		$next_date = date('Y-m-d', strtotime($date .' +1 day'));

		//Do a GET request
		$response = $client->get($url.'broadcasts/epg/daily/'.$date.'', [
			'headers' => [
				'nonce' => $nonce,
				'timestamp' => $time,
				'api-key' => $api_key,
				'hash' => $auth_string
			]
		]);

		$contents = $response->getBody();
		//echo $contents;

		$books = json_decode($contents, true);
		// access property of object in array
		$array = $books[''.$date.''];
		//var_dump($array);
		$size = sizeof($array) - "1";

		include "views/gids.php";
	}
	
	add_shortcode( 'gids', 'gids_func' );
  
?>