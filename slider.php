			<?php   

          global $post;         
          if ( metadata_exists( 'post', $post->ID, '_post_image_gallery' ) ) {
            $page_image_gallery = get_post_meta( $post->ID, '_post_image_gallery', true );
          } else {
            // Backwards compat
            $attachment_ids = array_filter( array_diff( get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' ), array( get_post_thumbnail_id() ) ) );
            $page_image_gallery = implode( ',', $attachment_ids );
          }
                
          $attachments = array_filter( explode( ',', $page_image_gallery ) );
          $thumbs = array();
          if ( $attachments ) { ?>
          <div class="slidewrap2" data-autorotate="4000">
			<ul class="slider">
				<?php foreach ( $attachments as $attachment_id ) { ?>
                <?php $gallery_image_src = wp_get_attachment_image_src( $attachment_id, 'full' ); ?>
                <?php $gallery_image_thumb = wp_get_attachment_image_src( $attachment_id, 'slider-container' ); ?>
                <?php $attachment = get_post( $attachment_id ); ?>
                <?php $attachment_caption=$attachment->post_excerpt;?>
                <?php $attachment_description=$attachment->post_content;?>
                <?php $attachment_alt=get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );?>
                <?php $attachment_title = apply_filters( 'the_title', $attachment->post_title ); ?>
                <?php $attachment_permalink=get_permalink( $attachment_id )?>
				<li class="slide">	
					<img src="<?php echo $gallery_image_src[0]; ?>" title="<?php echo $attachment_alt; ?>" alt="<?php echo $attachment_alt; ?>">
				</li>
				<?php } ?>				
			</ul>
			</div>
			<?php } ?>