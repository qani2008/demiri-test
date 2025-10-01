<?php if (!defined('ABSPATH')) { exit; } ?>
</main>
<footer>
  <div class="container foot">
    <div>
      <div class="logo" style="margin-bottom:8px">
        <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false" width="24" height="24">
          <path d="M6 30 L32 10 L58 30" fill="none" stroke="#ffd026" stroke-width="4" stroke-linejoin="round"/>
          <path d="M16 28 h16 v24 h-16 z" fill="#1a1a1a" stroke="#333"/>
          <path d="M38 20 h10 v32 h-10 z" fill="#1a1a1a" stroke="#333"/>
        </svg>
        <span><?php bloginfo('name'); ?></span>
      </div>
      <div class="small">Design • Build • Refurbishment across London &amp; Kent.</div>
    </div>
    <div>
      <b>Company</b>
      <div class="small"><a href="#services">Services</a></div>
      <div class="small"><a href="#projects">Projects</a></div>
      <div class="small"><a href="#process">Process</a></div>
    </div>
    <div>
      <b>Legal</b>
      <div class="small">© 2025 <?php bloginfo('name'); ?></div>
      <div class="small">All rights reserved</div>
      <div class="small">Company No: <?php echo esc_html(get_theme_mod('demiri_company_number', '00000000')); ?></div>
    </div>
    <div>
      <b>Contact</b>
      <div class="small"><a href="mailto:<?php echo antispambot(get_theme_mod('demiri_email', 'info@demiribuilder.co.uk')); ?>"><?php echo antispambot(get_theme_mod('demiri_email', 'info@demiribuilder.co.uk')); ?></a></div>
      <div class="small"><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('demiri_phone', '+44 7722 999928'))); ?>"><?php echo esc_html(get_theme_mod('demiri_phone', '+44 7722 999928')); ?></a></div>
      <div class="small"><a href="<?php echo esc_url(get_theme_mod('demiri_instagram', 'https://www.instagram.com/demiribuilderltd')); ?>" target="_blank" rel="noopener">Instagram</a></div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
