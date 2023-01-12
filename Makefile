DIR?=${CURDIR}

all: deps up

deps:
	php composer.phar install

up:
	docker-compose up -d
