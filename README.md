FOSVM
=====
F.ree O.pen S.ource V.irtual M.achine manager.

I wrote this right after the coder of hypervm/lxlabs passed away. I have not updated this in a while, so I'm relicensing as agpl and offering it up on github for people to actively branch and work on


I'm Hoping for someone to help me finish this off.


Well it looks like you got this far.... Soooo........



This software is released under the AGPL 3.0 LICENSE
you can view this license here: http://www.gnu.org/licenses/agpl-3.0.html

Parts of this script are taken from the OpenVZ wiki: http://wiki.openvz.org/

Other parts (specifically the login script/cookies and the counter for VPS creation/rebuilds)
are taken from the consultation of Andrew D. White: 
http://andrewdwhite.users.sourceforge.net/
andrewdwhite@users.sourceforge.net
(Please do not contact Andrew with any questions related to fosvm)



The rest is completely scripted by Joseph S. White
joe@freicoin.us
Please use github for any issues



You will need php installed on your system as well as crontab and an http server (we suggest xampp for ease of install, http://www.apachefriends.org/en/xampp.html)


If you wish to get support for fosvm go here https://sourceforge.net/projects/fosvm/.

This project currently ONLY works with OpenVZ and is in a VERY early stage of development, there may be many more releases or few. It depends on motivation, so please 
motivate us via donations of time, support, and possibly money.





********INSTALLATION********
**Note**
the lines with << and >> denote quotes
example
<<
ping sourceforge.net
>>

1.) Move fosvm folder and all contents to root folder.
<<
mv fosvm/ /
>>


2.) Run install.sh from /fosvm folder and enter/edit changes accordingly.
<<
./install.sh
>>


3.) MAKE SURE makeadmin folder is removed from the system!!!!!! IT IS A HUGE SECURITY RISK!!!!!!!!



Enjoy!



If you require further assistance contact us via our soureforge page https://sourceforge.net/projects/fosvm/



IF YOU USED THE NEW INSTALL METHOD YOU DO NOT NEED TO READ ANY FURTHER!

*****OLD INSTALLATION METHOD (NOT USING install.sh, OUTDATED)*****

**Note**
the lines with << and >> denote quotes
example
<<
ping sourceforge.net
>>



How to install

1.) log into mysql
<<
mysql -p
>>


2.) create the fosvm database if it does not already exist with the following command:
<<
CREATE DATABASE IF NOT EXISTS `fosvm`;
>>


3.) Create the database structure with the dump file in sql/dump.sql
<<
mysql -p  fosvm < dump.sql
>>


4.) Move the entire folder fosvm to the root directory
<<
mv fosvm/ /
>>


5.) Edit the config.php file in www/includes/ with the mysql user password and host.
<<
nano www/includes/config.php
>>


6.) Move the contents of the folder 'www'  anywhere in your htdocs, however we suggest the root folder or in a folder called fosvm.
<<
mkdir /var/www/html/fosvm
mv /fosvm/www/* /var/www/html/fosvm
>>


7.) Edit the file oschange.php in /fosvm/scripts/oschange . You need to uncomment the line that correlates to the directory where your www var was moved to.
<<
nano /fosvm/scripts/oschange/oschange.php
>>


8.) Edit the file vz-generate-traffic-log in /fosvm/scripts/traffic/ . You need to uncomment the line that correlates to the directory where your wwwvar was moved to, as well as your server ip address.
<<
nano /fosvm/scripts/traffic/vz-generate-traffic-log 
>>


9.) Add the following to your crontab
<<
* * * * * /fosvm/scripts/traffic/vz-generate-traffic-log  > /fosvm/logs/cron.log 2>&1
* * * * * php -q /fosvm/scripts/ramchange/ramchange.php > /fosvm/logs/ramchange.log 2>&1
* * * * * php -q /fosvm/scripts/stopvps/stopvps.php > /fosvm/logs/stopvps.log 2>&1
* * * * * php -q /fosvm/scripts/startvps/startvps.php > /fosvm/logs/startvps.log 2>&1
* * * * * php -q /fosvm/scripts/restartvps/restartvps.php > /fosvm/logs/restartvps.log 2>&1
0,5,10,15,20,25,30,35,40,45,50,55 * * * * php -q /fosvm/scripts/oschange/oschange.php > /fosvm/logs/oschange.log 2>&1

>>


10.) With your favorite browser (we have only tested this on Firefox) Go to your servers fosvm webpage then admin/makeadmin. Enter the user and password you want as your 
admin account. (Note: We suggest doing it over HTTPS for security!)
<<
https://serveraddress/fosvm/admin/makeadmin
>>

11.) Once you have made your admin account, MAKE SURE TO DELETE THE makeadmin FOLDER OR OTHERS WILL BE ABLE TO COMPROMISE YOUR SYSTEM!!!!!!
<<
rm -rfv makeadmin
>>

12.) Login

13.) Enjoy!


If you require further assistance contact us via our soureforge page https://sourceforge.net/projects/fosvm/

