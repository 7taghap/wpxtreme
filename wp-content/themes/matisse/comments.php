<div <?php  if ( comments_open() ) { ?> id="comments" <?php } ?>>
	<?php if ( post_password_required() ) :
	?>
	<p>
		<?php _e('This post is password protected. Enter the password to view any comments.', 'matisse'); ?>
	</p>
</div>
<?php
return;
endif;
?>
<?php if ( have_comments() ) :
?>
<h3><?php  printf( _nx( 'One thought on &bdquo;%2$s&rdquo;', '%1$s thoughts on &bdquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'matisse' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h3>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
?>
<div class="wp-pagenavi">
	<?php paginate_comments_links(); ?>
</div>
<?php endif; ?>

<ol class="commentlist">
	<?php wp_list_comments( array(
                    'style'       => 'ol',
                    'format'      => 'html5',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                ) ); ?>
</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through?
?>
<div class="wp-pagenavi">
	<?php paginate_comments_links(); ?>
</div>
<?php endif; ?>

<?php else : if ( ! comments_open() ) : ?>
<p class="nocomments">
	<?php _e('Comments are closed.', 'matisse'); ?>
</p>
<?php endif; ?>

<?php endif; ?>

<?php comment_form(); ?>

</div>
