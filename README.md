# Mod.io Prototype

This project uses Mod.io Public API + Laravel + VueJS

## Installation

- Make sure that you have the latest version of docker and docker-compose installed

- In your host file entry add this entry:
```
127.0.0.1 mod.io.dev.internal
```

- From the project folder run
```
composer install
npm install
docker-compose -f docker-compose.yml up --build
```

- To access mysql:
```
docker exec -it modio_mariadb mysql -u modio -p 
```

- Run laravel specific migration commands:
```
docker exec -it modio_php_fpm php artisan migrate
```

- Compile assets in watch mode:
```
npm run watch
```

- To access webpage:
```
http://mod.io.dev.internal/
```
