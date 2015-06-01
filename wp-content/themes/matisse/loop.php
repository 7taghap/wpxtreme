<article <?php post_class() ?>>
	<header>
<?php if (comments_open() && !post_password_required()) :
            comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
        endif; ?>
		<h2 class="title"><a href="<?php	the_permalink(); ?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php	the_title(); ?></a></h2>
		<?php matisse_posted_on(); ?>
	</header>
	<div class="post-content">
        <?php 
        if (has_post_thumbnail()) {
        if (has_post_format(array('audio'))) :
            the_post_thumbnail('large');
		elseif (!has_post_format(array('video', 'gallery', 'image'))) :
			the_post_thumbnail('thumbnail', array('class' =>'alignleft'));
		endif;
        }
        ?>	    
	<?php	the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
	</div>
	<footer>		
		<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'matisse'), 'after' => '</div>')); ?>
		<?php matisse_posted_footer(); ?>  
		<?php edit_post_link(__('Edit This', 'matisse'), '<p>', '</p>'); ?>  
	</footer>
</article>