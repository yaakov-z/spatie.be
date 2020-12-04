<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\Command;
use Symfony\Component\HttpFoundation\Response;

class Ip implements Command
{
    public function canPerform(string $command): bool
    {
        return $command === 'ip';
    }

    public function perform(string $command): Response
    {
        $output = 'Your ip address is ' . request()->ip() . '.';

        return response()->view('front.pages.tools.dns.index', ['output'=> $output]);
    }
}
