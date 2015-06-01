<?php /**
 * Template Name: Slideshow with posts (box)
 *  */

?>
<?php get_header();?>
<div id="slideshome">
	<div class="container">
	<ul class="rslides">
						<?php  
					global $post;

						$sticky = get_option('sticky_posts');
						$args = array(
						'posts_per_page' => 5,
						'meta_key' => 'slide-page',
						'post_type' => array( 'post', 'page' ),
						'p=' . $sticky, 'ignore_sticky_posts' => 0);
						$args_not = array('posts_per_page' => 5);
						if($sticky || empty($slide)) :
							query_posts($args);
						else :
							query_posts($args_not);
						endif;
						?>
<?php   if (have_posts()) : while (have_posts()) : the_post();
						?>
					<li>	
<?php 
if  ( has_post_thumbnail()): ?>
<span class="seven columns">
<?php the_post_thumbnail('matisse_slide');?>
</span>
						<div class="nine columns">
								<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
								<?php the_excerpt();?>		
						</div>
							<?php else :?>
						<div class="no_img offset-by-three twelve columns">
							<h2><a  href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'sketchbook'), the_title_attribute('echo=0')));?>" > 
								<?php the_title();?></a></h2>
							    <?php the_excerpt(); ?>
						</div>
							<?php endif;?>
					</li>
<?php endwhile; endif; ?>
					</ul>

	</div>
</div>
<section class="container" id="wrapper">
<?php
if ( get_query_var( 'paged' ) ) :
					$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = 1;
				endif;
					
$sticky = get_option( 'sticky_posts' );
$args=array(
'paged'          => $paged,
'posts_per_page' => $posts_per_page,
'post__not_in' => $sticky
);
$home_query = new WP_Query ($args);
if ( $home_query -> have_posts() ) :
while ( $home_query -> have_posts() ) : $home_query -> the_post();
		?>
<article <?php post_class('four columns') ?>>
	<header>
<?php if (comments_open() && !post_password_required()) :
            comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
        endif; ?>
        <?php if (!has_post_format(array('aside', 'image', 'quote', 'gallery'))) : ?>
		<h2 class="title"><a href="<?php	the_permalink(); ?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php	the_title(); ?></a></h2>
		<?php endif; ?>
		<?php matisse_posted_on(); ?>
	</header>
	<div class="post-content">
        <?php
        if (has_post_thumbnail() && !has_post_format(array('gallery'))) {
            the_post_thumbnail('medium');
        }
        ?>	    
	<?php if (has_post_format(array('aside', 'quote', 'gallery'))) {
	the_content(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse'));		
	} else {
	the_excerpt(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse'));		
	}
 ?>
 <?php if (has_post_format(array( 'image', 'gallery'))) : ?>
		<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php	the_title(); ?></a></h2>
		<?php endif; ?>
	</div>
	<footer>		
		<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'matisse'), 'after' => '</div>')); ?>
		<?php matisse_posted_footer(); ?>  
		<?php edit_post_link(__('Edit This', 'matisse'), '<p>', '</p>'); ?>  
	</footer>
</article>
		<?php endwhile; 
		wp_reset_postdata();
		?>
				
<?php 
$posts=get_option( 'page_for_posts' ); 
if ( '' != $posts ) { ?>
	<article class="four columns">
<h2 class="title"><a class="view-all" href="<?php echo get_permalink($posts); ?>" title="<?php echo esc_attr(sprintf(__('View all posts', 'matisse'))); ?>" rel="bookmark"><?php _e('View all', 'matisse'); ?>	
</a></h2>
</article>
<?php } ?>
		
<?php endif;?>
</section>		

<?php get_footer();?>
