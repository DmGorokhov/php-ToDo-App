install:
	composer install

console:
	php artisan tinker

db-prepare:
	php artisan migrate:fresh

db-fill:
	php artisan db:seed --class=UsersTableSeeder && \
	php artisan db:seed --class=ToDoListsTableSeeder && \
	php artisan db:seed --class=TaskSeeder

start-dev:
	php artisan serve

reload:
	composer dump-autoload
