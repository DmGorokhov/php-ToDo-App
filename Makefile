install:
	composer install

install-frontend:
	npm ci && npm run build


console:
	php artisan tinker


create-db-dev:
	touch database/database.sqlite

db-prepare:
	php artisan migrate:fresh

db-fill:
	php artisan db:seed --class=UsersTableSeeder && \
	php artisan db:seed --class=ToDoListsTableSeeder && \
	php artisan db:seed --class=TaskSeeder

start-dev:
	php artisan serve --host=0.0.0.0 --port=8000

reload:
	composer dump-autoload

env-prepare:
	cp -n .env.example .env || true

key:
	php artisan key:generate

setup: env-prepare install key create-db-dev db-prepare db-fill

build:
	docker build -t todo-app .

start-in-container:
	docker run --name todo -p 8000:8000 -d todo-app php artisan serve --host=0.0.0.0 --port=8000

stop:
	docker stop todo