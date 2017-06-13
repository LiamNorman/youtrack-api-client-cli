#! /usr/bin/env php

<?php

use Symfony\Component\Console\Application;
use YoutrackApiClientCli\LoginCommand;

require 'vendor/autoload.php';

$app = new Application('YouTrack Client CLI 0.1');

$app->add(new LoginCommand());

$app->run();
