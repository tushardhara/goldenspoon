<?php
/**
 * Template name: Franchise Page Template 
 * The template for displaying Franchise pages.
 */

get_header(); ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container page clearfix ">
	<div class="left">
		<h1><?php the_title()?></h1>
		<div class="know">
			<div class="item">
				<div class="divider"></div>
				<div class="text">
					<a class="move" href="#" data-key='0'><?php echo ot_get_option( 'franchise_first_text' );?><div class="arrow current"></div></a>
				</div>
			</div>
			<div class="item">
				<div class="divider"></div>
				<div class="text">
					<a class="move" href="#" data-key='1' ><?php echo ot_get_option( 'franchise_second_text' );?><div class="arrow"></div></a>
				</div>
			</div>
			<div class="item">
				<div class="divider"></div>
				<div class="text">
					<a class="move" href="#" data-key='2' ><?php echo ot_get_option( 'franchise_third_text' );?><div class="arrow"></div></a>
				</div>
			</div>
			<div class="divider"></div>
		</div>
	</div>

	<div class="right">
		<?php get_template_part('slider');?>
	</div>
	<div class="two">
		<div class="item">
			<?php the_content();?>
		</div>
		<div class="item">
			<img src="<?php echo ot_get_option( 'franchise_image' );?>">
		</div>
	</div>
	<div class="two no-border">
		<div class="item">
			<a class="nounder" href="<?php echo site_url(ot_get_option('franchise_touch_url'));?>"><h1 class="colord"><?php echo ot_get_option( 'franchise_touch_text' );?></h1></a>
			<img src="<?php echo ot_get_option( 'franchise_touch_image' );?>">
		</div>
		<div class="item">
			<h1><?php echo ot_get_option( 'franchise_download_text' );?><a href="<?php echo site_url(ot_get_option('franchise_download_url'));?>"></a></h1>
			<img src="<?php echo ot_get_option( 'franchise_download_image' );?>">
		</div>
	</div>
</div>
<?php endwhile;?>
<?php get_footer();?>