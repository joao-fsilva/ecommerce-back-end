<?php

namespace App\Command\User;

use App\Infra\Logger\LogTrait;
use App\UseCase\User\ListUser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserListCommand extends Command
{
    use LogTrait;

    private ListUser $listUser;

    public function __construct(ListUser $listUser)
    {
        parent::__construct();

        $this->listUser = $listUser;
    }

    protected function configure()
    {
        $this->setName('user:list')
            ->setDescription('list All user as array');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logger->info('iniciando');

        $data = $this->listUser->execute();

        $output->writeln("<info>$data</info>");

        return Command::SUCCESS;
    }

}