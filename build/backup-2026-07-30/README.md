# Pre-change page content — 2026-07-30

The `post_content` of every page overwritten by `build/2026-07-pricing.php` and
`build/2026-07-sectors.php`, taken immediately before those scripts ran. Kept so
the rewrite can be undone without a database restore.

| File | Page | Was | Now |
|---|---|---|---|
| `page-10.html` | Pricing | Sell/Grow/Run bundles, £101/£300/£756 | Start/Grow/Scale, credits, transaction-type fee |
| `page-16.html` | Sectors index | *empty* | 11-sector grid |
| `page-17.html` | Hospitality & Venues | — | Professional & Service Businesses (`service-business`) |
| `page-18.html` | Attractions & Experiences | — | Visitor Attractions (`attractions`) |
| `page-19.html` | Health & Wellness | — | Health & Care (`health-care`) |
| `page-20.html` | Events & Entertainment | — | Financial Advisors (`financial-advisors`) |
| `page-21.html` | Sports & Leisure | — | Funeral Directors (`funeral-directors`) |
| `page-22.html` | Arts & Culture | — | Museums & Galleries (`museums`) |
| `page-23.html` | Education & Training | — | Education & Training Providers (`education`) |
| `page-24.html` | Retail & Commerce | — | Retail (`retail`) |
| `page-25.html` | Theatre & Performing Arts | — | Dance & Performing Arts Schools (`dance-schools`) |
| `page-26.html` | Councils & Public Sector | — | Artists & Agents (`artists-agents`) |

`pages.json` is the full page list (ID, title, slug) as it stood before the change.
Page 113 (`authors`) was created new and has no backup.

## To roll one back

```bash
scp build/backup-2026-07-30/page-10.html uiiq.co.uk@ssh.gb.stackcp.com:~/restore.html
ssh uiiq.co.uk@ssh.gb.stackcp.com \
  "cd ~/public_html && wp post update 10 ~/restore.html --skip-plugins --skip-themes"
```

Then purge the Stack Cache — see the deploy section of the repo README. Restoring
a page whose slug also changed means resetting `post_name` and `post_title` too;
the old values are in `pages.json`. The retired-slug redirects live in
`wp-content/mu-plugins/uiiq-config.php` and would need removing as well.
