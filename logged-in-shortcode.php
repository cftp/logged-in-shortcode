<?php
/*
Plugin Name: Logged in Shortcode
Description: Shortcodes for showing/hiding content for logged in and non-logged in users
Version:     1.0
Author:      <a href="http://codeforthepeople.com/">Code for the People</a> | Commissioned by <a href="http://www.internetretailing.net/">Internet Retailing</a>

Copyright © Code for the People Ltd

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

class Logged_In_Shortcode {

	/**
	 * Class constructor
	 *
	 * @author John Blackbourn
	 * @return null
	 */
	public function __construct() {

		add_shortcode( 'logged-in',     array( $this, 'logged_in' ) );
		add_shortcode( 'not-logged-in', array( $this, 'not_logged_in' ) );
		add_shortcode( 'non-logged-in', array( $this, 'not_logged_in' ) );
		add_shortcode( 'logged-out',    array( $this, 'not_logged_in' ) );

	}

	/**
	 * Callback function for the logged in shortcode(s).
	 *
	 * @author John Blackbourn
	 * @param  array  $atts    Attributes for this shortcode instance
	 * @param  string $content The content to be shown for this shortcode instance
	 * @return string          The replacement content
	 */
	public function logged_in( $atts, $content = '' ) {

		global $post;

		if ( is_user_logged_in() )
			return $content;
		else
			return $this->get_template( 'not-logged-in', $post->post_type );

	}

	/**
	 * Callback function for the non logged in shortcode(s).
	 *
	 * @author John Blackbourn
	 * @param  array  $atts    Attributes for this shortcode instance
	 * @param  string $content The content to be shown for this shortcode instance
	 * @return string          The replacement content
	 */
	public function not_logged_in( $atts, $content = '' ) {

		global $post;

		if ( !is_user_logged_in() )
			return $content;
		else
			return $this->get_template( 'logged-in', $post->post_type );

	}

	/**
	 * Locate a template file and return its contents. If the template file isn't found then and empty string is returned.
	 *
	 * @author John Blackbourn
	 * @param  string $name      The template file name
	 * @param  string $post_type The current post type
	 * @return string            The contents of the template file
	 */
	public function get_template( $name, $post_type ) {

		$template = array(
			"shortcode-{$post_type}-{$name}.php",
			"shortcode-{$name}.php",
		);

		ob_start();
		locate_template( $template, true, false );
		return ob_get_clean();

	}

}

global $logged_in_shortcode;

$logged_in_shortcode = new Logged_In_Shortcode;
