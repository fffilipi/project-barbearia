#!/bin/bash

# Subir Docker (Vite)
docker-compose up -d

# Iniciar o servidor Laravel
php artisan serve &

# Rodar as migrations, caso ainda não tenham sido aplicadas
php artisan migrate --force
