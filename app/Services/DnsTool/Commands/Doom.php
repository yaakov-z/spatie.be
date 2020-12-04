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
        return redirect('https://dos.zone/en/play/https%3A%2F%2Fdoszone-uploads.s3.dualstack.eu-central-1.amazonaws.com%2Foriginal%2F2X%2Fe%2Fede529c8e71c94363f9f3c8fd84519608bd632ea.jsdos?turbo=0');
    }
}
