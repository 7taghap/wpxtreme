<footer id="footer">
	<div class="container">
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) :
		?>
		<div class="eight columns">
			<ul class="widget">
				<?php dynamic_sidebar('first-footer-widget-area');?>
			</ul>
		</div>
		<?php  endif?>
		<?php	if ( is_active_sidebar( 'second-footer-widget-area' ) ) :
		?>
		<div class="eight columns alignright">
			<ul class="widget">
				<?php dynamic_sidebar('second-footer-widget-area');?>
			</ul>
		</div>
		<?php  endif?>

		<ul id="footermenu" class="sixteen columns">
			<li>
				<?php wp_register('', ', ');?>
			</li>
			<li>
				<?php wp_loginout();?>,
			</li>
			<li>
				<a href="<?php echo esc_url(__('http://wordpress.org/', 'matisse'));?>" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'matisse');?>"><abbr title="WordPress">WP</abbr></a>,
			</li>
			<li>
				<?php _e('Theme design by', 'matisse');?> <a href="<?php echo esc_url('http://blankcanvas.eu/');?>">Blank Canvas</a> 
			</li>
			<?php wp_meta();?>
		</ul>
	</div>
</footer>
<?php wp_footer();?>
</body>
</html>