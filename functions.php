<?php

// Scripts & Styles
	add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
	function dequeue_jquery_migrate( &$scripts){
		if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );
	function scripts_and_styles() {
		// Timestamp for versions
		$ver = time();
	// Scripts
		// Barba
		if (is_singular('post')) {
			wp_enqueue_script( 'barba', get_stylesheet_directory_uri() . '/js/barba.js', array('jquery'), $ver, true );
			wp_enqueue_script( 'nextprev', get_stylesheet_directory_uri() . '/js/nextprev.js', array('jquery'), $ver, true );
			wp_enqueue_script( 'TweenMax', get_stylesheet_directory_uri() . '/js/TweenMax.min.js', array('jquery'), $ver, true );
		}
		// blog and cat's
		wp_enqueue_script( 'infinitescroll', '//cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/2.0b2.120519/jquery.infinitescroll.min.js', null, null, true);
		wp_enqueue_script( 'masonry', 'https://unpkg.com/masonry-layout@4.0/dist/masonry.pkgd.min.js', null, null, true);
		wp_enqueue_script( 'imagesloaded', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.0.4/jquery.imagesloaded.min.js', null, null, true);
		// contact page
		wp_enqueue_script( 'Gmap_api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDPYBo-pasiBWKmO2HYEykNliIhIrDKWnk', null, null, true );
		wp_enqueue_script( 'acf_maps', get_stylesheet_directory_uri() . '/js/acf-maps.js', array('jquery'), $ver, true );
		// student page
		wp_enqueue_script( 'sticky-kit', get_stylesheet_directory_uri() . '/js/sticky-kit.js', array('jquery'), $ver, true );
		wp_enqueue_script( 'mixitup', get_stylesheet_directory_uri() . '/js/mixitup.js', array('jquery'), $ver, true );
		wp_enqueue_script( 'flip', 'https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js', null, null, true);

		wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@1.2/dist/flickity.pkgd.min.js', null, null, true);
		wp_enqueue_script( 'rellax', get_stylesheet_directory_uri() . '/js/rellax.min.js', array('jquery'), $ver, true );
		wp_enqueue_script('aos', 'https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js', null, null, true);
		// Document ready
		wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), $ver, true );
	// Stylesheets
		wp_enqueue_style( 'aos-css', 'https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.css');
		wp_enqueue_style( 'flickity', 'https://unpkg.com/flickity@1.2/dist/flickity.min.css',null, null, 'screen');
		wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/c81fe3ea32.css');
		// main css
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', null, $ver, 'screen' );
	}

// Custom Search Templates
	function template_chooser($template){
		global $wp_query;
		$post_type = get_query_var('post_type');
		if( $wp_query->is_search && $post_type == 'post' ){
			return locate_template('search-post.php');  //  redirect to archive-search.php
		}
		return $template;
	}
	add_filter('template_include', 'template_chooser');

// Site search just these post types
function fb_search_filter($query) {
	if ( !$query->is_admin && $query->is_search) {
		$query->set('post_type', array('page','post','product') ); // id of page or post
	}
	return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );

// Custom taxonomies or category dropdown
	function get_terms_dropdown($taxonomies, $args){
		$myterms = get_terms($taxonomies, $args);
		foreach($myterms as $term){
			$root_url = get_bloginfo('url');
			$term_taxonomy=$term->taxonomy;
			$term_slug=$term->slug;
			$term_name =$term->name;
			$link = $root_url.'/'.$term_taxonomy.'/'.$term_slug;
			$output .="<a class='".$term_slug."' href='".$link."'>".$term_name."</a>";
		}
		return $output;
	}
// remove edit tool 
	show_admin_bar(false);

// wp-login.php style
	function login_stylesheet() {
	    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/login.css' );
	}
	add_action( 'login_enqueue_scripts', 'login_stylesheet' );

// Admin Hide comments
	add_action( 'admin_menu', 'my_remove_menu_pages' );
	function my_remove_menu_pages() {
		remove_menu_page('edit-comments.php'); // Comments
	}

// Admin header icon
	function my_custom_logo() {
		echo '
			<style type="text/css">
				#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
					background-image: url(http://thriveweb.com.au/email6/mini-sig.gif) !important;
					background-position: 0 0;
					color:rgba(0, 0, 0, 0);
					background-size: cover;
				}
				#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
					background-position: 0 0;
				}
			</style>
		';
	}

// Admin - Color
	add_action('wp_before_admin_bar_render', 'my_custom_logo');
	function additional_admin_color_schemes() {
		//Get the theme directory
		$theme_dir = get_template_directory_uri();
		//Ocean
		wp_admin_css_color( 'thrive', __( 'Thrive' ),
			$theme_dir . '/css/admin-colors.css',
			array( '#00b0ab', '#00b0ab', '#09243b', '#09243b' )
	    );
	}
	add_action('admin_init', 'additional_admin_color_schemes');

// Set by default
	function set_default_admin_color($user_id) {
		$args = array(
			'ID' => $user_id,
			'admin_color' => 'thrive'
		);
		wp_update_user( $args );
	}
	add_action('user_register', 'set_default_admin_color');

// wp custom fonts wysiwyg editor
	function theme_add_editor_styles() {
		add_editor_style( '/css/login.css' );
	}
	add_action( 'init', 'theme_add_editor_styles' );

// Widegts
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

// string to slug
	function to_slug($string){
		return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
	}

// custom image size
	add_filter( 'acf_the_content', 'wp_make_content_images_responsive' );
	add_image_size( '200w', 200, 0, false );
	add_image_size( '400w', 400, 0, false );
	add_image_size( '680croped', 680, 317, true );

	add_image_size( '800w', 800, 0, false );
	add_image_size( '1200w', 1200, 0, false );
	add_image_size( '1800w', 1800, 0, false );

//options
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
		acf_add_options_sub_page('General');
		/*acf_add_options_sub_page('Header');*/
		/*acf_add_options_sub_page('Footer');*/
	}

// menus
	function register_my_menus() {
		register_nav_menus( array(
			'main' => __( 'Main Menu' ),
			'footer' => __( 'Footer Menu' ),
			'quicklinks' => __( 'Quicklinks Footer Menu' ),
			'about_footer' => __( 'About Footer Menu' ),
			'legal' => __( 'Legal Footer Menu' )
		));
	}
	add_action( 'init', 'register_my_menus' );

// gravity forms
	add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );
	add_filter( 'gform_confirmation_anchor', '__return_true' );

// kill link on images
	update_option('image_default_link_type','none');

// remove update nag
	add_action('admin_menu','wphidenag');
	function wphidenag() {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
// custom footer
	function custom_admin_footer() {
		echo 'By <a href="http://thriveweb.com.au/" title="Visit thriveweb.com.au for more information">thriveweb.com.au</a>';
	} add_filter('admin_footer_text', 'custom_admin_footer');

// is_tree function to methods
	function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
		global $post;         // load details about this page
		if(is_page()&&($post->post_parent==$pid||is_page($pid)))
	    	return true;   // we're at the page or at a sub page
		else
			return false;  // we're elsewhere
	};

// Removes the Yoast columns from pages & posts
	function prefix_remove_yoast_columns( $columns ) {
	  unset( $columns['wpseo-score'] );
	  unset( $columns['wpseo-title'] );
	  unset( $columns['wpseo-metadesc'] );
	  unset( $columns['wpseo-focuskw'] );
	  return $columns;
	}
	add_filter ( 'manage_edit-post_columns',    'prefix_remove_yoast_columns' );
	add_filter ( 'manage_edit-page_columns',    'prefix_remove_yoast_columns' );

// Scale Up Small Images
	function image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop){
	    if ( !$crop ) return null; // let the wordpress default function handle this
	    $aspect_ratio = $orig_w / $orig_h;
	    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
	    $crop_w = round($new_w / $size_ratio);
	    $crop_h = round($new_h / $size_ratio);
	    $s_x = floor( ($orig_w - $crop_w) / 2 );
	    $s_y = floor( ($orig_h - $crop_h) / 2 );
	    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
	//Now hook this function like so:
	add_filter('image_resize_dimensions', 'image_crop_dimensions', 10, 6);


// Exclude certain pages from WordPress search results
	function jp_search_filter( $query ) {
	  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
	    //$query->set( 'post__not_in', array( 138,139,140,141,692 ) );
		// $query->set('post_type', array('page', 'post') );
	  }
	}
	add_action( 'pre_get_posts', 'jp_search_filter' );

// Search results count heading
	function wp_searchheader() {
	# Only display results where relevant
	if (is_search() || is_date() || is_category() || is_tag() || is_author()) {

	# Define global variables
	global $posts_per_page, $paged, $wp_query, $author_name, $author;


		# Calculate number of results, number of pages & current range.
		$numposts = $wp_query->found_posts;

		# Create formatted version of number for displaying
		if (0 < $numposts) $numposts_pretty = number_format($numposts);

		if(empty($paged)) {
			$paged = 1;
		}

		$startpost = ($posts_per_page * $paged) - $posts_per_page + 1;

		if (($startpost + $posts_per_page - 1) >= $numposts) {
			$endpost = $numposts;
		} else {
			$endpost = $startpost + $posts_per_page -1;
		}


		# Add a comment in the html to show where the plugin generated code starts & ends)
		echo '<!-- The following post count code is automatically generated by the Results Count plugin version '.results_count_version.' : http://wordpress.org/extend/plugins/results-count/ -->';

		# Check if there is less than one page of results & alter text to suit
		if ($numposts>$posts_per_page) {

				# Multiple pages of results
				echo '<p>Showing results <b> '.$startpost. '</b> - <b>' .$endpost. '</b> of <b>' .$numposts_pretty. '</b> for ';
			} else {

				# Check if there is only a single result & alter text to suit
				if ($numposts!=1) {

					# Single page - multiple results
					echo '<p>Showing <b>'.$numposts_pretty.'</b> results for ';
				} else {

					# Single result
					echo '<p>Showing <b>'.$numposts_pretty.'</b> result for ';
				}
			}


		# Search results (display search terms).
		if (is_search()){
			$search_terms = get_query_var('search_terms');

			# Alter text if there is more than one search term used.
			if (count($search_terms)!=1) {
				echo 'the search terms: <b>';
			} else {
				echo 'the search term: <b>';
			}

			# Display the search terms used.
			for ($i = 0; $i < count($search_terms); $i++){
				echo ' <a href="index.php?s=', $search_terms[$i], '" title="search this site for: ', $search_terms[$i], '">', $search_terms[$i], '</a>';
			}
		}


		# Archive pages by date (display date range info).
		if (is_date()){
			# Check if the date is a day, a month or a whole year.
			if (is_day()) {
				echo ' <b>';
				the_time('l, F jS, Y');
			}
			elseif (is_month()) {
				echo 'the month of <b>';
				the_time('F, Y');
			}
			elseif (is_year) {
				echo 'the year <b>';
				the_time('Y');
			}
		}


		# Archive pages by category (display category name).
		if (is_category()){
			echo 'the category: <b><a href="http://', $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '">', single_cat_title(),'</a>';
		}


		# Archive pages by tag (display tag name).
		if (is_tag()){
			echo 'the tag: <b><a href="http://', $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '">', single_tag_title(),'</a>';
		}


		# Archive pages by author (display author name).
		if (is_author()){
			if(isset($_GET['author_name'])) :
					$curauth = get_userdatabylogin($author_name);
				else :
					$curauth = get_userdata(intval($author));
				endif;
			echo 'the author: <b><a href="http://', $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], '">', $curauth->nickname,'</a>';
		}


	# Close html tags.
	echo '</b>.</p>';
  echo '';

}
}

// WooCommerce

// WooCommerce support
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
	    add_theme_support( 'woocommerce' );
	}

// fixes for single product display add to cart and add product option plugin
	function wc_remove_all_quantity_fields( $return, $product ) { return true; }
	add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

	add_filter( 'woocommerce_product_single_add_to_cart_text', 'apply_now_text');
	function apply_now_text() { return __( 'Apply Now', 'woocommerce' ); }

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

// Set body classes
	function add_body_class($classes) {
		global $wp_query;
		$parents = $wp_query->get_queried_object();
		if ($parents->parent == 0) {
			$classes[] = 'parent_cat';
		} elseif ($parents->parent) {
			$classes[] = 'sub_cat';
		}
	    return $classes;
	}
	add_filter('body_class', 'add_body_class');
// remove breadcrumbs
	add_action( 'init', 'jk_remove_wc_breadcrumbs' );
	function jk_remove_wc_breadcrumbs() {
	    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
// remove product count
	add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
	function woo_remove_category_products_count() {
	  return;
	}

// Disable WooCommerce's Default Stylesheets
	function disable_woocommerce_default_css( $styles ) {
		// Disable the stylesheets below via unset():
		if (is_cart() || is_checkout()) {

		} else {
			unset( $styles['woocommerce-general'] );  // Styling of buttons, dropdowns, etc.
			unset( $styles['woocommerce-layout'] );        // Layout for columns, positioning.
			unset( $styles['woocommerce-smallscreen'] );   // Responsive design for mobile devices.
		}
		return $styles;
	}
	add_action('woocommerce_enqueue_styles', 'disable_woocommerce_default_css');

// remove sidebar
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// remove result_count
	function woocommerce_result_count() { return; }

// remove sort results
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// add courseID to archive list view
	function add_woocommerce_courseID() {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$course_id = get_field('course_id', $cat);
		echo '<span>'. $course_id . '</span>';
	}
	add_action('woocommerce_shop_loop_subcategory_title', 'add_woocommerce_courseID', 15);

// add message / info
	add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
	function wc_add_to_cart_message_filter($message, $product_id = null) {
		$message = "";
	    return $message;
	}
// Custom tax terms list filter
	function woo_get_terms_dropdown($taxonomies, $args){
		$myterms = get_terms($taxonomies, $args);
		foreach($myterms as $term){
			$root_url = get_bloginfo('url');
			$term_taxonomy=$term->taxonomy;
			$term_slug=$term->slug;
			$term_name =$term->name;
			$link = $root_url.'/'.$term_taxonomy.'/'.$term_slug;
			$output .="<a href='#' class='filter " .$term_slug."' data-filter='." .$term_slug."' >".$term_name."</a>";
		}
	return $output;
	}

// Fix 'Password field is empty' error when using autofill in Chrome
	add_action("login_form", "kill_wp_attempt_focus");
	function kill_wp_attempt_focus() {
	    global $error;
	    $error = TRUE;
	}


?>
