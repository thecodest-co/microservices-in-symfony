<?php
declare(strict_types=1);
namespace App\Handler;

use App\Message\StatusUpdate;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class StatusUpdateHandler
{
    public function __construct(
        protected LoggerInterface $logger,
    ) {}

    public function __invoke(StatusUpdate $statusUpdate): void
    {
        $statusDescription = $statusUpdate->getStatus();

        $this->logger->warning('APP2: {STATUS_UPDATE} - '.$statusDescription);
    }
}