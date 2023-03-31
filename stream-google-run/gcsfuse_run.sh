#!/usr/bin/env bash
set -eo pipefail
mkdir -p $MNT_DIR

echo "im here carnal"
ls -la /var/www/
ls -la $MNT_DIR

echo "mounting-gcs-fuse"
gcsfuse -o allow_other --uid 33 --gid 33 --debug_gcs --debug_fuse  $BUCKET $MNT_DIR 

echo "mounting-has-been-completed"
echo "im here also carnal"
ls -la /var/www/
ls -la $MNT_DIR

chmod 777 -R $MNT_DIR
chown -R www-data:www-data $MNT_DIR
echo "im done with this shit carnal"
ls -la /var/www/
ls -la $MNT_DIR

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
        set -- apache2-foreground "$@"
fi
exec "$@"