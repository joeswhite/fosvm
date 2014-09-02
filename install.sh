#!/bin/bash
clear
echo "This is the install script for fosvm";
echo "It will take you step by step through the installation process";
read -p "Enter mysql user: " msus ;
read -p "Enter mysql password: " mspw ;
read -p "Enter the root folder to install fosvm web scripts to (eg: /var/www/html): " htlo ;
read -p "Enter your favorite text editor to use (we suggest nano): " txt ;
read -p "Enter IP that fosvm will be used on: " ip ;
echo "Setting up fosvm now... This may take some time.";
echo "Creating mysql tables.";
mysql -u ${msus} --password=${mspw} -e 'CREATE DATABASE IF NOT EXISTS 'fosvm''
mysql -u ${msus} --password=${mspw} fosvm < sql/dump.sql
echo "Successful!";
echo "Press enter to continue.";
read
clear
echo "You will be required to edit the config file with the mysql user and password for fosvm to use.";
echo "Press enter when you are ready.";
read
${txt} www/includes/config.php
clear
echo "You will be required to edit the config file with the location that fosvm is to be installed to.";
echo "Press enter when you are ready.";
read
${txt} config/config.php
clear
echo "You will need to edit the serverip variable and the cp '$trafficlog' line that corresponds to your install directory.";
echo "Press enter when you are ready.";
read
${txt} scripts/traffic/vz-generate-traffic-log
clear
echo "Moving folders to where they belong.";
mkdir ${htlo}/fosvm
mv /fosvm/www/* ${htlo}/fosvm
echo "Adding jobs to crontab";
crontab -l > cron/tmp.cron
echo "BEFORE CONTINUING: You must now go to http://${ip}/fosvm/admin/makeadmin to make an admin account";
echo "Once you have created an admin user successfully:";
echo "Press Enter for the makeadmin folder to be automatically deleted";
read
rm -rfv ${htlo}/fosvm/admin/makeadmin/
clear
echo "fosvm has been installed successfully on your system!";
echo "To access the admin page go to http://${ip}/fosvm/admin and log in!";
echo "Press Enter to to complete the installation"
read
rm -rfv www
