<?php get_header(); ?>

<div class="archive">
  <h3>Results for: <?php echo esc_attr(get_search_query()); ?></h3>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="home-post">
      <?php $media = get_attached_media('image'); ?>
      <div class="image">
        <a href="<?php echo the_permalink(); ?>">
          <h2><?php echo the_title(); ?></h2>
          <img src="<?php echo wp_get_attachment_image_src(reset($media)->ID, 'large')[0]; ?>">
        </a>
      </div>
    </div>
  <?php endwhile; ?>

  <div class="pagination">
    <?php previous_posts_link('Back') ?>
    <?php next_posts_link('Forward') ?>
  </div>

  <?php else: ?>
    <p><?php _e('Nothing.'); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
