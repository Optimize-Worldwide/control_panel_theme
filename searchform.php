<form role="search" method="get" id="searchform" class="searchform" action="<?php esc_url( home_url( '/' ) ); ?>">
	<div>
    <input type="text" placeholder="Search entire site (slow)" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<label class="screen-reader-text" for="s">s</label>
		<input type="submit" style="display: none;" id="searchsubmit" value="<?php esc_attr_x( 'Search', 'submit button' ); ?>" />
	</div>
</form>