<?php
/**
 * Template name: Our Story Page Template 
 * The template for displaying Our Story.
 */
?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="story"></div>
<div style="margin-top:53px;">
	<p> <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
    <img class='no-box centered' style="float:right;"src="<?php echo $url;?>"></img>
    <?php the_content();?>
	</p>
</div>
<?php endwhile;?>
