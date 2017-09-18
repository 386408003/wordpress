<?php
	$options = get_option('inove_options');

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

<!-- sidebar START -->
<div id="sidebar">

<!-- sidebar north START -->
<?php
if(is_home()) { 
?>
<div id="northsidebar" class="sidebar">
	<!-- feeds -->
	<div class="widget widget_feeds">
		<div class="content">
			<div id="subscribe">
				<a rel="external nofollow" id="feedrss" title="<?php _e('Subscribe to this blog...', 'inove'); ?>" href="<?php echo $feed; ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>', 'inove'); ?></a>
				<?php if($options['feed_readers']) : ?>
					<ul id="feed_readers">
						<li id="google_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('Google', 'inove'); ?>" href="http://fusion.google.com/add?feedurl=<?php echo $feed; ?>"><span><?php _e('Google', 'inove'); ?></span></a></li>
						<li id="youdao_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('Youdao', 'inove'); ?>" href="http://reader.youdao.com/#url=<?php echo $feed; ?>"><span><?php _e('Youdao', 'inove'); ?></span></a></li>
						<li id="xianguo_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('Xian Guo', 'inove'); ?>" href="http://www.xianguo.com/subscribe.php?url=<?php echo $feed; ?>"><span><?php _e('Xian Guo', 'inove'); ?></span></a></li>
						<li id="zhuaxia_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('Zhua Xia', 'inove'); ?>" href="http://www.zhuaxia.com/add_channel.php?url=<?php echo $feed; ?>"><span><?php _e('Zhua Xia', 'inove'); ?></span></a></li>
						<li id="yahoo_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('My Yahoo!', 'inove'); ?>"	href="http://add.my.yahoo.com/rss?url=<?php echo $feed; ?>"><span><?php _e('My Yahoo!', 'inove'); ?></span></a></li>
						<li id="newsgator_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('newsgator', 'inove'); ?>"	href="http://www.newsgator.com/ngs/subscriber/subfext.aspx?url=<?php echo $feed; ?>"><span><?php _e('newsgator', 'inove'); ?></span></a></li>
						<li id="bloglines_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('Bloglines', 'inove'); ?>"	href="http://www.bloglines.com/sub/<?php echo $feed; ?>"><span><?php _e('Bloglines', 'inove'); ?></span></a></li>
						<li id="inezha_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', 'inove'); _e('iNezha', 'inove'); ?>"	href="http://inezha.com/add?url=<?php echo $feed; ?>"><span><?php _e('iNezha', 'inove'); ?></span></a></li>
					</ul>
				<?php endif; ?>
			</div>
			<?php if($options['feed_email'] && $options['feed_url_email']) : ?>
				<a rel="external nofollow" id="feedemail" title="<?php _e('Subscribe to this blog via email...', 'inove'); ?>" href="<?php echo $options['feed_url_email']; ?>"><?php _e('Email feed', 'inove'); ?></a>
			<?php endif; if($options['twitter'] && $options['twitter_username']) : ?>
				<a id="followme" title="<?php _e('Follow me!', 'inove'); ?>" href="<?php echo $options['twitter_username']; ?>/"><?php _e('Twitter', 'inove'); ?></a>
			<?php endif; ?>
			<div class="fixed"></div>
		</div>
	</div>

	<!-- showcase -->
	<?php if( $options['showcase_content'] && (
		($options['showcase_registered'] && $user_ID) || 
		($options['showcase_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
		($options['showcase_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
	) ) : ?>
		<div class="widget">
			<?php if($options['showcase_caption']) : ?>
				<h3><?php if($options['showcase_title']){echo($options['showcase_title']);}else{_e('Showcase', 'inove');} ?></h3>
			<?php endif; ?>
			<div class="content">
				<?php echo($options['showcase_content']); ?>
			</div>
		</div>
	<?php endif; ?>

	<!-- searchbox START -->
	<div id="searchbox">
		<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
			<!--
			<form action="http://www.google.com/cse" method="get">
				<div class="content">
					<input type="text" class="textfield" name="q" size="24" />
					<input type="submit" class="button" name="sa" value="" />
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="ie" value="UTF-8" />
				</div>
			</form>
			-->
			<form action="<?php bloginfo('wpurl') ?>/search" id="cse-search-box">
				<div class="content">
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="cof" value="FORID:11" />
					<input type="hidden" name="ie" value="UTF-8" />
					<input type="text" class="textfield" id="searchtxt" name="q" size="24" />
					<input type="submit" class="button" id="searchbtn" name="sa" value="" />
				</div>
			</form>
		<?php else : ?>
			<form action="<?php bloginfo('home'); ?>" method="get">
				<div class="content">
					<input type="text" class="textfield" name="s" size="24" value="<?php echo wp_specialchars($s, 1); ?>" />
					<input type="submit" class="button" value="" />
				</div>
			</form>
		<?php endif; ?>
		<!--手气不错-->
		<?php $rand_post=get_posts('numberposts=1&orderby=rand'); foreach($rand_post as $post) : ?>
			<strong class="srand"><a title="手气不错" href="<?php the_permalink(); ?>">手气不错</a></strong>
		<?php endforeach; ?>
	</div>
<script type="text/javascript">
//<![CDATA[
	var searchbox = MGJS.$("searchbox");
	var searchtxt = MGJS.getElementsByClassName("textfield", "input", searchbox)[0];
	var searchbtn = MGJS.getElementsByClassName("button", "input", searchbox)[0];
	var tiptext = "<?php _e('Type text to search here...', 'inove'); ?>";
	if(searchtxt.value == "" || searchtxt.value == tiptext) {
		searchtxt.className += " searchtip";
		searchtxt.value = tiptext;
	}
	searchtxt.onfocus = function(e) {
		if(searchtxt.value == tiptext) {
			searchtxt.value = "";
			searchtxt.className = searchtxt.className.replace(" searchtip", "");
		}
	}
	searchtxt.onblur = function(e) {
		if(searchtxt.value == "") {
			searchtxt.className += " searchtip";
			searchtxt.value = tiptext;
		}
	}
	searchbtn.onclick = function(e) {
		if(searchtxt.value == "" || searchtxt.value == tiptext) {
			return false;
		}
	}
//]]>
</script>
	<!-- searchbox END -->
	<!-- posts -->
	<?php
		if (is_single()) {
			$posts_widget_title = '近期文章';
		} else {
			$posts_widget_title = '随机文章';
		}
	?>

	<div class="widget">
		<h3><?php echo $posts_widget_title; ?></h3>
		<ul>
			<?php
				if (is_single()) {
					$posts = get_posts('numberposts=5&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=5&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
		</ul>
	</div>
	
	<div class="widget">
		<h3>热门文章</h3>
		<ul>
			<?php
				$posts = get_most_viewed('post',5);

				if(is_array($posts) && !emptyempty($posts)){
					foreach($posts as $post) {
						setup_postdata($post);
						echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
					}
					$post = $posts[0];
				}
			?>
		</ul>
	</div>
	<!-- recent comments -->
	<?php if( function_exists('wp_recentcomments') ) : ?>
		<div class="widget">
			<h3>近期评论</h3>
			<ul>
				<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
			</ul>
		</div>
	<?php endif; ?>
	
	<!-- tag cloud -->
	<div id="tag_cloud" class="widget">
		<h3>标签云</h3>
		<?php wp_tag_cloud('smallest=8&largest=22&orderby=count&order=DESC'); ?>
	</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('首页') ) : ?>
	
<?php endif; ?>

	
<div id="centersidebar">
	<!-- sidebar east START -->
	<div id="eastsidebar" class="sidebar">
		<!-- categories -->
		<div class="">
			<h3>文章归档</h3>
			<?php if(function_exists('wp_easyarchives_widget')) : ?>
			<?php wp_easyarchives_widget("mode=none&limit=6"); ?>
		<?php else : ?>
			<ul>
				<?php wp_get_archives('type=monthly&limit=5'); ?>
			</ul>
		<?php endif; ?>
		</div>
	</div>
	<!-- sidebar east END -->

	<!-- sidebar west START -->
	<div id="westsidebar" class="sidebar">
		<!-- blogroll -->
		<div class="">
			<h3>导航菜单</h3>
			<ul>
			<?php
				wp_nav_menu(array(
				'theme_location'=>'sidebar-menu',//填写需要显示的菜单  这是是header的菜单
				//还可以做其他设置这里选择默认
				));
			?>
			</ul>
		</div>
	</div>
	<!-- sidebar west END -->
	<div class="fixed"></div>
</div>	

		<!-- blogroll -->
		<div class="widget widget_links">
			<h3>友情链接</h3>
			<ul>
				<?php wp_list_bookmarks('title_li=&categorize=0&orderby=id'); ?>
			</ul>
		</div>



</div>
<?php } else {?>
<!-- sidebar north END -->


<!-- sidebar south START -->


<div id="southsidebar" class="sidebar">

	<!-- showcase2 -->
	<?php if( $options['showcase2_content'] && (
		($options['showcase2_registered'] && $user_ID) || 
		($options['showcase2_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
		($options['showcase2_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
	) ) : ?>
		<div class="widget">
			<?php if($options['showcase2_caption']) : ?>
				<h3><?php if($options['showcase2_title']){echo($options['showcase2_title']);}else{_e('Showcase2', 'inove');} ?></h3>
			<?php endif; ?>
			<div class="content">
				<?php echo($options['showcase2_content']); ?>
			</div>
		</div>
	<?php endif; ?>


<!-- searchbox START -->
	<div id="searchbox">
		<?php if($options['google_cse'] && $options['google_cse_cx']) : ?>
			<!--
			<form action="http://www.google.com/cse" method="get">
				<div class="content">
					<input type="text" class="textfield" name="q" size="24" />
					<input type="submit" class="button" name="sa" value="" />
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="ie" value="UTF-8" />
				</div>
			</form>
			-->
			<form action="<?php bloginfo('wpurl') ?>/search" id="cse-search-box">
				<div class="content">
					<input type="hidden" name="cx" value="<?php echo $options['google_cse_cx']; ?>" />
					<input type="hidden" name="cof" value="FORID:11" />
					<input type="hidden" name="ie" value="UTF-8" />
					<input type="text" class="textfield" id="searchtxt" name="q" size="24" />
					<input type="submit" class="button" id="searchbtn" name="sa" value="" />
				</div>
			</form>
		<?php else : ?>
			<form action="<?php bloginfo('home'); ?>" method="get">
				<div class="content">
					<input type="text" class="textfield" name="s" size="24" value="<?php echo wp_specialchars($s, 1); ?>" />
					<input type="submit" class="button" value="" />
				</div>
			</form>
		<?php endif; ?>
		<!--手气不错-->
		<?php $rand_post=get_posts('numberposts=1&orderby=rand'); foreach($rand_post as $post) : ?>
			<strong class="srand"><a title="手气不错" href="<?php the_permalink(); ?>">手气不错</a></strong>
		<?php endforeach; ?>
	</div>
<script type="text/javascript">
//<![CDATA[
	var searchbox = MGJS.$("searchbox");
	var searchtxt = MGJS.getElementsByClassName("textfield", "input", searchbox)[0];
	var searchbtn = MGJS.getElementsByClassName("button", "input", searchbox)[0];
	var tiptext = "<?php _e('Type text to search here...', 'inove'); ?>";
	if(searchtxt.value == "" || searchtxt.value == tiptext) {
		searchtxt.className += " searchtip";
		searchtxt.value = tiptext;
	}
	searchtxt.onfocus = function(e) {
		if(searchtxt.value == tiptext) {
			searchtxt.value = "";
			searchtxt.className = searchtxt.className.replace(" searchtip", "");
		}
	}
	searchtxt.onblur = function(e) {
		if(searchtxt.value == "") {
			searchtxt.className += " searchtip";
			searchtxt.value = tiptext;
		}
	}
	searchbtn.onclick = function(e) {
		if(searchtxt.value == "" || searchtxt.value == tiptext) {
			return false;
		}
	}
//]]>
</script>
	<!-- searchbox END -->
<!-- posts -->
	<?php
		if (is_single()) {
			$posts_widget_title = '近期文章';
		} else {
			$posts_widget_title = '随机文章';
		}
	?>
	<div class="widget">
		<h3><?php echo $posts_widget_title; ?></h3>
		<ul>
			<?php
				if (is_single()) {
					$posts = get_posts('numberposts=5&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=5&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
			?>
		</ul>
	</div>
	
	<div class="widget">
		<h3>热门文章</h3>
		<ul>
			<?php
				$posts = get_most_viewed('post',5);

				if(is_array($posts) && !emptyempty($posts)){
					foreach($posts as $post) {
						setup_postdata($post);
						echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
					}
					$post = $posts[0];
				}
			?>
		</ul>
	</div>
	<!-- recent comments -->
	<?php if( function_exists('wp_recentcomments') ) : ?>
		<div class="widget">
			<h3>近期评论</h3>
			<ul>
				<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
			</ul>
		</div>
	<?php endif; ?>
	
	<!-- tag cloud -->
	<div id="tag_cloud" class="widget">
		<h3>标签云</h3>
		<?php wp_tag_cloud('smallest=8&largest=16'); ?>
	</div>



<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('其它页面') ) : ?>

<?php endif; ?>

<div id="centersidebar">
	<!-- sidebar east START -->
	<div id="eastsidebar" class="sidebar">
		<!-- categories -->
		<div class="">
			<h3>文章归档</h3>
			<?php if(function_exists('wp_easyarchives_widget')) : ?>
			<?php wp_easyarchives_widget("mode=none&limit=6"); ?>
		<?php else : ?>
			<ul>
				<?php wp_get_archives('type=monthly&limit=5'); ?>
			</ul>
		<?php endif; ?>
		</div>
	</div>
	<!-- sidebar east END -->

	<!-- sidebar west START -->
	<div id="westsidebar" class="sidebar">
		<!-- blogroll -->
		<div class="">
			<h3>导航菜单</h3>
			<ul>
			<?php
				wp_nav_menu(array(
				'theme_location'=>'sidebar-menu',//填写需要显示的菜单  这是是header的菜单
				//还可以做其他设置这里选择默认
				));
			?>
			</ul>
		</div>
	</div>
	<!-- sidebar west END -->
	<div class="fixed"></div>
</div>	


</div>
<?php } ?>
<!-- sidebar south END -->
</div>
<!-- sidebar END -->
