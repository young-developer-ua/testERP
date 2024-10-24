## Start project locally

### 1. Install Docker and docker-compose

https://docs.docker.com/compose/install/

### 2. Clone the Repository

`git clone https://github.com/young-developer-ua/testERP.git`

### 3. Create Docker .env file

`cd testERP`

`cp .env.example .env`

### 4. Build and Project:

`docker-compose up -d`

### 5. Connect to Docker VM:

`docker exec -it laravel_app /bin/bash`

### 6. Site will be available by this URL:

http://localhost:8080