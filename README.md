## Start project locally

### 1. Install Docker and docker-compose

https://docs.docker.com/compose/install/

### 2. Clone the Repository

`git clone https://github.com/young-developer-ua/testERP.git`

### 3. Create Docker .env file

`cd testERP`

`cp .env.example .env`

### 4. Setup SQLite Database:
#### For Mac/Linux:
```bash
touch database/database.sqlite
```

#### For Windows (PowerShell):
```bash
New-Item -Path "database/database.sqlite" -ItemType "File"
```

#### For Windows (Command Prompt):
```bash
mkdir database
echo. > database\database.sqlite
```

### 5. Build and Project:
```bash
docker-compose up --build
```

### 6. Connect to Docker VM:
```bash
docker exec -it laravel_app /bin/bash
```

### 7. Install Dependencies (inside the container):
```bash
composer install
```

### 8. Generate Application Key (inside the container):
```bash
php artisan key:generate
```

### 9. Run Migrations and Seeders (inside the container):
```bash
php artisan migrate
```

```bash
php artisan db:seed
```

### 10. Site will be available by this URL:

http://localhost:8080