<?php get_header(); ?>
<?php $options = get_option('inove_options'); ?>

<?php if ($options['notice'] && $options['notice_content']) : ?>
<div class="post" id="notice">
	<div class="content">
		公告：<?php echo($options['notice_content']); ?>
		<div class="fixed"></div>
	</div>
</div>
<?php endif; ?>
	
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

	<div id="postpath">
		<a title="<?php _e('Go to homepage', 'inove'); ?>" href="<?php echo get_settings('home'); ?>/"><?php _e('Home', 'inove'); ?></a>
		 &gt; <?php the_category(', '); ?>
		 &gt; <?php the_title(); ?>
	</div>
	
	

	<div class="post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
		<div class="info">
			<span class="date"><?php the_time(__('F jS, Y', 'inove')) ?></span>
			<!-- Baidu Button BEGIN -->
			<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
			<span class="bds_more">分享到：</span>
			<a class="bds_tsina"></a>
			<a class="bds_tqq"></a>
			<a class="bds_qzone"></a>
			<a class="bds_renren"></a>
			<a class="bds_t163"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=621991" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
			</script>
			<!-- Baidu Button END -->
			<?php edit_post_link(__('Edit', 'inove'), '<span class="editpost">', '</span>'); ?>
			<?php if ($comments || comments_open()) : ?>
				<span class="addcomment"><a href="#respond"><?php _e('Leave a comment', 'inove'); ?></a></span>
				<span class="comments"><a href="#comments"><?php _e('Go to comments', 'inove'); ?></a></span>
				<span class="comments"> <a href ><?php if(function_exists('the_views')) { the_views(); } ?></a></span>
			<?php endif; ?>
			<div class="fixed"></div>
		</div>
		
		<div id="enrty_con_ads">
			<?php if( $options['showcase3_content'] && (
				($options['showcase3_registered'] && $user_ID) || 
				($options['showcase3_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
				($options['showcase3_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
			) ) : ?>
			<div id="enrty_con_left">
				<span class="conblockl">
						<?php if($options['showcase3_caption']) : ?>
							<?php if($options['showcase3_title']){echo($options['showcase3_title']);}else{_e('Showcase3', 'inove');} ?>
						<?php endif; ?>
							<?php echo($options['showcase3_content']); ?>
				</span>
			</div>
			<?php endif; ?>
			<?php if( $options['showcase4_content'] && (
				($options['showcase4_registered'] && $user_ID) || 
				($options['showcase4_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
				($options['showcase4_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
			) ) : ?>
			<div id="enrty_con_right">
				<span class="conblockl">
						<?php if($options['showcase4_caption']) : ?>
							<?php if($options['showcase4_title']){echo($options['showcase4_title']);}else{_e('Showcase4', 'inove');} ?>
						<?php endif; ?>
							<?php echo($options['showcase4_content']); ?>
				
				</span>
			</div>
			<?php endif; ?>
		</div>
		
		
		<div class="content">
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => 'Pages: ', 'after' => '', 'next_or_number' => 'number')); ?>
			<div class=banquan>
			<p>本文来源：
			<strong><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></strong>
			[<a href="<?php echo get_settings('home'); ?>"><?php echo get_settings('home'); ?></a>]<br/>
			转载请注明出处：<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_permalink(); ?></a>
			</p>
			</div>
			<div id="ratings">
			<h3>评分支持下:</h3>
			<div id="entry_ratings" >
			<?php if(function_exists('the_ratings')) { the_ratings(); } ?> 
			</div>
			</div>
			<div class="fixed"></div>
		</div>
		<div class="under">
			<?php if ($options['author']) : ?><span class="author"><?php the_author_posts_link(); ?></span><?php endif; ?>
			<?php if ($options['categories']) : ?><span class="categories"><?php _e('Categories: ', 'inove'); ?></span><span><?php the_category(', '); ?></span><?php endif; ?>
			<?php if ($options['tags']) : ?><span class="tags"><?php _e('Tags: ', 'inove'); ?></span><span><?php the_tags('', ', ', ''); ?></span><?php endif; ?>
		</div>
	</div>

	<!-- related posts START -->
	<?php
		// when related posts with title
		if(function_exists('wp23_related_posts')) {
			echo '<div id="related_posts">';
			wp23_related_posts();
			echo '</div>';
			echo '<div class="fixed"></div>';
		}
		/*
		// when related posts without title
		if(function_exists('wp23_related_posts')) {
			echo '<div class="boxcaption">';
			echo '<h3>Related Posts</h3>';
			echo '</div>';
			echo '<div id="related_posts" class="box">';
			wp23_related_posts();
			echo '</div>';
			echo '<div class="fixed"></div>';
		}
		*/
	?>
	<!-- related posts END -->
	<div id="wumiiDisplayDiv"></div>
	<?php include('templates/comments.php'); ?>

	<div id="postnavi">
		<span class="prev"><?php next_post_link('%link') ?></span>
		<span class="next"><?php previous_post_link('%link') ?></span>
		<div class="fixed"></div>
	</div>

<?php else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.', 'inove'); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
