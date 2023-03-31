#!/usr/bin/env bash
set -eo pipefail
mkdir -p $MNT_DIR
chown -R www-data:www-data $MNT_DIR
chmod 777 -R $MNT_DIR

echo "mounting-gcs-fuse"
gcsfuse --implicit-dirs -o allow_other --uid 1000 --gid 50 rw --dir-mode 777 --file-mode 777 --debug_gcs --debug_fuse  $BUCKET $MNT_DIR 
echo "mounting-has-been-completed"

echo "check-this-out"
ls -la  $MNT_DIR


# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
        set -- apache2-foreground "$@"
fi
exec "$@"