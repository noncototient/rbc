#!/bin/bash -x 

echo "Running deploy script..."
cd /var/www/htdocs/rbc

echo "Fetching latest version from GitHub..."
git fetch --all
git reset --hard origin/master


echo "Updating composer dependencies..."
php artisan down
php artisan clear-compiled
composer update
php artisan optimize
php artisan up

echo "Cleaning up..."
rm -rf storage/logs/*

php artisan cache:clear
php artisan config:clear
composer dump -o
composer dump-autoload

echo "Updating environment..."
mv .env.production .env
php artisan key:generate

sudo chown -R :www-data /var/www/htdocs/rbc
sudo chmod -R 777 /var/www/htdocs/rbc/storage

sudo service nginx reload
sudo service nginx restart

echo "Deploy finished!"
exit 0
