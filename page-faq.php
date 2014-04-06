<?php
/**
 * Template name: FAQ Page Template 
 * The template for displaying faq pages.
 */

get_header(); ?>
<div class="container page clearfix">
	<div class="faq-title"></div>
	<div class="faq-left">
		<div class="faq-list">
		  <?php $wp_query_faq = new WP_Query(); ?>
          <?php $wp_query_faq->query('post_type=faq&posts_per_page=9999&post_status=publish'); ?>
          <?php if ( $wp_query_faq->have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( $wp_query_faq->have_posts() ) : $wp_query_faq->the_post(); ?>
			<div class="faq-item clearfix">				
				<div class="faq-text">	
					<h6><?php the_title();?></h6>				
					<p><?php the_content();?></p>
				</div>
			</div>
			<div class="faq-divider"></div>
		  <?php endwhile;endif;?>
		</div>		
	</div>	
</div>
<?php get_footer();?>