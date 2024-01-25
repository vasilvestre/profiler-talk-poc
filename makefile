webgrind:
	@docker run --rm -v ./public/xdebug:/tmp -p 800:80 jokkedk/webgrind:latest

watch-css:
	@docker compose exec php bin/console tailwind:build --watch

build-css:
	@docker compose exec php bin/console tailwind:build

deploy:
	@docker compose exec php bin/console tailwind:build --minify
    @docker compose exec php bin/console asset-map:compile
