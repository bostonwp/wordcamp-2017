<?php
/**
 * Enqueue the parent theme's styles.
 * You can leave this out if you're replacing the parent theme's CSS.
 */
function boston_2017_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', false, time() );
}
add_action( 'wp_enqueue_scripts', 'boston_2017_styles' );

/**
 * Turn on "new" features for this local site. New features are enabled based on time of site
 * creation, approximated based on ID number in the wordcamp.org network. That doesn't map to
 * local sites, so there is difference in markup for some features if we don't whitelist the ID.
 *
 * Change this to the Site ID of your local development site (though it will likely be 47 if
 * this is the first additional site you've created)
 */
function boston_2017_enable_features( $sites ) {
	$sites[] = 47;
	return $sites;
}
add_filter( 'wcpt_speaker_post_avatar_enabled_site_ids',       'boston_2017_enable_features' );
add_filter( 'wcpt_session_post_speaker_info_enabled_site_ids', 'boston_2017_enable_features' );
add_filter( 'wcpt_session_post_slides_info_enabled_site_ids',  'boston_2017_enable_features' );
add_filter( 'wcpt_session_post_video_info_enabled_site_ids',   'boston_2017_enable_features' );
add_filter( 'wcpt_speaker_post_session_info_enabled_site_ids', 'boston_2017_enable_features' );
