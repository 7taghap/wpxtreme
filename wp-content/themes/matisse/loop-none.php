<article <?php post_class('post no-results not-found') ?>>
<header>	
<h1><?php _e('Nothing Found', 'matisse'); ?></h1>
</header>
	<div class="post-content">
	<p><?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'matisse'); ?></p>
	<?php get_search_form(); ?>
	</div>
</article>