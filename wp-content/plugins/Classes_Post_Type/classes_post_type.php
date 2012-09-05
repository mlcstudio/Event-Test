<?php

/*
Plugin Name: Classes Post Type
Plugin URI: http://thegate.users36.interdns.co.uk
Description: Allows easy adding of classes
Version: 1.0
Author: Jon Hockley
Author URI: http://www.mikeleachcreative.co.uk
*/

class gate_classes_post_type {
	
	public function __construct()
	{
		$this->register_post_type();
		$this->taxonomies();
	}

	public function register_post_type()
	{

		$args = array(
			'labels' => array(
				'name'               => 'Classes',
				'singular_name'      => 'Class',
				'add_new'            => 'Add New Class',
				'add_new_item'       => 'Add New Class',
				'edit_item'          => 'Edit Item',
				'new_item'           => 'Add New Item',
				'view_item'          => 'View Class',
				'search_items'       => 'Search Classes',
				'not_found'          => 'No classes found',
				'not_found_in_trash' => 'No classes found in trash'
			),
			'query_var' => 'classes',
			'rewrite'   => array(
				'slug' => 'classes/'
			),
			'public' => true,
			'supports' => array(
				'title',
				'thumbnail',
				'editor'
			)
		);

		register_post_type('gate_classes', $args);
	}

	public function taxonomies()
	{
		$taxonomies = array();

		$taxonomies['class_type'] = array(
			'hierarchical' => true,
			'query_var' => 'class_type',
			'rewrite' => array(
				'slug' => 'classes/class-type'
			),
			'labels' => array(
				'name'                       => 'Class Types',
				'singular_name'              => 'Class Type',
				'edit_item'                  => 'Edit Class Type',
				'update_item'                => 'Update Class Type',
				'add_new_item'               => 'Add New Class Type',
				'new_item_name'              => 'New Class Type',
				'all_items'                  => 'All Class Types',
				'search_items'               => 'Search Class Types',
				'popular_items'              => 'Popular Class Types',
				'separate_items_with_commas' => 'Separate Class Types with commas',
				'add_or_remove_items'        => 'Add or Remove Class Types',
				'choose_from_most_used'      => 'Choose from most used Class Types'
			)
		);

		$taxonomies['class_venue'] = array(
			'hierarchical' => true,
			'query_var' => 'class_venue',
			'rewrite' => array(
				'slug' => 'classes/class-venue'
			),
			'labels' => array(
				'name'                       => 'Class Venues',
				'singular_name'              => 'Class Venue',
				'edit_item'                  => 'Edit Class Venue',
				'update_item'                => 'Update Class Venue',
				'add_new_item'               => 'Add New Class Venue',
				'new_item_name'              => 'New Class Venue',
				'all_items'                  => 'All Class Venue',
				'search_items'               => 'Search Class Venues',
				'popular_items'              => 'Popular Class Venues',
				'separate_items_with_commas' => 'Separate Class Venues with commas',
				'add_or_remove_items'        => 'Add or Remove Class Venues',
				'choose_from_most_used'      => 'Choose from most used Class Venues'
			)
		);

		$this->register_all_taxonomies($taxonomies);
	}

	public function register_all_taxonomies($taxonomies)
	{

		foreach ($taxonomies as $name => $arr) {
			register_taxonomy($name, array('gate_classes'), $arr);
		}
	}
}

add_action('init', function() {
	new gate_classes_post_type();
});