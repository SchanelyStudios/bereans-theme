<?php get_header(); ?>
<main class="main">
  <ul class="article-list">
    <?php
      $args = array(
        'posts_per_page' => 2
      );
      query_posts($args);
    ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <li class="article article--featured">
      <div class="article__header">
        <h3 class="article__title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
        <p class="date">
          <b class="date__day"><?php echo get_the_date('d'); ?></b>
          <b class="date__month"><?php echo get_the_date('M'); ?></b>
          <span class="date__year"><?php echo get_the_date('Y'); ?></span>
        </p>
        <p class="author author--byline"><?php the_author(); ?></p>
      </div>
      <div class="article__body"><?php the_excerpt(); ?></div>
    </li>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php
      $args = array(
        'posts_per_page' => 10,
        'offset' => 2
      );
      query_posts($args);
    ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <li class="article article--short">
      <div class="article__header">
        <h3 class="article__title"><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
        <p class="date">
          <b class="date__day"><?php echo get_the_date('d'); ?></b>
          <b class="date__month"><?php echo get_the_date('M'); ?></b>
          <span class="date__year"><?php echo get_the_date('Y'); ?></span>
        </p>
        <p class="author author--byline"><?php the_author(); ?></p>
      </div>
      <div class="article__body"><?php the_excerpt(); ?></div>
    </li>
    <?php endwhile; ?>
    <?php endif; ?>
  </ul>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
