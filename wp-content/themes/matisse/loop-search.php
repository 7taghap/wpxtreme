<article <?php post_class() ?>>
	<header>		
		<h2 class="title"><a href="<?php	the_permalink(); ?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php	the_title(); ?></a></h2>		
		<?php matisse_posted_on(); ?>
	</header>
	<div class="post-content">  
	<?php	the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
	</div>
</article>