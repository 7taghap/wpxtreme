<article <?php post_class() ?>>
    <div class="post-content">
        <?php the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
    </div>
    <footer>
        <?php matisse_posted_on(); ?>
        <?php edit_post_link(__('Edit This', 'matisse'), '<p>', '</p>'); ?>
    </footer>
</article>