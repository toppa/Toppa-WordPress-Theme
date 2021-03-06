<?php get_header(); ?>

<div id="content" class="clearfix">
    <div id="article-container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="article-nav article-nav-single clearfix">
                <div class="article-nav-left"><?php previous_post_link('&laquo; %link') ?></div>
                <div class="article-nav-right"><?php next_post_link('%link &raquo;') ?></div>
            </div>

            <div class="article" id="post-<?php the_ID(); ?>">
                <h2><?php the_title(); ?></h2>

                <p class="byline">Posted by <?php
                    the_author();
                    ?> on <?php
                    the_time('F jS, Y')
                    ?> in <em><?php
                        the_category(', ');
                        ?></em>
                </p>

                <div class="article-content">
                    <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                </div>

                <?php wp_link_pages(array(
                    'before' => '<p><strong>Pages:</strong> ',
                    'after' => '</p>',
                    'next_or_number' => 'number'));
                ?>

                <ul class="article-footer">
                    <?php
                        the_tags('<li>Tags: ', ', ', '', '</li>');
                        edit_post_link('Edit', '<li>', '</li>');
                    ?>
                    <li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
                </ul>

                <?php if (function_exists('related_posts')) {
                    related_posts();
                } ?>
            </div>

            <?php comments_template(); ?>

        <?php endwhile; else: ?>
            <div class="article">
                <p>Sorry, no posts matched your criteria.</p>
            </div>
        <?php endif; ?>

    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
