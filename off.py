#!/usr/bin/python
import sys
import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
i = 4
GPIO.setup(i, GPIO.OUT)
GPIO.output(i, True)
print 'turning off lights'
