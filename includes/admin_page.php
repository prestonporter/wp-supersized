<?php
/**
*
* Admin options page
*
*/
	$options = $newoptions = get_option('wp-supersized_options');
	$msg = ''; // used to display a success message on updates
	
	if ( $_POST['wp-supersized_submit_functionality'] ) { // if submitted, process results for each tab
	$newoptions['slideshow'] = strip_tags(stripslashes($_POST["slideshow"]));
	$newoptions['autoplay'] = strip_tags(stripslashes($_POST["autoplay"]));
	$newoptions['start_slide'] = strip_tags(stripslashes($_POST["start_slide"]));
	$newoptions['random'] = strip_tags(stripslashes($_POST["random"]));
	$newoptions['slide_interval'] = strip_tags(stripslashes($_POST["slide_interval"]));
	$newoptions['transition'] = strip_tags(stripslashes($_POST["transition"]));
	$newoptions['transition_speed'] = strip_tags(stripslashes($_POST["transition_speed"]));
	$newoptions['new_window'] = strip_tags(stripslashes($_POST["new_window"]));
	$newoptions['pause_hover'] = strip_tags(stripslashes($_POST["pause_hover"]));
        $newoptions['stop_loop'] = strip_tags(stripslashes($_POST["stop_loop"]));
	$newoptions['keyboard_nav'] = strip_tags(stripslashes($_POST["keyboard_nav"]));
	$newoptions['performance'] = strip_tags(stripslashes($_POST["performance"]));
	$newoptions['image_protect'] = strip_tags(stripslashes($_POST["image_protect"]));
        $newoptions['background_url'] = strip_tags(stripslashes($_POST["background_url"]));
        }
        if ( $_POST['wp-supersized_submit_size_and_position'] ) {
        $newoptions['min_width'] = strip_tags(stripslashes($_POST["min_width"]));
	$newoptions['min_height'] = strip_tags(stripslashes($_POST["min_height"]));
	$newoptions['vertical_center'] = strip_tags(stripslashes($_POST["vertical_center"]));
	$newoptions['horizontal_center'] = strip_tags(stripslashes($_POST["horizontal_center"]));
        $newoptions['fit_always'] = strip_tags(stripslashes($_POST["fit_always"]));
	$newoptions['fit_portrait'] = strip_tags(stripslashes($_POST["fit_portrait"]));
	$newoptions['fit_landscape'] = strip_tags(stripslashes($_POST["fit_landscape"]));
        }
	if ( $_POST['wp-supersized_submit_components'] ) {
        $newoptions['navigation'] = strip_tags(stripslashes($_POST["navigation"]));
	$newoptions['thumbnail_navigation'] = strip_tags(stripslashes($_POST["thumbnail_navigation"]));
        $newoptions['thumb_links'] = strip_tags(stripslashes($_POST["thumb_links"]));
        $newoptions['thumbnail_suffix'] = strip_tags(stripslashes($_POST["thumbnail_suffix"]));
	$newoptions['navigation_controls'] = strip_tags(stripslashes($_POST["navigation_controls"]));
	$newoptions['slide_counter'] = strip_tags(stripslashes($_POST["slide_counter"]));
	$newoptions['slide_captions'] = strip_tags(stripslashes($_POST["slide_captions"]));
        $newoptions['slide_links'] = strip_tags(stripslashes($_POST["slide_links"]));
        $newoptions['progress_bar'] =  strip_tags(stripslashes($_POST["progress_bar"]));
        $newoptions['mouse_scrub'] = strip_tags(stripslashes($_POST["mouse_scrub"]));
        $newoptions['thumb_tray'] = strip_tags(stripslashes($_POST["thumb_tray"]));
        $newoptions['tray_visible'] = strip_tags(stripslashes($_POST["tray_visible"]));
       }
	if ( $_POST['wp-supersized_submit_flickr'] ) {
        $newoptions['flickr_source'] = strip_tags(stripslashes($_POST["flickr_source"]));
	$newoptions['flickr_set'] = strip_tags(stripslashes($_POST["flickr_set"]));
	$newoptions['flickr_user'] = strip_tags(stripslashes($_POST["flickr_user"]));
	$newoptions['flickr_group'] = strip_tags(stripslashes($_POST["flickr_group"]));
        $newoptions['flickr_tags'] = strip_tags(stripslashes($_POST["flickr_tags"]));
	$newoptions['flickr_total_slides'] = strip_tags(stripslashes($_POST["flickr_total_slides"]));
	$newoptions['flickr_size'] = strip_tags(stripslashes($_POST["flickr_size"]));
	$newoptions['flickr_api_key'] = strip_tags(stripslashes($_POST["flickr_api_key"]));
        }
	if ( $_POST['wp-supersized_submit_origin'] ) {
        if ($_POST["origin"] == 'default')
        $newoptions['default_dir'] = trim(strip_tags(stripslashes($_POST["SupersizedCustomDir"])),'/'); // removes the slash at the beginning and end of the default dir if the user has typed one
        if ($_POST["origin"] == 'ngg-gallery' && method_exists('nggdb','get_gallery')) {
        $ngg_gallery_selection = strip_tags(stripslashes($_POST["ngg_gallery_selection"]));
        if ($ngg_gallery_selection != 'none') $newoptions['default_dir'] = $ngg_gallery_selection;
        else $newoptions['default_dir'] = trim(strip_tags(stripslashes($_POST["default_dir"])),'/');
        }
        $newoptions['debugging_mode'] = strip_tags(stripslashes($_POST["debugging_mode"]));
        }
	if ( $_POST['wp-supersized_submit_display'] ) {
        $newoptions['show_on_page']['everywhere'] = strip_tags(stripslashes($_POST["everywhere"])); //NEW
	$newoptions['show_on_page']['allposts'] = strip_tags(stripslashes($_POST["allposts"]));
	$newoptions['show_on_page']['homepage'] = strip_tags(stripslashes($_POST["homepage"]));
	$newoptions['show_on_page']['allpages'] = strip_tags(stripslashes($_POST["allpages"]));
	$newoptions['show_on_page']['404_page'] = strip_tags(stripslashes($_POST["404_page"]));
	$newoptions['show_on_page']['search_results'] = strip_tags(stripslashes($_POST["search_results"]));
	$newoptions['show_on_page']['front_only'] = strip_tags(stripslashes($_POST["front_only"]));
	$newoptions['show_on_page']['sticky_post'] = strip_tags(stripslashes($_POST["sticky_post"]));
	$newoptions['show_on_page']['category_archive'] = strip_tags(stripslashes($_POST["category_archive"]));
	$newoptions['show_on_page']['tag_archive'] = strip_tags(stripslashes($_POST["tag_archive"]));
        $newoptions['show_on_page']['date_archive'] = strip_tags(stripslashes($_POST["date_archive"]));
        $newoptions['show_on_page']['any_archive'] = strip_tags(stripslashes($_POST["any_archive"]));
	$newoptions['show_in_post_id'] = explode(',',trim(str_replace(' ', '', strip_tags(stripslashes($_POST["show_in_post_id"]))),',')); //removes commas, spaces and convert to array
	$newoptions['show_in_page_id'] = explode(',',trim(str_replace(' ', '', strip_tags(stripslashes($_POST["show_in_page_id"]))),',')); //removes commas, spaces and convert to array
	$newoptions['show_in_category_id'] = explode(',',trim(str_replace(' ', '', strip_tags(stripslashes($_POST["show_in_category_id"]))),',')); //removes commas, spaces and convert to array
	$newoptions['show_in_tag_id'] = explode(',',trim(str_replace(' ', '', strip_tags(stripslashes($_POST["show_in_tag_id"]))),',')); //removes commas, spaces and convert to array
	
        $templates = get_page_templates();        
	foreach (array_keys( $templates ) as $template )
	{
	$newoptions['show_in_template'][$template] = strip_tags(stripslashes($_POST['show_in_template'][$template]));
	}
        }
	// Save if there were any changes
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('wp-supersized_options', $options);
		$msg = '<div class="updated"><p><strong>'.__('Your settings have been updated','WPSupersized').'</strong></p></div>';
	}
    
        if ( $_POST['reset_options'] ) {
                $newoptions['reset_options'] = true;
                update_option('wp-supersized_options', $newoptions);
                WPSupersized::install();
                $msg = '<div class="updated"><p><strong>'.__('WP Supersized options are back to default!','WPSupersized').'</strong></p></div>';
	}

        $options = get_option('wp-supersized_options'); // makes sure we use the latest options (from update or reset)

        echo '<div class="wrap">';
        
        echo screen_icon().'<h2>';
        _e('WP Supersized options','WPSupersized');
        echo '</h2>';
        
        // Paypal donation button
        echo'<br />
        <div style="float:right; width:124px; margin-right: 20px;">
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=HQ3YVQD2HGFXG&lc=GB&item_name=World%20in%20my%20Eyes&item_number=WP%20Supersized&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG_global%2egif%3aNonHosted"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" alt="PayPal — The safer, easier way to pay online."></a>
        </div>';        
        
        echo '<p>';
        _e('Visit this <a href="http://www.worldinmyeyes.be/2265/wp-supersized-wordpress-plugin/">plugin homepage</a> for bug reporting or help.','WPSupersized');
        echo '<br />';
        _e('Need help with the options ? Check the <a href="http://wordpress.org/extend/plugins/wp-supersized/">description of the options</a> and the <a href="http://wordpress.org/extend/plugins/wp-supersized/faq/">FAQ</a>.','WPSupersized');
        echo '<br />';
        _e('More details about the original jQuery plugin Supersized are <a href="http://www.buildinternet.com/project/supersized/">available here.</a><br />','WPSupersized');
        _e('If you would like to encourage further development of my plugin and of others that I am preparing, please consider making a donation.','WPSupersized');
        echo '</p>';

        if (isset($_GET['tab'])) $tab = $_GET['tab']; 
        else $tab = 'functionality';
        
        display_tabs($tab);
        
        // options form
	print $msg;
	echo '<form method="post">';
        
        switch($tab) : 
            case 'functionality' : 
                functionality_options($options); 
                break; 
            case 'display' : 
                display_options($options); 
                break; 
            case 'origin' : 
                origin_options($options); 
                break; 
            case 'size_and_position' : 
                size_and_position_options($options); 
                break; 
            case 'components' : 
                components_options($options); 
                break; 
            case 'flickr' : 
                flickr_options($options); 
                break; 
        endswitch; 
               
        function functionality_options($options) {	

	// slideshow (1 is slideshow, 2 is single image background, 3 is Flickr slideshow)
        echo '<table class="form-table">';
	echo '<tr valign="top"><th scope="row">';
        _e('Type of background','WPSupersized');
        echo '</th>';
	echo '<td><input type="radio" name="slideshow" value="1"';
	if( $options['slideshow'] == '1' ){ echo ' checked="checked" '; }
	echo '></input> ';
        _e('Slideshow (default)','WPSupersized');
        echo '<br /><input type="radio" name="slideshow" value="2"';
	if( $options['slideshow'] == '2' ){ echo ' checked="checked" '; }
	echo '></input> ';
        _e('Single image   (the first image found in the slides folder will be shown, or a random image when <em>Start slide</em> is 0 - see below)','WPSupersized');
        echo '<br /><input type="radio" name="slideshow" value="3"';
	if( $options['slideshow'] == '3' ){ echo ' checked="checked" '; }
	echo '></input> ';
        _e('Flickr slideshow (if you choose this, please be aware that not all Components options and none of the Supersized Shutter theme specific options will be available with the current version of Supersized)','WPSupersized');
	echo '<br /><br />';
        _e('For Slideshow and Single image, you must place images in your folder','WPSupersized');
        echo ' <em>'.content_url().'/supersized-slides/ </em> ';
        _e('or an alternative custom folder (see below <em>Default slides directory</em>)','WPSupersized');
        echo '<br />';
        _e('For instructions on how to use images attached to your post or page with the Wordpress Media Gallery or if you want to define the list of images with an XML file, <a href="http://wordpress.org/extend/plugins/wp-supersized/faq/">please read the FAQ</a>.','WPSupersized');
        echo '</tr>';
	
	// autoplay
	echo '<tr valign="top"><th scope="row">';
        _e('Autoplay on/off','WPSupersized');
        echo '</th>';
	echo '<td><input type="checkbox" name="autoplay" value="true"';
	if( $options['autoplay'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Slideshow starts playing automatically','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// start_slide
	echo '<tr valign="top"><th scope="row">';
        _e('Start on slide #','WPSupersized');
        echo '</th>';
	echo '<td><input type="text" name="start_slide" value="'.$options['start_slide'].'" size="4"></input> (';
        _e('0 is random, default is 1','WPSupersized');
        echo ')<br /><p>';
        _e('When set to 0 while in Single image mode, a random image from the slides folder will be displayed.','WPSupersized');
        echo '</p></td></tr>';
	
	// random
	echo '<tr valign="top"><th scope="row">';
        _e('Random slides','WPSupersized');
        echo '</th>';
	echo '<td><input type="checkbox" name="random" value="true"';
	if( $options['random'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Randomize slide order (Ignores start slide, default is off)','WPSupersized');
        echo '</td></tr>';
	
	// slide_interval
	echo '<tr valign="top"><th scope="row">';
        _e('Slide interval','WPSupersized');
        echo '</th>';
	echo '<td><input type="text" name="slide_interval" value="'.$options['slide_interval'].'" size="6"></input> ';
        _e('Length between transitions, in milliseconds (default is 3000)','WPSupersized');
        echo '</td></tr>';
	
	// transition
	echo '<tr valign="top"><th scope="row">';
        _e('Transition','WPSupersized');
        echo '</th>';
	echo '<td><select id="transition" name="transition" value="0"';
	$selected = ($options['transition'] == '0') ? 'selected="selected"' : '';
	echo "><option value='0' $selected>";
        _e('None','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '1') ? 'selected="selected"' : '';
	echo "<option value='1' $selected>";
        _e('Fade','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '2') ? 'selected="selected"' : '';
	echo "<option value='2' $selected>";
        _e('Slide Top','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '3') ? 'selected="selected"' : '';
	echo "<option value='3' $selected>";
        _e('Slide Right','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '4') ? 'selected="selected"' : '';
	echo "<option value='4' $selected>";
        _e('Slide Bottom','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '5') ? 'selected="selected"' : '';
	echo "<option value='5' $selected>";
        _e('Slide Left','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '6') ? 'selected="selected"' : '';
	echo "<option value='6' $selected>";
        _e('Carousel Right','WPSupersized');
        echo '</option>';
	$selected = ($options['transition'] == '7') ? 'selected="selected"' : '';
	echo "<option value='7' $selected>";
        _e('Carousel Left','WPSupersized');
        echo '</option>';
	echo '</select> (';
        _e('default is Fade','WPSupersized');
        echo')</td></tr>';

	// transition_speed
	echo '<tr valign="top"><th scope="row">';
        _e('Speed of transition','WPSupersized');
        echo '</th>';
	echo '<td><input type="text" name="transition_speed" value="'.$options['transition_speed'].'" size="6"></input> (';
        _e('in milliseconds, default is 500','WPSupersized');
        echo ')</td></tr>';
	
	// new_window
	echo '<tr valign="top"><th scope="row">';
        _e('New window','WPSupersized');
        echo '</th>';
	echo '<td><input type="checkbox" name="new_window" value="true"';
	if( $options['new_window'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Image links open in new window/tab','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// pause_hover
	echo '<tr valign="top"><th scope="row">';
        _e('Pause on hover','WPSupersized');
	echo '</th><td><input type="checkbox" name="pause_hover" value="true"';
	if( $options['pause_hover'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Pause slideshow on hover','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';
	
	// stop_loop
	echo '<tr valign="top"><th scope="row">';
        _e('Stop loop','WPSupersized');
	echo '</th><td><input type="checkbox" name="stop_loop" value="true"';
	if( $options['stop_loop'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Pauses slideshow upon reaching the last slide','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';
	
	// keyboard_nav
	echo '<tr valign="top"><th scope="row">';
        _e('Keyboard navigation','WPSupersized');
	echo '</th><td><input type="checkbox" name="keyboard_nav" value="true"';
	if( $options['keyboard_nav'] == true ){ echo ' checked="checked"'; }
	echo '></input> (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
		
        // performance
	echo '<tr valign="top"><th scope="row">';
        _e('Performance','WPSupersized');
	echo '</th><td><select id="performance" name="performance" value="0"';
	$selected = ($options['performance'] == '0') ? 'selected="selected"' : '';
	echo "><option value='0' $selected>";
        _e('Normal','WPSupersized');
        echo '</option>';
	$selected = ($options['performance'] == '1') ? 'selected="selected"' : '';
	echo "<option value='1' $selected>";
        _e('Hybrid Speed/Quality','WPSupersized');
        echo '</option>';
	$selected = ($options['performance'] == '2') ? 'selected="selected"' : '';
	echo "<option value='2' $selected>";
        _e('Optimizes image quality','WPSupersized');
        echo '</option>';
	$selected = ($options['performance'] == '3') ? 'selected="selected"' : '';
	echo "<option value='3' $selected>";
        _e('Optimizes transition speed','WPSupersized');
        echo '</option>';
	echo '</select> (';
        _e('default is Hybrid Speed/Quality','WPSupersized');
	echo ')<br /><strong>';
        _e('Only works for Firefox/IE, not Webkit','WPSupersized');
        echo '</strong></td></tr>';
		
	// image_protect
	echo '<tr valign="top"><th scope="row">';
        _e('Image protection','WPSupersized');
	echo '</th><td><input type="checkbox" name="image_protect" value="true"';
	if( $options['image_protect'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Disables image dragging and right click with Javascript','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';
        
        // background_url
	echo '<tr valign="top"><th scope="row">';
        _e('Background URL','WPSupersized');
	echo '</th><td>http://<input type="text" name="background_url" value="'.$options['background_url'].'" size="50"></input><br />';
        _e('Type here the URL of the link you want to access when clicking on the background image (www.example.com). Leave this field empty if your do not want any link to be used. Default is empty.','WPSupersized');
        echo '</td></tr>';

        // close stuff and submit data
	echo '<input type="hidden" name="wp-supersized_submit_functionality" value="true"></input>';
	echo '</table><br /><br />';
	echo '<p><input class="button-primary" type="submit" name="wp-supersized_submit_functionality" value="';
        _e('Update Options &raquo;','WPSupersized');
        echo '"><input style="margin-left: 250px;" class="button-secondary" type="submit" name="reset_options" onclick="return confirm(&#39;';
        _e('Do you really want to restore the default options?','WPSupersized');
        echo '&#39;)" value="';
        _e('Reset Options &raquo;','WPSupersized');
        echo '"></p>';
         
        wp_nonce_field('wp-supersized_admin_options_update','wp-supersized_admin_nonce');
	
	echo '</form>';
	echo "</div>"; // end wrap
        	}
        function display_options($options) {

	// show_on_page
	echo '<table class="form-table">';
	echo '<tr valign="top"><th scope="row">';
        _e('Select the page(s)/post(s) where Supersized should be used','WPSupersized');
	echo '</th><td><input type="checkbox" name="everywhere" value="true"';
	if( $options['show_on_page']['everywhere'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Everywhere (except Admin pages)','WPSupersized');
	echo '<br /><input type="checkbox" name="allpages" value="true"';
	if( $options['show_on_page']['allpages'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('All pages (except homepage)','WPSupersized');
	echo '<br /><input type="checkbox" name="homepage" value="true"';
	if( $options['show_on_page']['homepage'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Homepage (of your blog)','WPSupersized');
	echo '<br /><input type="checkbox" name="front_only" value="true"';
	if( $options['show_on_page']['front_only'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Front page (landing page)','WPSupersized');
	echo '<br /><input type="checkbox" name="404_page" value="true"';
	if( $options['show_on_page']['404_page'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Error page (404)','WPSupersized');
        echo '<br /><input type="checkbox" name="search_results" value="true"';
	if( $options['show_on_page']['search_results'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Search results page','WPSupersized');
	echo '<br /><input type="checkbox" name="allposts" value="true"';
	if( $options['show_on_page']['allposts'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('All posts (not pages)','WPSupersized');
        echo '<br />';
        _e('If you select <em>All posts</em>, <em>All pages</em>, or <em>Everywhere</em>, posts/pages with a <em>SupersizedDir</em> custom field will show images from the selected folder while all others will show the default directory images.','WPSupersized');
	echo '<br /><input type="checkbox" name="sticky_post" value="true"';
	if( $options['show_on_page']['sticky_post'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Sticky post','WPSupersized');
	echo '<br /><input type="checkbox" name="category_archive" value="true"';
	if( $options['show_on_page']['category_archive'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Category archive','WPSupersized');
        echo '<br /><input type="checkbox" name="tag_archive" value="true"';
	if( $options['show_on_page']['tag_archive'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Tag archive','WPSupersized');
        echo '<br /><input type="checkbox" name="date_archive" value="true"';
        if( $options['show_on_page']['date_archive'] == true ){ echo ' checked="checked"'; }
        echo '></input> ';
        _e('Date archive','WPSupersized');
        echo '<br /><input type="checkbox" name="any_archive" value="true"';
        if( $options['show_on_page']['any_archive'] == true ){ echo ' checked="checked"'; }
        echo '></input> ';
        _e('Any archive','WPSupersized');

        echo '</td></tr><p>';
        _e('In each of these options, unless a custom field was defined in the page/post, the default slides directory will be used.','WPSupersized');
        echo '</p>';
   
	// show_in_template
	echo '<tr valign="top"><th scope="row">';
        _e('Select the page template(s) where Supersized should be used','WPSupersized');
        echo '</th>';
	$templates = get_page_templates();
        echo '<td>';
        if ($templates) {
	foreach (array_keys( $templates ) as $template )
            {
            echo '<input type="checkbox" name="show_in_template['.$template.']" value="true"';
            if( $options['show_in_template'][$template] == true ){ echo ' checked="checked"'; }
            echo '></input> '.$template.'<br />';
            }
        } else {echo'<p>';
        _e('Sorry, no template found. Your theme is not using any non-standard page template','WPSupersized');
        echo '</p>';
        }
        echo '</td></tr>';
        
        // show_in_post_id
	echo '<tr valign="top"><th scope="row">';
        _e('Post ID where Supersized will be used','WPSupersized');
	echo '</th><td><input type="text" name="show_in_post_id" value="'.implode(',',$options['show_in_post_id']).'" size="100"></input><br />'; // implode() converts the array back into a string
        _e('Separate IDs by a comma, e.g. 5,6,32,456','WPSupersized');
        echo '<br />';
        _e('You can find your post IDs in the Posts admin menu by hovering on the name of the post. The ID will be displayed at the bottom of your browser.','WPSupersized');
        echo '</td></tr>';
        
        // show_in_page_id
	echo '<tr valign="top"><th scope="row">';
        _e('Page ID where Supersized will be used','WPSupersized');
	echo '</th><td><input type="text" name="show_in_page_id" value="'.implode(',',$options['show_in_page_id']).'" size="100"></input><br />';
        _e('Separate IDs by a comma, e.g. 5,6,32,456','WPSupersized');
        echo '<br />';
        _e('You can find your page IDs in the Pages admin menu by hovering on the name of the page. The ID will be displayed at the bottom of your browser.','WPSupersized');
        echo '</td></tr>';
        
        // show_in_category_id
	echo '<tr valign="top"><th scope="row">';
        _e('Category ID for the posts/pages where Supersized will be used','WPSupersized');
	echo '</th><td><input type="text" name="show_in_category_id" value="'.implode(',',$options['show_in_category_id']).'" size="100"></input><br />';
        _e('Separate IDs by a comma, e.g. 5,6,32,456','WPSupersized');
        echo '<br />';
        _e('You can find your category IDs in the Posts > Categories admin menu by hovering on the name of the category. The ID will be displayed at the bottom of your browser.','WPSupersized');
        echo '</td></tr>';
        
        // show_in_tag_id
	echo '<tr valign="top"><th scope="row">';
        _e('Tag ID for the posts/pages where Supersized will be used','WPSupersized');
	echo '</th><td><input type="text" name="show_in_tag_id" value="'.implode(',',$options['show_in_tag_id']).'" size="100"></input><br />';
        _e('Separate IDs by a comma, e.g. 5,6,32,456','WPSupersized');
        echo '<br />';
        _e('You can find your tag IDs in the Posts > Post Tags admin menu by hovering on the name of the tag. The ID will be displayed at the bottom of your browser.','WPSupersized');
        echo '</td></tr>';
                
        // close stuff and submit data
	echo '<input type="hidden" name="wp-supersized_submit_display" value="true"></input>';
	echo '</table><br /><br />';
	echo '<p><input class="button-primary" type="submit" name="wp-supersized_submit_display" value="';
        _e('Update Options &raquo;','WPSupersized');
        echo '"><input style="margin-left: 250px;" class="button-secondary" type="submit" name="reset_options" onclick="return confirm(&#39;';
        _e('Do you really want to restore the default options?','WPSupersized');
        echo '&#39;)" value="';
        _e('Reset Options &raquo;','WPSupersized');
        echo '"></p>';
         
        wp_nonce_field('wp-supersized_admin_options_update','wp-supersized_admin_nonce');
	
	echo '</form>';
	echo "</div>";
        	}
        function origin_options($options) {

        echo '<table class="form-table">';
	echo '<tr valign="top"><th scope="row">';

        // select default_dir
        echo '<label for="SupersizedSource">Default origin of WP Supersized images</label></th><td>';
        echo '<input type="radio" name="origin" id="origin" value="default" ',substr($options['default_dir'],0,11) != 'ngg-gallery' ? ' checked="checked"' : '',' /> <label for"origin">Default directory (enter its path below).</label><br />';
        if (is_plugin_active('nextgen-gallery/nggallery.php') && method_exists('nggdb','find_all_galleries')) {
                echo '<input type="radio" name="origin" id="origin" value="ngg-gallery" ',substr($options['default_dir'],0,11) == 'ngg-gallery' ? ' checked="checked"' : '',' /> <label for"origin">NextGEN Gallery (Select which gallery to use below)</label><br />';  
        }
        else echo 'If <a href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN Gallery</a> had been installed, you would have been able to select one of its galleries as default origin for the images.<br />';
        echo '<span class="description">These default images will be used on all pages/posts that you selected in the <a href="'.get_admin_url().'/options-general.php?page=wp-supersized&tab=display">Display option</a>, unless you select another origin in the page/post editor</span>';
        echo '</td></tr>';
        echo '<tr valign="top"><th scope="row"><label for="SupersizedNextGenGallery">Default NextGEN gallery</label></th><td>';
        if (is_plugin_active('nextgen-gallery/nggallery.php') && method_exists('nggdb','find_all_galleries')) {
            echo '<select name="ngg_gallery_selection" id="ngg_gallery_selection">';
            global $nggdb;
            $nggGalleries = $nggdb->find_all_galleries();
            if(substr($options['default_dir'],0,11) != 'ngg-gallery') {
                echo '<option selected="selected" value="">none</option>';
            }
            foreach ($nggGalleries as $gallery )
            {
                echo '<option', substr($options['default_dir'], 12) == $gallery->gid ? ' selected="selected"' : '', ' value="ngg-gallery_'.$gallery->gid.'">'.$gallery->name.'</option>';
            }
            echo '</select><br /><span class="description">Select here the NextGEN gallery that you want to use on all pages/posts that you selected in the Display options.</span>';
        }
        else echo '<span class="description">NextGEN Gallery is not installed/activated.</span>';
        echo '</td></tr>';
            
        // default_dir
	echo '<tr valign="top"><th scope="row">';
        _e('Default slides directory','WPSupersized');
            echo '</th><td>';
            $wpContentFolder = WP_CONTENT_DIR;
            if(substr($options['default_dir'],0,11) != 'ngg-gallery')
                echo '<span class="description">'._e('Your currently selected default directory is: ','WPSupersized').content_url().'/'.$options['default_dir'].'</span>';
            $listFolders = WPSupersized_Metabox::directory_list($wpContentFolder,false,true,'.|..|.svn|cache|plugins|upgrade|themes|languages',true);
            echo '<ul>';
            WPSupersized_Metabox::display_array($listFolders, $options['default_dir']);
            echo '</ul>';
            WPSupersized_Metabox::output_script();
        
        _e('The images from this directory will be displayed by Supersized unless you use a custom directory in each post/page. Default is:','WPSupersized');
        echo ' '.content_url().'/supersized-slides<br /><p>';
        _e('Please put your images folders (default and custom) for Supersized in your directory','WPSupersized');
        echo ' '.content_url().'. ';
        _e('You may create folders within folders, e.g. /wp-content/supersized-slides/slidesforpost###/. In this case, you would enter the corresponding directory (supersized-slides/slidesforpost### , please note: no trailing slash) as Default slides directory.','WPSupersized');
        echo '<br /><strong>';
        _e('Use the same format for the <em>SupersizedDir</em> custom field in Posts and Pages.','WPSupersized');
        echo '</strong></p><p>';
        _e('WP Supersized will look first for a custom directory from the custom field <em>SupersizedDir</em>. If not found, it will then use the default directory selected here (<strong>do not forget to create it and fill it with images!</strong>). If none of these can be found, the default Supersized images will be shown.','WPSupersized');
        echo '</p></td></tr>';
        
        // debugging_mode
	echo '<tr valign="top"><th scope="row">';
        _e('Debugging mode on/off','WPSupersized');
        echo '</th>';
	echo '<td><input type="checkbox" name="debugging_mode" value="true"';
	if( $options['debugging_mode'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('When on, WP Supersized will generate comments in the source of the web page with some variables values, useful to find out the origin of file path problems. If you have problems with displaying your images, send me these comments from the source of the page and I will be able to help you more easily.<br /><strong>This is not necessary for normal operation. Use only if you have trouble with displaying your images.</strong>','WPSupersized');
        echo '<br />(';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';
        
        // close stuff and submit data
	echo '<input type="hidden" name="wp-supersized_submit_origin" value="true"></input>';
	echo '</table><br /><br />';
	echo '<p><input class="button-primary" type="submit" name="wp-supersized_submit_origin" value="';
        _e('Update Options &raquo;','WPSupersized');
        echo '"><input style="margin-left: 250px;" class="button-secondary" type="submit" name="reset_options" onclick="return confirm(&#39;';
        _e('Do you really want to restore the default options?','WPSupersized');
        echo '&#39;)" value="';
        _e('Reset Options &raquo;','WPSupersized');
        echo '"></p>';
         
        wp_nonce_field('wp-supersized_admin_options_update','wp-supersized_admin_nonce');
	
	echo '</form>';
	echo "</div>";
	}
        function size_and_position_options($options) {
       
        // min_width
        echo '<table class="form-table">';
	echo '<tr valign="top"><th scope="row">';
        _e('Minimum width allowed','WPSupersized');
	echo '</th><td><input type="text" name="min_width" value="'.$options['min_width'].'" size="5"></input> (';
        _e('in pixels, default is 0','WPSupersized');
        echo ')</td></tr>';

	// min_height
	echo '<tr valign="top"><th scope="row">';
        _e('Minimum height allowed','WPSupersized');
	echo '</th><td><input type="text" name="min_height" value="'.$options['min_height'].'" size="5"></input> (';
        _e('in pixels, default is 0','WPSupersized');
        echo ')</td></tr>';
	
	// vertical_center
	echo '<tr valign="top"><th scope="row">';
        _e('Center the background vertically','WPSupersized');
	echo '</th><td><input type="checkbox" name="vertical_center" value="true"';
	if( $options['vertical_center'] == true ){ echo ' checked="checked"'; }
	echo '></input> (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// horizontal_center
	echo '<tr valign="top"><th scope="row">';
        _e('Center the background horizontally','WPSupersized');
	echo '</th><td><input type="checkbox" name="horizontal_center" value="true"';
	if( $options['horizontal_center'] == true ){ echo ' checked="checked"'; }
	echo '></input> (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';

        // fit_always
	echo '<tr valign="top"><th scope="row">';
        _e('Always fit','WPSupersized');
	echo '</th><td><input type="checkbox" name="fit_always" value="true"';
	if( $options['fit_always'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Prevents the image from ever being cropped. Ignores minimum width and height.','WPSupersized');
        echo' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';

	// fit_portrait
	echo '<tr valign="top"><th scope="row">';
        _e('Fit portrait','WPSupersized');
	echo '</th><td><input type="checkbox" name="fit_portrait" value="true"';
	if( $options['fit_portrait'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Portrait images will not exceed browser height','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// fit_landscape
	echo '<tr valign="top"><th scope="row">';
        _e('Fit landscape','WPSupersized');
	echo '</th><td><input type="checkbox" name="fit_landscape" value="true"';
	if( $options['fit_landscape'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Landscape images will not exceed browser width','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';

        // close stuff and submit data
	echo '<input type="hidden" name="wp-supersized_submit_size_and_position" value="true"></input>';
	echo '</table><br /><br />';
	echo '<p><input class="button-primary" type="submit" name="wp-supersized_submit_size_and_position" value="';
        _e('Update Options &raquo;','WPSupersized');
        echo '"><input style="margin-left: 250px;" class="button-secondary" type="submit" name="reset_options" onclick="return confirm(&#39;';
        _e('Do you really want to restore the default options?','WPSupersized');
        echo '&#39;)" value="';
        _e('Reset Options &raquo;','WPSupersized');
        echo '"></p>';
         
        wp_nonce_field('wp-supersized_admin_options_update','wp-supersized_admin_nonce');
	
	echo '</form>';
	echo "</div>";
	}
        function components_options($options) {
	echo '<table class="form-table">';
	echo '<tr valign="top"><p>(';
        _e('These options are not taken into account when in Single image mode','WPSupersized');
        echo ')</p></tr>';

	// navigation_controls
	echo '<tr valign="top"><th scope="row">';
        _e('Navigation arrows','WPSupersized');
	echo '</th><td><input type="checkbox" name="navigation_controls" value="true"';
	if( $options['navigation_controls'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Displays arrows for navigation','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';

	// navigation
	echo '<tr valign="top"><th scope="row">';
        _e('Slideshow controls','WPSupersized');
	echo '</th><td><input type="checkbox" name="navigation" value="true"';
	if( $options['navigation'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('If you switch this off, the whole Supersized footer is hidden. The captions will still be displayed if the options <em>Slide caption</em> is on.','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// thumbnail_navigation
	echo '<tr valign="top"><th scope="row">';
        _e('Thumbnail navigation','WPSupersized');
	echo '</th><td><input type="checkbox" name="thumbnail_navigation" value="true"';
	if( $options['thumbnail_navigation'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Toggles forward/backward thumbnail navigation. When on, thumbnails from the next/previous posts are generated and can be clicked to navigate.  If there is no thumbnail for the slide, it will simply scale down the full size image, which can slow performance','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')<br /><p>';
        echo sprintf(__('For both <em>Thumbnail navigation</em> and <em>Thumbnail links in thumbnail tray</em>, <strong>thumbnail files must be present in a <em>thumbs/</em> directory within the corresponding slides folder</strong>, each thumbnail having the same name (+ suffix) as its corresponding image, i.e. the slide image_1.jpg in wp-content/supersized-slides and its thumbnail image_1%s.jpg in wp-content/supersized-slides/thumbs.','WPSupersized'),$options['thumbnail_suffix']);
        echo '</p></td></tr>';
	
        // thumbnail_suffix
	echo '<tr valign="top"><th scope="row">';
        _e('Thumbnail suffix','WPSupersized');
	echo '</th><td><input type="text" name="thumbnail_suffix" value="'.$options['thumbnail_suffix'].'" size="10"></input> ';
        _e('The suffix to use for the thumbnails. Default is:','WPSupersized');
        echo ' <em>-1</em></td></tr>';
        		
	// thumb_tray
	echo '<tr valign="top"><th scope="row">';
        _e('Thumbnail tray','WPSupersized');
	echo '</th><td><input type="checkbox" name="thumb_tray" value="true"';
	if( $options['thumb_tray'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Thumbnail tray appears when clicked on bottom right arrow','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// tray_visible
	echo '<tr valign="top"><th scope="row">';
        _e('Tray visible at startup','WPSupersized');
	echo '</th><td><input type="checkbox" name="tray_visible" value="true"';
	if( $options['tray_visible'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Thumbnail tray will be shown when the slideshow starts','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';

        // thumb_links
	echo '<tr valign="top"><th scope="row">';
        _e('Thumbnail links in thumbnail tray','WPSupersized');
	echo '</th><td><input type="checkbox" name="thumb_links" value="true"';
	if( $options['thumb_links'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Generates a list of thumbnail links in the thumbnail tray that jumps to the corresponding slide. If there is no thumbnail for the slide, it will simply scale down the full size image, which can slow performance','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// slide_links
	echo '<tr valign="top"><th scope="row">';
        _e('Slide links','WPSupersized');
	echo '</th><td><select id="slide_links" name="slide_links" value=""';
	$selected = ($options['slide_links'] == '') ? 'selected="selected"' : '';
	echo "><option value='' $selected>";
        _e('None','WPSupersized');
        echo '</option>';
	$selected = ($options['slide_links'] == 'number') ? 'selected="selected"' : '';
	echo "<option value='number' $selected>";
        _e('Number','WPSupersized');
        echo '</option>';
	$selected = ($options['slide_links'] == 'name') ? 'selected="selected"' : '';
	echo "<option value='name' $selected>";
        _e('Slide title','WPSupersized');
        echo '</option>';
        $selected = ($options['slide_links'] == 'blank') ? 'selected="selected"' : '';
	echo "<option value='blank' $selected>";
        _e('Empty','WPSupersized');
        echo ' (';
        _e('default','WPSupersized');
        echo ')</option></select> ';
        _e('Shows a list of the slides in the navigation bar','WPSupersized');
        echo'- <strong>';
        _e('Better to leave it on Empty for now, as there are still some issues with how Supersized is displaying this.','WPSupersized');
        echo '</strong></tr>';

	// slide_counter
	echo '<tr valign="top"><th scope="row">';
        _e('Slide number','WPSupersized');
	echo '</th><td><input type="checkbox" name="slide_counter" value="true"';
	if( $options['slide_counter'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Displays slide number','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';
	
	// slide_captions
	echo '<tr valign="top"><th scope="row">';
        _e('Slide caption','WPSupersized');
	echo '</th><td><input type="checkbox" name="slide_captions" value="true"';
	if( $options['slide_captions'] == true ){ echo ' checked="checked"'; }
	echo '></input> (';
        _e('default is on','WPSupersized');
        echo ')<br />';
        _e('Captions for images from your default or custom directories are extracted from the IPTC caption field of each image.','WPSupersized');
        echo '<br />';
        _e('Captions for NextGEN Gallery images are taken from the <em>Description</em> field. If not filled in, the <em>Alt&Title</em> field will be used.','WPSupersized');
        echo '<br />';
        _e('Captions for Wordpress Media Gallery images are taken from the <em>Caption</em> field. If not filled in, the image title (filename) will be used.','WPSupersized');
        echo '</td></tr>';

	// progress_bar
	echo '<tr valign="top"><th scope="row">';
        _e('Progress bar','WPSupersized');
	echo '</th><td><input type="checkbox" name="progress_bar" value="true"';
	if( $options['progress_bar'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Shows a progress bar that runs based on the slide interval','WPSupersized');
        echo ' (';
        _e('default is on','WPSupersized');
        echo ')</td></tr>';

	// mouse_scrub
	echo '<tr valign="top"><th scope="row">';
        _e('Fluid thumbnail bar','WPSupersized');
	echo '</th><td><input type="checkbox" name="mouse_scrub" value="true"';
	if( $options['mouse_scrub'] == true ){ echo ' checked="checked"'; }
	echo '></input> ';
        _e('Makes the thumbnail list navigate left or right based on the mouse location','WPSupersized');
        echo ' (';
        _e('default is off','WPSupersized');
        echo ')</td></tr>';

        // close stuff and submit data
	echo '<input type="hidden" name="wp-supersized_submit_components" value="true"></input>';
	echo '</table><br /><br />';
	echo '<p><input class="button-primary" type="submit" name="wp-supersized_submit_components" value="';
        _e('Update Options &raquo;','WPSupersized');
        echo '"><input style="margin-left: 250px;" class="button-secondary" type="submit" name="reset_options" onclick="return confirm(&#39;';
        _e('Do you really want to restore the default options?','WPSupersized');
        echo '&#39;)" value="';
        _e('Reset Options &raquo;','WPSupersized');
        echo '"></p>';
         	
	echo '</form>';
	echo "</div>";
	}
        function flickr_options($options) { 
	echo '<table class="form-table">';
	
	// flickr_source
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr Source','WPSupersized');
	echo '</th><td><select id="flickr_source" name="flickr_source" value="0"';
	$selected = ($options['flickr_source'] == '1') ? 'selected="selected"' : '';
	echo "><option value='1' $selected>";
        _e('Set','WPSupersized');
        echo '</option>';
	$selected = ($options['flickr_source'] == '2') ? 'selected="selected"' : '';
	echo "<option value='2' $selected>";
        _e('User','WPSupersized');
        echo '</option>';
	$selected = ($options['flickr_source'] == '3') ? 'selected="selected"' : '';
	echo "<option value='3' $selected>";
        _e('Group','WPSupersized');
        echo '</option>';
	$selected = ($options['flickr_source'] == '4') ? 'selected="selected"' : '';
	echo "<option value='4' $selected>";
        _e('Tags','WPSupersized');
	echo '</option></select> (';
        _e('default is Group','WPSupersized');
        echo ')</tr>';

        // flickr_set
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr set ID','WPSupersized');
	echo '</th><td><input type="text" name="flickr_set" value="'.$options['flickr_set'].'" size="30"></input> (';
        _e('found in URL','WPSupersized');
        echo ')</td></tr>';

        // flickr_user
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr user ID','WPSupersized');
	echo '</th><td><input type="text" name="flickr_user" value="'.$options['flickr_user'].'" size="30"></input> (<a href="http://idgettr.com/">http://idgettr.com/</a>)</td></tr>';

        // flickr_group
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr group ID','WPSupersized');
	echo '</th><td><input type="text" name="flickr_group" value="'.$options['flickr_group'].'" size="30"></input> (<a href="http://idgettr.com/">http://idgettr.com/</a>)</td></tr>';

        // flickr_tags
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr tags ID','WPSupersized');
	echo '</th><td><input type="text" name="flickr_tags" value="'.$options['flickr_tags'].'" size="150"></input> (separate them by a comma)</td></tr>';

        // flickr_total_slides
	echo '<tr valign="top"><th scope="row">';
        _e('How many pictures to pull','WPSupersized');
	echo '</th><td><input type="text" name="flickr_total_slides" value="'.$options['flickr_total_slides'].'" size="5"></input> ';
        _e('Between 1-500 (default is 100)','WPSupersized');
        echo '</td></tr>';
	
        // flickr_size
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr Size','WPSupersized');
	echo '</th><td><select id="flickr_size" name="flickr_size" value="0"';
	$selected = ($options['flickr_size'] == 't') ? 'selected="selected"' : '';
	echo "><option value='t' $selected>t</option>";
	$selected = ($options['flickr_size'] == 's') ? 'selected="selected"' : '';
	echo "<option value='s' $selected>s</option>";
	$selected = ($options['flickr_size'] == 'm') ? 'selected="selected"' : '';
	echo "<option value='m' $selected>m</option>";
	$selected = ($options['flickr_size'] == 'z') ? 'selected="selected"' : '';
	echo "<option value='z' $selected>z</option>";
	$selected = ($options['flickr_size'] == 'b') ? 'selected="selected"' : '';
	echo "<option value='b' $selected>b</option>";
	echo '</select> (';
        _e('default is z','WPSupersized');
	echo ')<br />';
        _e('Details:','WPSupersized');
        echo '<a href="http://www.flickr.com/services/api/misc.urls.html">http://www.flickr.com/services/api/misc.urls.html</a>';
        echo '</td></tr>';

	// flickr_api_key
	echo '<tr valign="top"><th scope="row">';
        _e('Flickr API key','WPSupersized');
	echo '</th><td><input type="text" name="flickr_api_key" value="'.$options['flickr_api_key'].'" size="40"></input><br />';
        _e('You need to get your own','WPSupersized');
        echo ' -- <a href="http://www.flickr.com/services/apps/create/">http://www.flickr.com/services/apps/create/</a></td></tr>';

        
        // close stuff and submit data
	echo '<input type="hidden" name="wp-supersized_submit_flickr" value="true"></input>';
	echo '</table><br /><br />';
	echo '<p><input class="button-primary" type="submit" name="wp-supersized_submit_flickr" value="';
        _e('Update Options &raquo;','WPSupersized');
        echo '"><input style="margin-left: 250px;" class="button-secondary" type="submit" name="reset_options" onclick="return confirm(&#39;';
        _e('Do you really want to restore the default options?','WPSupersized');
        echo '&#39;)" value="';
        _e('Reset Options &raquo;','WPSupersized');
        echo '"></p>';
         
        wp_nonce_field('wp-supersized_admin_options_update','wp-supersized_admin_nonce');
	
	echo '</form>';
	echo "</div>";
        }
        
    function display_tabs($current = 'functionality') {
    $tabs = array( 'functionality' => 'Functionality', 'display' => 'Display', 'origin' => 'Slides source', 'size_and_position' => 'Size and position', 'components' => 'Components', 'flickr' => 'Flickr' ); 
    $links = array();
    foreach($tabs as $tab => $name) {
        if ($tab == $current) $links[] = '<a class="nav-tab nav-tab-active" href="?page=wp-supersized&tab='.$tab.'">'.$name.'</a>';
        else $links[] = '<a class="nav-tab" href="?page=wp-supersized&tab='.$tab.'">'.$name.'</a>'; 
    } 
    echo '<h2>'; 
    foreach ( $links as $link ) 
        echo $link; 
    echo '</h2>'; 
	}        
        ?>