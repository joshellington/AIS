<?php get_header(); ?>

<div class="archive">
  <h3><?php single_cat_title(); ?></h3>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="home-post">
      <?php $media = get_attached_media('image'); ?>
      <?php $randomMedia = $media[array_rand($media, 1)]; ?>
      <div class="image">
        <a href="<?php echo the_permalink(); ?>">
          <h2><?php echo the_title(); ?></h2>
          <img src="<?php echo wp_get_attachment_image_src(reset($media), 'thumbnail')[0]; ?>">
        </a>
      </div>
    </div>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

  <div class="pagination">
    <?php previous_posts_link('Back') ?>
    <?php next_posts_link('Forward') ?>
  </div>

  <?php else: ?>
    <p><?php _e('Nothing.'); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
