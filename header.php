<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<?php
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head();
?>
</head>
<body>
<div id="page-container">
    <div id="page">
        <div id="masthead" class="clearfix">
            <div id="masthead-title">
                <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
                <div id="subtitle"><?php bloginfo('description'); ?></div>
            </div>
            <div id="masthead-nav">
                <a href="<?php echo get_page_permalink_by_path('about'); ?>">About</a> |
                <a href="<?php echo get_page_permalink_by_path('contact'); ?>">Contact</a> |
                <a href="<?php echo get_page_permalink_by_path('archives'); ?>">Archives</a> |
                <a href="<?php echo get_page_permalink_by_path('photo-albums'); ?>">Photos</a> |
                <a href="<?php echo get_page_permalink_by_path('wordpress-plugins'); ?>">WP Plugins</a>
            </div>
        </div>

