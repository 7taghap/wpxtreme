<aside class="five columns sidebar">
    <?php	if ( is_active_sidebar( 'sidebar-widget-area-full' ) ) {
    ?>
    <ul class="widget">
        <?php dynamic_sidebar('sidebar-widget-area-full'); ?>
    </ul>
    <?php } else { ?>
    <div class="widget">
        <?php get_search_form(); ?>
    </div>
    <?php } ?>
</aside>