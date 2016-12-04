<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="permalink-post post">
      <h2><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
      <h3><?php echo get_the_category_list('/'); ?></h3>
      <div class="content">
        <?php the_content(); ?>
      </div>
      <!-- <div class="images">
        <?php# $images = get_attached_media('image'); ?>
        <?php# foreach ($images as $image) { ?>
          <div class="image">
            <img src="<?php# echo wp_get_attachment_image_src($image->ID, 'full')[0]; ?>">
          </div>
        <?php# } ?>
      </div> -->

      <h4><?php echo get_the_tag_list('', '/'); ?></h4>
      <h4><?php echo get_the_date('mdy'); ?></h4>
      <?php edit_post_link('Edit', '<h4>', '</h4>'); ?>
    </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
