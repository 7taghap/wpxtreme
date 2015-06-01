<article <?php post_class() ?>>
	<header>
		<h2 class="title"><a href="<?php echo matisse_link_format(); ?>" rel="bookmark">
			<?php the_title(); ?></a></h2>
	</header>
	<footer>
		<?php the_excerpt(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
		<?php echo matisse_posted_on(); ?>
		<?php edit_post_link(__('Edit This', 'matisse'), '<p>', '</p>'); ?>
	</footer>
</article>