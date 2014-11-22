	<footer>
		<h4 id="footer-logo">
			<a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		</h4>
		<div class="footer-info">
			<div class="footer-inner clearfix">
				<?php
				$footer_posts = get_pages(array(
					'post_type' => 'footer_posts',
					'sort_column' => 'menu_order',
					'sort_order' => 'asc',
				));
				if(!empty($footer_posts)) {
					foreach($footer_posts as $footer_post) {
						$content = $footer_post->post_content;
						if(empty($content)) {
							// Don't bother with empty page content
							continue;
						}
						$content = apply_filters('the_content', $content);
					?>

						<div class="footer-column">
							<h3><?php echo $footer_post->post_title; ?></h3>
							<?php echo $content; ?>
						</div>

					<?php
					} // Closing div for the footer post foreach loop
				} // Closing div for the empty check
				?>
			</div>
		</div>
		<div class="footer-follow">
			<h3><?php _e('Follow us', 'tge-theme'); ?></h3>
			<ul class="social-media-footer">
				<li class="smf-twitter"><a href="https://twitter.com/TheGiantEye"><?php echo tge_icon('twitter'); ?></a></li>
				<li class="smf-facebook"><a href="https://www.facebook.com/groups/55970517817/"><?php echo tge_icon('facebook'); ?></a></li>
				<li class="smf-gplus"><a href="https://plus.google.com/117519463814497728744/"><?php echo tge_icon('gplus'); ?></a></li>
			</ul>
		</div>
		<p class="footer-copyright">
			<?php printf(__('Copyright &copy; %s The Giant Eye. All article content &copy; of their respective owners.', 'tge-theme'), date('Y')); ?>
		</p>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
