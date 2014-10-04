<?php
require_once get_template_directory().'/framework/theme_widgets/twitter.php';
require_once get_template_directory().'/framework/theme_widgets/mailchimp.php';
require_once get_template_directory().'/framework/theme_widgets/flickr.php';
require_once get_template_directory().'/framework/theme_widgets/recent_posts.php';
require_once get_template_directory().'/framework/theme_widgets/recent_pages.php';
require_once get_template_directory().'/framework/theme_widgets/social_widget.php';
require_once get_template_directory().'/framework/theme_widgets/gallery_widget.php';
add_action('widgets_init', 'my_widgets');
function my_widgets() {
	#Twitter
	register_widget('MY_Twitter');

	#Mailchimp
	register_widget('MY_Mailchimp');

	#Flickr
	register_widget('MY_Flickr');

	#Recent Posts
	register_widget('MY_Recent_Posts');
	
	#My Gallery Widgets
	register_widget('MY_Gallery_Widget');
}?>