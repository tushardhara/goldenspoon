<?php
/**
 * The template for displaying Single press page.
 *
 * @package Wordpress
 * @subpackage gs
 * @since gs 1.0
 */
get_header();?>
<?php 
while (have_posts()) : the_post();
?>

<div class="container page clearfix">
	<div class="presslt" id="tus"><a href="<?php echo site_url('/press-view/');?>"><img src="<?php echo THEMEROOT?>/images/goback.jpg" ></a></div>
	<h1  style="width:100%;float:left;font-family:happy_sans;"><?php the_title();?></h1>
	<h4 style="width:100%;font-family:happy_sans;"><?php  the_date('m-d-Y');echo " | "; _e('By','gs'); echo " : "; the_author();   ?></h4>	
	<p>
		<div style="width:250px; height:150px; float:right">
			<?php get_template_part('slider-press');?>
		</div>		
		<?php   
			$myExcerpt = get_the_content();
		  $tags = array("<p>", "</p>");
		  $myExcerpt = str_replace($tags, "", $myExcerpt);
		  echo $myExcerpt;
		?>
	</p>
</div>
<?php
endwhile;
get_footer();
?>
