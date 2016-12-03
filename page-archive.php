<?php
/**
 * Template Name: Archive
 *
 */
?>

<?php get_header(); ?>
  <div class="archive-page">
    <h4>Archive</h4>
    <?php $categories = get_categories(); ?>
    <?php foreach ( $categories as $category ) { ?>
      <span class="archive-category">
        <a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
      </span>
    <?php } ?>

    <?php
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $query_args = array(
      'post_type' => 'post',
      'posts_per_page' => 150,
      'paged' => $paged
    );
    $wp_query->query($query_args);
    ?>

    <div class="archive-posts">
      <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); // run the loop ?>
        <div class="archive-post">
          <?php $media = get_attached_media('image'); ?>
          <a href="<?php echo the_permalink(); ?>">
            <img src="<?php echo wp_get_attachment_image_src(reset($media)->ID, 'thumbnail')[0]; ?>">
          </a>
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
