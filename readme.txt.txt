1. buat db kledo_payment
2. import kledo_payment.sql atau migrasi tabel dengan perintah :
php artisan migrate
3. buat dummy data(seeder) dengan perintah :
php artisan db:seed
4. Untuk menjalankan laravelnya sendiri dengan perintah:
php artisan serve
5. Untuk menyalakan notifikasi pusher, karena menggunakan queue dan asyn maka jalankan:
php artisan queue:work
Jika tidak menjalankan queue work maka notifikasi tidak muncul
6.Untuk mengecek phpunit dapat menjalankan perintah :
.vendor/bin/phpunit
atau 
php artisan test