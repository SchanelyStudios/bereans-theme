<?php
define('NUM_FEATURED', 2);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<?php get_header(); ?>
<main class="main">
  <?php if (have_posts()) : ?>
  <?php $count = 0; ?>
  <?php if ($paged > 1) : ?>
  <?php get_template_part('partials/pagination'); ?>
  <?php endif; ?>
  <ul class="article-list">
    <?php while (have_posts()) : the_post(); ?>
    <li class="article <?php echo $paged === 1 && $count < NUM_FEATURED ? 'article--featured' : 'article--short'; ?>">
      <?php get_template_part('partials/article', 'short'); ?>
    </li>
    <?php $count++; ?>
    <?php endwhile; ?>
  </ul>
  <?php get_template_part('partials/pagination'); ?>
  <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
