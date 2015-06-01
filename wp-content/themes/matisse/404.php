<?php get_header(); ?>
<div class="container" id="wrapper">
     <?php
    if (function_exists('matisse_breadcrumb'))
        matisse_breadcrumb();
    ?>   
	<section id="content" class="eleven columns">
		<article>
			<h1><?php _e('Error 404 - Not Found', 'matisse'); ?></h1>	
		<p>
			<?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'matisse'); ?>
		</p>
		<?php get_search_form(); ?> 
		</article>
	</section>
	   <?php get_sidebar(); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
