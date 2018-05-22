<div class="sidebar">
  <div id="youtube-list" data-playlistId="PLDW2KGBu7aPOACjEKY_WJFgtKrjTVN8G0" class="videos">
    <h2>Videos</h2>
    <a id="latest-video" class="videos__preview" href="https://www.youtube.com/playlist?list=PLDW2KGBu7aPOACjEKY_WJFgtKrjTVN8G0"></a>
    <div id="videos-list">
      <p>Loading video list...</p>
    </div>
    <p class="videos__more-link">
      <a href="https://www.youtube.com/playlist?list=PLDW2KGBu7aPOACjEKY_WJFgtKrjTVN8G0" class="btn btn-block btn-success">View playlist</a>
    </p>
  </div>
  <div class="recommended-reading">
    <h2>Recommended Reading</h2>
    <div id="rr-list" data-limit="5">
      <p>Loading reading list...</p>
    </div>
    <p class="reading__more-link">
      <a href="/recommended-reading" class="btn btn-block btn-success">View More</a>
    </p>
  </div>
  <div class="authors">
    <h2>Authors</h2>
    <!-- TODO: Update with actual author IDs -->
    <?php custom_list_authors(array('include'=>'6,5,2,3,4')); ?>
  </div>
  <ul class="widget-list">
    <?php dynamic_sidebar( 'sidebar' ); ?>
  </ul>
</div>
