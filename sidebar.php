<div id="sidebar-container">
    <div id="sidebar">
        <ul id="sidebar-nav">
            <?php $current_cat_set = false; ?>
            <li <?php if (is_home()) {
                    $current_cat_set = true;
                    ?>class="current-cat"<?php
                } ?>>
                <div class="nav-arrow-left"></div>
                <a href="<?php echo get_page_permalink_by_path('home'); ?>">Home (All Topics)</a>
                <div class="nav-rss"><a href="http://feeds.feedburner.com/NothingButWords"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed_blue.png" alt="Complete RSS Feed" /></a></div>
            </li>
            <li <?php if (!$current_cat_set && is_category_page(3)) {
                    $current_cat_set = true;
                    ?>class="current-cat"<?php
                } ?>>
                <div class="nav-arrow-left"></div>
                <a href="<?php echo get_category_link(3); ?>">Personal</a>
                <div class="nav-rss"><a href="http://feeds.feedburner.com/NothingButWordsPersonal"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" alt="RSS feed for the Personal category" /></a></div>
            </li>
            <li <?php if (!$current_cat_set && is_category_page(6)) {
                    $current_cat_set = true;
                    ?>class="current-cat"<?php
                } ?>>
                <div class="nav-arrow-left"></div>
                <a href="<?php echo get_category_link(6); ?>">Technical</a>
                <div class="nav-rss"><a href="http://feeds.feedburner.com/NothingButWordsTechnical"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" alt="RSS feed for the Technical category" /></a></div>
            </li>
            <li <?php if (!$current_cat_set && is_category_page(92)) {
                    $current_cat_set = true;
                    ?>class="current-cat"<?php
                } ?>>
                <div class="nav-arrow-left"></div>
                <a href="<?php echo get_category_link(92); ?>">Japan &amp; Travel</a>
                <div class="nav-rss"><a href="http://feeds.feedburner.com/NothingButWordsNothingButWordsJapanAndTravel"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" alt="RSS feed for the Japan and Travel category" /></a></div>
            </li>
        </ul>

    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

    <div id="sidebar-content">
        <ul>
            <?php if ( function_exists('dynamic_sidebar') ) {
	            dynamic_sidebar();
            } ?>

            <?php if (method_exists('ShashinWp', 'display')) { ?>
                <li>
                <h2>Random Pictures</h2>
                <div>
                <?php
                $shortcode = array(
                    'type' => 'photo',
                    'limit' => 2,
                    'order' => 'random',
                    'size' => 160,
                    'crop' => 'y',
                    'caption' => 'y',
                    'columns' => 1,
                    'position' => 'center'
                );
                echo ShashinWp::display($shortcode);
                ?>
                </div>
                </li>


            <?php }

                if (function_exists('JPV_display_top_posts')) {
                    echo '<h2>Popular Posts <small>(last 100 days)</small></h2>';
                    echo '<li>';
                    JPV_display_top_posts(array(
                        'days' => '100',
                        'limit' => '5',
                        'exclude' => '',
                        'excludeCustomPostTypes' => false,
                        'displayViews' => true
                    ));
                    echo '</li>';
                } ?>

            <li>
                <h2>Flotsam</h2>
                <ul>
                    <li><a href="http://feeds2.feedburner.com/CommentsForNothingButWords" rel="alternate" type="application/rss+xml">Subscribe to Comments</a>
                    <a href="http://feeds2.feedburner.com/CommentsForNothingButWords" rel="alternate" type="application/rss+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" style="vertical-align: middle; border: 0 none;" width="16" height="16" /></a></li>
                    <li><a href="<?php echo get_page_permalink_by_path('toppa-toyoda-wedding'); ?>">Mike &amp; Maria's Wedding</a></li>
                    <li><a href="<?php echo get_page_permalink_by_path('ask-kosh'); ?>">Ask Kosh</a></li>
                    <li><a href="http://toppa.com/route50">Route 50 - California to Pennsylvania - Summer 2003</a></li>
                    <li><a href="<?php echo get_page_permalink_by_path('bc'); ?>">The Big Country Fan Poll</a></li>
                    <li><a href="http://toppa.com/perl">Lecture Notes: CGI Programming with Perl</a></li>
                </ul>
            </li>

            <li>
                <h2>Random Posts</h2>
                <ul>
                    <?php $rand_posts = get_posts('numberposts=5&orderby=rand');
                    foreach ($rand_posts as $post) {
                        echo '<li><a href="';
                        the_permalink();
                        echo '">';
                        the_title();
                        echo ' <span class="random-post-date">(';
                        the_time('M j, Y');
                        echo ")</span></a></li>\n";
                    } ?>
                </ul>
            </li>
        </ul>
    </div>
    </div>
</div>
