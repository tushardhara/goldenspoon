<?php
/**
 * Template name: Health Page Template 
 * The template for displaying Health pages.
 */

get_header(); ?>
<div class="container page clearfix">
	<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="health-title"></div>
	<div class="health-subhead"><?php the_title();?></div>
	<div class="health-expl"><?php the_content()?>
</div>
<?php endwhile;?>

	<div class="health-left">
		<div class="subheading">
			<img src="<?php echo THEMEROOT?>/images/noflavor.png">
		</div>	
		</div>	
	<div class="health-right">
		<div class="subheading">
			<img src="<?php echo THEMEROOT?>/images/flavor.png">
		</div>				
	</div>
</div>
<?php get_footer();?>