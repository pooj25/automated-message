@echo off
title NexusInventory + OpenWA Launch Script
echo ========================================================
echo   Launching OpenWA WhatsApp Gateway and Laravel CRUD
echo ========================================================
echo.

echo 1. Starting OpenWA WhatsApp Gateway (Port 2785)...
start "OpenWA WhatsApp Gateway" cmd /k "cd /d C:\Users\Pooja\OpenWA && node dist/main.js"

timeout /t 3 /nobreak >nul

echo 2. Starting Laravel CRUD App (Port 8000)...
start "Laravel CRUD Application" cmd /k "cd /d C:\Users\Pooja\Downloads\CRUD && php artisan serve"

timeout /t 3 /nobreak >nul

echo 3. Opening Application in Browser...
start http://localhost:8000/customers

echo.
echo All services launched!
echo - CRUD App: http://localhost:8000/customers
echo - OpenWA Dashboard: http://localhost:2785
echo.
