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
    		<i class="logo logo--white"><?php wp_title(); ?></i>
    	</h1>
    	<p class="header__tagline">
    		Engaging today's political economy <br/> with truth and reason
    	</p>
    	<form class="header__search-form">
    		<input type="text" class="form-control" placeholder="Looking for something?" />
    		<div class="input-group-append">
    			<button class="btn btn-primary" type="button" alt="Search">
            <i class="icon icon--search icon--light icon--sm"></i>
          </button>
    		</div>
    	</form>
    	<nav class="header__nav">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'top',
                'container' => false
            ));
            // TODO: In Appearance > Menus > Screen Options select CSS classes and provide the following:
            // * nav-link__about
            // * nav-link__subscribe
        ?>
    	</nav>
    	<ul class="header__social-media-links">
    		<li><a href="#"><i class="icon icon--twitter icon--light icon--lg"></i></a></li>
    		<li><a href="#"><i class="icon icon--facebook icon--light icon--lg"></i></a></li>
    	</ul>
    </header>
