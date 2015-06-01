<?php
/*********************/
require_once ( get_template_directory() . '/inc/customizer_register.php' );
/*********************/
if ( ! isset( $content_width ) ) $content_width = 640;	
/*********************/
add_action( 'after_setup_theme', 'matisse_setup' );

if ( ! function_exists( 'matisse_setup' ) ):
	function matisse_setup() {
/*********************/
		load_theme_textdomain( 'matisse', get_template_directory() . '/languages' );
/*********************/	
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 520, 340, true );
		add_image_size('matisse_slide', 520, 340, true);
		add_theme_support( 'post-formats', array( 'aside', 'gallery','image','link','quote', 'chat', 'video', 'audio', 'status') );
		add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background', array('default-color' => 'fff') );
		/*********************/
		add_editor_style('css/editor-style.css');
		/*********************/
		register_nav_menus(array('primary' =>__( 'Primary Navigation', 'matisse' )));
/*********************/
    register_default_headers( array(
            'matisse-1' => array(
            'url' => '%s/images/headers/matisse-1.jpg',
            'thumbnail_url' => '%s/images/headers/matisse-thumbnail-1.jpg',
            'description' => __( 'Matisse', 'matisse' ),
        ),
            'matisse-2' => array(
            'url' => '%s/images/headers/matisse-2.jpg',
            'thumbnail_url' => '%s/images/headers/matisse-thumbnail-2.jpg',
            'description' => __( 'Matisse 2', 'matisse' ),
        ),
            'matisse-3' => array(
            'url' => '%s/images/headers/matisse-3.jpg',
            'thumbnail_url' => '%s/images/headers/matisse-thumbnail-3.jpg',
            'description' => __( 'Matisse 3', 'matisse' ),
        ) 
    ) );
/*********************/      
    $custom_header_support = array(
        'default-image' => '%s/images/headers/matisse-1.jpg',
        'default-text-color' => 'BF2323',
        'width' => apply_filters( 'matisse_header_image_width', 960 ),
        'height' => apply_filters( 'matisse_header_image_height', 200 ),
        'max-width' => 2000,
        'flex-height' => true,
        'flex-width' => true,
        'random-default' => true,
        'wp-head-callback' => 'matisse_header_style',
        'admin-head-callback' => 'matisse_admin_header_style',
        'admin-preview-callback' => 'matisse_header_img',
    );
add_theme_support( 'custom-header', $custom_header_support );
/*********************/        
/*********************/     
}
endif;        
		/********************Default gallery style*/
		add_filter('use_default_gallery_style', '__return_false');
		/********************Widgets*/
function matisse_widgets_init() {
		register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'matisse'),
		'id' => 'sidebar-widget-area-full',
		'description' => __( 'The sidebar widget area', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'matisse' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'matisse' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		}
add_action( 'widgets_init', 'matisse_widgets_init' );
/*********************/	
function matisse_js() {
				if ( ! is_admin() ){
		wp_enqueue_style( 'matisse-style', get_stylesheet_uri() );	
/**************************************************************************************************/					
		wp_register_style('layout', trailingslashit(get_template_directory_uri()) . 'css/skeleton.css', '', '', 'all');
		wp_enqueue_style('layout');
/**************************************************************************************************/											
		wp_enqueue_script('jquery');
/**************************************************************************************************/		
	    if ( comments_open() && get_option( 'thread_comments' ) )  wp_enqueue_script( 'comment-reply' );	
/**************************************************************************************************/	
        if (is_page_template('slide-posts-page.php') || is_page_template('slide-page.php')){	
		wp_register_script('responsiveslides', get_template_directory_uri() .'/js/responsiveslides.js', array('jquery'));
		wp_enqueue_script('responsiveslides');
		}
/**************************************************************************************************/   
		wp_register_script('menu', get_template_directory_uri() . '/js/jquery.slicknav.min.js', '', '', 'all');
		wp_enqueue_script( 'menu' );					
/**************************************************************************************************/
		if ( !wp_is_mobile() ) {		
		wp_register_script('sticky', get_template_directory_uri() . '/js/headhesive.min.js', '', '', 'all');
		wp_enqueue_script( 'sticky' );	
		}	                           
/**************************************************************************************************/ 
        if (is_page_template('slide-posts-page.php')){
        wp_enqueue_script('jquery-masonry');      
        }      
/**************************************************************************************************/		
		global $is_IE;
		if ($is_IE){
		wp_register_script('ie-html5', get_template_directory_uri() .'/js/html5shiv-printshiv.js', array('jquery'));
		wp_enqueue_script('ie-html5');		
		}

		}
		}
add_action('wp_enqueue_scripts', 'matisse_js');
/*********************/
function matisse_script() {
		echo '<script>jQuery(document).ready(function($) {';
if (is_page_template('slide-posts-page.php') || is_page_template('slide-page.php')){		
				echo'$(".rslides").responsiveSlides({
  pager: true,           // Boolean: Show pager, true or false
  nav: false,             // Boolean: Show navigation, true or false
  pause: true,           // Boolean: Pause on hover, true or false
  namespace: "rslides",   // String: Change the default namespace used
});';
}					
					
echo '$(\'#nav\').slicknav({
	label: \''.__( 'MENU', 'matisse' ).'\',
	allowParentLinks: \'true\'	
	});	
	var options = {
            offset: 300,
            classes: {
                clone:   "banner-clone",
                stick:   "banner-stick",
                unstick: "banner-unstick"
            }
        };
        var banner = new Headhesive("#nav", options);';
		
if (is_page_template('slide-posts-page.php')) {   		
	    echo ' var container = document.querySelector(\'#wrapper\');
var msnry = new Masonry( container, {
  // options
  columnWidth: \'.four\',
  itemSelector: \'.four\'
});';
}
				
echo '});</script>';
		}
add_action('wp_head', 'matisse_script');
/*********************/
if ( ! function_exists( 'matisse_link_format' ) ) :
function matisse_link_format() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;
/*********************/
		function matisse_excerpt_more( $more ) {
		return '&hellip;' . ' <a class="link_more" href="'. get_permalink() . '">' . __( 'Continue reading &rarr;', 'matisse' ) . '</a>';
		}
		add_filter( 'excerpt_more', 'matisse_excerpt_more' );
/*********************/
		if ( ! function_exists( 'matisse_posted_on' ) ) :
		function matisse_posted_on() {
		if(is_single()) {
			$format_text = __('<p> Posted on %4$s by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span> </p>', 'matisse' );
			} else {
			$format_text = __('<p> Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span> </p>', 'matisse' );
		}
		printf( $format_text,
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('d-m-Y') ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'matisse' ), get_the_author() ),
		esc_html( get_the_author() )
		);
		}
		endif;
/*********************/
		if ( ! function_exists( 'matisse_posted_footer' ) ) :
		function matisse_posted_footer() {
		  $categories = get_the_category_list(__(', ', 'matisse'));
		  $tag = get_the_tag_list('', __(', ', 'matisse'));		
if ($tag) {
printf(__('<p>This entry was posted in %1$s and tagged %2$s.</p>', 'matisse'), $categories, $tag); 
} 
elseif($categories) {
printf(__('<p>This entry was posted in %1$s.</p>', 'matisse'), $categories);
}        
        }
		endif;
/*********************/		
if ( ! function_exists( 'matisse_header_style' ) ) :
function matisse_header_style() { ?>
<style><?php if (get_header_image()){
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height-100;
 ?>
#header {	
	background:#FFA26F url(<?php header_image();?>) no-repeat top center;	
    min-height: <?php echo $header_image_height; ?>px;
	}
<?php  } ?>	
<?php if ( ! display_header_text() ) : ?>
#header h1, #header h2, #header h3{
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); 
	clip: rect(1px, 1px, 1px, 1px);
}
	<?php else : ?>
#header h1 a, #header  h2 {
	color: #<?php echo get_header_textcolor(); ?>!important;
}
	<?php endif; ?>
</style>
<?php
}
endif;
/*********************/	
if ( ! function_exists( 'matisse_admin_header_style' ) ) :
function matisse_admin_header_style() {	
?>
<style type="text/css">
<?php if (get_header_image()) : 
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height-100;
	?>	
#header {	
	background:#FFA26F url(<?php header_image();?>) no-repeat bottom center;	
    min-height: <?php echo $header_image_height; ?>px;
    width: <?php echo $header_image_width; ?>px;
	}	
<?php else : ?>
#header{
	background:#FFA26F!important;
}
<?php endif; ?>	
<?php if ( ! display_header_text() ) : ?>
		#header hgroup h1, #header hgroup h2, #header hgroup h3{
			display: none;
		}
	<?php else :
	?>
#header{
    background-color: #FFA26F!important;
}
#header .container{
	position: relative;
    text-shadow: none;
    width: 940px;
    margin: 0 auto;
}
#header h2 {
    padding: 10px;
    letter-spacing: 0.076em;
    float: left;
    width: 35%;
    font-size: 36px;
	text-shadow: 1px 1px 1px rgba(0,0,0,.6)!important;
}
#header h3 {
        font-size: 20px;
		color: #fff;
		text-align: right;
		font-family: Cambria, Georgia, "Times New Roman", Times, serif;
		font-weight: normal;
		float: right;
		width: 60%;
}
#header h2 a, #header h3 {
	color: #<?php echo get_header_textcolor(); ?>!important;
	text-decoration: none!important;
	text-shadow: none;
}
	<?php endif; ?>
</style>
<?php
}

endif;
/*********************/	
if ( ! function_exists( 'matisse_header_img' ) ) :
function matisse_header_img() {
?>
<div id="header">
<div class="container">
<?php  if (function_exists('matisse_header'))  matisse_header();
$site_description = get_bloginfo( 'description' ); if ( $site_description ) {?>
<h3><?php	echo $site_description;?></h3>
<?php } ?>
</div>
</div>
<?php
}
endif;	
/*********************/
if ( ! function_exists('matisse_pagination') ) {
		function matisse_pagination() {	
		global $wp_query;
$big = 99999;
echo '<div class="wp-pagenavi eleven columns">';
echo paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_next'    => True,
    'show_all'     => False,
    'total' => $wp_query->max_num_pages,
    'prev_text'    => __('&laquo; Previous','matisse'),
    'next_text'    => __('Next &raquo;','matisse')
) );
echo'</div>' ;
		}
		}
/*********************/
	function matisse_breadcrumb(){
		if(function_exists('bcn_display'))
    { echo '<nav id="breadcrumbs" class="sixteen columns">';
        bcn_display();
		echo '</nav>';
    }
	elseif (function_exists('yoast_breadcrumb')) {
	yoast_breadcrumb('<nav id="breadcrumbs" class="sixteen columns">', '</nav>');
	} 
	}
/**********
 * @note: credit goes to TwentyTwelve theme.***********/
function matisse_wp_title( $title, $sep ) {
global $paged, $page;

if ( is_feed() )
return $title;

// Add the site name.
$title .= get_bloginfo( 'name' );

// Add the site description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
$title = "$title $sep $site_description";

// Add a page number if necessary.
if ( $paged >= 2 || $page >= 2 )
$title = "$title $sep " . sprintf( __( 'Page %s', 'matisse' ), max( $paged, $page ) );

return $title;
}
add_filter( 'wp_title', 'matisse_wp_title', 10, 2 );					
/*********************/
		if ( ! function_exists( 'matisse_footer_classes' ) ) :
		function matisse_footer_classes( $existing_classes ) {
		if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ))
		$classes[] = 'footer-widget';
		else
		$classes[] = 'footer-no-widget';
		return array_merge( $existing_classes, $classes );
		}
		add_filter( 'body_class', 'matisse_footer_classes' );
		endif;
/*********************/
?>