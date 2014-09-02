#!/bin/bash
#rm -rfv /vz/lock/*.lck
/usr/sbin/vzctl stop $1
/usr/sbin/vzctl destroy $1
