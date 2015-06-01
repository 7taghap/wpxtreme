<!DOCTYPE html>
<html <?php	language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />			
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php	body_class(); ?>>
		<header id="header">
			<div class="container">
				<?php
				if (function_exists('matisse_header')) { matisse_header();
				}
				?>
	<?php  $site_description = get_bloginfo( 'description' ); if ( $site_description ) {?>
    <h2 class="ten columns"><?php echo $site_description; ?></h2>
	<?php } ?>
			</div>
		</header>
<?php wp_nav_menu(array('sort_column' => 'menu_order', 'Primary Navigation', 'theme_location' => 'primary', 'container' => 'nav', 'container_id' => 'nav', 'container_class' => 'menu-primary', 'menu_id' => 'menu','menu_class' => 'container', 'fallback_cb' => false)); ?> 		