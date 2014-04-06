<?php
/**
 * Define the custom box for posts.
 */
 
$prefix = 'mega_';
 
$meta_box_post_video = array(
	'id' => 'mega-meta-box-post-video',
	'title' =>  __( 'Video Settings', 'mega' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(		
		array( 	"desc" => __( 'Video sharing website:', 'mega' ),
				"type" => "info"
		),
		array(
				'name' => __( 'YouTube or Vimeo URL', 'mega' ),
				'desc' => __( 'Enter the YouTube or Vimeo URL here. <br/> http://www.youtube.com/watch?v=VIDEO_ID <br/>or<br/> http://vimeo.com/VIDEO_ID', 'mega' ),
				'id' => $prefix.'youtube_vimeo_url',
				'type' => 'text',
				'std' => ''
		),
		array(
				'name' => __( 'Embed Code', 'mega' ),
				'desc' => __( 'If you are using other video sharing website, paste the embed code here', 'mega' ),
				'id' => $prefix . 'video_embed_code',
				'type' => 'textarea',
				'std' => ''
		),
		array(	"desc" => __( 'Aspect Ratio (default 16:9):', 'mega' ),
				"type" => "info"
		),
		array(
			'name' => __( 'Video Width', 'mega' ),
			'desc' => __("Enter the video's width", 'mega'),
			'id' => $prefix . 'video_ratio_width',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Video Height', 'mega' ),
			'desc' => __( "Enter the video's height", 'mega' ),
			'id' => $prefix . 'video_ratio_height',
			'type' => 'text',
			'std' => ''
		),
	)	
);

/**
 * Adds a box.
 */

add_action('add_meta_boxes', 'mega_add_box_post');

function mega_add_box_post() {
	global $meta_box_post_video;
	add_meta_box($meta_box_post_video['id'], $meta_box_post_video['title'], 'mega_show_box_post_video', $meta_box_post_video['page'], $meta_box_post_video['context'], $meta_box_post_video['priority']);
}


function mega_show_box_post_video() {
	global $meta_box_post_video, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__( 'These settings enable you to add video to your post. YYou have the choice between YouTube, Vimeo or any other video sharing websites.', 'mega' ).'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="mega_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table mega-custom-table">';
 
	foreach ($meta_box_post_video['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
			
		switch ($field['type']) {
			
			//If Info
			case 'info':
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%;"><span style="display:inline-block;margin:5px 0;font-weight:bold;text-transform:uppercase;border-bottom:1px solid #666;">'. $field['desc'].'<strong></th>',
					'<td></td></tr>';
			break;
		 
			//If Text
			case 'text':
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;
			 
			//If Textarea
			case 'textarea':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;
			
		}

	}
 
	echo '</table>';
}


/**
 * Save data from meta box.
 */
add_action( 'save_post', 'mega_save_data_post' );
 
function mega_save_data_post($post_id) {
	global $meta_box_post,$meta_box_post_gallery, $meta_box_post_video;
 
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
		$attachment_ids = array_filter( explode( ',', mega_clean( $_POST['post_image_gallery'] ) ) );
		update_post_meta( $post_id, '_post_image_gallery', implode( ',', $attachment_ids ) );
		
		foreach ($meta_box_post_video['fields'] as $field) {
			if(isset($field['id'])){
				$old = get_post_meta($post_id, $field['id'], true);
				$new = $_POST[$field['id']];
		 
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
			}
		}	
	}
}