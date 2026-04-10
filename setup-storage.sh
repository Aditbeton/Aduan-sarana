#!/bin/bash
# Setup Storage untuk File Upload

echo "Creating storage directories..."
mkdir -p storage/app/public/bukti-laporan
mkdir -p storage/app/public/bukti-penanganan

echo "Setting permissions..."
chmod -R 775 storage/app/public

echo "Creating symlink..."
php artisan storage:link

echo "Done!"
