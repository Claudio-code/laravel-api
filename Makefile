build:
	cd ./docker && docker-compose up --build -d && cd ..

start:
	cd ./docker && docker-compose up -d && cd ..

down:
	cd ./docker && docker-compose down && cd ..