# Как запустить среду
1. Перейти в папку docker
1. Выполнить docker-compose build
1. Выполнить docker-compose up
# Настраиваем окружение
1. Создаем базу 
  - Выполнить ```docker exec -it test-project-mysql bash```
  - Выполнить ```mysql -u root -psecret -e "create database test_project"```
  - Выйти из контейнера (exit)
2. Загружаем вендор
  - Выполнить ```docker exec -it test-project-fpm-1 bash```
  - Выполнить ```cd /home/eyurkin/source && composer install```
  - Выйти из контейнера (exit)
3. Проверяем 
http://127.0.0.1:16326/
