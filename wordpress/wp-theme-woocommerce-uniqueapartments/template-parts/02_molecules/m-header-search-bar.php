<form method="get" action="/" class="header--search-bar">
    <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e('Search...', 'ua'); ?>">
    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-search.svg" alt="<?php _e('Search', 'ua'); ?>">
</form>