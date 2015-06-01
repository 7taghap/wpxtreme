<?php if (have_posts()) : the_post();
?>
<section id="content" class="eleven columns">
	<article <?php post_class('post') ?>>
		<header>
		<?php
			if (comments_open() && !post_password_required()) :
				comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
			endif;
		?>			
<h1 class="title"><a href="<?php echo matisse_link_format();?>"  rel="bookmark"><?php the_title();?></a></h1>	
			<?php	matisse_posted_on();?>
		</header>
		<div class="post-content">
		<?php	the_content(__('Continue reading &rarr;', 'matisse'));?>
        </div>
		<footer>
			<?php	wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'matisse'), 'after' => '</div>'));?>
		<?php
		matisse_posted_footer();
		?>
			<?php
if ( get_the_author_meta( 'description' ) ) :
			?>
			<div id="author-info">
				<?php	echo get_avatar(get_the_author_meta('user_email'));?>

				<h2><?php	printf(__('About %s', 'matisse'), get_the_author());?></h2>
				<p>
					<?php	the_author_meta('description');?> <br />
					<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>" rel="author"> <?php printf(__('View all posts by %s &rarr;', 'matisse'), get_the_author());?></a>
				</p>
			</div>
			<?php	endif;?>
		</footer>
	</article>
	<?php comments_template('', true);?>
</section>
<?php  endif;?>
<?php get_sidebar();?>