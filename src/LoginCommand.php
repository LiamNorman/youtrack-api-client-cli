<?php

namespace YouTrackApiClient;

use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoginCommand extends Command
{
    public function configure()
    {
        $this->setName('login')
             ->setDescription('Login to Youtrack')
             ->addArgument('name', InputArgument::REQUIRED, 'Your username.')
            ->addArgument('password', InputArgument::REQUIRED, 'Your password.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $url = 'https://todotick.myjetbrains.com';

        $username = $input->getArgument('name');
        $password = $input->getArgument('password');

        $client = new Client();

        $response = $client->post("$url/youtrack/rest/user/login", [
            'headers'     => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => ['login' => $username,
            'password'                => $password, ],
        ]);

        $cookie = $response->getHeader('Set-Cookie');

        $dataDir = "../data/";
        file_put_contents("{$dataDir}authtoken.txt", $cookie);

        $message = sprintf('%s, %s', $response->getStatusCode(), $input->getArgument('name'));
        $output->writeln("<info>$message</info>");
    }
}
