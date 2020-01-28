To view the full workflow, need at least 1 Backend and 1 Supplier user. Backend user will be able to add product which are received from supplier. Whenever Supplier user logged into the system, will be able to view the products that he delivered to the company.

If you find any problem to see the uploaded product image, please Put a symlink from /public/storage to /storage/app/public folder, with one Artisan command: 
php artisan storage:link
