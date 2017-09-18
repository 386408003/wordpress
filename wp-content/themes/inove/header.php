<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	global $inove_nosidebar;
	$options = get_option('inove_options');
	if (is_home()) {
		$home_menu = 'current_page_item';
	} else {
		$home_menu = 'page_item';
	}
	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_bloginfo('rss2_url');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title><?php
	// 如果是首页和文章列表页面, 显示博客标题
	if(is_front_page() || is_home()) { 
		bloginfo('name');
 
	// 如果是文章详细页面和独立页面, 显示文章标题
	} else if(is_single() || is_page()) {
		wp_title('');echo ' | ';bloginfo('name');
 
	// 如果是类目页面, 显示类目表述
	} else if(is_category()) {
		printf('%1$s 类目的文章存档', single_cat_title('', false));
 
	// 如果是搜索页面, 显示搜索表述
	} else if(is_search()) {
		printf('%1$s 的搜索结果', wp_specialchars($s, 1));
 
	// 如果是标签页面, 显示标签表述
	} else if(is_tag()) {
		printf('%1$s 标签的文章存档', single_tag_title('', false));
 
	// 如果是日期页面, 显示日期范围描述
	} else if(is_date()) {
		$title = '';
		if(is_day()) {
			$title = get_the_time('Y年n月j日');
		} else if(is_year()) {
			$title = get_the_time('Y年');
		} else {
			$title = get_the_time('Y年n月');
		}
		printf('%1$s的文章存档', $title);
 
	// 其他页面显示博客标题
	} else {
		bloginfo('name');
	}
	?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts', 'inove'); ?>" href="<?php echo $feed; ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all comments', 'inove'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- style START -->
	<!-- default style -->
	<style type="text/css" media="screen">@import url( <?php bloginfo('stylesheet_url'); ?> );</style>
	<!-- for translations -->
	<?php if (strtoupper(get_locale()) == 'ZH_CN' || strtoupper(get_locale()) == 'ZH_TW') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/chinese.css" type="text/css" media="screen" />
	<?php elseif (strtoupper(get_locale()) == 'HE_IL' || strtoupper(get_locale()) == 'FA_IR' || strtoupper(get_locale()) == 'UG_CN' || strtoupper(get_locale()) == 'CKB') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/rtl.css" type="text/css" media="screen" />
	<?php endif; ?>
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" />
	<![endif]-->
	<!-- style END -->

	<!-- script START -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/base.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.SuperSlide.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/commenttips.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery.lazyload.js"></script>
	<script type="text/javascript">
	$(function() {
		$(".i_img img,.content img").lazyload({
			placeholder : "<?php bloginfo('template_directory');?>/img/grey.gif",
			effect : "fadeIn"
		});
	});
	</script>
	<!-- script END -->

	<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body>
<!-- wrap START -->
<div id="wrap">

<!-- container START -->
<div id="container" <?php if($options['nosidebar'] || $inove_nosidebar){echo 'class="one-column"';} ?> >

<?php include('templates/header.php'); ?>

<!-- content START -->
<div id="content">

	<!-- main START -->
	<div id="main">
