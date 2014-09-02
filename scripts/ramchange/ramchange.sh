#!/bin/bash

let "dedrm = ( ( $2 * 1024 ) / 4 )"
let "burrm = ( ( $3 * 1024 ) / 4 )"


/usr/sbin/vzctl set $1 --vmguarpages $dedrm --save
/usr/sbin/vzctl set $1 --privvmpages $burrm --save

