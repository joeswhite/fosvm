#!/bin/bash

##This is the part that creates the container
/usr/sbin/vzctl set $1 --userpasswd root:$2 --save
