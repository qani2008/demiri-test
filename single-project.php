<?php get_header(); ?>
<section class="section">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article <?php post_class('project-single'); ?>>
        <h1><?php the_title(); ?></h1>
        <?php if (has_post_thumbnail()) { echo '<div class="hero-thumb">'; the_post_thumbnail('large'); echo '</div>'; } ?>
        <div class="content"><?php the_content(); ?></div>
      </article>
    <?php endwhile; endif; ?>
    <p><a class="btn" href="<?php echo esc_url(get_post_type_archive_link('project')); ?>">← Back to Projects</a></p>
  </div>
</section>
<?php get_footer(); ?>
