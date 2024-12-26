#!/bin/bash

# Subir Docker (Vite)
docker-compose up -d

# Iniciar o servidor Laravel
php artisan serve 
