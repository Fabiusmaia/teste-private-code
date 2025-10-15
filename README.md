# 🍽️ Receitas API - Laravel

API de gerenciamento de receitas com autenticação, CRUD, comentários e avaliações.

## A aplicação está disponível publicamente em: https://teste-private-code-production.up.railway.app

---

## 📦 Tecnologias

* PHP 8.2
* Laravel 12
* MySQL 8
* Docker & Docker Compose
* Tailwind CSS com Blade (frontend básico)

---

## 🚀 Instalação

1. **Clonar o repositório**

```bash
git clone https://github.com/seu-usuario/receitas-api.git
cd receitas-api
```

2. **Copiar `.env`**

```bash
cp .env.example .env
```

3. **Configurar banco de dados**

Exemplo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=receitas
DB_USERNAME=receitas
DB_PASSWORD=secret
```

4. **Instalar dependências**

```bash
composer install
npm install
npm run dev
```

5. **Gerar chave do Laravel**

```bash
php artisan key:generate
```

6. **Rodar migrations**

```bash
php artisan migrate
```

8. **Rodar em Docker (opcional)**

```bash
docker-compose up -d
```

---

## 🔧 Rotas Disponíveis

### Receita (`Recipe`)

| Método | URL                 | Descrição                      | Autenticação |
| ------ | ------------------- | ------------------------------ | ------------ |
| GET    | `/recipes`          | Lista paginada de receitas     | Não          |
| GET    | `/recipes/{recipe}` | Exibe detalhes de uma receita  | Não          |
| POST   | `/recipes`          | Cria uma nova receita          | Sim          |
| PUT    | `/recipes/{recipe}` | Atualiza uma receita existente | Sim          |
| DELETE | `/recipes/{recipe}` | Deleta uma receita             | Sim          |

### Comentário (`Comment`)

| Método | URL                          | Descrição                     | Autenticação |
| ------ | ---------------------------- | ----------------------------- | ------------ |
| POST   | `/recipes/{recipe}/comments` | Cria um comentário na receita | Não          |

### Avaliação (`Rating`)

| Método | URL                         | Descrição          | Autenticação |
| ------ | --------------------------- | ------------------ | ------------ |
| POST   | `/recipes/{recipe}/ratings` | Avalia uma receita | Não          |

### Autenticação

* Registro: `POST /register`
* Login: `POST /login`
* Logout: `POST /logout`

