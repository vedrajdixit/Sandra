<?php $search_text = empty($_GET['s']) ? '' : get_search_query(); ?> 
<form method="get" id="searchform" action="<?php echo esc_url( home_url('/')); ?>">
    <input id="s" name="s" type="text" value="<?php echo $search_text;?>" class="text_input" placeholder="<?php _e('Enter Keyword', 'iamd_text_domain'); ?>" />
	<input class="dt-sc-button small" name="submit" type="submit" value="submit" />
</form>