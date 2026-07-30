<?php
/**
 * Rewrite /pricing to the finalised UIIQ pricing model, 2026-07-30.
 *
 * Replaces the June-2026 module-bundle page (Sell/Grow/Run at £101/£300/£756,
 * module tiers £49/£149/£399, booking commission 2.5/1.5/1.0%). Every number on
 * that page was superseded on 2026-07-22/27, and its FAQ actively contradicted
 * the IQLabs setup pricing by promising "no onboarding fees".
 *
 * Source of truth: FINANCE/PRICING-CURRENT-2026-07.md
 *   · Size:          Start £39 (3,000cr) / Grow £169 (6,000cr) / Scale £339 (12,000cr)
 *   · Credits:       0.5p list, £1 = 200 credits, non-rollover, overage in arrears
 *   · Platform fee:  by TRANSACTION TYPE (2026-07-27), volume ladder, 0.5% floor
 *   · Human help:    IQLabs consultancy — £50 / £99 setup, £800/day, £50–100/hr, £140/mo
 *
 * Run:  wp eval-file build/2026-07-pricing.php
 */

const PRICING_PAGE_ID = 10;

$content = <<<'CONTENT'
<!-- wp:iqex/hero-media {"overlayHeading":"Pay for what you use.","overlaySub":"UIIQ starts at £39 a month. From there the bill scales with your usage, your staff and your sales — so a small operation stays small on the invoice, and nobody pays for a tier they have outgrown or never filled.","ctaOneLabel":"Estimate your bill","ctaOneUrl":"https://app.uiiq.co.uk/pricing","ctaTwoLabel":"Book a Demo","ctaTwoUrl":"/demo","heightPreset":"large","dimLevel":50} /-->

<!-- wp:group {"className":"plans","layout":{"type":"constrained"}} -->
<div class="wp-block-group plans">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">Three plan sizes. That is the whole ladder.</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">There is no fourth tier and no enterprise trapdoor. A bigger business does not move up a plan &#8212; it uses more, and the bill follows.</p><!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Start</h3><!-- /wp:heading -->
<!-- wp:heading {"style":{"typography":{"letterSpacing":"-0.03em","fontSize":"2.5rem"},"spacing":{"margin":{"top":"8px","bottom":"4px"}}}} --><h2 class="wp-block-heading" style="letter-spacing:-0.03em;font-size:2.5rem;margin-top:8px;margin-bottom:4px">&pound;39<span style="font-size:1rem;font-weight:400;color:#6b7280">/mo</span></h2><!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-color" style="color:#6b7280;font-size:0.9rem"><strong>3,000 credits</strong> a month included</p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p>The everyday platform. Contacts, tasks, HR, campaigns, social, SEO and the AI boardroom, plus your sector&#8217;s modules. One 15-second video taster to see what the AI can do.</p><!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<li>Everything in your sector setup</li>
<li>Everyday AI &#8212; copy, images, briefs, ops</li>
<li>Usage beyond the allowance at 0.5p a credit</li>
<li>14-day free trial, no card required</li>
</ul>
<!-- /wp:list -->
<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo">Start free trial</a></div><!-- /wp:button --></div><!-- /wp:buttons -->
</div><!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem","fontWeight":"700","letterSpacing":"0.08em"},"color":{"text":"var(--wp--preset--color--accent)"}}} --><p class="has-text-color" style="color:var(--wp--preset--color--accent);font-size:0.75rem;font-weight:700;letter-spacing:0.08em">MOST POPULAR</p><!-- /wp:paragraph -->
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Grow</h3><!-- /wp:heading -->
<!-- wp:heading {"style":{"typography":{"letterSpacing":"-0.03em","fontSize":"2.5rem"},"spacing":{"margin":{"top":"8px","bottom":"4px"}}}} --><h2 class="wp-block-heading" style="letter-spacing:-0.03em;font-size:2.5rem;margin-top:8px;margin-bottom:4px">&pound;169<span style="font-size:1rem;font-weight:400;color:#6b7280">/mo</span></h2><!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-color" style="color:#6b7280;font-size:0.9rem"><strong>6,000 credits</strong> a month included</p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p>The marketing tier. AI video is unlocked here &#8212; and video is the one genuinely expensive thing the platform does, so the allowance covers your operation and the campaigns run on usage.</p><!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<li>Everything in Start</li>
<li>AI video &#8212; short clips and 60-second hero films</li>
<li>Sector knowledge Brains included</li>
<li>Marketing runs as pay-for-benefit usage</li>
</ul>
<!-- /wp:list -->
<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo">Start free trial</a></div><!-- /wp:button --></div><!-- /wp:buttons -->
</div><!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Scale</h3><!-- /wp:heading -->
<!-- wp:heading {"style":{"typography":{"letterSpacing":"-0.03em","fontSize":"2.5rem"},"spacing":{"margin":{"top":"8px","bottom":"4px"}}}} --><h2 class="wp-block-heading" style="letter-spacing:-0.03em;font-size:2.5rem;margin-top:8px;margin-bottom:4px">&pound;339<span style="font-size:1rem;font-weight:400;color:#6b7280">/mo</span></h2><!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-color" style="color:#6b7280;font-size:0.9rem"><strong>12,000 credits</strong> a month included</p><!-- /wp:paragraph -->
<!-- wp:paragraph --><p>For a bigger operation. The allowance is sized to cover the day-to-day footprint of a busy site &#8212; staff, tills, products and contacts &#8212; leaving marketing as the variable.</p><!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<li>Everything in Grow</li>
<li>Allowance sized for a multi-till, multi-staff site</li>
<li>Multiple venues or brands from one login</li>
<li>Priority support</li>
</ul>
<!-- /wp:list -->
<!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo">Talk to us</a></div><!-- /wp:button --></div><!-- /wp:buttons -->
</div><!-- /wp:column -->

</div><!-- /wp:columns -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-align-center has-text-color" style="color:#6b7280;font-size:0.85rem">Which modules you get is set by your <a href="/sectors">sector</a>, not your plan size. Credit allowances are monthly and do not roll over.</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"how-billing-works","style":{"color":{"background":"#f0f4ff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group how-billing-works" style="background-color:#f0f4ff">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">How the bill actually works</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Three parts, and you can see all three. Nothing is buried.</p><!-- /wp:paragraph -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">1. Your plan</h4><!-- /wp:heading -->
<!-- wp:paragraph --><p>&pound;39, &pound;169 or &pound;339, charged on the 1st for the month ahead. Your credit allowance lands with it and the meter resets.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">2. Usage beyond the allowance</h4><!-- /wp:heading -->
<!-- wp:paragraph --><p>Metered live at <strong>0.5p a credit</strong> and billed in arrears on the 1st for the month just gone. You watch it accrue in your dashboard as it happens &#8212; no surprises at the end.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">3. Platform fee on sales</h4><!-- /wp:heading -->
<!-- wp:paragraph --><p>Only if you take payments through UIIQ. Taken off each sale in real time, never added to your invoice &#8212; and itemised on your statement so you can see exactly what it came to.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div><!-- /wp:columns -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"credits-explained","layout":{"type":"constrained"}} -->
<div class="wp-block-group credits-explained">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">Credits, in plain English</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>&pound;1 = 200 credits.</strong> One meter covers everything &#8212; the size of your operation and the AI you run. If you stay inside your monthly allowance you never think about it; if you go past it, the extra is 0.5p a credit.</p><!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">What your operation draws, monthly</h4><!-- /wp:heading -->
<!-- wp:table -->
<figure class="wp-block-table"><table><tbody>
<tr><td>Each contact</td><td>1 credit</td></tr>
<tr><td>Each product</td><td>3 credits</td></tr>
<tr><td>Each member of staff</td><td>500 credits (&pound;2.50)</td></tr>
<tr><td>Each till or terminal</td><td>1,000 credits (&pound;5.00)</td></tr>
<tr><td>Each booking taken</td><td>0.5 credits</td></tr>
<tr><td>Each email sent</td><td>0.1 credits</td></tr>
</tbody></table></figure>
<!-- /wp:table -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-color" style="color:#6b7280;font-size:0.85rem">UIIQ counts all of this itself, from your live data. Nothing to declare, nothing to reconcile.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">What the AI costs</h4><!-- /wp:heading -->
<!-- wp:table -->
<figure class="wp-block-table"><table><tbody>
<tr><td>AI image</td><td>300 credits (&pound;1.50)</td></tr>
<tr><td>Social post</td><td>500 credits (&pound;2.50)</td></tr>
<tr><td>Campaign brief</td><td>1,000 credits (&pound;5)</td></tr>
<tr><td>Sector report</td><td>2,000 credits (&pound;10)</td></tr>
<tr><td>15-second AI video</td><td>3,000 credits (&pound;15)</td></tr>
<tr><td>60-second hero film</td><td>10,000 credits (&pound;50)</td></tr>
</tbody></table></figure>
<!-- /wp:table -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-color" style="color:#6b7280;font-size:0.85rem">Everyday AI is cheap. Video is the expensive one, which is why it starts at Grow &#8212; and why you only pay for the videos you actually make.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div><!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://app.uiiq.co.uk/pricing">Estimate your monthly bill</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"platform-fee","style":{"color":{"background":"#0f172a"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group platform-fee" style="background-color:#0f172a">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} --><h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff">Platform fee &#8212; only on what you sell through UIIQ</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"rgba(255,255,255,0.75)"}}} --><p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.75)">The rate depends on the kind of transaction, because a ticket, a till sale and a donation are not the same thing. <strong style="color:#fff">You keep your own card processing account</strong> and stay merchant of record &#8212; we do not resell you a card reader, and we do not penalise you for bringing your own payments provider.</p><!-- /wp:paragraph -->
<!-- wp:table {"className":"is-style-stripes"} -->
<figure class="wp-block-table is-style-stripes"><table><thead><tr><th>Transaction</th><th>Platform fee</th><th>What the market charges</th></tr></thead><tbody>
<tr><td>Attraction or event ticket</td><td><strong>2.5%</strong></td><td>Beyonk 4% &#183; Eventbrite UK 6.95% + &pound;0.59</td></tr>
<tr><td>Service or hospitality booking</td><td><strong>2.0%</strong></td><td>Fresha 20% on marketplace bookings</td></tr>
<tr><td>Online order</td><td><strong>1.5%</strong></td><td>Shopify 2% third-party transaction fee</td></tr>
<tr><td>Till / card present</td><td><strong>1.0%</strong></td><td>Lightspeed 2.6% + 10c &#183; Toast 2.49% + 15c</td></tr>
<tr><td>Donation</td><td><strong>0.5%</strong></td><td>JustGiving ~0.9% effective</td></tr>
<tr><td>Registered charity, all commercial sales</td><td><strong>0.5%</strong></td><td>flat &#8212; nobody is priced below a charity</td></tr>
</tbody></table></figure>
<!-- /wp:table -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"rgba(255,255,255,0.75)"}}} --><p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.75)"><strong style="color:#fff">It drops as you grow.</strong> Every rate above is multiplied down by your monthly sales volume: up to &pound;25k full rate &#183; &pound;25k&#8211;100k &#215;90% &#183; &pound;100k&#8211;500k &#215;80% &#183; over &pound;500k &#215;70%. So a ticketed attraction turning over &pound;200k a month pays 2.0%, not 2.5%.</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"rgba(255,255,255,0.5)"}}} --><p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.5);font-size:0.85rem">Gift Aid on donations is handled by Swiftaid, who bill the charity directly &#8212; we take no share of a Gift Aid reclaim. Stripe&#8217;s own processing fees apply on your account as they would anywhere.</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"human-help","layout":{"type":"constrained"}} -->
<div class="wp-block-group human-help">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">Want a human to set it up?</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Optional, and deliberately kept off your platform bill. Onboarding and training are delivered by <strong>IQLabs</strong> &#8212; the team that built UIIQ &#8212; as a separate consultancy, so your monthly subscription stays low and you only pay for help when you want it.</p><!-- /wp:paragraph -->
<!-- wp:table -->
<figure class="wp-block-table"><table><thead><tr><th>Service</th><th>What it covers</th><th>Price</th><th>Elsewhere</th></tr></thead><tbody>
<tr><td><strong>Express Setup</strong></td><td>One-off, remote. Your account set up and live.</td><td><strong>&pound;50</strong></td><td>HubSpot from $1,500</td></tr>
<tr><td><strong>Standard Setup</strong></td><td>One-off, remote. Full configuration, your data imported, first campaign out.</td><td><strong>&pound;99</strong></td><td>HubSpot Pro $3,000, often mandatory</td></tr>
<tr><td><strong>Training day</strong></td><td>A full day with your team, at IQLabs or on your site.</td><td><strong>&pound;800</strong></td><td>SAP ~&pound;600/day &#183; UK CRM &pound;500&#8211;1,000</td></tr>
<tr><td><strong>Ongoing help</strong></td><td>Ad-hoc, whenever you need it.</td><td><strong>&pound;50/hr online<br>&pound;100/hr on-site</strong></td><td>Salesforce &pound;50&#8211;120/hr</td></tr>
<tr><td><strong>Success retainer</strong></td><td>Four hours a month, online. Someone who knows your account.</td><td><strong>&pound;140/mo</strong></td><td>&#8212;</td></tr>
</tbody></table></figure>
<!-- /wp:table -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9rem"}}} --><p class="has-text-align-center" style="font-size:0.9rem">UIIQ subscribers get around 20% off consultancy, and setup can be waived on an annual commitment. <strong>IQLabs Ltd is not VAT registered, so the price you see is the price you pay.</strong></p><!-- /wp:paragraph -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-align-center has-text-color" style="color:#6b7280;font-size:0.85rem">You do not have to buy any of it. Sign up, configure it yourself, and go live the same day &#8212; plenty of customers do.</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"worked-example","style":{"color":{"background":"#f0f4ff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group worked-example" style="background-color:#f0f4ff">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">What it comes to in practice</h2><!-- /wp:heading -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">A corner shop</h4><!-- /wp:heading -->
<!-- wp:paragraph --><p>One till, two staff, a few hundred products, light marketing.</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.6rem","fontWeight":"700"}}} --><p style="font-size:1.6rem;font-weight:700">~&pound;115<span style="font-size:1rem;font-weight:400;color:#6b7280">/mo all in</span></p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">A busy venue</h4><!-- /wp:heading -->
<!-- wp:paragraph --><p>Three tills, twelve staff, 400 products, 2,000 contacts, &pound;20k a month through the platform, marketing running properly.</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.6rem","fontWeight":"700"}}} --><p style="font-size:1.6rem;font-weight:700">&pound;525<span style="font-size:1rem;font-weight:400;color:#6b7280">/mo platform</span></p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-color" style="color:#6b7280;font-size:0.85rem">&pound;339 plan + &pound;186 usage, plus ~&pound;300 platform fee taken off their sales. ~&pound;825 all in, on &pound;20k of turnover.</p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">A professional practice</h4><!-- /wp:heading -->
<!-- wp:paragraph --><p>Four staff, no till, client work, steady content marketing. No platform fee.</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.6rem","fontWeight":"700"}}} --><p style="font-size:1.6rem;font-weight:700">~&pound;187<span style="font-size:1rem;font-weight:400;color:#6b7280">/mo all in</span></p><!-- /wp:paragraph -->
</div><!-- /wp:column -->
</div><!-- /wp:columns -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#6b7280"}}} --><p class="has-text-align-center has-text-color" style="color:#6b7280;font-size:0.85rem">Worked from the live pricing calculator, July 2026. Put your own numbers in and you will get your own figure.</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://app.uiiq.co.uk/pricing">Estimate your bill</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"trust-strip","layout":{"type":"constrained"}} -->
<div class="wp-block-group trust-strip">
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>14-day free trial</strong><br><span style="color:#6b7280;font-size:0.85rem">No card required to start</span></p><!-- /wp:paragraph --></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>Set up yourself, free</strong><br><span style="color:#6b7280;font-size:0.85rem">Or from &pound;50 if you want help</span></p><!-- /wp:paragraph --></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>UK data &#183; GDPR</strong><br><span style="color:#6b7280;font-size:0.85rem">London servers, fully compliant</span></p><!-- /wp:paragraph --></div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>Cancel any time</strong><br><span style="color:#6b7280;font-size:0.85rem">Monthly rolling, no lock-in</span></p><!-- /wp:paragraph --></div><!-- /wp:column -->
</div><!-- /wp:columns -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"faq","layout":{"type":"constrained"}} -->
<div class="wp-block-group faq">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">Frequently asked questions</h2><!-- /wp:heading -->

<!-- wp:details --><details class="wp-block-details"><summary>What happens if I use more credits than my plan includes?</summary>
<!-- wp:paragraph --><p>Nothing stops. You carry on working and the extra is metered at 0.5p a credit, shown live in your dashboard as it accrues, and added to your next monthly invoice in arrears. So your invoice on the 1st is this month&#8217;s plan plus last month&#8217;s usage. If you are consistently over, moving up a plan size is usually cheaper &#8212; the platform will tell you when that is the case.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Do unused credits roll over?</summary>
<!-- wp:paragraph --><p>No. The monthly allowance resets when your plan renews. It is sized to cover normal use for the plan, not to be banked.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Is there a setup fee?</summary>
<!-- wp:paragraph --><p>Not from UIIQ. You can sign up, configure your account and go live the same day at no extra cost. If you would rather someone did it for you, IQLabs will &#8212; Express Setup is &pound;50 and Standard Setup, including your data import and first campaign, is &pound;99. That is a separate, optional consultancy engagement, not a condition of using the platform.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>How does the platform fee work, and when does it apply?</summary>
<!-- wp:paragraph --><p>Only when you take payments through UIIQ. The rate is set by the type of transaction &#8212; 2.5% on tickets, 2.0% on bookings, 1.5% on online orders, 1.0% at the till, 0.5% on donations &#8212; and it reduces as your monthly volume grows. It comes off each sale in real time rather than appearing on your invoice, and your monthly statement itemises exactly what was taken. Your own card processing runs on your own account, so you keep your merchant relationship and your payout terms.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Why is it called a platform fee and not commission?</summary>
<!-- wp:paragraph --><p>Because it pays for the platform, not for finding you the customer. A marketplace takes commission for sending you business. UIIQ does not send you business &#8212; the sale is yours, the customer is yours, and the fee is for the system that processed it. You can also pass it on to the customer at checkout if you prefer.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Which modules do I get?</summary>
<!-- wp:paragraph --><p>That is set by your <a href="/sectors">sector</a>, not your plan size. Every sector gets the core system &#8212; contacts, tasks, HR, campaigns, social, SEO and the AI boardroom &#8212; and then its own signature modules on top: tills and stock for retail, ticketing and gate scan for attractions, classes and registers for a dance school, and so on. The plan size sets your credit allowance and unlocks video, not which features exist.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Why is AI video only on Grow and above?</summary>
<!-- wp:paragraph --><p>Because it is genuinely expensive to produce &#8212; a single 15-second clip is 3,000 credits, which is the whole Start allowance. Start includes one taster so you can see the quality. If video matters to your marketing, Grow is the plan that is built for it.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Can I get a discount?</summary>
<!-- wp:paragraph --><p>Early customers get founding-customer pricing on credits, and annual commitments can have setup waived. Registered charities pay 0.5% on everything they sell. Talk to us &#8212; but the honest answer is that the list price is already below the market on every line, which is rather the point.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Can I change plan mid-month?</summary>
<!-- wp:paragraph --><p>Yes. Upgrades apply immediately, pro-rata, with the credit allowance topped up to match. Downgrades take effect at your next billing date.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Where is my data stored?</summary>
<!-- wp:paragraph --><p>A UK PostgreSQL database in the London region. Fully GDPR compliant. Your data does not leave the UK.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

<!-- wp:details --><details class="wp-block-details"><summary>Do you do multi-site or franchise pricing?</summary>
<!-- wp:paragraph --><p>Yes &#8212; and it is the same pricing. Multiple venues or brands run from one login on Scale, the usage meter counts across all of them, and the volume ladder on the platform fee applies to your combined turnover, so a group pays a lower rate than each site would alone. Get in touch and we will work it through with you.</p><!-- /wp:paragraph -->
</details><!-- /wp:details -->

</div><!-- /wp:group -->

<!-- wp:group {"className":"cta-band","style":{"color":{"background":"var(--wp--preset--color--accent)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-band" style="background-color:var(--wp--preset--color--accent)">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} --><h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff">Ready to see it in action?</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#ffffff"}}} --><p class="has-text-align-center has-text-color" style="color:#ffffff">Book a 30-minute demo and we will show you UIIQ configured for your type of business.</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"color":{"background":"#ffffff","text":"var(--wp--preset--color--accent)"}}} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo" style="background-color:#ffffff;color:var(--wp--preset--color--accent)">Book a Demo</a></div><!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} --><div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/contact" style="color:#ffffff">Talk to Us</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->
CONTENT;

$res = wp_update_post([
    'ID'           => PRICING_PAGE_ID,
    'post_title'   => 'Pricing',
    'post_name'    => 'pricing',
    'post_content' => $content,
    'post_status'  => 'publish',
], true);

echo is_wp_error($res)
    ? 'FAILED: ' . $res->get_error_message() . "\n"
    : "Pricing page rewritten to the 2026-07 model (#" . PRICING_PAGE_ID . ").\n";
