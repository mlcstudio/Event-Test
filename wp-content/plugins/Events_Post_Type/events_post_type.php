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
		$this->metaboxes();
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
				'slug' => 'events/event-type'
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

		$taxonomies['event_venue'] = array(
			'hierarchical' => true,
			'query_var' => 'event_venue',
			'rewrite' => array(
				'slug' => 'events/event-venue'
			),
			'labels' => array(
				'name'                       => 'Event Venues',
				'singular_name'              => 'Event Venue',
				'edit_item'                  => 'Edit Event Venue',
				'update_item'                => 'Update Event Venue',
				'add_new_item'               => 'Add New Event Venue',
				'new_item_name'              => 'New Event Venue',
				'all_items'                  => 'All Event Venues',
				'search_items'               => 'Search Event Venues',
				'popular_items'              => 'Popular Event Venues',
				'separate_items_with_commas' => 'Separate Event Venues with commas',
				'add_or_remove_items'        => 'Add or Remove Event Venues',
				'choose_from_most_used'      => 'Choose from most used Event Venues'
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

	public function metaboxes()
	{
		add_action('add_meta_boxes', function() {

			//Arguments for add_meta_box - css id, title, cb func, page, priority(optional), cb func args(optional)
			add_meta_box('gate_event_date', 'Event Date', 'gate_event_date', 'gate_events');

		});

		function gate_event_date($post) {
			$event_date = get_post_meta($post->ID, 'gate_event_date', true)
			?>

				<p>
					<input type="text" class="widefat" name="gate_event_date" id="gate_event_date" value="<?php echo esc_attr($event_date); ?>" />
				</p>

			<?php

		}

		add_action('save_post', function($id) {
			if(isset($_POST['gate_event_date'])) {
				update_post_meta(
					$id,
					'gate_event_date',
					strip_tags($_POST['gate_event_date'])
				);
			}
		});
	}
}

add_action('init', function() {
	new gate_events_post_type();
});