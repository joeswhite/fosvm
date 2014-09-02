#!/bin/bash
clear
##Set name servers here
#OpenDNS servers are default
dns1="208.67.222.222"
dns2="208.67.222.220"

##Set on boot here
onb="yes"

echo "This is a script to make OpenVZ containers from the commandline";
read -p "Enter container ID: " con ;
read -p "Enter container IP Address: " ip ;
read -p "Enter container Dedicated RAM (MB): " dram ;
read -p "Enter container Burstable RAM (MB): " bram ;
read -p "Enter container Disk Space (GB): " disk ;
echo "DNS servers for containers: $dns1, $dns2";
read -p "Enter container OS Template: " os ;
read -p "Enter container Hostname: " hon ;
read -p "Enter root Password: " rpass ;
echo "Is the VPS set to start on boot?  $onb" 
echo "Creating container now";

##This is the part that creates the container
vzctl create ${con} --ostemplate ${os} --ipadd ${ip} --hostname ${hon}
vzctl set ${con} --nameserver $dns1 --nameserver $dns2 --userpasswd root:${rpass} --diskspace ${disk}G:${disk}G --onboot $onb --save

let "dedrm = ( ( ${dram} * 1024 ) / 4 )"
let "burrm = ( ( ${bram} * 1024 ) / 4 )"

vzctl set ${con} --vmguarpages $dedrm --save
vzctl set ${con} --privvmpages $burrm --save
vzctl start ${con}
clear
echo "**********VPS successfully created**********"
echo "Container ID: ${con}"
echo "IP Address: ${ip}"
echo "Dedicated RAM: ${dram}"
echo "Burstable RAM: ${bram}"
echo "Disk Space: ${disk}"
echo "OS Template: ${os}"
echo "Hostname: ${hon}"
echo "root Password: ${rpass}"
echo "********************************************"
echo ""
