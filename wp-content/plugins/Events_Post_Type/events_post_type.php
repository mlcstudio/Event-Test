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
		$this->taxonomies();
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

		$taxonomies['event_type'] = array(
			'hierarchical' => true,
			'query_var' => 'event_type',
			'rewrite' => array(
				'slug' => 'events/event_type'
			),
			'labels' => array(
				'name'                       => 'Event Types',
				'singular_name'              => 'Event Type',
				'edit_item'                  => 'Edit Event Type',
				'update_item'                => 'Update Event Type',
				'add_new_item'               => 'Add New Event Type',
				'new_item_name'              => 'New Event Type',
				'all_items'                  => 'All Event Types',
				'search_items'               => 'Search Event Types',
				'popular_items'              => 'Popular Event Types',
				'separate_items_with_commas' => 'Separate Event Types with commas',
				'add_or_remove_items'        => 'Add or Remove Event Types',
				'choose_from_most_used'      => 'Choose from most used Event Types'
			)
		);

		$this->register_all_taxonomies($taxonomies);
	}

	public function register_all_taxonomies($taxonomies)
	{

		foreach ($taxonomies as $name => $arr) {
			register_taxonomy($name, array('gate_events'), $arr);
		}
	}
}

add_action('init', function() {
	new gate_events_post_type();
});