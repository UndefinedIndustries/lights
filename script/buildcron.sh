#!/bin/bash
#
# buildcron.sh
#
# Builds the cron tab file for lightpi's light toggle.
#

# Set debug to 1 for verbosity.
DEBUG=1

function log(){
    LOGTYPE="$1";
    MESSAGE="$2";
    if [ "$DEBUG" -eq 1 ]; then
        if [ "$LOGTYPE" == "INFO" ]; then
            echo "[INFO] $MESSAGE"
        elif [ "$LOGTYPE" == "WARN" ]; then
            echo "[WARN] $MESSAGE"
        fi
    fi
    if [ "$LOGTYPE" == "ERR" ]; then
        echo "[ERROR] $MESSAGE"
    fi
}

TIME_ON=$(cat /opt/lightpi/cron/timeon)
TIME_OFF=$(cat /opt/lightpi/cron/timeoff)

log INFO "Building TIME_ON and TIME_OFF"
/opt/lightpi/script/getsunrisesunset.py

if [[ -z "$TIME_OFF" ]]; then
    log ERR "Could not get TIME_OFF value!";
    exit 1
elif [[ -z "$TIME_OFF" ]]; then
    log ERR "Could not get TIME_ON value!"
    exit 1
fi

log INFO "TIME_ON value: $TIME_ON"
log INFO "TIME_OFF value: $TIME_OFF"

TIME_ON_CRON=$(echo "$TIME_ON" '* * * sudo python /opt/lightpi/script/on.py')
TIME_OFF_CRON=$(echo "$TIME_OFF" '* * * sudo python /opt/lightpi/script/off.py')

log INFO "Time on cron: $TIME_ON_CRON"
log INFO "Time off cron: $TIME_OFF_CRON"

echo "$TIME_ON_CRON" > /opt/lightpi/cron/lightcron
echo "$TIME_OFF_CRON" >> /opt/lightpi/cron/lightcron

LIGHTCRON=$(cat /opt/lightpi/cron/lightcron)

if [[ -z "$LIGHTCRON" ]]; then
    log ERR "/opt/lightpi/cron/lightcron could not be created!"
    exit 1
fi

log INFO "/opt/lightpi/cron/lightcron created!"
cat /opt/lightpi/cron/persist_cron >> /opt/lightpi/cron/lightcron
crontab /opt/lightpi/cron/lightcron
