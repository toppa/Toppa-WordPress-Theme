<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar();
}

function is_category_page($category_id) {
    if (is_category($category_id)) {
        return true;

    }
    else if (!is_category()
        && (in_category($category_id)
            || post_is_in_descendant_category($category_id))) {

            return true;
    }

    return false;
}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
function post_is_in_descendant_category( $cats, $_post = null )
{
    foreach ( (array) $cats as $cat ) {
        // get_term_children() accepts integer ID only
        $descendants = get_term_children( (int) $cat, 'category');
        if ( $descendants && in_category( $descendants, $_post ) )
            return true;
    }
    return false;
}

function get_top_category_posts ($taxonomy_ids) {
    global $wpdb;
    $top_3 = '';

    $results = $wpdb->get_results("select distinct ID, post_title, post_date from wp_posts
        inner join wp_term_relationships on ID = object_id
        where term_taxonomy_id in ($taxonomy_ids) and post_type = 'post' and post_status = 'publish'
        order by post_date desc limit 3", ARRAY_A);

    foreach ($results as $result) {
        $top_3 .= "<li>" . date("M d", strtotime($result['post_date'])) . " - "
            . '<a href="' . get_permalink($result['ID']) . '">'
            . $result['post_title'] . "</a></li>\n";
    }

    return $top_3;
}

function get_page_permalink_by_path($path) {
    $permalink = null;

    $page = get_page_by_path(strtolower($path));

    if ($page) {
        $permalink = get_permalink($page->ID);
    }

    return $permalink;
}

function get_category_permalink_by_path($path) {
    $permalink = null;

    $category = get_category_by_path(strtolower($path));

    if ($category) {
        $permalink = get_category_link($category->cat_ID);
    }

    return $permalink;
}

?>
