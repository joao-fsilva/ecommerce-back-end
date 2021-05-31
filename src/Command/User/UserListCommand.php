<?php

namespace Ecommerce\Command\User;

use Ecommerce\Application\User\ListUser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserListCommand extends Command
{
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
        $data = $this->listUser->execute();

        return Command::SUCCESS;
    }

}