<div class="search">
    <form method="get" class="search-form" action="<?php bloginfo('url'); ?>">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s">
        <input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.png">
    </form>
</div>
