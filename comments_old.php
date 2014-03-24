<div id="comments-container">
    <?php

    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if (post_password_required()) {
        echo '<p>This post is password protected. Enter the password to view comments.</p>';
        return;
    }

    if (have_comments()) {
        echo '<h3>';
        comments_number('No Comments', 'One Comment', '% Comments' );
        echo '</h3>';
        echo '<ol id="comments">';
        wp_list_comments(array('style' => 'ol'));
        echo '</ol>';
    }

    if (!comments_open()) : ?>
        <p><em>Comments are closed.</em>

        <?php if (post_is_in_descendant_category(6)) : ?>
            <p>If you have a support question for one of my WordPress plugins, please post your question to the plugin support forum at wordpress.org:</p>

            <ul>
                <li><a href="http://wordpress.org/support/plugin/shashin">Support for Shashin</a></li>
                <li><a href="http://wordpress.org/support/plugin/extensible-html-editor-buttons">Support for Extensible HTML Editor Buttons</a></li>
                <li><a href="http://wordpress.org/support/plugin/post-to-post-links-ii">Support for Post-to-Post Links II</a></li>
                <li><a href="http://wordpress.org/support/plugin/deko-boko-a-recaptcha-contact-form-plugin">Support for Deko Boko</a></li>
                <li><a href="http://wordpress.org/support/plugin/simpletest-for-wordpress">Support for SimpleTest for WordPress</a></li>
                <li><a href="http://wordpress.org/support/plugin/toppa-plugin-libraries-for-wordpress">Support for Toppa Plugin Libraries for WordPress</a></li>
            </ul>
        <?php endif; ?>
    <?php endif;

    if ('open' == $post->comment_status) : ?>
        <div id="comment-form-container">
            <h3><?php comment_form_title(); ?></h3>

            <div id="cancel-comment-reply">
                <small><?php cancel_comment_reply_link(); ?></small>
            </div>

            <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

            <?php else : ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
                    <?php comment_id_fields(); ?>

                    <?php if ( $user_ID ) : ?>
                        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">Log out &raquo;</a></p>
                    <?php else : ?>
                        <p>
                            <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                            <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
                        </p>

                        <p>
                            <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                            <label for="email">Email (will not be published) <?php if ($req) echo "(required)"; ?></label>
                        </p>

                        <p>
                            <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
                            <label for="url">Website</label>
                        </p>
                    <?php endif; ?>

                    <!--<p><strong>HTML:</strong> You can use these tags: <code>--><?php //echo allowed_tags(); ?><!--</code></p>-->

                    <p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>
                    <?php do_action('bwp_recaptcha_add_markups'); ?>
                    <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></p>
                    <?php do_action('comment_form', $post->ID); ?>
                </form>
            <?php endif; // If registration required and not logged in ?>
        </div>
    <?php endif; // if comments are open ?>
</div>
