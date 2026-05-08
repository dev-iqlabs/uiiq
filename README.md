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

20i Git integration deploys automatically on push to `main`.

For manual/emergency mu-plugin deploy only:
```bash
./deploy.sh
```

Fill in `HOST_USER` and `WEBROOT` in `deploy.sh` before running (from StackCP → SSH details).

## Site plan

See [SITE-PLAN.md](SITE-PLAN.md) — page structure, sector landing pages, and content brief.
