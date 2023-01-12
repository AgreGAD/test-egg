DIR?=${CURDIR}

all: compose-up

compose-up:
	docker-compose up -d
