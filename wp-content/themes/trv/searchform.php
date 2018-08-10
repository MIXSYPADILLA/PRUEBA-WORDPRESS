<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
    	<input type="text" class="form-control"  name="s" id="s"/ placeholder="<?php esc_attr_e( "Type to search", 'transportex' ); ?>" required>
	</div>
	<button type="submit" class="btn"><?php _e('Search','transportex'); ?></button>
</form>