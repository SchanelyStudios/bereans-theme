    <footer class="footer">
    	<h1 class="footer__logo">
    		<i class="logo">Bereans at the Gate</i>
    	</h1>
    	<nav class="footer__nav">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'bottom',
                'container' => false
            ));
            // TODO: Add the following:
            // * Home
            // * About
            // * Archives
            // * Subscribe
        ?>
    	</nav>
    	<p class="footer__copyright">
    		Copyright &copy; 2018 by Bereans at the Gate. <br /> All rights reserved.
    	</p>
    	<p class="footer__cu-endorse">We proudly endorse <a href="http://cedarville.edu">Cedarville University</a></p>
    	<ul class="footer__social-media-links">
    		<li><a href="#"><i class="icon icon--twitter icon--lg"></i></a></li>
    		<li><a href="#"><i class="icon icon--facebook icon--lg"></i></a></li>
    	</ul>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
