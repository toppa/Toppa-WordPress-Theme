<?php
    $personal_link = get_category_permalink_by_path('personal');
    $technical_link = get_category_permalink_by_path('technical');
    $japan_link = get_category_permalink_by_path('japan-and-travel');

    get_header();
?>
<div id="welcome" class="clearfix">
    <div  id="welcome-left" class="welcome-category">
        <a href="<?php echo $personal_link; ?>"><img class="welcome-image" src="<?php bloginfo('stylesheet_directory'); ?>/images/boys.png" width="280" height="160" alt="Eidan and Kai" /></a>

        <h2><a href="<?php echo $personal_link; ?>">Personal</a> <a href="http://feeds.feedburner.com/NothingButWordsPersonal"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" width="16" height="16" alt="RSS feed for the Personal category" /></a></h2>
        <p><em>Family &amp; Friends</em></p>

        <ul>
            <?php echo get_top_category_posts('3,4,5,9,13,15,16,91,92,93,94,100,107,108,109,110,111,112,113,114,116,119,122'); ?>
            <li><em><a href="<?php echo $personal_link; ?>">More...</a></em></li>
        </ul>
    </div>

    <div id="welcome-middle" class="welcome-category">
        <a href="<?php echo $technical_link; ?>"><img class="welcome-image" src="<?php bloginfo('stylesheet_directory'); ?>/images/biz_card.png" width="280" height="160" alt="Michael Toppa - Web Architect" /></a>

        <h2><a href="<?php echo $technical_link; ?>">Technical</a> <a href="http://feeds.feedburner.com/NothingButWordsTechnical"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" width="16" height="16" alt="RSS feed for the Technical category" /></a></h2>
        <p><em>Agile, Ruby on Rails, PHP, WordPress</em></p>

        <ul>
            <?php echo get_top_category_posts('6,12,89,90,98,105,106,115,121'); ?>
            <li><em><a href="<?php echo $technical_link; ?>">More...</a></em></li>
        </ul>
    </div>

    <div id="welcome-right" class="welcome-category">
        <a href="<?php echo $japan_link; ?>"><img class="welcome-image" src="<?php bloginfo('stylesheet_directory'); ?>/images/kanda-matsuri.png" width="280" height="160" alt="Kanda Masuri 2007" /></a>

        <h2><a href="<?php echo $japan_link; ?>">Japan &amp; Travel</a> <a href="http://feeds.feedburner.com/NothingButWordsJapanAndTravel"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.png" width="16" height="16" alt="RSS feed for the Japan and Travel category" /></a></h2>
        <p><em>Our Adventures</em></p>

        <ul>
            <?php echo get_top_category_posts('7,10,17,20,25,95,96,97,101,102,103,117,118,120'); ?>
            <li><em><a href="<?php echo $japan_link; ?>">More...</a></em></li>
        </ul>
    </div>
</div>

<div id="welcome-footer">
    <h2><a href="/home/">View latest posts in all 3 topics</a> <a href="http://feeds2.feedburner.com/NothingButWords"><img style="border: 0pt none; vertical-align: middle;" src="<?php bloginfo('stylesheet_directory'); ?>/images/feed_blue.png" width="16" height="16" alt="Complete RSS feed" /></a></h2>
</div>

<?php get_footer(); ?>
