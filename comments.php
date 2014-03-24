<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentythirteen' ),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 74,
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'twentythirteen' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentythirteen' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>


    <?php if (post_is_in_descendant_category(6)) : ?>
        <h4>Do not post plugin support questions here</h4>

        <p>If you have a support question for one of my WordPress plugins, <strong>please do not post your question here</strong>. Post your question to the plugin support forum at wordpress.org:</p>

        <ul>
            <li><a href="http://wordpress.org/support/plugin/shashin">Support for Shashin</a></li>
            <li><a href="http://wordpress.org/support/plugin/extensible-html-editor-buttons">Support for Extensible HTML Editor Buttons</a></li>
            <li><a href="http://wordpress.org/support/plugin/post-to-post-links-ii">Support for Post-to-Post Links II</a></li>
            <li><a href="http://wordpress.org/support/plugin/deko-boko-a-recaptcha-contact-form-plugin">Support for Deko Boko</a></li>
            <li><a href="http://wordpress.org/support/plugin/simpletest-for-wordpress">Support for SimpleTest for WordPress</a></li>
            <li><a href="http://wordpress.org/support/plugin/toppa-plugin-libraries-for-wordpress">Support for Toppa Plugin Libraries for WordPress</a></li>
        </ul>
    <?php endif; ?>

    <?php comment_form(); ?>

</div><!-- #comments -->
