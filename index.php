<?php get_header(); ?>
<div id="content" class="clearfix">
    <div id="article-container">
        <?php if (have_posts()) :
            if ((is_category() && !is_category(array(3,6,92)))
                || is_day()
                || is_month()
                || is_year()) {

                echo '<div class="archive-heading">Archives for: <em>';

                if (is_category() && !is_category(array(3,6,92))) {
                    single_cat_title('');
                }
                elseif (is_day()) {
                    the_time('l, F jS, Y');
                }
                elseif (is_month()) {
                    the_time('F, Y');
                }
                elseif (is_year()) {
                    the_time('Y');
                }

                echo '</em></div>';
            }

            while (have_posts()) : the_post(); ?>

                <div class="article" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php
                        the_permalink()
                        ?>" rel="bookmark"><?php
                            the_title();
                            ?></a></h2>

                    <p class="byline">Posted by <?php
                        the_author();
                        ?> on <?php
                        the_time('F jS, Y')
                        ?> in <em><?php
                            the_category(', ');
                            ?></em>
                    </p>

                    <div class="article-content clearfix">
                        <?php the_content('Read the rest of this entry &raquo;'); ?>
                    </div>

                    <ul class="article-footer">
                        <?php
                            the_tags('<li>Tags: ', ', ', '', '</li>');
                            edit_post_link('Edit', '<li>', '</li>');
                        ?>
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
                <h2>Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>
                <?php include (TEMPLATEPATH . "/searchform.php"); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
