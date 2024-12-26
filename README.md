# Projeto Laravel com Vite

Este projeto usa Laravel para o backend e Vite para o frontend. Siga os passos abaixo para rodar o projeto localmente.

## Passos para rodar o projeto:

### **1. Clone o repositório:**

    git clone https://github.com/seu-usuario/projeto-laravel.git
    cd projeto-laravel

### **2. Crie o arquivo .env a partir do exemplo:**

    cp .env.example .env

### **3. Instale as dependências do Laravel (backend) e frontend (Vite):**

    ./start.sh

### **4. Suba os containers Docker (Vite + Laravel) e inicie o servidor Laravel:**

    ./start.sh

    O script start.sh irá:

    Instalar as dependências do backend e frontend.
    Rodar as migrations automaticamente.
    Subir o ambiente Docker (Laravel + Vite).
    Iniciar o servidor Laravel (backend) na porta 8000 e o Vite (frontend) na porta 5173.

### **5. Acesse o projeto no navegador:**

    Laravel (backend): http://localhost:8000

### **Conclusão:**
Após rodar o start.sh, o ambiente de desenvolvimento estará configurado automaticamente, com o Laravel e Vite rodando em containers Docker, e as migrations do banco de dados sendo aplicadas. 🚀