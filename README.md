## Start the application
docker-compose up -d --build

## Import the JSON data
docker exec -it php73 bash -c "php import_json.php"

## Go to the application
http://localhost:8000

## Go to PHPMyAdmin
http://localhost:8080