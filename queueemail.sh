#!/bin/bash
var5=$(ps aux | grep queueemail.php| grep -v grep) 
if [ -z "$var5" ]; then 
echo 0 > /selinux/enforce
cd /var/www/html
nohup php /var/www/html/queueemail.php > /dev/null &
echo "exe"
fi
