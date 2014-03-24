<?php get_header(); ?>
<div id="content" class="clearfix">
    <div id="article-container" class="search-results">
        <?php if (have_posts()) : ?>

            <h2>Search Results for: <em><?php echo htmlentities($_GET['s']); ?></em></h2>

            <?php while (have_posts()) : the_post(); ?>
                <div class="article">
                    <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    <div class="article-content clearfix">
                        <?php the_excerpt(); ?>
                    </div>
                    <p class="byline">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> </p>

                    <ul class="article-footer">
                        <?php the_tags('<li>Tags: ', ', ', '', '</li>'); ?>
                        <?php edit_post_link('Edit', '<li>', '</li>'); ?>
                        <?php if (function_exists('wp_print')) {
                            echo "<li>";
                            print_link();
                            echo "</li>\n";
                        } ?>
                        <li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
                    </ul>
                </div>
            <?php endwhile; ?>

            <div class="article-nav clearfix">
                <div class="article-nav-left"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
                <div class="article-nav-right"><?php next_posts_link('Older Entries &raquo;') ?></div>
            </div>

        <?php else : ?>
            <div class="article">
                <h2>No posts found. Try a different search?</h2>
                <?php include (TEMPLATEPATH . '/searchform.php'); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
