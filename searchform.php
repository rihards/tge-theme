<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="clearfix">
    <label class="screen-reader-text" for="s"><?php _e('Search for:', 'tge-theme'); ?></label>
    <div class="search-icon"><?php echo tge_icon('search'); ?></div>
		<input
      type="text"
      value=""
      name="s"
      id="s"
      placeholder="<?php _e('Type here', 'tge-theme'); ?>"
      onfocus="this.placeholder = ''"
      onblur="this.placeholder = '<?php _e('Type here', 'tge-theme'); ?>'"
    />
		<input type="submit" id="searchsubmit" value="<?php _e('Search', 'tge-theme'); ?>" />
	</div>
</form>
