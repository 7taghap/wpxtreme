<?php	get_header(); ?>
<div class="container" id="wrapper">
    <?php
    if (function_exists('matisse_breadcrumb'))
        matisse_breadcrumb();
    ?>
	<section id="content" class="eleven columns">
    <h1 class="title"><?php printf(__('Search Results for: %s', 'matisse'), '<span>' . get_search_query() . '</span>'); ?></h1>	    
		<?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('loop', 'search');
            endwhile;
        else :
            get_template_part('loop', 'none');
        endif;
		?>
	</section>
	<?php get_sidebar(); ?>
	<?php
    if (function_exists('wp_pagenavi')) { wp_pagenavi();
    } else {  matisse_pagination();
    }
	?>
</div>
<?php get_footer(); ?>