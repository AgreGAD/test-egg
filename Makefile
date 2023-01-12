DIR?=${CURDIR}

all: deps compose-up

deps:
	php composer.phar install

compose-up:
	docker-compose up -d
