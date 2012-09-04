<?php

/*
Plugin Name: Events Post Type
Plugin URI: http://thegate.users36.interdns.co.uk
Description: Allows easy adding of events
Version: 1.0
Author: Jon Hockley
Author URI: http://www.mikeleachcreative.co.uk
*/

class gate_events_post_type {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{

		$args = array(
			'labels' => array(
				'name'               => 'Events',
				'singular_name'      => 'Event',
				'add_new'            => 'Add New Event',
				'add_new_item'       => 'Add New Event',
				'edit_item'          => 'Edit Item',
				'new_item'           => 'Add New Item',
				'view_item'          => 'View Event',
				'search_items'       => 'Search Events',
				'not_found'          => 'No events found',
				'not_found_in_trash' => 'No events found in trash'
			),
			'query_var' => 'events',
			'rewrite'   => array(
				'slug' => 'events/'
			),
			'public' => true,
			'supports' => array(
				'title',
				'thumbnail',
				'editor'
			)
		);

		register_post_type('gate_events', $args);
	}

	public function taxonomies()
	{
		$taxonomies = array();

		$taxonomies['music'] = array(
			'hierarchial' => true,
			'query_var' => 'music_events',
			'rewrite' => array(
				'slug' => 'events/music'
			),
			'labels' => array(
				'name'                       => 'Music Events',
				'singular_name'              => 'Music Event',
				'edit_item'                  => 'Edit Music Event',
				'update_item'                => 'Update Music Event',
				'add_new_item'               => 'Add New Music Event',
				'new_item_name'              => 'New Music Event',
				'all_items'                  => 'All Music Events',
				'search_items'               => 'Search Music Events',
				'popular_items'              => 'Popular Music Events',
				'separate_items_with_commas' => 'Separate Music Events with commas',
				'add_or_remove_items'        => 'Add or Remove Music Events',
				'choose_from_most_used'      => 'Choose from most used Music Events'
			)
		);
	}
}

add_action('init', function() {
	new gate_events_post_type();
});