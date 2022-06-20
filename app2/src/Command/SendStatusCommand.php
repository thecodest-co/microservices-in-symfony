<?php
declare(strict_types=1);

namespace App\Command;

use App\Message\StatusUpdate;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: "app:send"
)]
class SendStatusCommand extends Command
{
    public function __construct(private readonly MessageBusInterface $messageBus, string $name = null)
    {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $status = "Worker X assigned to Y";

        $this->messageBus->dispatch(
            message: new StatusUpdate($status)
        );

        return Command::SUCCESS;
    }
}