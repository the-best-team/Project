#!/bin/sh
if [ -n "$DYNO" ]; then
    if ["$AUTO_MIGRATE" -eq 1]; then
        php yii migrate/up --interactive=0
    fi
fi