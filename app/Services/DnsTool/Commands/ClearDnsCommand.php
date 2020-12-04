<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\DnsCommand;
use Symfony\Component\HttpFoundation\Response;

class ClearDnsCommand implements DnsCommand
{
    public function canPerform(string $command): bool
    {
        return $command === 'clear';
    }

    public function perform(string $command): Response
    {
        return redirect()->route('tools.dns');
    }
}
