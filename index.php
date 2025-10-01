<?php get_header(); ?>
<div class="container section">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class('post'); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="content"><?php the_content(); ?></div>
    </article>
  <?php endwhile; else: ?>
    <p><?php _e('Nothing to see here yet.', 'demiri'); ?></p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
