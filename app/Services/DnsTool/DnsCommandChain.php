<?php

namespace App\Services\DnsTool;

use App\Services\DnsTool\Commands\ClearDnsCommand;
use App\Services\DnsTool\Commands\DnsLookupDnsCommand;
use App\Services\DnsTool\Commands\DoomDnsCommand;
use App\Services\DnsTool\Commands\IpDnsCommand;
use App\Services\DnsTool\Commands\LocalhostDnsCommand;
use App\Services\DnsTool\Commands\HelpDnsCommand;
use Symfony\Component\HttpFoundation\Response;

class DnsCommandChain
{
    protected $commands = [
        HelpDnsCommand::class,
        LocalhostDnsCommand::class,
        ClearDnsCommand::class,
        IpDnsCommand::class,
        DoomDnsCommand::class,
        DnsLookupDnsCommand::class,
    ];

    public function perform(string $input): Response
    {
        $input = strtolower($input);

        return collect($this->commands)
            ->map(fn(string $commandClassName) => new $commandClassName)
            ->first(fn(DnsCommand $command) => $command->canPerform($input))
            ->perform($input);
    }
}
