<?php get_header(); ?>
<main class="main">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <h2><?php the_title(); ?>
      <?php the_content();?>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
