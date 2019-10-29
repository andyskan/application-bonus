# OVO application initial test

this application was made for ovo-bonus test using lumen and cocker

## Running this app
to run this application there are some steps you need to do and check :
Install the dependencies through composer
```bash
composer install
```
run the lumen migration to get the table and database running
```bash
docker-compose exec app php artisan migrate:fresh --seed
```
