<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\DnsCommand;
use Symfony\Component\HttpFoundation\Response;

class LocalhostDnsCommand implements DnsCommand
{
    public function canPerform(string $command): bool
    {
        return $command === 'localhost';
    }

    public function perform(string $command): Response
    {
        flash()->error("Please try someone else's domain.");

        return back();
    }
}
