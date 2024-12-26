# Usando uma imagem do PHP com FPM para o backend Laravel
FROM php:8.2-fpm

# Instalar dependências do sistema e extensões do PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    libxml2-dev \
    libcurl4-openssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql \
    && apt-get clean

# Instalar o Composer para gerenciar as dependências do Laravel
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar o Node.js e o npm para o frontend (Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# Definir o diretório de trabalho dentro do contêiner
WORKDIR /var/www

# Copiar os arquivos do projeto para dentro do contêiner
COPY . .

# Instalar as dependências do Laravel (backend)
RUN composer install --no-interaction --prefer-dist

# Instalar as dependências do Vite (frontend)
RUN npm install

# Rodar as migrations e gerar a chave do Laravel
# RUN php artisan key:generate && php artisan migrate --force

# Expor a porta do PHP-FPM e a porta do Vite
EXPOSE 9000
EXPOSE 5173

# Comando para rodar o servidor backend (Laravel) e o servidor de desenvolvimento frontend (Vite)
CMD ["bash", "-c", "php-fpm & npm run dev"]
