<?php get_header(); ?>
<main class="main">

	<?php if ( have_posts() ) : ?>
	<p class="search__results-label">Results for "<?php echo get_search_query(); ?>"</p>
	<?php else : ?>
	<p class="search__results-label">No matches found.</p>
	<?php endif; ?>

  <?php if (get_query_var('paged') > 1) : ?>
  <?php get_template_part('partials/pagination'); ?>
  <?php endif; ?>

	<?php if ( have_posts() ) : ?>
  <ul class="article-list">
		<?php while ( have_posts() ) : the_post(); ?>
		<li class="article article--short">
			<?php get_template_part('partials/article', 'short'); ?>
    </li>
		<?php endwhile; ?>
	</ul>
  <?php get_template_part('partials/pagination'); ?>
	<?php endif; ?>

</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
