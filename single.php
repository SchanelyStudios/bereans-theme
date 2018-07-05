<?php get_header(); ?>
<article class="main article article--full">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <header class="article__header">
      <h1 class="article__title"><?php the_title();?></h1>
      <p class="date">
        <b class="date__day"><?php echo get_the_date('d'); ?></b>
        <b class="date__month"><?php echo get_the_date('M'); ?></b>
        <span class="date__year"><?php echo get_the_date('Y'); ?></span>
      </p>
      <p class="author author--byline"><?php the_author_posts_link(); ?> </p>
    </header>
    <main class="article__body">
      <?php the_content();?>
    </main>
    <footer class="article__footer">
      <div class="tags">
  			<p>Posted in:</p>
        <?php echo get_the_category_list(); ?>
  		</div>
      <div class="comments">
        <h2>Comments on this post</h2>
        <?php comments_template(); ?>
      </div>
    </footer>
    <?php endwhile; ?>
  <?php endif; ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
