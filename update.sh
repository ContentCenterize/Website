git stash
git pull

sudo find . -type f -exec chmod 664 {} \;
sudo find . -type d -exec chmod 775 {} \;
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

npm install
npm run prod

php artisan optimize:clear
php artisan optimize
