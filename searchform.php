<!-- <form action="/" method="get">
    <label for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form> -->
<form class="header__search-form" action="/" method="get">
  <label for="search" title="Search this site"></label>
  <input type="text" name="s" id="search" class="form-control"
    placeholder="Looking for something?"
    value="<?php the_search_query(); ?>"
  />
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit" alt="Search">
      <i class="icon icon--search icon--light icon--sm"></i>
    </button>
  </div>
</form>
