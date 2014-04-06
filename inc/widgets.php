<?php

/**
 * Makes a custom Widget for displaying Recent Twitter Updates available with VoyageTravel
 *
 * @package WordPress
 * @subpackage VoyageTravel
 * @since VoyageTravel 1.0
 */
class footer_link extends WP_Widget {

	function footer_link() {
		$widget_ops = array( 'classname' => 'widget_footer_link', 'description' => __( 'Use this widget to display your footer link.', 'VoyageTravel' ) );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'widget_footer_link' );
		$this->WP_Widget( 'widget_footer_link', __('VoyageTravel Footer Link', 'VoyageTravel'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
 		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('', 'VoyageTravel') : $instance['title'], $instance, $this->id_base);
		$title_1 = empty( $instance['title_1'] ) ? '' : $instance['title_1'];
		$link_1 = empty( $instance['link_1'] ) ? '' : $instance['link_1'];
		$title_2 = empty( $instance['title_2'] ) ? '' : $instance['title_2'];
		$link_2 = empty( $instance['link_2'] ) ? '' : $instance['link_2'];
		$title_3 = empty( $instance['title_3'] ) ? '' : $instance['title_3'];
		$link_3 = empty( $instance['link_3'] ) ? '' : $instance['link_3'];
		$title_4 = empty( $instance['title_4'] ) ? '' : $instance['title_4'];
		$link_4 = empty( $instance['link_4'] ) ? '' : $instance['link_4'];
		$title_5 = empty( $instance['title_5'] ) ? '' : $instance['title_5'];
		$link_5 = empty( $instance['link_5'] ) ? '' : $instance['link_5'];
		
?>
		<?php // Initialize Tweetable Plugin ?>
		<?php echo $before_widget; ?>
		<?php if ( $title) : ?>
		<li class="network-item"><a class="network-link"><?php echo $title?></a><ul class="network-posts">	
		<?php if ( $title_1) : ?>
		<li class="network-post">
            <a href="<?php 
            	if(stristr($link_1, 'http://') == TRUE) { echo $link_1; } 
            	else{ echo 'http://'.$link_1; }
            ?>" title="<?php echo $title_1?>" class="network-post-link"><?php echo $title_1?></a> 
        </li>
    	<?php endif;?>
    	<?php if ( $title_2) : ?>
        <li class="network-post">
            <a href="<?php 
            	if(stristr($link_2, 'http://') == TRUE) { echo $link_2; } 
            	else{ echo 'http://'.$link_2; }
            ?>" title="<?php echo $title_2?>" class="network-post-link"><?php echo $title_2?></a> 
        </li>
        <?php endif;?>
        <?php if ( $title_3) : ?>
        <li class="network-post">
            <a href="<?php 
            	if(stristr($link_3, 'http://') == TRUE) { echo $link_3; } 
            	else{ echo 'http://'.$link_3; }
            ?>" title="<?php echo $title_3?>" class="network-post-link"><?php echo $title_3?></a> 
        </li>
        <?php endif;?>
        <?php if ( $title_4) : ?>
        <li class="network-post">
            <a href="<?php 
            	if(stristr($link_4, 'http://') == TRUE) { echo $link_4; } 
            	else{ echo 'http://'.$link_4; }
            ?>" title="<?php echo $title_4?>" class="network-post-link"><?php echo $title_4?></a> 
        </li>
        <?php endif;?>
        <?php if ( $title_5) : ?>
        <li class="network-post">
            <a href="<?php 
            	if(stristr($link_5, 'http://') == TRUE) { echo $link_5; } 
            	else{ echo 'http://'.$link_5; }
            ?>" title="<?php echo $title_5?>" class="network-post-link"><?php echo $title_5?></a> 
        </li>
        <?php endif;?>
        </ul></li>
    	<?php endif;?>
		<?php echo $after_widget; ?>

<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title_1'] = strip_tags( $new_instance['title_1'] );
		$instance['link_1'] = strip_tags( $new_instance['link_1'] );
		$instance['title_2'] = strip_tags( $new_instance['title_2'] );
		$instance['link_2'] = strip_tags( $new_instance['link_2'] );
		$instance['title_3'] = strip_tags( $new_instance['title_3'] );
		$instance['link_3'] = strip_tags( $new_instance['link_3'] );
		$instance['title_4'] = strip_tags( $new_instance['title_4'] );
		$instance['link_4'] = strip_tags( $new_instance['link_4'] );
		$instance['title_5'] = strip_tags( $new_instance['title_5'] );
		$instance['link_5'] = strip_tags( $new_instance['link_5'] );
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'title_1' => '', 
			'link_1' => '' ,
			'title_2' => '', 
			'link_2' => '' ,
			'title_3' => '', 
			'link_3' => '' ,
			'title_4' => '', 
			'link_4' => '' ,
			'title_5' => '', 
			'link_5' => '' ,
		) );
		$title = esc_attr( $instance['title'] );
		$title_1 = esc_attr( $instance['title_1'] );
		$link_1 = esc_attr( $instance['link_1'] );
		$title_2 = esc_attr( $instance['title_2'] );
		$link_2 = esc_attr( $instance['link_2'] );
		$title_3 = esc_attr( $instance['title_3'] );
		$link_3 = esc_attr( $instance['link_3'] );
		$title_4 = esc_attr( $instance['title_4'] );
		$link_4 = esc_attr( $instance['link_4'] );
		$title_5 = esc_attr( $instance['title_5'] );
		$link_5 = esc_attr( $instance['link_5'] );
		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('title_1'); ?>"><?php _e('Title 1:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_1'); ?>" name="<?php echo $this->get_field_name('title_1'); ?>" type="text" value="<?php echo $title_1; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link_1'); ?>"><?php _e('Link 1:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link_1'); ?>" name="<?php echo $this->get_field_name('link_1'); ?>" type="text" value="<?php echo $link_1; ?>" />
	 	<p><label for="<?php echo $this->get_field_id('title_2'); ?>"><?php _e('Title 2:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" type="text" value="<?php echo $title_2; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link_2'); ?>"><?php _e('Link 2:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link_2'); ?>" name="<?php echo $this->get_field_name('link_2'); ?>" type="text" value="<?php echo $link_2; ?>" />
		<p><label for="<?php echo $this->get_field_id('title_3'); ?>"><?php _e('Title 3:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_3'); ?>" name="<?php echo $this->get_field_name('title_3'); ?>" type="text" value="<?php echo $title_3; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link_3'); ?>"><?php _e('Link 3:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link_3'); ?>" name="<?php echo $this->get_field_name('link_3'); ?>" type="text" value="<?php echo $link_3; ?>" />
		<p><label for="<?php echo $this->get_field_id('title_4'); ?>"><?php _e('Title 4:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_4'); ?>" name="<?php echo $this->get_field_name('title_4'); ?>" type="text" value="<?php echo $title_4; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link_4'); ?>"><?php _e('Link 4:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link_4'); ?>" name="<?php echo $this->get_field_name('link_4'); ?>" type="text" value="<?php echo $link_4; ?>" />
		<p><label for="<?php echo $this->get_field_id('title_5'); ?>"><?php _e('Title 5:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title_5'); ?>" name="<?php echo $this->get_field_name('title_5'); ?>" type="text" value="<?php echo $title_5; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('link_5'); ?>"><?php _e('Link 5:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('link_5'); ?>" name="<?php echo $this->get_field_name('link_5'); ?>" type="text" value="<?php echo $link_5; ?>" />
<?php } 
}

class VMP_Widget extends WP_Widget {
	public function __construct() {
		parent::WP_Widget( 'vmp_widget', 'VoyageTravel Most Popular', array( 'description' => 'Display your most popular blog posts on your sidebar' ) );
	}
	
	public function form( $instance ) {
		$defaults = $this->default_options( $instance );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $defaults['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to show:</label><br />
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $defaults['number']; ?>" size="3">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>">Choose post type:</label><br />
			<select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
				<option value="all">All post types</option>
				<?php
				$post_types = get_post_types( array( 'public' => true ), 'names' );
				foreach ($post_types as $post_type ) {
					// Exclude attachments
					if ( $post_type == 'attachment' ) continue;
					$defaults['post_type'] == $post_type ? $sel = " selected" : $sel = "";
					echo '<option value="' . $post_type . '"' . $sel . '>' . $post_type . '</option>';
				}
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'timeline' ); ?>">Timeline:</label><br />
			<select id="<?php echo $this->get_field_id( 'timeline' ); ?>" name="<?php echo $this->get_field_name( 'timeline' ); ?>">
				<option value="all_time"<?php if ( $defaults['timeline'] == 'all_time' ) echo "selected"; ?>>All time</option>
				<option value="monthly"<?php if ( $defaults['timeline'] == 'monthly' ) echo "selected"; ?>>Past month</option>
				<option value="weekly"<?php if ( $defaults['timeline'] == 'weekly' ) echo "selected"; ?>>Past week</option>
				<option value="daily"<?php if ( $defaults['timeline'] == 'daily' ) echo "selected"; ?>>Today</option>
			</select>
		</p>
		<?php
	}
	
	private function default_options( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
			$options['title'] = esc_attr( $instance[ 'title' ] );
		else
			$options['title'] = 'Popular posts';
			
		if ( isset( $instance[ 'number' ] ) )
			$options['number'] = (int) $instance[ 'number' ];
		else
			$options['number'] = 5;
		
		if ( isset( $instance[ 'post_type' ] ) )
			$options['post_type'] = esc_attr( $instance[ 'post_type' ] );
		else
			$options['post_type'] = 'all';

		if ( isset( $instance[ 'timeline' ] ) )
			$options['timeline'] = esc_attr( $instance[ 'timeline' ] );
		else
			$options['timeline'] = 'all_time';
		
		return $options;
	}
	
	public function update( $new, $old ) {
		$instance = wp_parse_args( $new, $old );
		return $instance;
	}
	
	public function widget( $args, $instance ) {
		// Find default args
		extract( $args );
		
		// Get our posts
		$defaults			= $this->default_options( $instance );
		$options['limit']	= (int) $defaults[ 'number' ];
		$options['range']	= $defaults['timeline'];

		if ( $defaults['post_type'] != 'all' ) {
			$options['post_type'] = $defaults['post_type'];
		}

		$posts = wmp_get_popular( $options );
		echo  '<li class="network-item"><a class="network-link">'.$defaults['title'].'</a><ul class="network-posts">';
		// Display the widget
		echo $before_widget;
		global $post;
		foreach ( $posts as $post ):
			setup_postdata( $post );
			?>
			<li class="network-post"><a class="network-post-link" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
			<?php
		endforeach;
		echo $after_widget;
		echo '</ul></li>';
		// Reset post data
		wp_reset_postdata();
	}
}

class VLP_Widget extends WP_Widget {
	public function __construct() {
		parent::WP_Widget( 'vlp_widget', 'VoyageTravel Latest Article', array( 'description' => 'Display your latest blog posts on your sidebar' ) );
	}
	
	public function form( $instance ) {
		$defaults = $this->default_options( $instance );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $defaults['title']; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to show:</label><br />
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $defaults['number']; ?>" size="3">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>">Choose post type:</label><br />
			<select id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>">
				<option value="all">All post types</option>
				<?php
				$post_types = get_post_types( array( 'public' => true ), 'names' );
				foreach ($post_types as $post_type ) {
					// Exclude attachments
					if ( $post_type == 'attachment' ) continue;
					$defaults['post_type'] == $post_type ? $sel = " selected" : $sel = "";
					echo '<option value="' . $post_type . '"' . $sel . '>' . $post_type . '</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
	
	private function default_options( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
			$options['title'] = esc_attr( $instance[ 'title' ] );
		else
			$options['title'] = 'Latest posts';
			
		if ( isset( $instance[ 'number' ] ) )
			$options['number'] = (int) $instance[ 'number' ];
		else
			$options['number'] = 5;
		
		if ( isset( $instance[ 'post_type' ] ) )
			$options['post_type'] = esc_attr( $instance[ 'post_type' ] );
		else
			$options['post_type'] = 'all';
		
		return $options;
	}
	
	public function update( $new, $old ) {
		$instance = wp_parse_args( $new, $old );
		return $instance;
	}
	
	public function widget( $args, $instance ) {
		// Find default args
		extract( $args );
		
		// Get our posts
		$defaults			= $this->default_options( $instance );
		$options['posts_per_page']	= (int) $defaults[ 'number' ]-1;

		if ( $defaults['post_type'] != 'all' ) {
			$options['post_type'] = $defaults['post_type'];
		}

		$posts = query_posts( $options );;
		echo  '<li class="network-item"><a class="network-link">'.$defaults['title'].'</a><ul class="network-posts">';
		// Display the widget
		echo $before_widget;
		global $post;
		foreach ( $posts as $post ):
			setup_postdata( $post );
			?>
			<li class="network-post"><a class="network-post-link" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
			<?php
		endforeach;
		echo $after_widget;
		echo '</ul></li>';
		// Reset post data
		wp_reset_postdata();
	}
}

class footer_text extends WP_Widget {

	function footer_text() {
		$widget_ops = array( 'classname' => 'widget_footer_text', 'description' => __( 'Use this widget to display your footer text.', 'VoyageTravel' ) );
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'widget_footer_text' );
		$this->WP_Widget( 'widget_footer_text', __('VoyageTravel Footer Text', 'VoyageTravel'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
 		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('', 'VoyageTravel') : $instance['title'], $instance, $this->id_base);
		$text = empty( $instance['text'] ) ? '' : $instance['text'];
		
?>
		<?php // Initialize Tweetable Plugin ?>
		<?php echo $before_widget; ?>
		<?php if ( $title) : ?>
		<li class="network-item"><a class="network-link"><?php echo $title?></a><ul class="network-posts">	
            <?php echo $text?>
        </ul></li>
    	<?php endif;?>
		<?php echo $after_widget; ?>

<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['text'] = strip_tags( $new_instance['text'] );
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'text' => '', 
		) );
		$title = esc_attr( $instance['title'] );
		$text = esc_attr( $instance['text'] );
		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'VoyageTravel'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', 'VoyageTravel'); ?></label> <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></p>
<?php } 
}