<?php
/**
 * Template Name: Archives Template
 **/
?>

<?php get_header(); ?>
<section class="container" id="wrapper">
<section class="sixteen columns"><?php the_widget( 'WP_Widget_Search'); ?> </section>
    <div class="eight columns">
        <?php if (have_posts())  : the_post();
        ?>
        <article <?php post_class('post') ?>>
            <header>
                <?php the_title('<h1 class="title">', '</h1>'); ?>
            </header>
            <ul class="widget_archive">
            <?php
$sticky = get_option( 'sticky_posts' );
$day_check = '';
$args = array('posts_per_page' => 656, 'post__not_in' => $sticky );
query_posts($args);
while (have_posts()) : the_post();
  $day = get_the_date('m');
  if ($day != $day_check) {
    if ($day_check != '') {
      echo '</ul></li>'; 
    }
    echo '<li>'. get_the_date('F Y') . '<ul>';
  }
?>
            <li><a href="<?php the_permalink() ?>"><?php echo get_the_date(); ?>
            - <i><?php the_title(); ?></i></a></li>
            <?php
            $day_check = $day;
            endwhile;
            ?>
            </ul>
        </article>
        <?php comments_template(); ?>
        <?php  endif; ?>
    </div>
    
<aside class="four columns sidebar">  
<ul class="widget">	
<?php wp_list_categories('orderby=name&title_li=<h2 class="widgettitle">' . __('Categories', 'swiss') . '</h2>'); ?> 
</ul>
</aside>
<aside class="four columns sidebar">
<ul <?php post_class(' widget') ?>>
<li><?php the_widget( 'WP_Widget_Tag_Cloud'); ?></li>
</ul>
</aside>
</section>
<?php get_footer(); ?>