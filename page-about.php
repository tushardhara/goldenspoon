<?php
/**
 * Template name: About Page Template 
 * The template for displaying about pages.
 */

get_header(); ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container page clearfix">
	<div class="left">
		<h1><?php the_title();?></h1>
		<?php the_content();?>
	</div>
<?php endwhile;?>
	<div class="right">
		<?php get_template_part('slider');?>
	</div>
	<div class="three">
		<div class="item">
			<a class="preview" href="<?php echo site_url(ot_get_option('about_left_url'));?>" style="text-decoration:none;" title="<?php echo ot_get_option( 'about_left_text' );?>"><?php echo ot_get_option( 'about_left_text' );?><div class="arrow"></div>
			<img src="<?php echo ot_get_option( 'about_left_image' );?>"></a>	
		</div>
		<div class="item">
			<a class="fancybox" href="#inline1"><?php echo ot_get_option( 'about_center_text' );?><div class="arrow"></div>
			<img src="<?php echo ot_get_option( 'about_center_image' );?>"></a>
			<?php get_template_part('popup-gc');?>
		</div>

		<div class="item">
			<a href="<?php echo site_url(ot_get_option('about_right_url'));?>" title="<?php echo ot_get_option( 'about_right_text' );?>"><?php echo ot_get_option( 'about_right_text' );?><div class="arrow"></div>
			<img src="<?php echo ot_get_option( 'about_right_image' );?>"></a>
		</div>
	</div>
	<div class="full">
		<div class="slidewrap" >
			<ul class="slidecontrols" role="navigation">
				<li role="presentation"><a href="#carousel-1-0" class="moven next current" data-key='0'>Video</a></li>
				<li><a>/</a></li>
				<li role="presentation"><a href="#carousel-1-0" class="moven prev" data-key='1'>Gallery</a></li>
			</ul>
			<ul class="slider" >
				<li class="slide">	
					<div class="vcontainer">
						<ul>
							<?php 
							$temp_post = $post;
							$args = array(
								'post_type' => 'post',
								'showposts'	=> -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'post_format',
	            						'field' => 'slug',
										'terms' => array( 'post-format-video' )
									)
								)
							);
							$wp_query = new WP_Query( $args );
							$number=0;
							while ($wp_query->have_posts()) : $wp_query->the_post(); 
	      					?>
	      					<?php if(get_post_format()=='video') { ?>
							<li>
								<div class="vendor">
								<?php
						        $youtube_vimeo = get_post_meta( $post->ID, 'mega_youtube_vimeo_url', true ); 
						        $embed = get_post_meta( $post->ID, 'mega_video_embed_code', true ); 
						          
						        $ratio_width = get_post_meta( $post->ID, 'mega_video_ratio_width', true );
						        $ratio_height = get_post_meta( $post->ID, 'mega_video_ratio_height', true );
						                          
						        $ratio = '';
						        if ( !empty( $ratio_width ) ) 
						        $ratio = ( (int)$ratio_height / (int)$ratio_width * 100 ) .'%';
						       ?>
						      
						      <?php if ( $youtube_vimeo !='' ) { ?>
						          <?php mega_get_video( $post->ID, 960, 538 ); ?>
						      <?php } else if ( $embed !='' ) { ?>
						          <?php echo stripslashes( htmlspecialchars_decode( $embed ) );?>
						      <?php } ?>
					      	</div>
					      </li>
							<?php } ?>
							<?php endwhile;?>
						</ul>
					</div>
					<div class="list" >
						<?php 
						$temp_post = $post;
						$args = array(
							'post_type' => 'post',
							'showposts'	=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
            						'field' => 'slug',
									'terms' => array( 'post-format-video' )
								)
							)
						);
						$wp_query = new WP_Query( $args );
						$number=0;
						while ($wp_query->have_posts()) : $wp_query->the_post(); 
      					?>
      					<?php if(get_post_format()=='video') { ?>
							<div class="item" data-item="<?php echo $number;?>" data-type="video">
								<div class="divider"></div>
								<div class="thumb">
								    <?php echo get_the_post_thumbnail($post->ID, 'small-list-container'); ?>
								</div>
								<div class="text">
									<h4><?php echo get_the_title();?></h4>
									<p><?php echo substr(get_the_excerpt(), 0,30); ?></p>
									<div class="date"><?php echo get_the_date('M-d');?></div>
								</div>														
							</div>
							<?php if($number==$wp_query->post_count-1) {?>
							<div class="divider"></div>
							<?php } ?>
						<?php } ?>
						<?php $number++;?>
					<?php endwhile;?>
					<?php $post =$temp_post;?>
					</div>
				</li>
				<li class="slide">	
					<div class="gcontainer">
						<ul>
							<?php 
						$temp_post = $post;
						$args = array(
							'post_type' => 'post',
							'showposts'	=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
            						'field' => 'slug',
									'terms' => array( 'post-format-video' ),
									'operator' => 'NOT IN' 
								)
							)
						);
						$wp_query = new WP_Query( $args );
						while ($wp_query->have_posts()) : $wp_query->the_post(); 
      					?>
      					<?php if(get_post_format()!='video') { ?>
							<li><?php echo get_the_post_thumbnail($post->ID,'large') ?></li>
						<?php }?>
						<?php endwhile;?>
						</ul>
					</div>
					<div class="list" >
						<?php 
						$temp_post = $post;
						$args = array(
							'post_type' => 'post',
							'showposts'	=> -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'post_format',
            						'field' => 'slug',
									'terms' => array( 'post-format-video' ),
									'operator' => 'NOT IN' 
								)
							)
						);
						$wp_query = new WP_Query( $args );
						$number=0;
						while ($wp_query->have_posts()) : $wp_query->the_post(); 
      					?>
      					<?php if(get_post_format()!='video') { ?>
						<div class="item" data-item="<?php echo $number;?>" data-type="gallery">
							<div class="divider"></div>
							<div class="thumb">
							    <?php echo get_the_post_thumbnail($post->ID, 'small-list-container'); ?>
							</div>
							<div class="text">
								<h4><?php echo get_the_title();?></h4>
								<p><?php echo substr(get_the_excerpt(), 0,30); ?></p>
								<div class="date"><?php echo get_the_date('M-d');?></div>
							</div>							
						</div>
						<?php if($number==$wp_query->post_count-1) {?>
						<div class="divider"></div>
						<?php } ?>
						<?php } ?>
						<?php $number++;?>
					<?php endwhile;?>
					<?php $post =$temp_post;?>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php get_footer();?>