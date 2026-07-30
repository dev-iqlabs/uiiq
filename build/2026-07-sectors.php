<?php
/**
 * Rebuild /sectors + every sector landing page to mirror the LIVE UIIQ sector
 * presets (sector_presets table), 2026-07-30.
 *
 * Why: the site's ten sector pages were written in May 2026 against a marketing
 * sector list that never matched the platform. Only four overlapped with a real
 * preset, and every page still sold "UBMS / UVOS / POSM" — dead brand names.
 * A prospect landing on /sectors/hospitality was reading about a configuration
 * UIIQ cannot actually provision.
 *
 * Now: one page per public preset, feature copy drawn from that preset's real
 * feature set, and the finalised pricing (Start £39 / Grow £169 / Scale £339 +
 * credits + platform fee by transaction type) on every page.
 *
 * "Internal (All Tools)" is deliberately excluded — it is the Ultimate Image
 * staff preset, not a sellable sector.
 *
 * Run:  wp eval-file build/2026-07-sectors.php
 */

const SECTORS_PARENT_ID = 16;

/** Site copy → WP-safe entities. Content is authored in plain UTF-8 above. */
function uiiq_esc(string $s): string {
    $s = htmlspecialchars($s, ENT_NOQUOTES | ENT_HTML5, 'UTF-8');
    return strtr($s, [
        '—' => '&#8212;',
        '→' => '&#8594;',
        '’' => '&#8217;',
        '·' => '&#183;',
        '£' => '&pound;',
    ]);
}

/**
 * Sector definitions. `id` = existing page to repurpose, 0 = create.
 * `fee` = the platform-fee line for this sector's dominant transaction types,
 * or null where Commerce is an optional add-on and no fee applies by default.
 */
$sectors = [

// ─────────────────────────────────────────────────────────────── attractions
[
'id' => 18, 'slug' => 'attractions', 'title' => 'Visitor Attractions',
'preset' => 'Visitor Attraction',
'card' => 'Ticketed attractions, parks, heritage sites and country estates.',
'headline' => 'Tickets, till, kitchen and marketing — one system, one login.',
'sub' => 'Sell timed tickets, run the gate, serve food and market the season without four suppliers and four invoices.',
'pains' => [
  'Your ticketing platform, your till and your café EPOS are three systems that never agree on what a day actually took',
  'The OTA channels sell tickets you then have to reconcile by hand',
  'Marketing the season means exporting a visitor list and pasting it into something else',
],
'features' => [
  ['Experiences & timed tickets', 'Bookable experiences, packages and timed-entry sessions with capacity per slot. Pricing rules engine for peak, off-peak, concessions and group rates.'],
  ['Gate & till', 'Walk-in sales and till sessions on the same catalogue as your online tickets. Card-present, cash and gift card on one transaction.'],
  ['Food service', 'Menus, table service and a kitchen display system — the café runs on the same platform as the gate, so the day-end figure is one number.'],
  ['OTA channels', 'Sync availability and allocation out to your travel-agent channels; bookings land back in the same calendar as your direct sales.'],
  ['Memberships & gift cards', 'Annual passes, renewals and member check-in. Branded gift cards sold online or at the gate, balance tracked live.'],
  ['Season marketing', 'Email and SMS campaigns to your visitor list, social scheduling, press releases and AI campaign briefs — segmented by what people actually booked.'],
],
'fee' => 'Tickets 2.5% · card-present 1.0%',
'plan' => 'Most attractions land on Scale · Visitor Attraction.',
'cta' => 'See UIIQ configured for your attraction.',
'seo' => 'attraction booking and ticketing software UK',
],

// ─────────────────────────────────────────────────────────────────── museums
[
'id' => 22, 'slug' => 'museums', 'title' => 'Museums & Galleries',
'preset' => 'Museum',
'card' => 'Museums, galleries and heritage collections — visitors, shop and memberships.',
'headline' => 'Visitors, membership and the gift shop — without three systems.',
'sub' => 'Admissions, memberships, the shop till and your interpretation content all run from one platform, with a knowledge brain trained on your collection.',
'pains' => [
  'Membership renewals live in a spreadsheet and nobody knows who has lapsed',
  'The gift shop till has no idea who is a member and neither does the front desk',
  'Interpretation content is a separate project with a separate budget every single time',
],
'features' => [
  ['Admissions & experiences', 'Bookable experiences, tours and timed entry with capacity control. Promo codes for schools, groups and local-resident schemes.'],
  ['Memberships', 'Membership plans, renewals and member management — recognised at the front desk and at the shop till, because it is one system.'],
  ['Shop & till', 'Own-stock retail catalogue, stock control and point-of-sale. Gift cards sold online or at the counter.'],
  ['Make a Trail', 'Build a scannable visitor trail — characters, locations, storyline and finished experience — step by step, with AI doing the production work.'],
  ['Knowledge brains', 'Ask questions against curated evidence packs built from your own collection and archive material, not a generic chatbot.'],
  ['Displays & signage', 'Customer-facing displays driven from the same content you already hold. Change the screen without changing supplier.'],
],
'fee' => 'Tickets 2.5% · card-present 1.0%',
'plan' => 'Grow · Museum for a single site; Scale once you add food service or multiple spaces.',
'cta' => 'See UIIQ configured for your museum.',
'seo' => 'museum ticketing and membership software UK',
],

// ──────────────────────────────────────────────────────────────────── retail
[
'id' => 24, 'slug' => 'retail', 'title' => 'Retail',
'preset' => 'Retail',
'card' => 'Shops — till, stock, online shop and sales channels.',
'headline' => 'One catalogue. Your till, your website and your channels all selling from it.',
'sub' => 'Stock, point-of-sale, online orders and the marketing that drives them — on one platform, priced so a small shop can actually afford it.',
'pains' => [
  'In-store stock and online stock are reconciled by hand, usually on a Sunday',
  'Your email list has no idea what anyone has ever bought, so every campaign goes to everyone',
  'You are paying a card reader company 2.6% and a subscription, and still doing your marketing somewhere else',
],
'features' => [
  ['Till & walk-in', 'Walk-in sales and till sessions with mixed payments. Card-present costs you 1.0% platform fee on top of your own card processing — and you keep your own merchant account.'],
  ['Stock & catalogue', 'Own-stock retail catalogue with stock control, plus the product catalogue that feeds your online shop. One product record, everywhere it sells.'],
  ['Sales channels', 'Connect and sync external sales channels so a sale anywhere decrements one stock figure.'],
  ['Purchase-led marketing', 'Segment the contact database by what people actually bought. Re-order reminders, related products and loyalty offers triggered by real purchase behaviour.'],
  ['Search & ads', 'Google Ads, paid social, SEO audits, Search Console and GA4 in one dashboard, with a morning AI brief on what moved.'],
  ['Gift cards & promos', 'Digital and physical gift cards redeemable online or at the till, plus promotional discount codes with real redemption reporting.'],
],
'fee' => 'Card-present 1.0% · online orders 1.5%',
'plan' => 'A single shop fits Start · Retail; multi-till operations land on Grow or Scale.',
'cta' => 'See UIIQ configured for your shop.',
'seo' => 'retail EPOS and stock management software UK',
],

// ─────────────────────────────────────────────────────────────── dance schools
[
'id' => 25, 'slug' => 'dance-schools', 'title' => 'Dance & Performing Arts Schools',
'preset' => 'Dance School',
'card' => 'Dance schools, studios and performing arts academies — classes, students and shows.',
'headline' => 'Classes, registers, fees and parents — handled.',
'sub' => 'Term courses, recurring classes, enrolments and class payments, with the marketing and staff admin attached instead of bolted on.',
'pains' => [
  'Registers are on paper, enrolments are in a spreadsheet and fees are chased over WhatsApp',
  'Show tickets and costume orders are a separate scramble every term',
  'You are teaching, so the marketing only happens when there is a gap — which there never is',
],
'features' => [
  ['Classes & courses', 'Recurring classes and term courses with students, guardians, enrolments, registers and class payments in one place.'],
  ['Memberships & gift cards', 'Termly and rolling membership plans with renewals, plus gift cards for the ones bought as presents.'],
  ['Events & shows', 'Create the show once and fan out AI-drafted marketing for it — tickets, socials, email, press — for you to approve rather than write.'],
  ['Parent communication', 'Email and SMS campaigns to the student list, which the platform keeps current because it is the same list the registers run on.'],
  ['Staff & training', 'Teacher records, leave, timesheets, onboarding checklists and a training matrix with expiry reminders for DBS and first aid.'],
  ['Boardroom & brains', 'Ask the AI boardroom what to do about a quiet term, backed by sector knowledge rather than a blank chat box.'],
],
'fee' => 'Class and course bookings 2.0%',
'plan' => 'Start · Dance School for a single studio; Grow once you are marketing shows.',
'cta' => 'See UIIQ configured for your school.',
'seo' => 'dance school class booking and management software UK',
],

// ──────────────────────────────────────────────────────────────── education
[
'id' => 23, 'slug' => 'education', 'title' => 'Education & Training Providers',
'preset' => 'Education Provider',
'card' => 'Training centres, education providers and course delivery.',
'headline' => 'Course bookings, learner records and compliance in one platform.',
'sub' => 'Take course bookings, track delivery, keep the evidence, and produce the learning content with AI instead of a production budget.',
'pains' => [
  'Learner records, course bookings and compliance evidence live in three places and only one of them is backed up',
  'Producing course content means a videographer, a designer and six weeks',
  'Reporting to a funder means rebuilding the same spreadsheet every quarter',
],
'features' => [
  ['Course bookings', 'Bookings and enquiry management for courses and cohorts, with the client database and confirmations attached.'],
  ['Training & inductions', 'Staff and learner training modules with completion tracking — IQ Inductions pricing works out around £3.75 a completion against £15–30 elsewhere.'],
  ['Forms & intake', 'IQForms for enrolment, intake, assessment and feedback — embeddable anywhere, with responses landing against the learner record.'],
  ['Content production', 'Evidence-grounded presenter video, image packs and video assets generated from your own material, through guided workshops.'],
  ['Workflow & tasks', 'Task boards and automated workflow templates so course delivery, marking and certification run to a repeatable sequence.'],
  ['Reporting & KPIs', 'Combined reports, KPI dashboard and a business planner — the funder report assembled from live data rather than rebuilt.'],
],
'fee' => 'Course bookings 2.0%',
'plan' => 'Grow · Education Provider is the usual fit; content-heavy providers go to Scale.',
'cta' => 'See UIIQ configured for your training centre.',
'seo' => 'training provider course booking and compliance software UK',
],

// ─────────────────────────────────────────────────────────────── health care
[
'id' => 19, 'slug' => 'health-care', 'title' => 'Health & Care',
'preset' => 'Health Care Organisation',
'card' => 'Health and care organisations — intake, records, compliance and staff.',
'headline' => 'Intake, records and compliance — without a clinical system price tag.',
'sub' => 'Client intake forms, document control, staff compliance and the communication around them, on a platform that starts at £39 a month.',
'pains' => [
  'Intake is a PDF someone prints, fills in and scans back',
  'Staff training expiry is tracked on a wall chart and found out about at inspection',
  'Every document request means digging through email',
],
'features' => [
  ['Intake & compliance forms', 'IQForms for referral, intake, consent and assessment, embeddable on your site, with a DPA in place and responses held against the client record.'],
  ['Document control', 'Store correspondence, policies, contracts, DBS certificates, insurance and licences with a single place to look.'],
  ['Staff & training matrix', 'Staff records, leave, timesheets, onboarding checklists and training with expiry reminders — so the compliance date finds you first.'],
  ['Client communication', 'Email and SMS to the client database, plus a website and landing pages managed from the same login.'],
  ['Workflow management', 'Automated workflow templates for referral-to-discharge, review cycles and recurring checks.'],
  ['Reporting & intelligence', 'KPI dashboard, combined reports and AI business intelligence over your own operational data.'],
],
'fee' => null,
'plan' => 'Start · Health & Care covers most single services. Commerce is an optional add-on — no platform fee unless you switch it on.',
'cta' => 'See UIIQ configured for your service.',
'seo' => 'health and care compliance and intake software UK',
],

// ────────────────────────────────────────────────────────── financial advisors
[
'id' => 20, 'slug' => 'financial-advisors', 'title' => 'Financial Advisors',
'preset' => 'Financial Advisor',
'card' => 'Independent financial advisors — clients, proposals and compliance.',
'headline' => 'Client relationships, proposals and the marketing you never get to.',
'sub' => 'A CRM built around client meetings and proposals, with the content marketing, search visibility and back-office running from the same place.',
'pains' => [
  'Your CRM does contacts and nothing else, so proposals are Word documents in a folder',
  'You know content marketing would win clients and you have written none of it',
  'Costs, KPIs and the business plan are three separate spreadsheets you look at once a year',
],
'features' => [
  ['Client database & meetings', 'Client records, organisations and booking management for review meetings, with the whole history in one place.'],
  ['Estimates & proposals', 'Price list, job estimates and a branded proposal builder — out the door the same day rather than the following week.'],
  ['Content that gets written', 'Evidence-grounded video, service briefs, social posts and email campaigns produced through guided AI workshops from your own material.'],
  ['Search visibility', 'SEO audits, Search Console, GA4, Google Ads and paid social in one dashboard, with a morning AI brief on performance.'],
  ['Costs & business plan', 'Track bills, expenses and recurring costs feeding a live business plan, forecasts and KPI dashboard.'],
  ['AI boardroom', 'Strategy sessions with the virtual advisory team, grounded in sector knowledge brains rather than generic advice.'],
],
'fee' => 'Meeting and service bookings 2.0% if you take payment through UIIQ',
'plan' => 'Grow · Financial Advisor suits a practice doing real content marketing.',
'cta' => 'See UIIQ configured for your practice.',
'seo' => 'financial advisor CRM and marketing software UK',
],

// ────────────────────────────────────────────────────────── funeral directors
[
'id' => 21, 'slug' => 'funeral-directors', 'title' => 'Funeral Directors',
'preset' => 'Funeral Director',
'card' => 'Funeral directors — arrangements, estimates, tribute films and aftercare.',
'headline' => 'Arrangements, estimates and tribute films — one platform, handled with care.',
'sub' => 'The arrangement process, the paperwork behind it and the memorial products families ask for, without adding another supplier.',
'pains' => [
  'Estimates are rebuilt from a template every time and the numbers drift',
  'Tribute films are outsourced, slow and expensive, so you rarely offer them',
  'Aftercare contact is well-intentioned and, in practice, ad hoc',
],
'features' => [
  ['Arrangements & bookings', 'Booking and enquiry management for arrangement meetings, with the family record, documents and correspondence held together.'],
  ['Estimates & proposals', 'A maintained price list, job estimates and branded proposals — consistent figures, produced in minutes, at a difficult moment.'],
  ['Legacy Films', 'Tribute film library with delivery, signed client view links and archive — produced in-house instead of subcontracted.'],
  ['Print & memorial products', 'Order-of-service and print marketing, plus a reseller catalogue of memorial products you can sell without holding stock.'],
  ['Costs & reporting', 'Bills, expenses and recurring costs feeding cost-of-goods, KPIs and combined reports — so you know the margin on each arrangement.'],
  ['Aftercare communication', 'Scheduled, appropriate follow-up by email and SMS from the same client database, with tasks and workflows behind it.'],
],
'fee' => 'Online and catalogue orders 1.5%',
'plan' => 'Grow · Funeral Director covers a single branch with films included.',
'cta' => 'See UIIQ configured for your funeral home.',
'seo' => 'funeral director management and tribute film software UK',
],

// ─────────────────────────────────────────────────────────── service business
[
'id' => 17, 'slug' => 'service-business', 'title' => 'Professional & Service Businesses',
'preset' => 'Service Business',
'card' => 'Agencies, consultancies, trades admin and client services.',
'headline' => 'Clients, proposals and delivery — one place, £39 a month.',
'sub' => 'The client work, the estimates that win it and the operations that deliver it, without a per-seat CRM bill that scales faster than you do.',
'pains' => [
  'Proposals, projects and invoicing are three tools with three subscriptions and no shared data',
  'Every new starter costs another per-seat licence on every one of them',
  'You have a business plan somewhere and it has not been opened since it was written',
],
'features' => [
  ['Client & organisation records', 'Contacts and B2B organisation relationships, with correspondence and documents against each.'],
  ['Estimates & proposals', 'Price list, job estimates and a branded proposal builder — the quote out while the conversation is still warm.'],
  ['Task management', 'Kanban boards, job cards, calendar and workload views so delivery is visible without a status meeting.'],
  ['Business plan & KPIs', 'A living business plan with forecasts, financial statements and a KPI dashboard fed by real numbers.'],
  ['Marketing that runs itself', 'Email campaigns, social scheduling, SEO audits and a content calendar — from the same client database.'],
  ['AI boardroom', 'Strategy sessions with the virtual advisory team when you need a second opinion and there is nobody to ask.'],
],
'fee' => null,
'plan' => 'Start · Professional at £39/mo is the anchor. Commerce is an optional add-on — no platform fee unless you switch it on.',
'cta' => 'See UIIQ configured for your business.',
'seo' => 'small business CRM proposals and operations software UK',
],

// ────────────────────────────────────────────────────────── artists & agents
[
'id' => 26, 'slug' => 'artists-agents', 'title' => 'Artists & Agents',
'preset' => 'Artist or Agent',
'card' => 'Artists, performers and agents — bookings, merchandise and audience.',
'headline' => 'Bookings, merch and your audience list — under your control.',
'sub' => 'Take the booking, sell the merchandise and own the audience relationship, instead of renting all three from platforms that keep the data.',
'pains' => [
  'Booking enquiries arrive in four inboxes and get answered in whichever one you opened',
  'Merch means either holding stock or handing the margin to a print platform',
  'Your audience lives on someone else’s platform and you cannot email them',
],
'features' => [
  ['Bookings & enquiries', 'Booking management for dates, enquiries and confirmations, with the full history against each promoter or client.'],
  ['Merchandise without stock', 'Sell from the UIIQ catalogue at trade price, or resell on your own connected shop with the fee split and payouts handled.'],
  ['Print on demand', 'Design and order print materials and merchandise — posters, cards, apparel — without a minimum order.'],
  ['Your own audience list', 'A contact database you own, with email and SMS campaigns, so the relationship is not rented from a social platform.'],
  ['Social templates', 'Design Studio templates rendered straight to scheduled social posts — on-brand output without opening a design tool.'],
  ['Gift cards & promos', 'Gift cards and promotional codes for tours, launches and seasonal pushes.'],
],
'fee' => 'Online and merchandise orders 1.5%',
'plan' => 'Start · Artist or Agent, moving to Grow when you want video in the mix.',
'cta' => 'See UIIQ configured for your work.',
'seo' => 'artist and agent booking and merchandise platform UK',
],

// ─────────────────────────────────────────────────────────────────── authors
[
'id' => 0, 'slug' => 'authors', 'title' => 'Authors',
'preset' => 'Author',
'card' => 'Book authors — launches, direct sales and reader audience.',
'headline' => 'Sell direct, launch properly, and keep your readers.',
'sub' => 'Direct sales, launch campaigns and a reader list that belongs to you — with the marketing produced by AI rather than a publicist you cannot afford.',
'pains' => [
  'Selling direct means a shop platform, a fulfilment problem and a third of the margin gone',
  'A launch is a fortnight of social posts you write yourself at midnight',
  'Your readers are on a retailer’s list, not yours',
],
'features' => [
  ['Direct sales', 'Buy UIIQ catalogue products at trade price, or resell on your own connected shop with the fee split and payouts handled for you.'],
  ['Launch campaigns', 'Create the launch as an event once and fan out AI-drafted marketing across email, social and press for you to approve.'],
  ['Reader list', 'A contact database you own, with email and SMS campaigns and real segmentation.'],
  ['Search & ads', 'Google Ads, paid social, SEO audits, Search Console and GA4 in one dashboard with a morning AI brief.'],
  ['Content production', 'Product briefs, social videos and image assets generated through guided workshops from your own material.'],
  ['Press & PR', 'Press releases and journalist contact management, so the launch reaches someone other than your existing followers.'],
],
'fee' => 'Online and book orders 1.5%',
'plan' => 'Start · Author between books; Grow around a launch when video matters.',
'cta' => 'See UIIQ configured for your books.',
'seo' => 'author direct sales and book launch marketing platform UK',
],

];

// ─────────────────────────────────────────────────────── page render helpers

/** Render an iqex/hero-media block, JSON-encoding the attributes properly. */
function uiiq_hero(string $heading, string $sub): string {
    $attrs = json_encode([
        'overlayHeading' => $heading,
        'overlaySub'     => $sub,
        'ctaOneLabel'    => 'Book a Demo',
        'ctaOneUrl'      => '/demo',
        'ctaTwoLabel'    => 'See Pricing',
        'ctaTwoUrl'      => '/pricing',
        'heightPreset'   => 'large',
        'dimLevel'       => 50,
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    return "<!-- wp:iqex/hero-media {$attrs} /-->\n";
}

function uiiq_sector_content(array $s): string {
    $out = uiiq_hero($s['headline'], $s['sub']);

    // Pain points
    $out .= "\n<!-- wp:group {\"className\":\"pain-points\",\"layout\":{\"type\":\"constrained\"}} -->\n";
    $out .= "<div class=\"wp-block-group pain-points\">\n";
    $out .= "<!-- wp:heading {\"level\":3} --><h3 class=\"wp-block-heading\">Sound familiar?</h3><!-- /wp:heading -->\n";
    $out .= "<!-- wp:list -->\n<ul class=\"wp-block-list\">\n";
    foreach ($s['pains'] as $p) {
        $out .= '<li>' . uiiq_esc($p) . "</li>\n";
    }
    $out .= "</ul>\n<!-- /wp:list -->\n</div><!-- /wp:group -->\n";

    // Feature grid — two rows of three
    $title = uiiq_esc('Built for ' . $s['title']);
    $out .= "\n<!-- wp:group {\"className\":\"features\",\"layout\":{\"type\":\"constrained\"}} -->\n";
    $out .= "<div class=\"wp-block-group features\">\n";
    $out .= "<!-- wp:heading {\"textAlign\":\"center\"} --><h2 class=\"wp-block-heading has-text-align-center\">{$title}</h2><!-- /wp:heading -->\n";
    foreach (array_chunk($s['features'], 3) as $row) {
        $out .= "<!-- wp:columns -->\n<div class=\"wp-block-columns\">\n";
        foreach ($row as [$fTitle, $fCopy]) {
            $ft = uiiq_esc($fTitle);
            $fc = uiiq_esc($fCopy);
            $out .= "<!-- wp:column -->\n<div class=\"wp-block-column\">\n";
            $out .= "<!-- wp:heading {\"level\":4} --><h4 class=\"wp-block-heading\">{$ft}</h4><!-- /wp:heading -->\n";
            $out .= "<!-- wp:paragraph --><p>{$fc}</p><!-- /wp:paragraph -->\n";
            $out .= "</div><!-- /wp:column -->\n";
        }
        $out .= "</div><!-- /wp:columns -->\n";
    }
    $out .= "</div><!-- /wp:group -->\n";

    // Pricing strip — the finalised model, on every sector page
    $planLine = uiiq_esc($s['plan']);
    $feeLine  = $s['fee']
        ? '<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Platform fee on sales: ' . uiiq_esc($s['fee'])
          . '. Charged only on what you sell through UIIQ, and it drops on volume &#8212; you keep your own card processing account.</p><!-- /wp:paragraph -->'
        : '<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">No platform fee &#8212; this sector does not take payments through UIIQ by default.</p><!-- /wp:paragraph -->';

    $out .= <<<PRICING

<!-- wp:group {"className":"pricing-strip","style":{"color":{"background":"#f0f4ff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group pricing-strip" style="background-color:#f0f4ff">
<!-- wp:heading {"level":3,"textAlign":"center"} --><h3 class="wp-block-heading has-text-align-center">What it costs</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>Start &pound;39</strong> &#183; <strong>Grow &pound;169</strong> &#183; <strong>Scale &pound;339</strong> a month, each with a monthly credit allowance. Everything you run &#8212; contacts, staff, tills, products and AI &#8212; draws on that allowance, and anything beyond it is <strong>0.5p a credit</strong> (&pound;1 = 200 credits), billed in arrears.</p><!-- /wp:paragraph -->
{$feeLine}
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">{$planLine}</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/pricing">Estimate your bill</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->

PRICING;

    // CTA band
    $cta = uiiq_esc($s['cta']);
    $out .= <<<CTA

<!-- wp:group {"className":"cta-band","style":{"color":{"background":"var(--wp--preset--color--accent)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-band" style="background-color:var(--wp--preset--color--accent)">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} --><h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff">{$cta}</h2><!-- /wp:heading -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"color":{"background":"#ffffff","text":"var(--wp--preset--color--accent)"}}} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo" style="background-color:#ffffff;color:var(--wp--preset--color--accent)">Book a Demo</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->

CTA;

    return $out;
}

// ────────────────────────────────────────────────────────── write the pages

foreach ($sectors as $s) {
    $args = [
        'post_title'   => $s['title'],
        'post_name'    => $s['slug'],
        'post_content' => uiiq_sector_content($s),
        'post_parent'  => SECTORS_PARENT_ID,
        'post_type'    => 'page',
        'post_status'  => 'publish',
    ];
    if ($s['id'] > 0) {
        $args['ID'] = $s['id'];
        $id = wp_update_post($args, true);
    } else {
        $existing = get_page_by_path('sectors/' . $s['slug'], OBJECT, 'page');
        if ($existing) {
            $args['ID'] = $existing->ID;
            $id = wp_update_post($args, true);
        } else {
            $id = wp_insert_post($args, true);
        }
    }
    if (is_wp_error($id)) {
        echo "FAILED {$s['slug']}: " . $id->get_error_message() . "\n";
        continue;
    }
    update_post_meta($id, '_uiiq_sector_preset', $s['preset']);
    echo "sector  {$s['slug']}  (#{$id})  <- preset \"{$s['preset']}\"\n";
}

// ───────────────────────────────────────────────────── the /sectors index page

$index  = uiiq_hero(
    'Configured for your kind of business on day one.',
    'UIIQ ships a sector setup for each of these — the right modules switched on, the right words for your customers, and the pricing that fits how you sell.'
);

$index .= <<<HERO

<!-- wp:group {"className":"sectors-intro","layout":{"type":"constrained"}} -->
<div class="wp-block-group sectors-intro">
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Pick your sector and UIIQ starts configured: the modules that matter to you switched on, the ones that do not left off, and your customers called what you call them &#8212; visitors, students, clients or customers. You can change any of it afterwards.</p><!-- /wp:paragraph -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"sectors-grid","layout":{"type":"constrained"}} -->
<div class="wp-block-group sectors-grid">
<!-- wp:heading {"textAlign":"center"} --><h2 class="wp-block-heading has-text-align-center">Sector setups</h2><!-- /wp:heading -->

HERO;

foreach (array_chunk($sectors, 3) as $row) {
    $index .= "<!-- wp:columns -->\n<div class=\"wp-block-columns\">\n";
    foreach ($row as $s) {
        $t = uiiq_esc($s['title']);
        $c = uiiq_esc($s['card']);
        $index .= "<!-- wp:column -->\n<div class=\"wp-block-column\">\n";
        $index .= "<!-- wp:heading {\"level\":3} --><h3 class=\"wp-block-heading\"><a href=\"/sectors/{$s['slug']}\">{$t}</a></h3><!-- /wp:heading -->\n";
        $index .= "<!-- wp:paragraph --><p>{$c}</p><!-- /wp:paragraph -->\n";
        $index .= "</div><!-- /wp:column -->\n";
    }
    // Pad the final row so the grid keeps its columns
    for ($i = count($row); $i < 3; $i++) {
        $index .= "<!-- wp:column --><div class=\"wp-block-column\"></div><!-- /wp:column -->\n";
    }
    $index .= "</div><!-- /wp:columns -->\n";
}

$index .= <<<TAIL
</div><!-- /wp:group -->

<!-- wp:group {"className":"pricing-strip","style":{"color":{"background":"#f0f4ff"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group pricing-strip" style="background-color:#f0f4ff">
<!-- wp:heading {"level":3,"textAlign":"center"} --><h3 class="wp-block-heading has-text-align-center">Same price list, whichever sector you are in</h3><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center"><strong>Start &pound;39</strong> &#183; <strong>Grow &pound;169</strong> &#183; <strong>Scale &pound;339</strong> a month. The sector decides which modules you get; your usage and your sales decide the rest of the bill.</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/pricing">See pricing</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->

<!-- wp:group {"className":"cta-band","style":{"color":{"background":"var(--wp--preset--color--accent)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-band" style="background-color:var(--wp--preset--color--accent)">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} --><h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff">Not sure which one you are?</h2><!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#ffffff"}}} --><p class="has-text-align-center has-text-color" style="color:#ffffff">Book a demo and we will show you UIIQ set up for how you actually work.</p><!-- /wp:paragraph -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"color":{"background":"#ffffff","text":"var(--wp--preset--color--accent)"}}} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/demo" style="background-color:#ffffff;color:var(--wp--preset--color--accent)">Book a Demo</a></div><!-- /wp:button -->
</div><!-- /wp:buttons -->
</div><!-- /wp:group -->
TAIL;

$res = wp_update_post([
    'ID'           => SECTORS_PARENT_ID,
    'post_title'   => 'Sectors',
    'post_name'    => 'sectors',
    'post_content' => $index,
    'post_status'  => 'publish',
], true);
echo is_wp_error($res)
    ? 'FAILED sectors index: ' . $res->get_error_message() . "\n"
    : "index   /sectors  (#" . SECTORS_PARENT_ID . ")  " . count($sectors) . " sectors\n";

echo "Done.\n";
