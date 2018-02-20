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

      <?php wp_list_comments( array(
    'callback' => '')); ?>
  		<div class="comments">
  			<h2>Comments on this post</h2>
  			<div class="comment">
  				<div class="comment__head">
  					<img src="http://placehold.it/36x36" class="user-image" />
  					<p class="user-name">
  						Commenting username
  					</p>
  					<p class="comment__post-date">11:08 am on Feb 2, 2018</p>
  				</div>
  				<div class="comment__body">
  					<p>It’s a very interesting case: Bombardier has been heavily subsidized already by the Canadian government and sold their planes under cost, which I believe was the source of Boeing’s complaint: Are you against anti-dumping legislation? I don’t know
  						that this is a good case study in the practice, but usually we’re wary of these kinds of pricing policies out of fear of monopolization. It’s a bit of a bitter pill if we’re just trading one crony for another, albeit a much smaller one.</p>
  				</div>
  				<p class="comment__reply-link"><a href="#"><i class="icon icon--reply icon--sm"></i> Reply</a></p>
  				<ul class="comment__replies">
  					<li>replies...</li>
  				</ul>
  			</div>
      </div>
    </footer>
    <?php endwhile; ?>
  <?php endif; ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
