<?php /**
 * Template Name: Slideshow
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
							$home_query = new WP_Query ($args);
						else :
							$home_query = new WP_Query ($args_not);
						endif;
						?>
<?php   

if ( $home_query -> have_posts() ) :
while ( $home_query -> have_posts() ) : $home_query -> the_post();
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
<div class="container" id="wrapper">
	<section class="sixteen columns">
		<?php if (have_posts()) : the_post();
?>
		<article <?php post_class('post slide_page') ?>>
			<header>
				<?php the_title('<h1 class="title">', '</h1>');?>
			</header>
				<?php
				if ( has_post_thumbnail()) {
					the_post_thumbnail('matisse_slide');
				}
				?>
				<div class="entry">
			        <?php the_content();?>
			    </div>
		</article>
		<?php  endif;?>
	</section>
</div>
<?php get_footer();?>
