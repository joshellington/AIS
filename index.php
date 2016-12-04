<?php get_header(); ?>

<?php
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$query_args = array(
  'post_type' => 'post',
  'posts_per_page' => 25,
  'paged' => $paged
);
$wp_query->query($query_args);
?>

<div class="home">
  <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); // run the loop ?>
    <div class="home-post post">
      <?php
      $media = get_attached_media('image');
      $randomMedia = $media[array_rand($media, 1)];
      ?>
      <div class="image">
        <a href="<?php echo the_permalink(); ?>">
          <h2><?php echo the_title(); ?></h2>
          <img src="<?php echo wp_get_attachment_image_src($randomMedia->ID, 'large')[0]; ?>">
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

  <?php
  $wp_query = null;
  $wp_query = $temp;
  ?>
</div>

<?php get_footer(); ?>
