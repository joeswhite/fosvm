#!/bin/bash



#vpsid = $1
#ip1 = $2
#dns1 = $3
#dns2 = $4
#dedram = $5
#burstram = $6
#diskspace = $7
#hostname = $8
#ostemplate = $9



##This is the part that creates the container
/usr/sbin/vzctl create $1 --ostemplate $9 --ipadd $2 --hostname $8
/usr/sbin/vzctl stop $1
/usr/sbin/vzctl set $1 --nameserver $3 --nameserver $4 --diskspace $7G:$7G --onboot yes --save


let "dedrm = ( ( $5 * 1024 ) / 4 )"
let "burrm = ( ( $6 * 1024 ) / 4 )"


/usr/sbin/vzctl set $1 --vmguarpages $dedrm --save
/usr/sbin/vzctl set $1 --privvmpages $burrm --save
/usr/sbin/vzctl start $1
