<?php
/**
 * Template name: Contact Page Template 
 * The template for displaying Contact pages.
 */

get_header(); ?>
<?php /* The loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="container page clearfix">
	<div class="contact-title"></div>
	<div class="contact-body clearfix">
		<div class="contact-body-left">
			<h1>Find Us</h1>
			<ul>
				<li>Aljazeera Petrol Station- on Salwa Road</li>
				<li>Al Hadiqa Petrol Station- Al Rayyan across from Hyatt Plaza Mall</li>
				<li>Souq Al Ittihad- next to Gharafa Stadium in Gharafa</li>
				<li>The Souq Complex-in Aziziya</li>
				<li>Abu Hamour Petrol Station</li>
			</ul>
			<h4>To send a message to the Golden Spoon Frozen Yogurt Corporate Headquarters, 
please fill out the form below and click the 'submit' button.</h4>
            <div class="contact-form">
           	<?php the_content();?>
                
            </div>
		</div>
		<div class="contact-body-right">
			<div class="tweet-title"><h1>Golden Spoon<span> Tweets</span></h1></div>
			<div class="tweet"><img src="images/spoon.png"><h4>#Dilicious above all else. Get with the #Golden Spoon Menu & stay true to the things that matter #Qatar! pic.twitter.com/GoldenSpoonQ</h4></div>
			<div class="sep"></div>
			<div class="img"><a href="<?php echo ot_get_option( 'facebook_url' );?>" target="_blank"><img src="<?php echo ot_get_option( 'facebook_image' );?>"></a></div>
		</div>
	</div>
</div>
<?php endwhile;?>
<?php get_footer();?>