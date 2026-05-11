<?php
$content = <<<'CONTENT'
<!-- wp:iqex/hero-media {"headingText":"Run your business, not just your day.","subText":"Tasks, HR, timesheets, business planning, and compliance — so you can run the business instead of chasing it.","ctaLabel":"Book a Demo","ctaUrl":"/demo","secondaryCtaLabel":"See Pricing","secondaryCtaUrl":"/pricing","heightPreset":"70vh","dim":50,"posterId":61,"posterUrl":"https://uiiq.co.uk/wp-content/uploads/2026/05/run-hero.jpg","textAlign":"left"} /-->

<!-- wp:group {"className":"features-grid","layout":{"type":"constrained"}} -->
<div class="wp-block-group features-grid">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">What Run covers</h2><!-- /wp:heading -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">&#128203; Task board</h3><!-- /wp:heading -->
<!-- wp:paragraph --><p>Kanban, calendar, and workload views. Drag-and-drop columns. Task workflow automation &#8212; a new booking in Sell creates the full production task sequence automatically. Five industry packs built in.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-group wp-block-column">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">&#128101; HR module</h3><!-- /wp:heading -->
<!-- wp:paragraph --><p>Staff records, QR clock-in (geo-fenced), timesheets, leave management, onboarding templates, and training matrix with expiry reminders. Everything your HR tool should do, connected to the rest of the platform.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div><!-- /wp:columns -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">&#128200; Business Planner</h3><!-- /wp:heading -->
<!-- wp:paragraph --><p>Financial forecasting, goal setting, scenario planning, KPI tracking, and an idea evaluator with auto margin and break-even calculation. All five LivePlan phases in one tool.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">&#9989; Compliance</h3><!-- /wp:heading -->
<!-- wp:paragraph --><p>Upcoming statutory deadlines &#8212; Companies House, VAT, GDPR &#8212; with direct links to filing portals. Document vault for staff contracts, DBS certificates, insurance, and licences.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div><!-- /wp:columns -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"workflow-callout","style":{"color":{"background":"#f0f4ff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group workflow-callout" style="background-color:#f0f4ff">
<!-- wp:heading {"level":3,"textAlign":"center"} --><h3 class="wp-block-heading has-text-align-center">Workflow automation that actually works</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">A new booking comes in via Sell &#8212; Run automatically creates the full production task sequence: Order Review &#8594; Design &#8594; Print &#8594; QC &#8594; Pack &#8594; Send. Five industry packs included. Build your own in minutes. No Zapier, no middleware.</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"posm-connection","layout":{"type":"constrained"}} -->
<div class="wp-block-group posm-connection">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Connected to Sell &amp; Grow</h3><!-- /wp:heading -->
<!-- wp:list -->
<ul class="wp-block-list">
<li>New booking in Sell &#8594; Run creates event prep task cards automatically</li>
<li>Staff clock-in data flows into timesheet approvals</li>
<li>Leave calendar sits alongside the Sell booking calendar</li>
<li>Training matrix expiry &#8594; Grow sends automated staff reminder email</li>
</ul>
<!-- /wp:list -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"who-uses","layout":{"type":"constrained"}} -->
<div class="wp-block-group who-uses">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">Who uses Run</h2><!-- /wp:heading -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>&#128188; Operations managers &amp; GMs</p><!-- /wp:paragraph --></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>&#128101; HR leads managing shift workers</p><!-- /wp:paragraph --></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>&#128200; Business owners needing one view</p><!-- /wp:paragraph --></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>&#127979; Training managers tracking compliance</p><!-- /wp:paragraph --></div><!-- /wp:column -->
</div><!-- /wp:columns -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"cta-band","style":{"color":{"background":"var(--wp--preset--color--accent)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-band" style="background-color:var(--wp--preset--color--accent)">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} --><h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff">See Run in action.</h2><!-- /wp:heading -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"color":{"background":"#ffffff","text":"var(--wp--preset--color--accent)"}}} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo" style="background-color:#ffffff;color:var(--wp--preset--color--accent)">Book a Demo</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->
CONTENT;

wp_update_post([
    'ID'           => 9,
    'post_title'   => 'Run',
    'post_name'    => 'run',
    'post_content' => $content,
]);

echo "Run page updated.\n";
