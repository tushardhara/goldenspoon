<?php
/**
 * Template name: Golden Customer Page Template 
 * The template for displaying Golden Customer pages.
 */
?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="gctitle"></div>
<div style="margin-top:53px;">
	<?php the_content()?>
</div>
<?php endwhile;?>
