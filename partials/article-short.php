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
