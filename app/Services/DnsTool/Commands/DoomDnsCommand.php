<?php

namespace App\Services\DnsTool\Commands;

use App\Services\DnsTool\DnsCommand;
use Symfony\Component\HttpFoundation\Response;

class DoomDnsCommand implements DnsCommand
{
    public static $url = 'https://dos.zone/en/play/https%3A%2F%2Fdoszone-uploads.s3.dualstack.eu-central-1.amazonaws.com%2Foriginal%2F2X%2Fe%2Fede529c8e71c94363f9f3c8fd84519608bd632ea.jsdos?turbo=0';

    public function canPerform(string $command): bool
    {
        return $command === 'doom';
    }

    public function perform(string $command): Response
    {
        return redirect(static::$url);
    }
}
