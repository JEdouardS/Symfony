<?php
/**
 * Created by PhpStorm.
 * User: Warai
 * Date: 18/12/13
 * Time: 12:14
 */

namespace iim\BlogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
class AdminCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('user:grant_admin')
            ->setDescription('Give ROLE_ADMIN to an User')
            ->addArgument('id', InputArgument::OPTIONAL, 'The id')
            ->addOption('role', null, InputOption::VALUE_OPTIONAL, 'Role', 'ROLE_ADMIN')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $role=$input->getOption('role');


        $user = $this->getContainer()->get('fos_user.user_manager')->findUserBy(array('id'=>$id));
        $user->addRole($role);
        $this->getContainer()->get('fos_user.user_manager')->updateUser($user);

        $output->writeln("user $id has been granted");
    }
} 