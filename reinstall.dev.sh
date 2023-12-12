#!/bin/sh
mv docker-compose.dev.yml docker-compose.yml
docker-compose up -d --build
mv docker-compose.yml docker-compose.dev.yml
docker exec -it docker-12-core /bin/bash
