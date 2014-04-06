<?php
/**
 * Define the custom box for posts.
 */
 
$prefix = 'mega_';
 

$meta_box_press_images = array(
	'id' => 'mega-meta-box-press-images',
	'title' =>  __( 'Press Gallery', 'mega' ),
	'page' => 'press',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(  "name" => '',
				"desc" => '',
				"type" => "attachments",
				'std' => ''
			)		
	)
);
/**
 * Adds a box.
 */

add_action('add_meta_boxes', 'mega_add_box_press');

function mega_add_box_press() {
	global $meta_box_press_images;
	add_meta_box($meta_box_press_images['id'], $meta_box_press_images['title'], 'mega_show_box_press_images', $meta_box_press_images['page'], $meta_box_press_images['context'], $meta_box_press_images['priority']);
}


/**
 * Prints the box content.
 */
function mega_show_box_press_images() {
	global $meta_box_press_images, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__( 'These settings enable you to manage the images displayed in the post. Images in the post gallery can be re-ordered easily via drag and drop. Simply re-order your images by moving them around. To remove an image from the post gallery, hover over the image and click on the red &ldquo;x&rdquo;.', 'mega' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="mega_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	?>
	<table class="form-table mega-custom-table">
		<tr style="border-top:1px solid #eeeeee;">
			<td>				
				<div id="gallery_images_container">
					<ul class="gallery_images">
						<?php
							if ( metadata_exists( 'post', $post->ID, '_press_image_gallery' ) ) {
								$post_image_gallery = get_post_meta( $post->ID, '_press_image_gallery', true );
							} else {
								// Backwards compat
								$attachment_ids = array_filter( array_diff( get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' ), array( get_post_thumbnail_id() ) ) );
								$post_image_gallery = implode( ',', $attachment_ids );
							}
							

							$attachments = array_filter( explode( ',', $post_image_gallery ) );
							$thumbs = array();
							if ( $attachments ) {
								foreach ( $attachments as $attachment_id ) {
									echo '<li class="image" data-attachment_id="' . $attachment_id . '">
										' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '
										<ul class="actions">
											<li><a href="#" class="delete" title="' . __( 'Delete image', 'mega' ) . '">' . __( 'Delete', 'mega' ) . '</a></li>
										</ul>
									</li>';
									$thumbs[$attachment_id] = wp_get_attachment_image( $attachment_id, 'thumbnail' );
								}
							}								
						?>
					</ul>
					<input type="hidden" id="press_image_gallery" name="press_image_gallery" value="<?php echo esc_attr( $post_image_gallery ); ?>" />
				</div>
				<p class="add_gallery_images hide-if-no-js">
					<a href="#"><?php _e( 'Add post gallery images', 'mega' ); ?></a>
				</p>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						// Uploading files
						var portfolio_gallery_frame;
						var $image_gallery_ids = $('#press_image_gallery');
						var $portfolio_images = $('#gallery_images_container ul.gallery_images');

						jQuery('.add_gallery_images').on( 'click', 'a', function( event ) {

							var $el = $(this);
							var attachment_ids = $image_gallery_ids.val();

							event.preventDefault();

							// If the media frame already exists, reopen it.
							if ( portfolio_gallery_frame ) {
								portfolio_gallery_frame.open();
								return;
							}

							// Create the media frame.
							portfolio_gallery_frame = wp.media.frames.downloadable_file = wp.media({
								// Set the title of the modal.
								title: '<?php _e( 'Add Images to Post Gallery', 'mega' ); ?>',
								button: {
									text: '<?php _e( 'Add to gallery', 'mega' ); ?>',
								},
								multiple: true
							});

							// When an image is selected, run a callback.
							portfolio_gallery_frame.on( 'select', function() {

								var selection = portfolio_gallery_frame.state().get('selection');

								selection.map( function( attachment ) {

									attachment = attachment.toJSON();

									if ( attachment.id ) {
										attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

										$portfolio_images.append('\
											<li class="image" data-attachment_id="' + attachment.id + '">\
												<img src="' + attachment.sizes.thumbnail.url + '" />\
												<ul class="actions">\
													<li><a href="#" class="delete" title="<?php _e( 'Delete image', 'mega' ); ?>"><?php _e( 'Delete', 'mega' ); ?></a></li>\
												</ul>\
											</li>');
									}

								} );

								$image_gallery_ids.val( attachment_ids );
							});

							// Finally, open the modal.
							portfolio_gallery_frame.open();
						});

						// Image ordering
						$portfolio_images.sortable({
							items: 'li.image',
							cursor: 'move',
							scrollSensitivity:40,
							forcePlaceholderSize: true,
							forceHelperSize: false,
							helper: 'clone',
							opacity: 0.65,
							placeholder: 'wc-metabox-sortable-placeholder',
							start:function(event,ui){
								ui.item.css('background-color','#f6f6f6');
							},
							stop:function(event,ui){
								ui.item.removeAttr('style');
							},
							update: function(event, ui) {
								var attachment_ids = '';

								$('#gallery_images_container ul li.image').css('cursor','move').each(function() {
									var attachment_id = jQuery(this).attr( 'data-attachment_id' );
									attachment_ids = attachment_ids + attachment_id + ',';
								});

								$image_gallery_ids.val( attachment_ids );
							}
						});

						// Remove images
						$('#gallery_images_container').on( 'click', 'a.delete', function() {

							$(this).closest('li.image').remove();

							var attachment_ids = '';

							$('#gallery_images_container ul li.image').css('cursor','move').each(function() {
								var attachment_id = jQuery(this).attr( 'data-attachment_id' );
								attachment_ids = attachment_ids + attachment_id + ',';
							});

							$image_gallery_ids.val( attachment_ids );

							return false;
						} );

					});
				</script>
			</table>
<?php
}

/**
 * Save data from meta box.
 */
add_action( 'save_post', 'mega_save_data_press' );
 
function mega_save_data_press($post_id) {
	global $meta_box_press_images;
 
	if ( isset($_POST['mega_meta_box_nonce'])) {
		// verify nonce
		if (!wp_verify_nonce($_POST['mega_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}
	 
		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
	 
		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		// Saving images from metabox
		$attachment_ids = array_filter( explode( ',', mega_clean( $_POST['press_image_gallery'] ) ) );
		update_post_meta( $post_id, '_press_image_gallery', implode( ',', $attachment_ids ) );
		
		
			
	}
}
?>