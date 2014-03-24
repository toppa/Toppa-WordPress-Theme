<?php get_header(); ?>

<div id="content" class="clearfix">
    <div id="article-container">

        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>

                <div class="article article-attachment">
                    <h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
                    <div class="article-content">
                        <p><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
                        <div class="caption">
                            <?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
                        </div>
                     </div>
                </div>

        	<?php endwhile; ?>
            <div class="article-nav article-nav-single clearfix">
                <div class="article-nav-left"><?php previous_image_link(); ?></div>
                <div class="article-nav-right"><?php next_image_link(); ?></div>
            </div>
        <?php else : ?>
            <div class="article">
                <h2>Not Found</h2>
                <div class="article-content">
                    <p>Sorry, no attachments matched your criteria.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
