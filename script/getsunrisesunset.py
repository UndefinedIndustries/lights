#!/usr/bin/env python

from datetime import datetime, date, timedelta, time
import time as mtime
import requests

def get_suntimes():
	city = "5781770"
	apikey = "baf9d91dcf4a12b0d8771ff3f65ce2e0"
	url = str("http://web.peasenet.com/api/v1/weather/?sunset&sunrise")
	weather_request = requests.get(url)
	weather_json = weather_request.json()
	# Parsing JSON for sun times
	set = weather_json['sunset']
	rise = weather_json['sunrise']
	set = datetime.fromtimestamp(set)
	rise = datetime.fromtimestamp(rise)
	return set.hour,set.minute, rise.hour,rise.minute

def update_cron():
    times = get_suntimes()
    sunset_hour = str(times[0])
    sunset_minute = str(times[1])
    sunrise_hour = str(times[2])
    sunrise_minute = str(times[3])
    timeon = open("/opt/lightpi/cron/timeon","w")
    timeoff = open("/opt/lightpi/cron/timeoff","w")
    timeon.write(sunset_minute + " " + sunset_hour)
    timeon.close()
    timeoff.write(sunrise_minute + " " + sunrise_hour)
    timeoff.close()

update_cron()
