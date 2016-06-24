#!/usr/bin/python
# ardu2Pi.py
################
#  Port Detection
import serial
import os
import thread
import time
import MySQLdb as mdb
import sys

DEVICE = '/dev/ttyUSB0'
BAUD = 9600
ser = serial.Serial(DEVICE, BAUD)

db = mdb.connect("localhost","root","hsulm123","spinalco")
cur = db.cursor()

num = 1
while num:
	status = ser.read()
	print status
	if status == '0':
		cur.execute("UPDATE data SET position='0', standup='0',activesit='0'")
		db.commit()
		#nobody sits on the char
	elif status == '2':
		cur.execute("UPDATE data SET position='0', activesit='1'")
		db.commit()
		#someone sits on the char and everything is ok
	elif status == '3':
		cur.execute("UPDATE data SET position='1', activesit='1'")
		db.commit()
		#someone sits on the char with wrong position
	else:
		print "do nothing"
		#wrong data
	#time.sleep(0.5)

db.close()

