<?php if (!defined('ABSPATH')) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <div class="container nav">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
      <svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">
        <path d="M6 30 L32 10 L58 30" fill="none" stroke="#ffd026" stroke-width="4" stroke-linejoin="round"/>
        <path d="M16 28 h16 v24 h-16 z" fill="#1a1a1a" stroke="#333"/>
        <path d="M38 20 h10 v32 h-10 z" fill="#1a1a1a" stroke="#333"/>
        <circle cx="24" cy="40" r="3" fill="#2c2c2c" />
      </svg>
      <span><?php bloginfo('name'); ?></span>
    </a>
    <nav>
      <?php wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'','items_wrap'=>'<ul>%3$s</ul>']); ?>
    </nav>
    <div class="nav-actions">
      <a class="btn btn-ghost lang-switch" href="?lang=sq">AL</a>
      <?php $phone = get_theme_mod('demiri_phone', '+44 7722 999928'); ?>
      <a class="btn btn-ghost" href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">Call</a>
      <a class="btn btn-accent" href="#contact">Get a Quote</a>
      <button class="hamburger" id="hamburger" aria-label="Menu">☰</button>
    </div>
  </div>
</header>
<main>
