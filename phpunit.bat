@echo off
docker run -v %cd%:/app --rm phpunit_overview/phpunit --colors=always %*