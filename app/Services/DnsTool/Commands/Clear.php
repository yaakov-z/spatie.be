<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\Command;
use Symfony\Component\HttpFoundation\Response;

class Clear implements Command
{
    public function canPerform(string $command): bool
    {
        return $command === 'clear';
    }

    public function perform(string $command): Response
    {
        return redirect('/');
    }
}
