<?php

namespace App\Services\DnsTool;

use App\Services\DnsTool\Commands\Clear;
use App\Services\DnsTool\Commands\DnsLookup;
use App\Services\DnsTool\Commands\Doom;
use App\Services\DnsTool\Commands\Ip;
use App\Services\DnsTool\Commands\Localhost;
use App\Services\DnsTool\Commands\Manual;
use Symfony\Component\HttpFoundation\Response;

class DnsCommandChain
{
    protected $commands = [
        Manual::class,
        Localhost::class,
        Clear::class,
        Ip::class,
        Doom::class,
        DnsLookup::class,
    ];

    public function perform(string $input): Response
    {
        $input = strtolower($input);

        return collect($this->commands)
            ->map(fn(string $commandClassName) => new $commandClassName)
            ->first(fn(Command $command) => $command->canPerform($input))
            ->perform($input);
    }
}
