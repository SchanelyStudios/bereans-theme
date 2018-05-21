<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="header">
    	<h1 class="header__logo">
        <a href="<?php bloginfo('url'); ?>">
      		<i class="logo logo--white"><?php wp_title(); ?></i>
        </a>
    	</h1>
    	<p class="header__tagline">
    		Engaging today's political economy <br/> with truth and reason
    	</p>
      <p class="header__sponsorship">
        sponsored by <i class="cu-logo cu-logo--white">Cedarville University</i>
      </p>
    	<?php get_search_form(); ?>
    	<nav class="header__navbar">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'top',
                'container' => false
            ));
        ?>
      	<ul class="header__social-media-links">
      		<li><a href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fbereansatthegate.com%2F&screen_name=Bereans_Gate&tw_p=followbutton&variant=2.0"><i class="icon icon--twitter icon--bright icon--lg"></i></a></li>
      		<li><a href="https://www.facebook.com/BereansattheGate"><i class="icon icon--facebook icon--bright icon--lg"></i></a></li>
      	</ul>
    	</nav>
    </header>
