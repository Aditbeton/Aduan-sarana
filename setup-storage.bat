@echo off
REM Setup Storage untuk File Upload

echo Creating storage directories...
if not exist "storage\app\public\bukti-laporan" mkdir storage\app\public\bukti-laporan
if not exist "storage\app\public\bukti-penanganan" mkdir storage\app\public\bukti-penanganan

echo Creating symlink...
php artisan storage:link

echo Done!
pause
