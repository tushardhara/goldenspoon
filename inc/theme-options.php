<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array(
      array(
        'id'          => 'home-page',
        'title'       => 'Home Page'
      ),
      array(
        'id'          => 'about-page',
        'title'       => 'About Page'
      ),  
        array(
        'id'          => 'franchise-page',
        'title'       => 'Franchise Page'
      ), 
        array(
        'id'          => 'contact-page',
        'title'       => 'Contact Page'
      ), 
      array(
        'id'          => 'social',
        'title'       => 'Social Accounts'
      ),      
    ),
    'settings'        => array( 
      array(
        'id'          => 'facebook_name',
        'label'       => 'Facebook Name',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook_url',
        'label'       => 'Facebook Address (URL)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_handler',
        'label'       => 'Twitter Handler',
        'desc'        => '',
        'std'         => 'VoyageTravel',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_url',
        'label'       => 'Twitter Address (URL)',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'twitter_image',
        'label'       => 'Twitter Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'gc_image',
        'label'       => 'Golden Spoon Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'gc_image_text',
        'label'       => 'Golden Spoon Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
        array(
        'id'          => 'flow_image',
        'label'       => 'Flow Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

        array(
        'id'          => 'flow_url',
        'label'       => 'Flow URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'about_left_text',
        'label'       => 'About Left Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'about_left_url',
        'label'       => 'About Left Url',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'about_left_image',
        'label'       => 'About Left Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'about_center_text',
        'label'       => 'About Center Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'about_center_url',
        'label'       => 'About Center Url',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'about_center_image',
        'label'       => 'About Center Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'about_right_text',
        'label'       => 'About Right Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'about_right_url',
        'label'       => 'About Right Url',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'about_right_image',
        'label'       => 'About Right Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'about-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'home_first_heading',
        'label'       => 'Home First Heading',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_first_image',
        'label'       => 'Home First Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_first_text',
        'label'       => 'Home First Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  

      array(
        'id'          => 'home_first_text_url',
        'label'       => 'Home First Text URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'home_sec_heading',
        'label'       => 'Home sec Heading',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),     
      array(
        'id'          => 'home_sec_image',
        'label'       => 'Home sec Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_sec_text',
        'label'       => 'Home Sec Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  

      array(
        'id'          => 'home_sec_text_url',
        'label'       => 'Home Sec Text URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'home_third_heading',
        'label'       => 'Home Third Heading',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'home_third_image',
        'label'       => 'Home Third Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_third_text',
        'label'       => 'Home Third Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),        
      array(
        'id'          => 'home_third_text_url',
        'label'       => 'Home Third Text URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'home_fourth_heading',
        'label'       => 'Home Fourth Heading',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_fourth_image',
        'label'       => 'Home Fourth Image',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'home_fourth_text',
        'label'       => 'Home Fourth Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),

      array(
        'id'          => 'home_fourth_text_url',
        'label'       => 'Home Fourth Text URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'franchise_first_text',
        'label'       => 'Franchise First Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
      array(
        'id'          => 'franchise_first_url',
        'label'       => 'Franchise First URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),    
      array(
        'id'          => 'franchise_second_text',
        'label'       => 'Franchise second Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
      array(
        'id'          => 'franchise_second_url',
        'label'       => 'Franchise second URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'franchise_third_text',
        'label'       => 'Franchise third Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
      array(
        'id'          => 'franchise_third_url',
        'label'       => 'Franchise third URL',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),      
      array(
        'id'          => 'franchise_image',
        'label'       => 'Franchise image',
        'desc'        => 'Franchise be a part image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
       array(
        'id'          => 'franchise_touch_text',
        'label'       => 'Franchise touch text',
        'desc'        => 'Get in touch text',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  

       array(
        'id'          => 'franchise_touch_url',
        'label'       => 'Franchise touch URL',
        'desc'        => 'Get in touch text URL',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'franchise_touch_image',
        'label'       => 'Franchise touch image',
        'desc'        => 'Get in touch image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
       array(
        'id'          => 'franchise_download_text',
        'label'       => 'Franchise download text',
        'desc'        => 'Franchise download kit text',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'franchise_download_image',
        'label'       => 'Franchise download image',
        'desc'        => 'Franchise download kit image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
      array(
        'id'          => 'franchise_download_url',
        'label'       => 'Franchise download url',
        'desc'        => 'Franchise download kit url',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'franchise-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'facebook_image',
        'label'       => 'facebook image',
        'desc'        => 'Facebook image',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'contact-page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}