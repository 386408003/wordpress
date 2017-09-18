<!-- header START -->
<div id="header">

	<!-- banner START -->
	<?php if( $options['banner_content'] && (
		($options['banner_registered'] && $user_ID) || 
		($options['banner_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
		($options['banner_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
	) ) : ?>
		<div class="banner">
			<?php echo($options['banner_content']); ?>
		</div>
	<?php endif; ?>
	<!-- banner END -->

	<div id="caption">
		<h2 id="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h2>
		<h3 id="tagline"><?php bloginfo('description'); ?></h3>
	</div>

	<div class="fixed"></div>
</div>
<!-- header END -->

<!-- navigation START -->
<div id="navigation">
	<!-- menus START -->
	<ul id="menus">
		<li class="<?php echo($home_menu); ?>"><a class="home" title="<?php _e('Home', 'inove'); ?>" href="<?php echo get_settings('home'); ?>/"><?php _e('Home', 'inove'); ?></a></li>
		<?php
			 wp_nav_menu(array(
				'theme_location'=>'header-menu',//填写需要显示的菜单  这是是header的菜单
				//还可以做其他设置这里选择默认
			 ));
		?>
		<li><a class="lastmenu" href="javascript:void(0);"></a></li>
	</ul>
	<!-- menus END -->
	
	<div class="fixed"></div>
</div>
<!-- navigation END -->
