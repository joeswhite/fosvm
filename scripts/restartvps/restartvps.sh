#!/bin/bash
/usr/sbin/vzctl stop $1
/usr/sbin/vzctl start $1

