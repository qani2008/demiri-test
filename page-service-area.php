<?php
/* Template Name: Service Area */
get_header();
?>
<section class="section">
  <div class="container">
    <h1><?php echo esc_html(get_the_title()); ?></h1>
    <div class="small"><?php echo demiri_t('Local builder services for this area.', 'Shërbime ndërtimi në këtë zonë.'); ?></div>
    <div class="content">
      <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
      <h2><?php echo demiri_t('Popular services','Shërbime të kërkuara'); ?></h2>
      <ul class="three">
        <li><?php echo demiri_t('House extensions','Shtesa banese'); ?></li>
        <li><?php echo demiri_t('Loft conversions','Konvertime papafingoje'); ?></li>
        <li><?php echo demiri_t('Full refurbishments','Rinovime të plota'); ?></li>
        <li><?php echo demiri_t('Kitchens & bathrooms','Kuzhina & banjo'); ?></li>
        <li><?php echo demiri_t('Roofing, electrics, plumbing','Çati, elektrikë, hidraulikë'); ?></li>
      </ul>
      <p class="small"><?php echo demiri_t('For a fixed quote, book a site visit.','Për një çmim fiks, rezervoni një vizitë në vend.'); ?></p>
      <p><a class="btn btn-accent" href="#contact"><?php echo demiri_t('Get a quote','Merr një ofertë'); ?></a></p>
    </div>
  </div>
</section>
<?php get_footer(); ?>
