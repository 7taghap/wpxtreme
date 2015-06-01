<article <?php post_class() ?>>
    <div class="post-content">
        <?php the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
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