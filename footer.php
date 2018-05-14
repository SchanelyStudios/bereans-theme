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
    		Copyright &copy; 2018 by Bereans at the Gate. <br /> All rights reserved. <br /> Suggested readings powered by <a href="http://newsapi.org">NewsAPI.org</a>.
    	</p>
      <p class="footer__sponsorship">
        sponsored by <i class="cu-logo">Cedarville University</i>
      </p>
      <ul class="footer__social-media-links">
    		<li><a href="#"><i class="icon icon--twitter icon--lg"></i></a></li>
    		<li><a href="#"><i class="icon icon--facebook icon--lg"></i></a></li>
    	</ul>
    </footer>
    <?php wp_footer(); ?>
    <script type="text/javascript" src="/wp-content/themes/bereans-theme/toolkit/dist/assets/toolkit/scripts/toolkit.js"></script>
  </body>
</html>
