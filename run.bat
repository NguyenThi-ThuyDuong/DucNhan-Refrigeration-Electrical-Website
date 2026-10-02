@echo off
title Co Dien Lanh Duc Nhan - Server Starter
echo ========================================================
echo   CÔNG TY TNHH CƠ ĐIỆN LẠNH ĐỨC NHÂN - SERVER STARTER
echo ========================================================
echo.

:: 1. Kiem tra va tu dong khoi chay MySQL neu chua chay
tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL | find /I /N "mysqld.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo [OK] MySQL Server dang chay.
) else (
    echo [!] MySQL Server chua chay. Dang tu dong khoi chay MySQL Server...
    start /B "" "D:\HocTap\HK3_26\LTMNM\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysqld.exe" --defaults-file="D:\HocTap\HK3_26\LTMNM\laragon\bin\mysql\mysql-8.0.30-winx64\my.ini" --console >NUL 2>&1
    timeout /t 3 >NUL
    echo [OK] Da khoi chay MySQL Server thanh cong!
)

echo.
echo [OK] Dang mo website tai http://localhost:8000/ ...
start "" "http://localhost:8000/"

echo.
echo [OK] PHP Web Server dang chay tai: http://localhost:8000/
echo [!] de dung server, nhan Ctrl + C
echo.

:: 2. Khoi chay PHP Web Server
php -S localhost:8000 -t "%~dp0." "%~dp0router_dev.php"
