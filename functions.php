<?php
if (!defined('ABSPATH')) { exit; }

// THEME SETUP
add_action('after_setup_theme', function() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', [
    'height' => 80,
    'width'  => 240,
    'flex-height' => true,
    'flex-width'  => true,
  ]);
  register_nav_menus([ 'primary' => __('Primary Menu', 'demiri') ]);
});

// ENQUEUE
add_action('wp_enqueue_scripts', function() {
  $ver = wp_get_theme()->get('Version');
  wp_enqueue_style('demiri-main', get_template_directory_uri() . '/assets/css/main.css', [], $ver);
  wp_enqueue_script('demiri-main', get_template_directory_uri() . '/assets/js/main.js', [], $ver, true);
});

// CUSTOMIZER OPTIONS (contact + company + GA/GSC + reviews)
add_action('customize_register', function($wp_customize){
  $wp_customize->add_section('demiri_contact', [
    'title' => __('Contact & Company', 'demiri'),
    'priority' => 30,
  ]);

  $fields = [
    'ga4' => ['GA4 Measurement ID (G-XXXXXX)', ''],
    'gsc_meta' => ['Search Console HTML Tag (content value)', ''],
    'phone' => ['Phone', '+44 7722 999928'],
    'email' => ['Email', 'info@demiribuilder.co.uk'],
    'address' => ['Address', '85–89 Elmers End Road, Beckenham, BR3 4SY'],
    'instagram' => ['Instagram URL', 'https://www.instagram.com/demiribuilderltd'],
    'whatsapp' => ['WhatsApp Link', 'https://wa.me/447722999928'],
    'company_number' => ['Company Number', '00000000'],
    'reviews_iframe' => ['Google Reviews Embed (iframe HTML or leave empty to use link)', ''],
    'reviews_link' => ['Google Reviews Page URL', '']
  ];

  foreach ($fields as $key => $meta) {
    list($label, $default) = $meta;
    $wp_customize->add_setting("demiri_{$key}", [
      'default' => $default,
      'sanitize_callback' => 'sanitize_text_field'
    ]);
    $wp_customize->add_control("demiri_{$key}", [
      'label' => __($label, 'demiri'),
      'section' => 'demiri_contact',
      'type' => 'text'
    ]);
  }
});

// PROJECTS CPT
add_action('init', function(){
  $labels = [
    'name' => _x('Projects', 'post type general name', 'demiri'),
    'singular_name' => _x('Project', 'post type singular name', 'demiri'),
    'menu_name' => _x('Projects', 'admin menu', 'demiri'),
    'add_new' => _x('Add New', 'project', 'demiri'),
    'add_new_item' => __('Add New Project', 'demiri'),
  ];
  register_post_type('project', [
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-hammer',
    'supports' => ['title','editor','thumbnail','excerpt'],
    'rewrite' => ['slug' => 'projects'],
    'show_in_rest' => true,
  ]);
});

// CONTACT FORM HANDLER
function demiri_handle_contact() {
  if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'demiri_contact')) {
    wp_die(__('Security check failed', 'demiri'));
  }
  $name = sanitize_text_field($_POST['name'] ?? '');
  $email = sanitize_email($_POST['email'] ?? '');
  $phone = sanitize_text_field($_POST['phone'] ?? '');
  $postcode = sanitize_text_field($_POST['postcode'] ?? '');
  $type = sanitize_text_field($_POST['type'] ?? '');
  $budget = sanitize_text_field($_POST['budget'] ?? '');
  $message = sanitize_textarea_field($_POST['message'] ?? '');
  $to = get_theme_mod('demiri_email', get_bloginfo('admin_email'));
  $subject = sprintf(__('Quote Request — %s', 'demiri'), $name ?: 'Website');
  $body = "Name: {$name}
Email: {$email}
Phone: {$phone}
Postcode: {$postcode}
Project Type: {$type}
Budget: {$budget}

Details:
{$message}";
  $headers = ['Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>"];
  $sent = wp_mail($to, $subject, $body, $headers);
  // AUTO-REPLY to client
  if (!empty($email) && is_email($email)) {
    $reply_sub = __('Thanks — we received your request', 'demiri');
    $reply_msg = "Hi {$name},

Thanks for getting in touch with Demiri Builder Ltd. We'll review your details and get back to you to arrange a site visit.

If it's urgent, call us: " . get_theme_mod('demiri_phone', '+44 7722 999928') . "

Regards,
Demiri Builder Ltd";
    wp_mail($email, $reply_sub, $reply_msg, ['Content-Type: text/plain; charset=UTF-8']);
  }
  $redirect = wp_get_referer() ?: home_url('/');
  $query = $sent ? 'contact=success' : 'contact=error';
  wp_safe_redirect(add_query_arg($query, '', $redirect));
  exit;
}
add_action('admin_post_nopriv_demiri_contact', 'demiri_handle_contact');
add_action('admin_post_demiri_contact', 'demiri_handle_contact');

// HEAD INJECT (GSC + GA4)
add_action('wp_head', function(){
  $gsc = get_theme_mod('demiri_gsc_meta', '');
  if (!empty($gsc)) echo '<meta name="google-site-verification" content="' . esc_attr($gsc) . '" />';
  $ga = get_theme_mod('demiri_ga4', '');
  if (!empty($ga)) {
    echo "\n<!-- GA4 -->\n";
    echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_attr($ga) . '"></script>';
    echo '<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag("js",new Date());gtag("config","' . esc_js($ga) . '");</script>';
  }
}, 1);

// BILINGUAL helper (?lang=sq)
function demiri_lang_is_sq(){ return (isset($_GET['lang']) && strtolower($_GET['lang']) === 'sq'); }
function demiri_t($en, $sq){ return demiri_lang_is_sq() ? $sq : $en; }

// GOOGLE REVIEWS SHORTCODE
add_shortcode('demiri-google-reviews', function(){
  $iframe = get_theme_mod('demiri_reviews_iframe', '');
  $link = get_theme_mod('demiri_reviews_link', '');
  ob_start();
  echo '<section id="reviews" class="section"><div class="container">';
  echo '<h2>What clients say</h2><p class="sub">Pulled from Google reviews</p>';
  if (!empty($iframe)) { echo '<div class="reviews-embed">' . $iframe . '</div>'; }
  elseif (!empty($link)) { echo '<p class="small">See our reviews on <a class="btn" target="_blank" rel="noopener" href="' . esc_url($link) . '">Google</a></p>'; }
  else { echo '<p class="small">Add your Google reviews link or embed in Customizer → Contact & Company.</p>'; }
  echo '</div></section>';
  return ob_get_clean();
});

// PHP GUARD
add_action('admin_init', function(){
  if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    add_action('admin_notices', function(){
      echo '<div class="notice notice-error"><p>Demiri Builder theme needs PHP 8.0+. Current: ' . esc_html(PHP_VERSION) . '</p></div>';
    });
  }
});

// CREATE LEGAL + SERVICE AREA PAGES ON ACTIVATE + DEMO PROJECTS
add_action('after_switch_theme', function(){
  // Legal pages
  $pages = [
    ['Privacy Policy', 'privacy-policy', 'This is a starter privacy policy. Replace with your own or paste your provider template.'],
    ['Cookie Policy', 'cookie-policy', 'This site uses cookies to run essential features and to understand how you use it.']
  ];
  foreach ($pages as $p) {
    list($title,$slug,$content) = $p;
    if (!get_page_by_path($slug)) {
      wp_insert_post([
        'post_title' => $title,
        'post_name'  => $slug,
        'post_status'=> 'publish',
        'post_type'  => 'page',
        'post_content'=> $content
      ]);
    }
  }

  // Service area pages
  $areas = ['Beckenham','Bromley','Croydon','Lewisham','Greenwich','Southwark','Lambeth','Westminster','City of London','Kent'];
  foreach ($areas as $area) {
    $slug = 'builders-in-' . sanitize_title($area);
    if (!get_page_by_path($slug)) {
      $content = sprintf('We deliver extensions, lofts and refurbishments across %s. Get in touch for a site visit.', $area);
      $id = wp_insert_post([
        'post_title' => 'Builders in ' . $area,
        'post_name'  => $slug,
        'post_status'=> 'publish',
        'post_type'  => 'page',
        'post_content'=> $content
      ]);
      if ($id && !is_wp_error($id)) {
        update_post_meta($id, '_wp_page_template', 'page-service-area.php');
      }
    }
  }

  // Demo projects with bundled images
  if (!function_exists('wp_upload_bits')) require_once ABSPATH . 'wp-admin/includes/file.php';
  if (!function_exists('wp_generate_attachment_metadata')) require_once ABSPATH . 'wp-admin/includes/image.php';

  function demiri_import_theme_image($rel_path, $title){
    $file = get_template_directory() . '/' . ltrim($rel_path, '/');
    if (!file_exists($file)) { return 0; }
    $bits = wp_upload_bits(basename($file), null, file_get_contents($file));
    if (!empty($bits['error'])) { return 0; }
    $filetype = wp_check_filetype($bits['file'], null);
    $attachment = [
      'post_mime_type' => $filetype['type'],
      'post_title'     => sanitize_file_name($title),
      'post_content'   => '',
      'post_status'    => 'inherit'
    ];
    $attach_id = wp_insert_attachment($attachment, $bits['file']);
    if (is_wp_error($attach_id) || !$attach_id) { return 0; }
    $attach_data = wp_generate_attachment_metadata($attach_id, $bits['file']);
    wp_update_attachment_metadata($attach_id, $attach_data);
    return $attach_id;
  }

  $demos = [
    ['Beckenham Loft Conversion','beckenham-loft-conversion','assets/img/beckenham-loft.jpg','New staircase, dormer, ensuite, rewire.'],
    ['Bromley Kitchen Extension','bromley-kitchen-extension','assets/img/bromley-kitchen.jpg','Steel, bifolds, quartz worktops.'],
    ['Croydon Full Refurb','croydon-full-refurb','assets/img/croydon-refurb.jpg','Strip-out, replumb, rewire, skim, decorate.']
  ];
  foreach ($demos as $d) {
    list($title,$slug,$img,$excerpt) = $d;
    if (null === get_page_by_path($slug, OBJECT, 'project')) {
      $post_id = wp_insert_post([
        'post_type'   => 'project',
        'post_title'  => $title,
        'post_name'   => $slug,
        'post_status' => 'publish',
        'post_excerpt'=> $excerpt,
        'post_content'=> 'Demo content — replace with your project details and photos.'
      ]);
      if ($post_id && !is_wp_error($post_id)) {
        $aid = demiri_import_theme_image($img, $title);
        if ($aid) { set_post_thumbnail($post_id, $aid); }
      }
    }
  }
});
