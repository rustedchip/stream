docker compose --env-file ../.env up 
docker exec stream-app php artisan migrate --seed