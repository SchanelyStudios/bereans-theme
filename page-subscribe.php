<?php get_header(); ?>
<main class="main main--page">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <ul class="widget-list">
        <?php dynamic_sidebar( 'subscribe' ); ?>
      </ul>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
