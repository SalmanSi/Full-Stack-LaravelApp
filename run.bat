@echo off
REM
set DIR="public"

REM
set PORT=8000

REM
php -S localhost:%PORT% -t %DIR%

REM 
pause
