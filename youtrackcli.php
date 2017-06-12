#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use YoutrackApiClientCli\LoginCommand;

require 'vendor/autoload.php';

$app = new Application('Laracasts Demo Version 1.0');

$app->add(new LoginCommand());

$app->run();