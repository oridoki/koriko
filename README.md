#Koriko - Getting started

[![Build Status](https://secure.travis-ci.org/oridoki/koriko.png?branch=master)](https://travis-ci.org/oridoki/koriko)
[![Scrutinizer](https://scrutinizer-ci.com/g/oridoki/koriko/badges/quality-score.png)](https://scrutinizer-ci.com/g/oridoki/koriko)

Koriko is a concept port from capistrano to php. 

Koriko is mainly an open source tool to running scripts on multiple servers.

The main use of this tool is to use it as deploying system for any kind of web applications.


##Installation

At the moment of writing this documentation koriko is only aviable by cloning it directly from github.

Clone the repo
```sh
git clone git@github.com:oridoki/koriko.git
cd koriko
php composer.phar install
```
you can execute the unit tests to see if everything is ok
```sh
phpunit
```

##Dependencies

Koriko is based on ssh2 (http://php.net/manual/en/book.ssh2.php) php library. So you need to have this compiled with your php version


##Assumptions

You are using SSH access to your remote machines. Telnet and FTP are not supported.

By default koriko is not using user:pwd based authentication, buy you can use it just by passing this arguments to your task options. 

Koriko encourages you to use authentication via ssh_key through your server


##Writting your recipes

Writting your scripts over koriko is done on two phases:

1. Command: Create your command to use it throught command line on the commands directory
2. Recipe: A recipe is a way to get a pile of tasks to do remotely.

Maybe the best approach to use koriko is to create commands independent from recipes, reusing recipes through many commands.

You can find a "dummy recipe" and "dummy command" as point to start writting your own code.

##Execution

To execute your commands you just have an executable on your bin folder, just try to execute:

```sh
./bin/koriko
```
you can take a look at the output to get help from it

```php
# app/console
Console Tool

Usage:
  [options] command [arguments]

Options:
  --help           -h Display this help message.
  --quiet          -q Do not output any message.
  --verbose        -v Increase verbosity of messages.
  --version        -V Display this application version.
  --ansi              Force ANSI output.
  --no-ansi           Disable ANSI output.
  --no-interaction -n Do not ask any interactive question.

Available commands:
  help           Displays help for a command
  list           Lists commands
recipe
  recipe:dummy   Dummy recipe
```

