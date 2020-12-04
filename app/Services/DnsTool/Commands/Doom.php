<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\Command;
use Symfony\Component\HttpFoundation\Response;

class Doom implements Command
{
    public function canPerform(string $command): bool
    {
        return $command === 'doom';
    }

    public function perform(string $command): Response
    {
        return redirect('https://js-dos.com/games/doom.exe.html');
    }
}
