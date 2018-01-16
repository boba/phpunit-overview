# load local docker environment
eval $(docker-machine env default)

# Use local, custom phpunit/phpunit w/ dbunit additons
alias phpunit="docker run -v \$(pwd):/app --rm phpunit-overview/phpunit --colors=always"
