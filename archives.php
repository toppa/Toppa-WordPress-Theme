<?php get_header(); ?>

<div id="content" class="clearfix">
    <div id="article-container">
        <div class="article">
            <h2>Complete Archives</h2>

            <div class="article-content clearfix">
                <div class="archive">
                    <h3>Archives by Month:</h3>
                    <ul>
                        <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
                    </ul>
                </div>

                <div class="archive">
                    <?php if (function_exists('popular_posts')) {
                        echo '<h3>Popular Posts</h3>';
                        popular_posts('limit=15');
                    } ?>

                    <h3>Archives by Subject:</h3>
                    <ul>
                        <?php wp_list_categories('show_count=1&title_li='); ?>
                    </ul>

                    <h3>Pages</h3>
                    <ul>
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>
