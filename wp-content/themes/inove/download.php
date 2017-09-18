<?php
/*
Template Name: Download
*/
?>

<?php
	global $inove_nosidebar;
	$inove_nosidebar = true;
?>

<?php get_header(); ?>
<script type="text/javascript">
$(document).ready(function(){
  $(".content#download").click(function(){
  $(this).hide();
  });
});
</script>
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
		<div class="info">
			<span class="comments"> <a href ><?php if(function_exists('the_views')) { the_views(); } ?></a></span>
			<?php edit_post_link(__('Edit', 'inove'), '<span class="editpost">', '</span>'); ?>
			<div class="fixed"></div>
		</div>
		<div class="content">
			<?php the_content(); ?>
			<div class="fixed"></div>
		</div>
	</div>

<?php else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.', 'inove'); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
