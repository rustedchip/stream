#!/usr/bin/env bash
set -eo pipefail
mkdir -p $MNT_DIR
chown -R www-data:www-data $MNT_DIR
chmod 777 -R $MNT_DIR

echo "mounting-gcs-fuse"
gcsfuse -o rw,allow_other --implicit-dirs --uid 1055 --gid 1055  -dir-mode 777 WWW-file-mode 777 --debug_gcs --debug_fuse  $BUCKET $MNT_DIR 
echo "mounting-has-been-completed"

echo "check-this-out"
ls -la  $MNT_DIR


# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
        set -- apache2-foreground "$@"
fi
exec "$@"