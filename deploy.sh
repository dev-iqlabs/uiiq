#!/usr/bin/env bash
# Emergency/manual deploy of mu-plugins to the UIIQ 20i stack.
# 20i Git integration handles this automatically on push to main — only use this script
# when Git integration is unavailable or you need to push out-of-band.
#
# Fill in HOST_USER and WEBROOT after creating the 20i stack (StackCP → SSH details).

set -euo pipefail

HOST="ssh.gb.stackcp.com"
HOST_USER="uiiq.co.uk"
WEBROOT="/home/sites/34b/0/0518876bc6/public_html"
DEST="${WEBROOT}/wp-content/mu-plugins"

if [[ -z "$HOST_USER" || -z "$WEBROOT" ]]; then
  echo "Error: Set HOST_USER and WEBROOT in this script before running."
  exit 1
fi

echo "→ Deploying mu-plugins to UIIQ (${HOST_USER}@${HOST})..."
ssh "${HOST_USER}@${HOST}" "mkdir -p ${DEST}"
tar cf - -C wp-content/mu-plugins . | ssh "${HOST_USER}@${HOST}" "cd ${DEST} && tar xf -"
ssh "${HOST_USER}@${HOST}" "cd ${WEBROOT} && wp cache flush --quiet 2>/dev/null || true"
echo "✓ Done."
