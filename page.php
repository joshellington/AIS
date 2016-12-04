<?php get_header(); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="static-page">
      <h2><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h2>
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
