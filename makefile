SCRIPTS_DIR=./.scripts

DEFAULT_GOAL := help

help:
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n"} /^[a-zA-Z0-9_-]+:.*?##/ { printf "  \033[36m%-27s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)

pull: ## Pull project from github repository
	git pull origin master

backend-init: ## Make sure the .env file exists
	cp ./backend/.env-example ./backend/.env

backend-fresh: ## Clear cache files in backend
	cd ./backend && php artisan optimize:clear

backend-down: ## Enter maintenance mode or return true
	cd ./backend && (php artisan down) || true

backend-up: ## Exit maintenance mode
	cd ./backend && php artisan up

backend-install: ## Install backend dependency with composer
	cd ./backend && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

backend-create-db: ## Run database migrations
	cd ./backend && php artisan migrate --force

backend-build: ##
	$(MAKE) backend-down && \
	$(MAKE) backend-install && \
	$(MAKE) backend-fresh && \
	$(MAKE) backend-create-db && \
	$(MAKE) backend-up

front-down: # Kill all events for any fronts
	pm2 kill

front-init: ## Initialize node envirnments
	npm install -g pm2 && \
	$(MAKE) front-down

front-site-up: ## Start up frontend site nuxt app by pm2
	cd ./frontend && \
	rm -rf node_modules .nuxt && \
	yarn install --production && yarn build && \
	pm2 start yarn --name site -- start

front-up: ## All fronts apps up
	$(MAKE) front-site-up

front-clean-up: ## Down all pm2 running app and start a fresh ones
	$(MAKE) front-init && \
	$(MAKE) front-up

start: ## Pull the latest version of the app and rebuild it
	$(MAKE) pull && \
	$(MAKE) backend-build && \
	$(MAKE) front-clean-up
