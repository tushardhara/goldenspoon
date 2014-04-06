<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US" xmlns:og="http://opengraphprotocol.org/schema/" class="no-js"><!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1,user-scalable=no"> 
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/css/style.css'); ?>" type="text/css" media="(min-width:320px)" />
  <?php wp_head();?>
<body> 
<header>
  <div class="container">
    <div class="logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo THEMEROOT?>/images/gs_logo.png"></a>
    </div>
    <div class="subscribe">
      <div class="df"></div>
      <a class="button"></a>
       <div class="maile" style="display:none;">
       <form class="sform" action="" method="post">
          <input type="text" name="email" class="suscribe" placeholder="Email"value="<?php echo esc_attr(stripslashes($_POST['email'])); ?>" />
          <input type="hidden" name="submit" value="Submit" />
       </form>
        </div>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ,'container' => 'nav') ); ?>
  </div>
</header>
