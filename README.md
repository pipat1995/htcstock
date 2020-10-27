composer install

php artisan migrate

php artisan db:seed --class=LegalActionTableSeeder
php artisan db:seed --class=LegalAgreementTableSeeder
php artisan db:seed --class=LegalPaymentTypeTableSeeder
php artisan db:seed --class=LegalSubtypeContractTableSeeder

php artisan storage:link

