---
version: alpha
name: UIIQ
description: All-in-one venue and business management platform. Clean, indigo-accented, SaaS-optimised. Grow, Run, Sell.
colors:
  primary: "#4F6BDF"
  secondary: "#1e2d6b"
  tertiary: "#7b93e8"
  neutral: "#f7f7f7"
  surface: "#ffffff"
  error: "#d45656"
  success: "#1ba673"
  warning: "#c37d0d"
typography:
  hero-display:
    fontFamily: "Lato, sans-serif"
    fontSize: 72px
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: "-2px"
  display-lg:
    fontFamily: "Lato, sans-serif"
    fontSize: 56px
    fontWeight: 700
    lineHeight: 1.10
    letterSpacing: "-1.5px"
  heading-1:
    fontFamily: "Lato, sans-serif"
    fontSize: 48px
    fontWeight: 700
    lineHeight: 1.10
    letterSpacing: "-1px"
  heading-2:
    fontFamily: "Lato, sans-serif"
    fontSize: 36px
    fontWeight: 700
    lineHeight: 1.20
    letterSpacing: "-0.5px"
  heading-3:
    fontFamily: "Lato, sans-serif"
    fontSize: 28px
    fontWeight: 700
    lineHeight: 1.25
  heading-4:
    fontFamily: "Lato, sans-serif"
    fontSize: 22px
    fontWeight: 700
    lineHeight: 1.30
  heading-5:
    fontFamily: "Lato, sans-serif"
    fontSize: 18px
    fontWeight: 700
    lineHeight: 1.40
  subtitle:
    fontFamily: "Lato, sans-serif"
    fontSize: 18px
    fontWeight: 400
    lineHeight: 1.50
  body-lg:
    fontFamily: "Lato, sans-serif"
    fontSize: 18px
    fontWeight: 400
    lineHeight: 1.60
  body-md:
    fontFamily: "Lato, sans-serif"
    fontSize: 16px
    fontWeight: 400
    lineHeight: 1.55
  body-sm:
    fontFamily: "Lato, sans-serif"
    fontSize: 14px
    fontWeight: 400
    lineHeight: 1.50
  label-md:
    fontFamily: "Lato, sans-serif"
    fontSize: 14px
    fontWeight: 700
    lineHeight: 1.50
  label-sm:
    fontFamily: "Lato, sans-serif"
    fontSize: 13px
    fontWeight: 400
    lineHeight: 1.40
  micro-uppercase:
    fontFamily: "Lato, sans-serif"
    fontSize: 11px
    fontWeight: 700
    lineHeight: 1.40
    letterSpacing: 0.5px
rounded:
  sm: 6px
  md: 8px
  lg: 12px
  full: 9999px
spacing:
  xs: 4px
  sm: 8px
  md: 16px
  lg: 32px
  xl: 64px
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "#ffffff"
    rounded: "{rounded.full}"
    padding: 20px
  button-primary-hover:
    backgroundColor: "#3d57c7"
  button-primary-disabled:
    backgroundColor: "#a8b4ef"
    textColor: "#1e2d6b"
  button-secondary:
    backgroundColor: "transparent"
    textColor: "{colors.primary}"
    rounded: "{rounded.full}"
    padding: 20px
  button-ghost:
    backgroundColor: "transparent"
    textColor: "#5a5a5c"
    rounded: "{rounded.md}"
    padding: 14px
  button-dark:
    backgroundColor: "{colors.secondary}"
    textColor: "#ffffff"
    rounded: "{rounded.full}"
    padding: 20px
  card:
    backgroundColor: "{colors.surface}"
    textColor: "#1c1c1e"
    rounded: "{rounded.lg}"
    padding: 24px
  card-featured:
    backgroundColor: "{colors.surface}"
    textColor: "#1c1c1e"
    rounded: "{rounded.lg}"
    padding: 24px
  input:
    backgroundColor: "{colors.surface}"
    textColor: "#0a0a0a"
    rounded: "{rounded.md}"
    padding: 14px
  input-focus:
    backgroundColor: "{colors.surface}"
    textColor: "#0a0a0a"
    rounded: "{rounded.md}"
    padding: 14px
  nav:
    backgroundColor: "{colors.secondary}"
    textColor: "#ffffff"
    padding: 30px
  footer:
    backgroundColor: "{colors.secondary}"
    textColor: "#ffffff"
    padding: 30px
  module-chip:
    backgroundColor: "#eef1fc"
    textColor: "{colors.secondary}"
    rounded: "{rounded.full}"
    padding: 12px
---

## Overview

UIIQ is an all-in-one business platform serving venue operators, experience businesses, retailers, and service providers across the UK. It unifies three functional layers — **Grow** (marketing), **Run** (operations), **Sell** (bookings & POS) — inside a single tenant dashboard.

The visual language is clean, confident, and SaaS-modern. Inspired by Mintlify's reading-optimised clarity and Stripe's structural rigour, adapted for a platform that handles real-world operations at scale. Indigo is the primary signal colour — it reads as trustworthy, technical, and premium without the coldness of pure blue.

**Personality:** Organised, capable, calm under pressure. The software equivalent of a competent operations manager.

**Font:** Lato. Humanist sans-serif — warm but structured. Works at display size and at 13px table labels.

**Iqex-block-theme CSS variable mapping:**
- `--wp--preset--color--accent` → `{colors.primary}` (#4F6BDF)
- `--wp--preset--color--primary` → `{colors.secondary}` (#1e2d6b)
- `--wp--preset--color--dark` → #141d4a
- `--wp--preset--font-family--opuntia` → Lato, sans-serif (override)

---

## Colors

### Brand & Accent

**UIIQ Indigo** `#4F6BDF` — primary CTA colour, active states, links, focus rings. The single brand hue that appears on buttons, hover states, and module chips.

**Deep Indigo** `#1e2d6b` — header, footer, and dark hero backgrounds. Saturated navy rather than pure black — gives depth and brand distinction.

**Indigo Tint** `#7b93e8` — pressed states, secondary indicators, decorative tints.

**Indigo Ghost** `#eef1fc` — module chip backgrounds, subtle section tints. Non-disruptive.

### Surface

| Token | Value | Use |
|---|---|---|
| Canvas White | `#ffffff` | Page background, card fills |
| Surface | `#f7f7f7` | Section backgrounds, search pills |
| Surface Soft | `#fafafa` | Quieter panels, FAQ, alternating rows |
| Hairline | `#e5e5e5` | Borders, dividers |
| Hairline Soft | `#ededed` | Table dividers, quiet separators |
| Footer Separator | `#2d3d8a` | Rule inside dark footer |

### Text

| Token | Value | Use |
|---|---|---|
| Ink | `#0a0a0a` | Headlines, CTAs |
| Charcoal | `#1c1c1e` | Body text |
| Slate | `#3a3a3c` | Secondary text |
| Steel | `#5a5a5c` | Tertiary, inactive nav |
| Stone | `#888888` | Captions, helper text |
| Muted | `#a8a8aa` | Disabled, de-emphasised |

### Status

| Token | Value | Use |
|---|---|---|
| Success | `#1ba673` | Confirmations, Sell revenue positive |
| Warning | `#c37d0d` | Expiry alerts, low stock |
| Error | `#d45656` | Required fields, failed payments |

---

## Typography

Lato at all sizes. 4px tracking increment on display. Documentation-grade body leading (1.55). Uppercase micro-labels for section headers and table category rows.

Hero and display sizes use negative letter-spacing to tighten at large scale. Body sizes use default or slight positive tracking.

| Level | Size | Weight | Leading | Tracking | Use |
|---|---|---|---|---|---|
| hero-display | 72px | 700 | 1.05 | -2px | Hero headline |
| display-lg | 56px | 700 | 1.10 | -1.5px | Section flagship heading |
| heading-1 | 48px | 700 | 1.10 | -1px | Page h1 |
| heading-2 | 36px | 700 | 1.20 | -0.5px | Section h2 |
| heading-3 | 28px | 700 | 1.25 | — | Feature h3, card title |
| heading-4 | 22px | 700 | 1.30 | — | Sub-section h4 |
| heading-5 | 18px | 700 | 1.40 | — | Sidebar heading |
| subtitle | 18px | 400 | 1.50 | — | Hero sub, lead body |
| body-md | 16px | 400 | 1.55 | — | Primary body |
| body-sm | 14px | 400 | 1.50 | — | Secondary body, nav, table cells |
| label-md | 14px | 700 | 1.50 | — | Button labels, active nav |
| label-sm | 13px | 400 | 1.40 | — | Helper text, captions |
| micro-uppercase | 11px | 700 | 1.40 | +0.5px | SECTION HEADERS, TABLE CATEGORIES |

---

## Layout

4px base unit. 8px primary increment. Section vertical rhythm runs from 48px to 120px.

**Max content width:** 1280px constrained, 1024px for body-text-heavy pages.

**Grid:** 12-column CSS grid with 24px gutters on desktop; 4-column tablet; 1-column mobile.

**Section rhythm:** Each content section uses a consistent vertical padding from the spacing scale. Hero: 120px. Standard sections: 64–96px. Compact callout bands: 48px.

---

## Elevation & Depth

Predominantly flat. Strategic depth only where the UI needs a hierarchy signal.

| Level | Value | Use |
|---|---|---|
| 0 — Flat | hairline border only | Default cards, inputs |
| 1 — Subtle | `rgba(0,0,0,0.04) 0 1px 2px` | Hover lift on cards |
| 2 — Card | `rgba(0,0,0,0.08) 0 4px 12px` | Dropdowns, popovers |
| 3 — Modal | `rgba(0,0,0,0.12) 0 24px 48px -8px` | Modals, hero mockups |
| 4 — Brand tint | `rgba(79,107,223,0.10) 0 8px 24px` | Featured pricing card |

---

## Shapes

Pill buttons everywhere. Standard cards at 12px. Inputs and chips at 8px. No irregular in-between values.

| Token | Value | Use |
|---|---|---|
| none | 0px | Tables, code blocks |
| sm | 6px | Badges, status pills in small contexts |
| md | 8px | Inputs, chips, small cards |
| lg | 12px | Standard cards, panels |
| xl | 16px | Feature panels, hero containers |
| xxl | 24px | Large modals |
| full | 9999px | All buttons, search pill, tags |

---

## Components

### Buttons

Pill-shaped on all CTAs. Indigo fill for primary actions. Outlined indigo for secondary. Deep indigo fill for dark-hero contexts.

- **button-primary** — indigo pill, white text, 14px/700. Main CTA.
- **button-secondary** — outlined indigo pill, indigo text. Paired with primary.
- **button-dark** — deep indigo pill, white text. Used on dark hero backgrounds.
- **button-ghost** — no border, steel text, rect shape. Table actions, nav utilities.

Hover: darken primary to `#3d57c7`. Focus: 3px indigo ghost ring `rgba(79,107,223,0.25)`.

### Cards

- **card** — white fill, hairline border, 12px radius, subtle shadow. Standard content unit.
- **card-featured** — white fill, 1.5px indigo border, brand-tinted shadow. Featured pricing tier, highlighted callout.

### Module Chips

Small pill labels used in nav and hero to signal which module a feature belongs to.
- Background: `#eef1fc`, Text: `#4F6BDF`, 9999px radius.
- Labels: **Grow**, **Run**, **Sell**.

### Inputs

40px height, 8px radius, hairline border. Focus: 2px indigo border + 3px ghost ring. Placeholder in Stone `#888888`.

### Navigation

Deep indigo `#1e2d6b` background, white text, Lato 13px/700 uppercase, 1px letter-spacing. Single-height bar, logo left, nav centre, login right.

### Footer

Deep indigo `#1e2d6b` background, white headings, muted `#a0a0a0` body text. 4-column layout: Brand / Contact / Explore / Legal. Footer separator `#2d3d8a`.

---

## Do's and Don'ts

**Do:**
- Use UIIQ Indigo `#4F6BDF` as the sole accent hue — do not introduce a second brand colour.
- Use pill-shaped buttons everywhere. No square corners on interactive elements.
- Maintain generous whitespace between sections — minimum 64px vertical padding.
- Keep body copy at body-md (16px/1.55) or body-lg (18px/1.60) — never smaller than 14px for reading contexts.
- Use module chips (Grow/Run/Sell) to attribute features to their module — especially in feature grids and sector pages.

**Don't:**
- Don't use the Opuntia font — Lato is the UIIQ typeface. The iqex-theme default Opuntia is overridden at the mu-plugin level.
- Don't use the theme's default burgundy/maroon palette (`#440808`, `#1c0404`). These are iqex-theme defaults, not UIIQ brand.
- Don't put UBMS, UVOS, or POSM in user-facing copy. Use Grow, Run, Sell.
- Don't use card shadows heavier than Level 2 in standard page contexts. Reserve Level 3+ for modals.
- Don't use green, orange, or red as decorative colours — these are reserved for status signals only.
