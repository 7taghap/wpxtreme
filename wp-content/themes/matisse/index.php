<?php get_header(); ?>
<div class="container" id="wrapper">
    <?php
    if (function_exists('matisse_breadcrumb'))
        matisse_breadcrumb();
    ?>
    <section id="content" class="eleven columns">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('loop', get_post_format());
            endwhile;
        else :
            get_template_part('loop', 'none');
        endif;
        ?>
    </section>
    <?php get_sidebar(); ?>
    <?php
    if (function_exists('wp_pagenavi')) { wp_pagenavi();
    } else {  matisse_pagination();
    }
    ?>
</div>
<?php get_footer(); ?>