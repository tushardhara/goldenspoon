<?php
/**
 * Template name: Menu Page Template 
 * The template for displaying Menu pages.
 */
get_header(); ?>
<div class="container page clearfix">
  <div class="menu-title"></div>
  <div class="menu-sub"></div>
<ul class='timeline'>
	<li class="year"></li>   

          <?php $wp_query_menu = new WP_Query(); ?>
          <?php $wp_query_menu->query('post_type=menu&posts_per_page=9999&post_status=publish'); ?>
          <?php if ( $wp_query_menu->have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( $wp_query_menu->have_posts() ) : $wp_query_menu->the_post(); ?>
    <li class="event ">
      <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
    <img class='no-box centered' src="<?php echo $url;?>"></img>
      <h1><?php the_title();?></h1>
      <p><?php the_content();?></p>
    </li>  
    <?php endwhile;endif;?>  
    <li class="force"></li>
</ul>	
</div>
<?php get_footer();?>