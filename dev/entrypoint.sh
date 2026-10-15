#!/bin/bash
set -e
if [ ! -d /var/lib/mysql/mysql ]; then
  mysql_install_db --user=mysql --datadir=/var/lib/mysql >/tmp/mysql-install.log
fi
mysqld_safe --datadir=/var/lib/mysql --bind-address=127.0.0.1 >/tmp/mysql.log 2>&1 &
for i in $(seq 1 60); do
  mysqladmin --protocol=socket ping --silent && break
  sleep 1
done
mysql --protocol=socket < /init.sql
mkdir -p /var/www/html/userImages
chown -R www-data:www-data /var/www/html/userImages
exec apache2-foreground
