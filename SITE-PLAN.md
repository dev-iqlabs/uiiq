# UIIQ Website — Site Plan

**Site:** uiiq.co.uk
**Purpose:** Marketing / "shop window" for the UIIQ platform — Sell, Grow, and Run your business all in one place.
**Stack:** WordPress + iqex-block-theme + ubms-connect plugin
**Last updated:** May 2026

---

## What the site needs to do

1. Explain UIIQ (Grow + Run + Sell) as a single, unified platform
2. Speak directly to each sector the platform serves — sector-specific landing pages
3. Drive demos and sign-ups via booking widget or contact form
4. Rank on Google for sector-specific terms ("booking software for", "venue management system", etc.)
5. Communicate back to the UIIQ app (AI editor, SEO dashboard) via ubms-connect

---

## Page Structure

### Core pages

| Page | Slug | Purpose |
|---|---|---|
| Home | `/` | Hero + platform overview + module cards + sector grid + social proof + CTA |
| Sell (Bookings & POS) | `/sell` | Deep-dive on experiences, ticketing, till, memberships, OTA |
| Grow (Marketing) | `/grow` | Deep-dive on campaigns, CRM, social, SEO, paid ads |
| Run (Operations) | `/run` | Deep-dive on tasks, HR, planning, compliance |
| Pricing | `/pricing` | Tiered plans with module breakdown |
| Book a Demo | `/demo` | Booking widget or contact form embedded here |
| About | `/about` | Ultimate Image / IQ Labs — who we are |
| Contact | `/contact` | Contact form via `[ubms_form]` shortcode |
| Privacy Policy | `/privacy-policy` | GDPR |
| Terms | `/terms` | Terms of use |

### Sector landing pages

Each page speaks directly to a named sector — custom headline, pain points, relevant features, and a sector-specific CTA.

| Page | Slug | Key UIIQ angle |
|---|---|---|
| Hospitality & Venues | `/sectors/hospitality` | Table/room bookings, POS till, OTA channels, reviews, email campaigns |
| Attractions & Experiences | `/sectors/attractions` | Timed sessions, QR check-in, Viator/GetYourGuide OTA sync, dynamic pricing |
| Arts & Culture | `/sectors/arts-culture` | Ticketing, memberships, gift vouchers, donor management via CRM |
| Sports & Leisure | `/sectors/sports-leisure` | Class bookings, membership check-in, staff rota (HR), timesheet clock-in |
| Events & Entertainment | `/sectors/events` | Ticketing, capacity management, POS till, promo codes, social scheduling |
| Education & Training | `/sectors/education` | HR onboarding, training matrix, task management, compliance reminders |
| Health & Wellness | `/sectors/health-wellness` | Appointment bookings, memberships, staff timesheets, client email flows |
| Retail & Commerce | `/sectors/retail` | POS till, WooCommerce integration, B2B shop, order workflow |
| Councils & Public Sector | `/sectors/public-sector` | Venue hire, event ticketing, compliance vault, staff HR, procurement trail |
| Theatres & Performing Arts | `/sectors/theatre` | Seated ticketing, gift cards, membership tiers, social media scheduling |

---

## Homepage structure (block-by-block)

```
1. Hero (iqex/hero-media)
   - Headline: "One platform. Sell, Grow, and Run your business — all in one place."
   - Sub: "UIIQ connects your bookings, marketing, and operations so every part of your business works together."
   - CTAs: [Book a Demo] [See Pricing]
   - Background: short looping brand video or dark overlay image

2. Module strip (3 cards)
   - Sell — take bookings, run your till, manage members and OTA channels
   - Grow — campaigns, social scheduling, SEO, paid ads, CRM
   - Run — tasks, HR, planning, compliance, virtual office
   Each links to its own deep-dive page (/sell, /grow, /run).

3. "Who it's for" sector grid
   - 10 sector cards with icon + short description + link to sector landing page
   - Layout: 5×2 grid on desktop, scrollable row on mobile

4. Key features strip (horizontal scrolling or 3-col grid)
   - Real-time OTA channel sync (Viator, GetYourGuide, Klook, TripAdvisor)
   - AI-powered marketing (social scheduling, SEO, email campaigns)
   - Smart POS till (Stripe Terminal + SumUp + cash, offline mode)
   - QR check-in (bookings, memberships, staff clock-in)
   - Multi-tenant: manage multiple venues or brands from one login

5. Social proof / logos
   - "Trusted by" — placeholder for brand logos / case study quotes

6. Pricing summary (link → /pricing)
   - Simple 3-tier card strip: Starter / Growth / Scale

7. Demo CTA (full-width)
   - "Ready to see it in action?" → [Book a Demo] button → /demo

8. Footer
   - Links: Sell, Grow, Run, Pricing, Sectors, About, Contact, Privacy, Terms
```

---

## Sector landing page template

Each sector page follows the same structure (single WP template with block patterns):

```
1. Hero — sector-specific headline + sub-headline + CTA
2. "Built for [sector]" — 3–4 pain points addressed by UIIQ
3. Feature highlights — 4–6 relevant UIIQ features with icons
4. Module breakdown — which of Sell / Grow / Run is most relevant + how they connect
5. Quote / case study placeholder
6. Pricing strip (link to /pricing)
7. Demo CTA
```

---

## Plugins and integration points

| Plugin | What it enables on this site |
|---|---|
| `ubms-connect` | Core: connects site to UIIQ platform (API base, tenant slug, API key). Modules: Website Pages (AI editor reads/edits page content), SEO push, email via SendGrid, booking shortcodes. |

ubms-connect replaces the old stack of separate plugins (iqex-ubms-bridge, ubms-seo, ubms-email, posm-booking). Single install, all modules configured via the Settings UI.

---

## wp-config.php constants needed

```php
define( 'IQEX_API_TOKEN',          'your-token' );
define( 'IQEX_API_BASE',           'https://api.iqex.co.uk' );
define( 'GITHUB_PAT',              'ghp_xxx' );
```

Remaining credentials (SendGrid key, HMAC secrets, POSM API key) are entered via the ubms-connect Settings UI in WP admin — no wp-config.php constants needed for those.

---

## SEO targets by page

| Page | Primary keyword target |
|---|---|
| Home | "all-in-one venue management software UK" |
| /sell | "online booking system for venues UK" |
| /grow | "venue marketing software UK" |
| /run | "venue operations management software" |
| /sectors/hospitality | "hospitality management software UK" |
| /sectors/attractions | "attraction booking software UK" |
| /sectors/events | "event ticketing and management software UK" |
| /sectors/sports-leisure | "gym and leisure centre management software UK" |
| /sectors/health-wellness | "health and wellness booking software UK" |
| /sectors/arts-culture | "arts venue ticketing software UK" |
| /sectors/education | "training centre management software UK" |
| /sectors/retail | "retail POS and WooCommerce management UK" |
| /sectors/theatre | "theatre ticketing software UK" |
| /sectors/public-sector | "council venue hire management software UK" |

---

## mu-plugin CSS architecture (`uiiq-config.php`)

All brand overrides live in `wp-content/mu-plugins/uiiq-config.php` as an inline `<style id="uiiq-brand">` block output at priority 99 (after theme styles).

### Key overrides

| Rule | What it does |
|---|---|
| `body { background-color: #ffffff }` | Overrides the theme's warm beige body colour (`rgb(246,244,239)`) |
| `body::before { display: none }` | Removes the theme's pink radial gradient pseudo-element that bled through all sections |
| `.modules-strip`, `.why-one-platform`, `.sectors-grid`, `.features-strip`, `.pricing-strip` | Adds `clamp(56px, 8vw, 96px)` top/bottom padding to every homepage section (the theme's `.alignfull` rule never matched because none of these sections carry that class) |
| `.cta-band` | Tighter `clamp(48px, 6vw, 72px)` padding for the "Ready to see it in action?" band |
| `main h2.wp-block-heading` | `margin-bottom: 1.2em` — keeps headings away from the card rows below |
| `.pricing-strip .wp-block-column` | `padding: 40px 36px 36px` — more generous internal card padding |
| `main .wp-block-column:has(> .wp-block-heading)` | Auto-styles any column that opens with a heading as a white card (border, shadow, radius) |

### Section class names (homepage only)

WordPress adds custom class names to each Group block via the block editor's "Additional CSS class" field. These are the names in use:

`modules-strip` · `why-one-platform` · `sectors-grid` · `features-strip` · `pricing-strip` · `cta-band`

---

## Deploy & cache purge

20i Stack Cache has a 60-hour TTL. After any mu-plugin change:

```bash
# 1. Commit + push (triggers 20i git integration, but cache still stale)
git add wp-content/mu-plugins/uiiq-config.php
git commit -m "style: ..."
git push origin main

# 2. Direct SSH deploy (faster than waiting for git integration)
bash deploy.sh

# 3. Purge Stack Cache via web context
#    (WP-CLI won't work — it runs as root, cache server ignores the purge)
printf '<?php\ndefine("PLUGIN_DIR",__DIR__."/wp-content/mu-plugins/");\ndefine("WPINC","wp-includes");\nrequire"/usr/share/php/wp-stack-cache.php";\nWPStackCache::purge("all");\necho"ok";\n' \
  | ssh "uiiq.co.uk@ssh.gb.stackcp.com" "cat > /home/sites/34b/0/0518876bc6/public_html/p.php" \
  && ssh "uiiq.co.uk@ssh.gb.stackcp.com" "curl -s https://uiiq.co.uk/p.php && rm /home/sites/34b/0/0518876bc6/public_html/p.php"
```

**Why the web-context purge?** `WPStackCache::purge()` calls `cache.stackcp.com/cache.php?q=all&iam=<unix_user>`. From WP-CLI the unix user is `root`; the cache server only honours purges from `uiiq.co.uk`. Running via an HTTP request sets the correct process owner.

**Never** set `wp-stack-cache-options` via `wp option add --format=json` — WP-CLI stores it as a PHP array but Stack Cache calls `json_decode()` on it expecting a string, causing a fatal error.

---

## Build order

1. Set up 20i stack + WordPress install + domain
2. Install iqex-block-theme (pull from GitHub with PAT)
3. Push this repo's mu-plugins via Git integration or deploy.sh
4. Install + configure ubms-connect (Website Pages, SEO, email, POSM modules)
5. Add wp-config.php constants
6. Build homepage blocks
7. Build /sell, /grow, /run deep-dive pages
8. Build /pricing and /demo pages
9. Build sector landing pages (10 × template)
10. Connect UIIQ SEO dashboard + Website AI in UIIQ app settings
11. Set up POSM vendor record for uiiq.co.uk (for the booking widget on /demo)
