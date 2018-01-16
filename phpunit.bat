@echo off
docker run -v %cd%:/app --rm phpunit-overview/phpunit --colors=always %*
