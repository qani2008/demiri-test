<?php get_header(); ?>
<section class="hero">
  <div class="container wrap">
    <div>
      <span class="badge">London & Kent • Domestic & Commercial • Free Site Visits</span>
      <h1><?php echo demiri_t('Build it once. Build it right.', 'Ndërtoje një herë. Bëje siç duhet.'); ?></h1>
      <p class="lede">New builds, extensions, loft conversions and full refurbishments — plus kitchens, bathrooms, roofing, electrics, plumbing, rendering, plastering, and decorating. Start‑to‑finish project management with straight talk and tidy sites.</p>
      <div class="quick">
        <a class="btn btn-accent" href="#contact"><?php echo demiri_t('Get a fast quote','Merr një ofertë të shpejtë'); ?></a>
        <a class="btn" href="<?php echo esc_url(get_theme_mod('demiri_whatsapp', 'https://wa.me/447722999928')); ?>" target="_blank" rel="noopener">WhatsApp</a>
        <a class="btn btn-ghost" href="#projects"><?php echo demiri_t('See recent work','Shiko punët e fundit'); ?></a>
      </div>
      <div class="panel" style="margin-top:16px">
        <ul class="three">
          <li>⏱️ Rapid site visits</li>
          <li>🧰 Tried‑and‑tested trades</li>
          <li>📋 Transparent pricing</li>
        </ul>
      </div>
    </div>
    <div class="hero-illus">
      <div class="grid"></div>
      <div class="shape"></div>
      <div class="card">
        <b>Typical projects</b>
        <ul>
          <li>Rear/side extension with kitchen fit‑out</li>
          <li>Loft conversion (dormer + ensuite)</li>
          <li>Full refurb: rewire, re‑plumb, skim, decorate</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="services" class="section">
  <div class="container">
    <h2><?php echo demiri_t('Services','Shërbime'); ?></h2>
    <p class="sub">From foundations to finish. Pick the scope — we handle the rest.</p>
    <div class="services">
      <div class="service"><h3>New Builds</h3><p>Groundworks, shell, M&amp;E, finishing — delivered end‑to‑end.</p></div>
      <div class="service"><h3>Extensions</h3><p>Rear, side, wrap‑around, structural steel, kitchens, glazing.</p></div>
      <div class="service"><h3>Loft Conversions</h3><p>Dormers, skylights, stairs, insulation, ensuite install.</p></div>
      <div class="service"><h3>Refurbishments</h3><p>Full strip‑out, rewire, re‑plumb, plaster, decorate.</p></div>
      <div class="service"><h3>Kitchens</h3><p>Rip‑out, first/second fix, units, worktops, appliances.</p></div>
      <div class="service"><h3>Bathrooms</h3><p>Tiling, waterproofing, suites, underfloor heating.</p></div>
      <div class="service"><h3>Roofing</h3><p>Flat roofs (OSB + GRP), pitched, insulation, skylights.</p></div>
      <div class="service"><h3>Plumbing &amp; Heating</h3><p>First fix/second fix, boilers, radiators, bathrooms.</p></div>
      <div class="service"><h3>Electrical</h3><p>Consumer units, rewires, certification, smart lighting.</p></div>
      <div class="service"><h3>Rendering &amp; Plaster</h3><p>Monocouche, sand &amp; cement, skim, external insulation.</p></div>
      <div class="service"><h3>Painting &amp; Decorating</h3><p>Prep, coats, feature walls, woodwork.</p></div>
      <div class="service"><h3>Gardens &amp; Patios</h3><p>Landscaping, porcelain slabs, drainage, fencing.</p></div>
    </div>
  </div>
</section>

<section id="process" class="section">
  <div class="container">
    <h2><?php echo demiri_t('How we work','Si punojmë'); ?></h2>
    <p class="sub">Simple steps. Zero faff.</p>
    <div class="process">
      <div class="step"><b>1) Call &amp; consult</b><div>Tell us the brief, budget, and timing.</div></div>
      <div class="step"><b>2) Site visit &amp; quote</b><div>We measure, scope, and give a clear price.</div></div>
      <div class="step"><b>3) Build &amp; manage</b><div>We run the trades, schedule, and materials.</div></div>
      <div class="step"><b>4) Snag &amp; handover</b><div>Finish clean, test, and hand you the keys.</div></div>
    </div>
  </div>
</section>

<section id="projects" class="section">
  <div class="container">
    <h2><?php echo demiri_t('Recent Projects','Projekte të fundit'); ?></h2>
    <p class="sub">A few snapshots. More on request.</p>
    <div class="projects">
      <?php
      $q = new WP_Query([ 'post_type' => 'project', 'posts_per_page' => 6 ]);
      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post(); ?>
          <article class="project">
            <a href="<?php the_permalink(); ?>">
              <div class="thumb" role="img" aria-label="<?php the_title_attribute(); ?>">
                <?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } ?>
              </div>
              <div class="copy"><b><?php the_title(); ?></b><div class="small"><?php echo esc_html(get_the_excerpt()); ?></div></div>
            </a>
          </article>
      <?php endwhile; wp_reset_postdata(); else: ?>
        <article class="project">
          <div class="thumb" role="img" aria-label="Sample project"></div>
          <div class="copy"><b>Add your first project</b><div class="small">Go to Dashboard → Projects → Add New.</div></div>
        </article>
      <?php endif; ?>
    </div>
    <div class="cta">
      <div><b>Want a clean, itemised quote?</b> Send drawings or a simple brief — we’ll price it properly.</div>
      <a class="btn btn-accent" href="#contact">Start my quote</a>
    </div>
  </div>
</section>

<section id="faq" class="section">
  <div class="container">
    <h2><?php echo demiri_t('FAQ','Pyetje të shpeshta'); ?></h2>
    <p class="sub">If you’re thinking it, someone asked it last week.</p>
    <div class="faq">
      <details>
        <summary>How fast can you start?</summary>
        <div class="small">Depends on scope and lead times. Small jobs can be scheduled quickly; larger builds need proper planning. Tell us your dates — we’ll be realistic.</div>
      </details>
      <details>
        <summary>Do you supply materials?</summary>
        <div class="small">Yes. We can run supply &amp; fit, or labour‑only if you’re providing finishes via your designer. Your call.</div>
      </details>
      <details>
        <summary>What areas do you cover?</summary>
        <div class="small">Greater London and Kent. If you’re further, ask anyway.</div>
      </details>
      <details>
        <summary>Can you help with drawings &amp; regs?</summary>
        <div class="small">We can recommend architects/structural and coordinate with building control.</div>
      </details>
    </div>
  </div>
</section>

<section id="calculator" class="section">
  <div class="container">
    <h2>Quick price guide</h2>
    <p class="sub">Ballpark numbers only — site visit needed for a fixed quote.</p>
    <form class="calc" onsubmit="return false;" style="border:1px solid var(--line); border-radius:16px; padding:18px; background:linear-gradient(180deg,#151515,#0e0e0e)">
      <div class="grid two" style="display:grid; grid-template-columns:1fr 1fr; gap:12px">
        <div>
          <label for="calc-type">Project Type</label>
          <select id="calc-type">
            <option value="extension">Extension</option>
            <option value="loft">Loft Conversion</option>
            <option value="refurb">Full Refurb</option>
          </select>
        </div>
        <div>
          <label for="calc-size">Size (sqm)</label>
          <input id="calc-size" type="number" min="10" step="1" value="30" />
        </div>
      </div>
      <div class="actions" style="margin-top:12px">
        <button class="btn btn-accent" id="calc-go">Estimate</button>
        <span class="small">Prices are indicative. Includes labour + basic materials, excludes design, specialist finishes, and fees.</span>
      </div>
      <div id="calc-out" class="small" style="margin-top:10px"></div>
    </form>
  </div>
</section>
<script>
(function(){
  function currency(n){ return '£' + n.toLocaleString(); }
  function estimate(type, sqm){
    var bands={ extension:[1800,2600], loft:[1500,2200], refurb:[900,1600] };
    var b=bands[type]||bands.extension;
    return {low: Math.round(b[0]*sqm), high: Math.round(b[1]*sqm)};
  }
  document.addEventListener('DOMContentLoaded', function(){
    var btn=document.getElementById('calc-go');
    if(btn){
      btn.addEventListener('click', function(){
        var t=document.getElementById('calc-type').value;
        var s=parseFloat(document.getElementById('calc-size').value||0);
        if(!s || s<=0){ document.getElementById('calc-out').textContent='Enter a valid size.'; return; }
        var e=estimate(t,s);
        document.getElementById('calc-out').innerHTML='<b>Estimate:</b> ' + currency(e.low) + ' – ' + currency(e.high) + '<br/><span class="small">Send drawings for an itemised quote.</span>';
      });
    }
  });
})();
</script>

<section id="contact" class="section">
  <div class="container">
    <h2><?php echo demiri_t('Get a Quote','Merr një ofertë'); ?></h2>
    <p class="sub">Give us the basics. We’ll come back with a plan and a number.</p>
    <div class="contact">
      <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="quoteForm">
        <?php wp_nonce_field('demiri_contact'); ?>
        <input type="hidden" name="action" value="demiri_contact" />
        <div class="grid two" style="display:grid; grid-template-columns:1fr 1fr; gap:12px">
          <div><label for="name">Name</label><input id="name" name="name" required /></div>
          <div><label for="email">Email</label><input id="email" name="email" type="email" required /></div>
          <div><label for="phone">Phone</label><input id="phone" name="phone" type="tel" /></div>
          <div><label for="postcode">Postcode</label><input id="postcode" name="postcode" /></div>
          <div><label for="type">Project Type</label>
            <select id="type" name="type"><option>Extension</option><option>Loft Conversion</option><option>Refurbishment</option><option>Kitchen</option><option>Bathroom</option><option>Roofing</option><option>Other</option></select>
          </div>
          <div><label for="budget">Rough Budget</label>
            <select id="budget" name="budget"><option>Undecided</option><option>£5k–£15k</option><option>£15k–£40k</option><option>£40k–£80k</option><option>£80k+</option></select>
          </div>
        </div>
        <label for="message" style="margin-top:10px">Project Details</label>
        <textarea id="message" name="message" placeholder="Tell us what you want done, timing, and if you have drawings."></textarea>
        <div class="actions">
          <button class="btn btn-accent" type="submit">Send</button>
          <?php $whatsapp = get_theme_mod('demiri_whatsapp', 'https://wa.me/447722999928'); ?>
          <a class="btn btn-ghost" href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener">WhatsApp</a>
          <span class="small">or email <a href="mailto:<?php echo antispambot(get_theme_mod('demiri_email', 'info@demiribuilder.co.uk')); ?>"><?php echo antispambot(get_theme_mod('demiri_email', 'info@demiribuilder.co.uk')); ?></a></span>
        </div>
        <?php if (isset($_GET['contact'])): ?>
          <div class="notice <?php echo $_GET['contact'] === 'success' ? 'ok' : 'err'; ?>">
            <?php echo $_GET['contact'] === 'success' ? 'Thanks — we\'ll be in touch shortly.' : 'Sorry — something went wrong. Try again or call.'; ?>
          </div>
        <?php endif; ?>
      </form>
      <div class="info">
        <b>Contact</b>
        <div class="small" style="margin-top:8px">Phone: <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('demiri_phone', '+44 7722 999928'))); ?>"><?php echo esc_html(get_theme_mod('demiri_phone', '+44 7722 999928')); ?></a></div>
        <div class="small">Email: <a href="mailto:<?php echo antispambot(get_theme_mod('demiri_email', 'info@demiribuilder.co.uk')); ?>"><?php echo antispambot(get_theme_mod('demiri_email', 'info@demiribuilder.co.uk')); ?></a></div>
        <div class="small">Address: <?php echo esc_html(get_theme_mod('demiri_address', '85–89 Elmers End Road, Beckenham, BR3 4SY')); ?></div>
        <div class="small" style="margin-top:10px">Hours: Mon–Sat 8:00–18:00 (by appointment)</div>
        <hr style="border:none; border-top:1px solid var(--line); margin:14px 0">
        <b>Areas we cover</b>
        <div class="small">Beckenham • Bromley • Croydon • Lewisham • Greenwich • Southwark • Lambeth • Westminster • City • Kent</div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
