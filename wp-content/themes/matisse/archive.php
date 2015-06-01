<?php	get_header(); ?>
<div class="container" id="wrapper">
    <?php
    if (function_exists('matisse_breadcrumb'))
        matisse_breadcrumb();
    ?>
	<section id="content" class="eleven columns">
	<?php if (is_day()) : ?>
	<h1 class="title"><?php printf(__('Day: <span>%s</span>', 'matisse'), get_the_date()); ?></h1>
	<?php elseif (is_month()) : ?>
	<h1 class="title"><?php	printf(__('Month: <span>%s</span>', 'matisse'), get_the_date('F Y')); ?></h1>
	<?php elseif (is_year()) : ?>
	<h1 class="title"><?php	printf(__('Year: <span>%s</span>', 'matisse'), get_the_date('Y')); ?></h1>
	<?php elseif (is_category()) : ?>
	<div class="title">	
	<h1><?php	printf(__('<span>%s</span>', 'matisse'), single_cat_title('', false)); ?></h1>
	<?php
    if (category_description())
        echo category_description();
 ?></div>
	<?php elseif (is_tag()) : ?>
	<div class="title">
	<h1><?php	printf(__('<span>%s</span>', 'matisse'), single_tag_title('', false)); ?></h1>
    <?php
    if (tag_description())
        echo tag_description();
 ?>	</div>
    <?php elseif ( is_tax() ) : ?>
    <h1 class="title"><?php single_term_title(); ?></h1>
	<?php echo term_description('', get_query_var('taxonomy')); ?>
	<?php elseif ( is_author() ) : ?>
		<?php $user_id = get_query_var('author'); ?>
			<div class="vcard" id="author-info">	
				<h1 class="fn n"><?php the_author_meta('display_name', $user_id); ?></h1>								
				<?php 
				if ( get_the_author_meta( 'description', $user_id  ) ) : ?>
				<?php echo get_avatar(get_the_author_meta('user_email', $user_id)); ?>	
				<p>
					<?php the_author_meta('description', $user_id); ?>
				</p>
				<?php endif; ?>
			</div> 
	<?php elseif ( is_post_type_archive() ) : ?>
    <h1 class="title"><?php post_type_archive_title(); ?></h1> 	
	<?php elseif ( is_archive() ) : ?>
     <h1 class="title"><?php _e('Archives', 'matisse'); ?></h1>
    <?php endif; ?>
	
			
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
	<?php	get_sidebar(); ?>
	<?php
    if (function_exists('wp_pagenavi')) { wp_pagenavi();
    } else {  matisse_pagination();
    }
	?>
</div>
<?php get_footer(); ?>
