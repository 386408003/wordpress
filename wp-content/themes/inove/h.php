 <div id="rbox">
	<div id="focusBox" class="focusBox">
		<div class="hd">
			<ul><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li></ul>
		</div>
		<div class="bd">
			<ul>		 
			<?php $recent = new WP_Query('meta_key=hot&orderby=date&order=DESC=rand&showposts=5&caller_get_posts=5'); while($recent->have_posts()) : $recent->the_post();?>
				<li>
					<div class="pic"><img src="<?php $values = get_post_custom_values("image_thumb"); echo $values[0]; ?>" alt="<?php echo mb_strimwidth(get_the_title(), 0, 44,"…") ?>" width="300" height="220"/></div>
					<div class="con">    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></div>
				</li>
				  <?php endwhile; ?>
				
			</ul>
		</div>
	</div>
	<script type="text/javascript">$(".focusBox").slide( { mainCell:".bd ul",autoPlay:true, delayTime:0, trigger:"click"} );</script>

<div id="tou">
  <?php $recent = new WP_Query('meta_key=tou&orderby=rand&showposts=1&caller_get_posts=1'); while($recent->have_posts()) : $recent->the_post();?>		
    <dl>
      <dt><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"  target="_blank" ><?php the_title(); ?></a></dt>
      <dd><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 180,"...","utf8");?>
		   <a href="<?php the_permalink() ?>" target="_blank" >[详细]</a></dd>
	</dl>

  <?php endwhile; ?>
 </div>

<div id="hot2">
<ol>
  <?php $recent = new WP_Query('meta_key=hot2&orderby=date&order=DESC=rand&showposts=6&caller_get_posts=6'); while($recent->have_posts()) : $recent->the_post();?>		
		  <li>[推荐] <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" target="_blank" ><?php the_title(); ?></a></li> 
 <?php endwhile; ?>
</ol>
</div>
</div><!--rbox-->