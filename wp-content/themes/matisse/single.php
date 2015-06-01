<?php get_header(); ?>
<div class="container" id="wrapper">
    <?php
    if (function_exists('matisse_breadcrumb'))
        matisse_breadcrumb();
    ?>
    <?php get_template_part('content', get_post_format()); ?>
    <div class="wp-pagenavi eleven columns">
        <div class="alignleft">
            <?php previous_post_link(); ?>
        </div>
        <div class="alignright">
            <?php next_post_link(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>