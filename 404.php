<?php get_header(); ?>

<div id="content" class="clearfix">
    <div id="article-container">
        <div class="article">
            <h2>Error 404 - Not Found</h2>
            <div class="article-content">
                <?php if (method_exists('ShashinWp', 'display')) {
                    echo ShashinWp::display(array(
                        'type'=>'photo',
                        'id'=>287,
                        'size'=>'large',
                        'caption'=>'y',
                        'position'=>'right'
                    ));
                } ?>

                <p>You don't always need a reason to be mad at the world, but not
    finding the page you want is a start.</p>

                <p>What you seek has probably moved - there's a good chance you
    can find it by trying the search form on your right.</p>
            </div>
        </div>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
