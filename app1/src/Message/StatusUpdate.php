<?php
declare(strict_types=1);
namespace App\Message;

class StatusUpdate
{
    public function __construct(protected string $status){}

    public function getStatus(): string
    {
        return $this->status;
    }
}