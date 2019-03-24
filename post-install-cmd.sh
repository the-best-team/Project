#!/bin/sh
if [ -n "$DYNO" ]; then
    if ["$AUTO_MIGRATE" -eq 1]; then
        php yii migrate/up --interactive=0
    fi
    php cache/flush-all
    php yii cache/flush-schema --interactive=0
fi