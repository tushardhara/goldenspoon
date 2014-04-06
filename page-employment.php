<?php
/**
 * Template name: Employment Page Template 
 * The template for displaying Employment form.
 */
?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="employment"></div>
<div style="margin-top:53px;">	
<div class="employment-form">
	<h1 style="font-family:'happy_sans';">Get in touch</h1>
<?php the_content();?>
</div>
</div>
<?php endwhile;?>
<?php get_footer();?>