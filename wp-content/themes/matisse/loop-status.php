<article <?php post_class() ?>>
    <div class="post-content">
<?php if ( get_option( 'show_avatars' ) )  : ?> 
        	<div class="alignright">
<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('swiss_author_bio_avatar_size', 60)); ?>
</div>
<?php endif; ?>     	
        <?php the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>       
<hr class="clear" />
    </div>
    <header>
        <?php
        if (comments_open() && !post_password_required()) :
            comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
        endif;
        ?>
        <?php	matisse_posted_on(); ?>
        <?php edit_post_link(__('Edit This', 'matisse'), '<p>', '</p>'); ?>
    </header>
</article>