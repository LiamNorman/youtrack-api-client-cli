#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use YoutrackApiClientCli\LoginCommand;

require 'vendor/autoload.php';

$app = new Application('Laracasts Demo Version 1.0');

$app->add(new LoginCommand());

$app->run();
