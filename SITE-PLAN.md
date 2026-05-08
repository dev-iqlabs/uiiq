# UIIQ Website — Site Plan

**Site:** uiiq.co.uk
**Purpose:** Marketing / "shop window" for the UIIQ platform — bookings, marketing, and operations all-in-one.
**Stack:** WordPress + iqex-block-theme + UBMS ecosystem plugins
**Last updated:** May 2026

---

## What the site needs to do

1. Explain UIIQ (UBMS + UVOS + POSM) as a single, unified platform
2. Speak directly to each sector the platform serves — sector-specific landing pages
3. Drive demos and sign-ups via POSM booking widget or contact form
4. Rank on Google for sector-specific terms ("booking software for", "venue management system", etc.)
5. Communicate back to the UIIQ app (UBMS AI editor, SEO dashboard) via iqex-ubms-bridge

---

## Page Structure

### Core pages

| Page | Slug | Purpose |
|---|---|---|
| Home | `/` | Hero + platform overview + sector cards + social proof + CTA |
| Marketing (UBMS) | `/marketing` | Deep-dive on campaigns, CRM, social, SEO, ads |
| Operations (UVOS) | `/operations` | Deep-dive on tasks, HR, planning, compliance |
| Bookings & POS (POSM) | `/bookings` | Deep-dive on experiences, ticketing, till, memberships |
| Pricing | `/pricing` | Tiered plans with module breakdown |
| Book a Demo | `/demo` | POSM booking widget or contact form embedded here |
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
| Events & Entertainment | `/sectors/events` | Ticketing, capacity management, POSM Till, promo codes, social scheduling |
| Education & Training | `/sectors/education` | HR onboarding, training matrix, task management, compliance reminders |
| Health & Wellness | `/sectors/health-wellness` | Appointment bookings, memberships, staff timesheets, client email flows |
| Retail & Commerce | `/sectors/retail` | POSM Till, WooCommerce integration, B2B shop, UBMS order workflow |
| Councils & Public Sector | `/sectors/public-sector` | Venue hire, event ticketing, compliance vault, staff HR, procurement trail |
| Theatres & Performing Arts | `/sectors/theatre` | Seated ticketing, gift cards, membership tiers, social media scheduling |

---

## Homepage structure (block-by-block)

```
1. Hero (iqex/hero-media)
   - Headline: "One platform. Bookings, marketing, and operations — all in one place."
   - Sub: "UIIQ brings POSM, UBMS, and UVOS together so every part of your business talks to each other."
   - CTAs: [Book a Demo] [See Pricing]
   - Background: short looping brand video or dark overlay image

2. Module strip (3 cards)
   - POSM: Bookings & POS — take bookings, run your till, manage members
   - UBMS: Marketing — campaigns, social, SEO, paid ads, CRM
   - UVOS: Operations — tasks, HR, planning, compliance
   Each links to its own deep-dive page.

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
   - Links: product modules, sectors, pricing, about, contact, privacy, terms
```

---

## Sector landing page template

Each sector page follows the same structure (single WP template with block patterns):

```
1. Hero — sector-specific headline + sub-headline + CTA
2. "Built for [sector]" — 3–4 pain points addressed by UIIQ
3. Feature highlights — 4–6 relevant UIIQ features with icons
4. Module breakdown — which of POSM / UBMS / UVOS is most relevant + how they connect
5. Quote / case study placeholder
6. Pricing strip (link to /pricing)
7. Demo CTA
```

---

## Plugins and integration points

| Plugin | What it enables on this site |
|---|---|
| `iqex-ubms-bridge` | UBMS Website AI editor can read and edit page content; brand meta REST endpoint |
| `ubms-seo` | Live page URLs surfaced to UBMS SEO dashboard; Yoast replacement |
| `ubms-email` | All WP transactional mail (contact forms, password reset) routes via SendGrid |
| `posm-booking` | `[posm_booking vendor="uiiq"]` shortcode on /demo page; gift card check shortcode |

---

## wp-config.php constants needed

```php
define( 'IQEX_API_TOKEN',          'your-token' );
define( 'IQEX_API_BASE',           'https://api.iqex.co.uk' );
define( 'UBMS_SENDGRID_API_KEY',   'SG.xxx' );
define( 'IQEX_UBMS_BRIDGE_SECRET', 'your-hmac-secret' );
define( 'GITHUB_PAT',              'ghp_xxx' );
```

---

## SEO targets by page

| Page | Primary keyword target |
|---|---|
| Home | "all-in-one venue management software UK" |
| /bookings | "online booking system for venues UK" |
| /marketing | "venue marketing software UK" |
| /operations | "venue operations management software" |
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

## Build order

1. Set up 20i stack + WordPress install + domain
2. Install iqex-block-theme (pull from GitHub with PAT)
3. Push this repo's mu-plugins via Git integration or deploy.sh
4. Install + configure UBMS ecosystem plugins (bridge, seo, email, posm-booking)
5. Add wp-config.php constants
6. Build homepage blocks
7. Build /bookings, /marketing, /operations deep-dive pages
8. Build /pricing and /demo pages
9. Build sector landing pages (10 × template)
10. Connect UBMS SEO dashboard + Website AI in UBMS settings
11. Set up POSM vendor record for uiiq.co.uk (for the booking widget on /demo)
