<?php get_header(); ?>
<section class="section">
  <div class="container">
    <h1>Projects</h1>
    <div class="projects">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="project">
          <a href="<?php the_permalink(); ?>">
            <div class="thumb"><?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?></div>
            <div class="copy"><b><?php the_title(); ?></b><div class="small"><?php echo esc_html(get_the_excerpt()); ?></div></div>
          </a>
        </article>
      <?php endwhile; else: ?>
        <p><?php _e('No projects yet. Add some in the dashboard.', 'demiri'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
