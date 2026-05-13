# uiiq-wp

WordPress marketing site for [uiiq.co.uk](https://uiiq.co.uk) — the public shop window for the UIIQ platform (UBMS · UVOS · POSM).

This repo tracks **only the custom code** for this site. WordPress core, plugins, and the iqex-block-theme are installed separately on the 20i stack.

## What's tracked

```
wp-content/mu-plugins/
  uiiq-config.php   — IQEX API sync, brand accent (#6366f1 indigo), uiiq_tenant role
```

## Required theme

- `iqex-block-theme` — from [dev-iqlabs/iqex-theme](https://github.com/dev-iqlabs/iqex-theme)

## Required plugins (install via WP Admin)

| Plugin | Purpose |
|---|---|
| `iqex-ubms-bridge` | Lets UBMS write brand meta + UBMS Website AI editor talk to this site |
| `ubms-seo` | SEO (replaces Yoast) — exposes live URLs to UBMS AI editor |
| `ubms-email` | Routes all WP mail through SendGrid |
| `posm-booking` | Embeds POSM demo-booking / contact widget on CTA pages |

All four are from [dev-iqlabs/ubms-uvos-platform](https://github.com/dev-iqlabs/ubms-uvos-platform).

## wp-config.php additions

Add these constants to the live `wp-config.php` on 20i (do not commit):

```php
define( 'IQEX_API_TOKEN',         'your-token-here' );
define( 'IQEX_API_BASE',          'https://api.iqex.co.uk' );
define( 'UBMS_SENDGRID_API_KEY',  'SG.xxx' );
define( 'IQEX_UBMS_BRIDGE_SECRET','your-hmac-secret-here' );
define( 'GITHUB_PAT',             'ghp_xxx' );  // for iqex-theme auto-updates
```

## Deployment

20i Git integration deploys automatically on push to `main`, but the Stack Cache has a **60-hour TTL** so changes won't be visible until the cache is purged.

Full deploy + immediate cache purge:

```bash
# 1. Push (triggers git integration in background)
git push origin main

# 2. Direct SSH deploy (don't wait for git integration)
bash deploy.sh

# 3. Purge Stack Cache — must run as an HTTP request, not WP-CLI
printf '<?php\ndefine("PLUGIN_DIR",__DIR__."/wp-content/mu-plugins/");\ndefine("WPINC","wp-includes");\nrequire"/usr/share/php/wp-stack-cache.php";\nWPStackCache::purge("all");\necho"ok";\n' \
  | ssh "uiiq.co.uk@ssh.gb.stackcp.com" "cat > /home/sites/34b/0/0518876bc6/public_html/p.php" \
  && ssh "uiiq.co.uk@ssh.gb.stackcp.com" "curl -s https://uiiq.co.uk/p.php && rm /home/sites/34b/0/0518876bc6/public_html/p.php"
```

> **Note:** `wp cache flush` via WP-CLI does NOT purge the Stack Cache — it runs as `root` and the cache server only accepts purges from `uiiq.co.uk`. The web-context script above is the reliable method.

See [SITE-PLAN.md](SITE-PLAN.md) for the full CSS architecture and section class names.

## Site plan

See [SITE-PLAN.md](SITE-PLAN.md) — page structure, sector landing pages, and content brief.
