<?php
/**
 * Template Name: Sidebar Template
 **/
?>
<?php get_header(); ?>
<div class="container" id="wrapper">
    <section id="content" class="eleven columns">
        <?php if (have_posts())  : the_post();
        ?>
        <article <?php post_class('post') ?>>
            <header>
                <?php
                if (has_post_thumbnail())
                    the_post_thumbnail('matisse_single_post');
                ?>
                <?php the_title('<h1 class="title">', '</h1>'); ?>
            </header>
            <?php the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
            <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'matisse'), 'after' => '</div>')); ?>
            <?php edit_post_link(__('Edit This', 'matisse')); ?>
        </article>
        <?php comments_template(); ?>
        <?php endif; ?>
    </section>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>