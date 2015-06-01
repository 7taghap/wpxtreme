<?php get_header();?>
<div class="container" id="wrapper">
    <?php
    if (function_exists('matisse_breadcrumb'))
        matisse_breadcrumb();
    ?>    
	<section id="content" class="twelve columns offset-by-two">
		<?php if (have_posts())  : the_post();
		?>		
<article <?php post_class('post') ?>>
			<header>
				<?php
				if ( has_post_thumbnail()) {
					the_post_thumbnail('matisse_single_post');
				}
				?>
				<?php the_title('<h1 class="title">', '</h1>');?>
			</header>
			<div class="post-content">
			<?php the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse'));?>
			</div>
			<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'matisse'), 'after' => '</div>'));?>
			<?php edit_post_link(__('Edit This', 'matisse'), '<p>', '</p>'); ?>
		</article>
		<?php comments_template();?>
		<?php endif;?>
	</section>
</div>
<?php get_footer();?>
