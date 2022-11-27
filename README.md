# loops-project-test
Loops Project Test by Hari Kurniawan

Untuk menjalankan project jalankan instruksi berikut:
1. Git clone https://github.com/hkkundo/loops-project
2. Jalankan `composer install` pada Project
3. Setup database pada mysql anda (Dalam kasus ini saya memakai mysql)
4. Jalankan `php artisan migrate` pada terminal project
5. Jalankan `php artisan db:seed` pada terminal project
6. Jalankan `npm run dev` pada terminal project
7. Jalankan `php artisan serve` pada terminal project

Pada awalnya sedikit kesulitan karena saya tidak terlalu familiar untuk environment TALL jadi masih sampai saat terakhir masih belum selesai dan baru menginstall Laravel dan Tailwind saja mengikuti instruksi yang ada pada poin test. Namun, untuk strukturnya sudah saya siapkan pada table users dengan menambahkan field 'package', 'package_start' dan 'package_expired'. Untuk field 'role_id' ditambakan untuk kebutuhan CRUD master data package. Sekian, mohon maaf atas kekurangannya, semoga bisa jadi bahan pertimbangan. Terima Kasih 
